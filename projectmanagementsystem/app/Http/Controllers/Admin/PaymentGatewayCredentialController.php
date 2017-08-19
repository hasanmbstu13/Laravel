<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Reply;
use App\PaymentGatewayCredentials;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentGatewayCredentialController extends AdminBaseController
{
    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.paymentGatewayCredential');
        $this->pageIcon = 'ti-key';
    }

    public function index(){
        $this->credentials = PaymentGatewayCredentials::first();
        return view('admin.payment-gateway-credentials.edit', $this->data);
    }

    public function update(Request $request, $id) {
        $credential = PaymentGatewayCredentials::find($id);
        $credential->paypal_client_id = $request->paypal_client_id;
        $credential->paypal_secret = $request->paypal_secret;
        ($request->paypal_status) ? $credential->paypal_status = 'active' : $credential->paypal_status = 'deactive';
        $credential->save();

        return Reply::success(__('messages.settingsUpdated'));
    }
}
