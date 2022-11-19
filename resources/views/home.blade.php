@extends('layouts.app')

@section('title', 'Complete my Account')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 p-5">
            <img class="d-block mx-auto"
                src="https://cdn.discordapp.com/attachments/1017009278445432862/1033281796521070653/kaliksahop_logo.png"
                alt="" width="150" height="150">
            <div class="card my-5">
                <div class="card-header h4 text-center">{{ __('Welcome!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <p><strong>To make your shopping experience effortless, please take time to complete your account here:</strong><br>
                        <a href="{{ url('profile') }}" class="btn btn-success px-3 mt-2">Complete my Account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
