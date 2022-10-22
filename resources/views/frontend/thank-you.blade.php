@extends('layouts.app')

@section('title', 'Thank You for Shopping')

@section('content')
    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if (session('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                    @endif
                    <div class="p-4 shadow bg-white rounded">
                        <img src="https://cdn.discordapp.com/attachments/1017009278445432862/1033281796521070653/kaliksahop_logo.png" style="width:300px" alt="KalikaShop Logo">
                        <h4 class="mb-4">Thank You for Shopping at KalikaShop</h4>
                        <div class="row justify-content-center">
                            <div class="col"> 
                                <a href="{{ url('collections') }}" class="btn btn-success" style="width:200px;"><i class="bi bi-cart4"></i> Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection 