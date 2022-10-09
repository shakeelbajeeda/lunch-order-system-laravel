@extends('layouts.user')
@section('content')
    <div class="col-md-9">
        <div class="col-md-12 px-2 bg-primary rounded">
            <div class="fs-3 text-white">Available Balance: <span class="float-end">$ {{auth()->user()->balance == null? '0' : auth()->user()->balance}}</span></div>
        </div>
        <div class="fs-2 mt-3 text-center">Deposit More Funds</div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>Success!</strong> {{session()->get('success')}}
                            </div>
                        @endif
                        @if (session()->has('fail-message'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>Error!</strong> {{session()->get('fail-message')}}
                            </div>
                        @endif

                        <form
                        role="form"
                        action="{{route('stripePost')}}"
                        method="post"
                        class="require-validation"
                        data-cc-on-file="false"
                        id="payment-form">
                        @csrf
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Enter Amount</label>
                                <input class="form-control @error('amount') is-invalid @enderror"   name="amount" type='number'>
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Card Number</label>
                                <input autocomplete='off' name="card_last4" class='form-control card-number' maxlength="16" type='text'>
                                @error('card_last4')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        @enderror
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label>
                                <input autocomplete='off'  maxlength="3" name="cvc" class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                @error('cvc')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        @enderror
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label>
                                <input  maxlength="2" name="card_exp_month" class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                @error('card_exp_month')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        @enderror
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label>
                                <input  maxlength="4" name="card_exp_year" class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                @error('card_exp_year')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Deposit Money</button>
                            </div>
                        </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">

        $(function() {

            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script> --}}
@endsection
