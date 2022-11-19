@extends('layouts.app')

@section('title','Verify Your Email')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <img class="d-block mx-auto my-4"
                src="https://cdn.discordapp.com/attachments/1017009278445432862/1033281796521070653/kaliksahop_logo.png"
                alt="" width="150" height="150">
            <div class="card mb-5">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},<br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary align-baseline">{{ __('Resend Email') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
