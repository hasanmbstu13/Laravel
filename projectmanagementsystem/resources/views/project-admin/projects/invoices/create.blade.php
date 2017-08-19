<link rel="stylesheet" href="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><i class="fa fa-plus"></i> @lang('modules.invoices.addInvoice') - @lang('app.project') # {{ $project->id.' '.$project->project_name }}</h4>
</div>
<div class="modal-body">
    <div class="portlet-body">

        <!-- BEGIN FORM-->
        {!! Form::open(['id'=>'storePayments','class'=>'ajax-form','method'=>'POST']) !!}
        <div class="form-body">

            {!! Form::hidden('project_id', $project->id) !!}
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group" >
                        <label class="control-label">@lang('app.invoice') #</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-icon">
                                    <input type="text" readonly class="form-control" name="invoice_number" id="invoice_number" value="{{ Carbon\Carbon::now()->timestamp }}">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">@lang('modules.invoices.currency')</label>
                        <select class="form-control" name="currency_id" id="currency_id">
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->id }}">{{ $currency->currency_symbol.' ('.$currency->currency_code.')' }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-md-6">

                    <div class="form-group" >
                        <label class="control-label">@lang('modules.invoices.invoiceDate')</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-icon">
                                    <input type="text" class="form-control" name="issue_date" id="invoice_date" value="{{ Carbon\Carbon::today()->format('m/d/Y') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">@lang('app.dueDate')</label>
                        <div class="input-icon">
                            <input type="text" class="form-control" name="due_date" id="due_date" value="{{ Carbon\Carbon::today()->addDays(7)->format('m/d/Y') }}">
                        </div>
                    </div>

                </div>

            </div>

            <hr>

            <div class="row">

                <div class="col-xs-12  visible-md visible-lg">

                    <div class="col-md-5 font-bold" style="padding: 8px 15px">
                        @lang('modules.invoices.item')
                    </div>

                    <div class="col-md-2 font-bold" style="padding: 8px 15px">
                        @lang('modules.invoices.qty')
                    </div>

                    <div class="col-md-2 font-bold" style="padding: 8px 15px">
                        @lang('modules.invoices.unitPrice')
                    </div>

                    <div class="col-md-2 text-center font-bold" style="padding: 8px 15px">
                        @lang('modules.invoices.amount')
                    </div>

                    <div class="col-md-1" style="padding: 8px 15px">
                        &nbsp;
                    </div>

                </div>

                <div class="col-xs-12 item-row margin-top-5">

                    <div class="col-md-5">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label hidden-md hidden-lg">@lang('modules.invoices.item')</label>
                                <input type="text" class="form-control item_name" name="item_name[]">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-2">

                        <div class="form-group">
                            <label class="control-label hidden-md hidden-lg">@lang('modules.invoices.qty')</label>
                            <input type="text" min="0" class="form-control quantity" value="0" name="quantity[]" >
                        </div>


                    </div>

                    <div class="col-md-2">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label hidden-md hidden-lg">@lang('modules.invoices.unitPrice')</label>
                                <input type="text" min="" class="form-control cost_per_item" name="cost_per_item[]" value="0" >
                            </div>
                        </div>

                    </div>

                    <div class="col-md-2 border-dark  text-center">
                        <label class="control-label hidden-md hidden-lg">@lang('modules.invoices.amount')</label>

                        <p class="form-control-static"><span class="amount-html">0</span></p>
                        <input type="hidden" class="amount" name="amount[]">
                    </div>

                    <div class="col-md-1 text-right visible-md visible-lg">
                        <button type="button" class="btn remove-item btn-circle btn-danger"><i class="fa fa-remove"></i></button>
                    </div>
                    <div class="col-md-1 hidden-md hidden-lg">
                        <div class="row">
                            <button type="button" class="btn remove-item btn-danger"><i class="fa fa-remove"></i> @lang('app.remove')</button>
                        </div>
                    </div>

                </div>

                <div id="item-list">

                </div>

                <div class="col-xs-12 m-t-5">
                    <button type="button" class="btn btn-info" id="add-item"><i class="fa fa-plus"></i> @lang('modules.invoices.addItem')</button>
                </div>

                <div class="col-xs-12 ">


                    <div class="row">
                        <div class="col-md-offset-9 col-xs-6 col-md-1 text-right p-t-10" >@lang('modules.invoices.subTotal')</div>

                        <p class="form-control-static col-xs-6 col-md-2" >
                            <span class="sub-total">0</span>
                        </p>


                        <input type="hidden" class="sub-total-field" name="sub_total" value="0">
                    </div>

                    <div class="row">
                        <div class="col-md-offset-9 col-md-1 text-right p-t-10">
                            @lang('modules.invoices.discount')
                        </div>
                        <div class="col-md-2">
                            <div class="input-icon input-icon-md">
                                <input type="text" class="form-control discount-amount" name="discount" value="0">
                            </div>
                        </div>
                    </div>

                    <div class="row m-t-5">
                        <div class="col-md-offset-9 col-md-1 text-right p-t-10">
                            @lang('modules.invoices.tax') (%)
                        </div>
                        <div class="col-md-2">
                            <div class="input-icon input-icon-md right">
                                <input type="text"  class="form-control tax-percent" name="tax_percent" value="0">
                            </div>
                        </div>
                    </div>

                    <div class="row m-t-5 font-bold">
                        <div class="col-md-offset-9 col-md-1 col-xs-6 text-right p-t-10" >@lang('modules.invoices.total')</div>

                        <p class="form-control-static col-xs-6 col-md-2" >
                            <span class="total">0</span>
                        </p>


                        <input type="hidden" class="total-field" name="total" value="0">
                    </div>

                </div>

            </div>




        </div>
        <div class="form-actions" style="margin-top: 70px">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" id="save-form" class="btn btn-success"> <i class="fa fa-check"></i> @lang('app.save')</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<script src="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

