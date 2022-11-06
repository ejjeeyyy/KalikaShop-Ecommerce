@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 p-5">
            <div class="card">
                <div class="card-header">{{ __('Welcome!') }}</div>

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
