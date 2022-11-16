@extends('layouts.app')

@section('title') {{ $blogShow->title }} @endsection

@section('content')
    <div class="container py-3 my-3">
        <div class="row justify justify-content-center">       
            <div class="col-md-10">
                <a href="{{ url('blog') }}" class="button bi bi-arrow-left-circle mb-5 h3 text-secondary"></a>
                <div class="card img-fluid my-3">
                    <div class="card-header text-success h3 ">{{ $blogShow->title }}
                        <div class="font-weight-bolder text-primary float-end" style="font-size: 18px;">
                            <label class="text-dark">Category:</label> {{ $blogShow->category }}
                        </div>
                        <p class="text-muted mt-1" style="font-size: 14px;">{{ $blogShow->created_at->format('d F Y') }}</p>

                    </div>

      
                       
                            @if($blogShow->image)
                                <img src="{{ asset("$blogShow->image") }}" >
                            @else
                                <img src="{{ asset('no_image.jpg') }}" width="100" height="100" class="img-fluid">
                            @endif
                       

                        <p class="mx-3 mt-3" style="text-align: justify; " >{!! nl2br($blogShow->description) !!}</p>
                        {{-- <div class="my-5">{!! nl2br($blogShow->description) !!}</div> --}}

                        {{-- @foreach ($blog->tags as $tag)
                            <a href="#" class="btn btn-outline-secondary">#{{ $tag->name }}</a>
                        @endforeach --}}

                </div>
            </div>
        </div>
    </div>
@endsection