<script>
    jQuery('#invoice_date, #due_date').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $('#save-form').click(function(){
        $.easyAjax({
            url:'{{route('project-admin.invoices.store')}}',
            container:'#storePayments',
            type: "POST",
            redirect: true,
            data:$('#storePayments').serialize(),
            success: function (data) {
                if(data.status == 'success'){
                    $('#invoices-list-panel ul.list-group').html(data.html);
                    $('#add-invoice-modal').modal('hide');
                }
            }
        })
    });

    $('#add-item').click(function () {
        var item = '<div class="col-xs-12 item-row margin-top-5">'

                +'<div class="col-md-5">'
                +'<div class="row">'
                +'<div class="form-group">'
                +'<label class="control-label hidden-md hidden-lg">@lang('modules.invoices.item')</label>'
                +'<input type="text" class="form-control item_name" name="item_name[]">'
                +'</div>'
                +'</div>'

                +'</div>'

                +'<div class="col-md-2">'

                +'<div class="form-group">'
                +'<label class="control-label hidden-md hidden-lg">@lang('modules.invoices.qty')</label>'
                +'<input type="text" min="0" class="form-control quantity" value="0" name="quantity[]">'
                +'</div>'


                +'</div>'

                +'<div class="col-md-2">'
                +'<div class="row">'
                +'<div class="form-group">'
                +'<label class="control-label hidden-md hidden-lg">@lang('modules.invoices.unitPrice')</label>'
                +'<input type="text" min="0" class="form-control cost_per_item" value="0" name="cost_per_item[]">'
                +'</div>'
                +'</div>'

                +'</div>'

                +'<div class="col-md-2 text-center">'
                +'<label class="control-label hidden-md hidden-lg">@lang('modules.invoices.amount')</label>'
                +'<p class="form-control-static"><span class="amount-html">0</span></p>'
                +'<input type="hidden" class="amount" name="amount[]">'
                +'</div>'

                +'<div class="col-md-1 text-right visible-md visible-lg">'
                +'<button type="button" class="btn remove-item btn-circle btn-danger"><i class="fa fa-remove"></i></button>'
                +'</div>'

                +'<div class="col-md-1 hidden-md hidden-lg">'
                +'<div class="row">'
                +'<button type="button" class="btn remove-item btn-danger"><i class="fa fa-remove"></i> @lang('app.remove')</button>'
                +'</div>'
                +'</div>'

                +'</div>';

        $(item).hide().appendTo("#item-list").fadeIn(500);

    });

    $('#storePayments').on('click','.remove-item', function () {
        $(this).closest('.item-row').fadeOut(300, function() {
            $(this).remove();
            calculateTotal();
        });
    });

    $('#storePayments').on('keyup','.quantity,.cost_per_item', function () {
        var quantity = $(this).closest('.item-row').find('.quantity').val();

        var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();

        var amount = (quantity*perItemCost);

        $(this).closest('.item-row').find('.amount').val(amount);
        $(this).closest('.item-row').find('.amount-html').html(amount);

        calculateTotal();


    });

    function calculateTotal()
    {

//            calculate subtotal

        var subtotal = 0;
        $(".quantity").each(function (index, element) {

            var amount = $(this).closest('.item-row').find('.amount').val();
            subtotal = parseFloat(subtotal)+parseFloat(amount);

        });
        $('.sub-total').html(subtotal);
        $('.sub-total-field').val(subtotal);

//            check discount

        var discount = $('.discount-amount').val();
        discount = parseFloat(discount);

//            check service tax
        var tax = $('.tax-percent').val();
        tax = parseFloat(tax);

//            calculate total
        var totalAfterDiscount = (subtotal-discount);
        var taxAmount = totalAfterDiscount*(tax/100);
        var total = totalAfterDiscount+taxAmount;

        $('.total').html(total);
        $('.total-field').val(total);


    }

    $('.discount-amount,.tax-percent').keyup(function () {
        calculateTotal();
    });
</script>