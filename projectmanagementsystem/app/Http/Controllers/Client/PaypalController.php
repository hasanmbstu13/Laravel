<?php
namespace App\Http\Controllers\Client;

use App\ClientPayment;
use App\Http\Requests;
use App\Invoice;
use App\PaymentGatewayCredentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Validator;
use URL;
use Session;
use Redirect;
use Illuminate\Support\Facades\Input;

/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Carbon\Carbon;

class PaypalController extends ClientBaseController
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $credential = PaymentGatewayCredentials::first();

        /** setup PayPal api context **/
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($credential->paypal_client_id, $credential->paypal_secret));
        $this->_api_context->setConfig($paypal_conf['settings']);
        $this->pageTitle = 'Paypal';
    }

    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal()
    {
        return view('paywithpaypal', $this->data);
    }

    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function paymentWithpaypal(Request $request, $invoiceId)
    {
        $invoice = Invoice::find($invoiceId);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Payment for invoice #'.$invoice->invoice_number) /** item name **/
        ->setCurrency($invoice->currency->currency_code)
            ->setQuantity(1)
            ->setPrice($invoice->total); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency($invoice->currency->currency_code)
            ->setTotal($invoice->total);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($this->companyName.' payment for invoice #'. $invoice->invoice_number);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('client.status')) /** Specify return URL **/
        ->setCancelUrl(route('client.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            config(['paypal.secret' => 'ENoYdC28aAABlweZV0q70-4FeaSExGddse2NxFQoPKMbksd4jsMEbQDcv1-2ko0H67hAxhWhj-VmK6Ow']);
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('client.invoices.show', $invoiceId);
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('client.invoices.show', $invoiceId);
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

//        Save details in database and redirect to paypal
        $clientPayment = new ClientPayment();
        $clientPayment->invoice_id = $invoiceId;
        $clientPayment->amount = $invoice->total;
        $clientPayment->transaction_id = $payment->getId();
        $clientPayment->gateway = 'Paypal';
        $clientPayment->save();

        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
        return Redirect::route('client.invoices.show', $invoiceId);
    }

    public function getPaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        $clientPayment =  ClientPayment::where('transaction_id', $payment_id)->first();
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty($request->PayerID) || empty($request->token)) {
            \Session::put('error','Payment failed');
            return redirect(route('client.invoices.show', $clientPayment->invoice_id));
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {

            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            $clientPayment->status = 'complete';
            $clientPayment->paid_on = Carbon::now();
            $clientPayment->save();

            $invoice = Invoice::find($clientPayment->invoice_id);
            $invoice->status = 'paid';
            $invoice->save();

            \Session::put('success','Payment success');
            return Redirect::route('client.invoices.show', $clientPayment->invoice_id);
        }
        \Session::put('error','Payment failed');

        return Redirect::route('client.invoices.show', $clientPayment->invoice_id);
    }
}