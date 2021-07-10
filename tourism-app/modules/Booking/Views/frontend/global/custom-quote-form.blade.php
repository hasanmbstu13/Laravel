<div class="modal fade" tabindex="-1" role="dialog" id="custom_quote_form_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content request_quote_form_modal_form">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Custom Quote Info Form")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="request_quote_service_id" value="{{$row->id}}">
                <input type="hidden" name="request_quote_service_type" value="{{$service_type ?? ''}}">
                <div class="form-group" >
                    <input type="text" class="form-control" name="request_quote_name" placeholder="{{ __("Name *") }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="request_quote_email" placeholder="{{ __("Email *") }}">
                </div>
                <div class="form-group" v-if="!request_quote_is_submit">
                    <input type="text" class="form-control" name="request_quote_phone" placeholder="{{ __("Phone") }}">
                </div>
                <div class="form-group" v-if="!request_quote_is_submit">
                    <textarea class="form-control" placeholder="{{ __("Note: Please provide details as much as possible like start date, number of people, asking price etc.") }}" name="request_quote_note"></textarea>
                </div>
{{--                @if(setting_item("booking_request_quote_enable_recaptcha"))--}}
{{--                    <div class="form-group">--}}
{{--                        {{recaptcha_field('request_quote_form')}}--}}
{{--                    </div>--}}
{{--                @endif--}}
                <div class="message_box"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                <button type="button" class="btn btn-primary btn-submit-request-quote">{{__("Send now")}}
                    <i class="fa icon-loading fa-spinner fa-spin fa-fw" style="display: none"></i>
                </button>
            </div>
        </div>
    </div>
</div>
