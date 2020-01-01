@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                <div class="col-md-12 col-sm-12 col-xs-12 image-section">
                    <img src="{{ url('public/images/email.png') }}" class="img-responsive">
                </div>
                    <p style="    font-size: 19px;color: red;margin-top: 20px;">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                   <p style=" font-size: 18px;"> {{ __('If you did not receive the email') }}, <b><a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a></b>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
