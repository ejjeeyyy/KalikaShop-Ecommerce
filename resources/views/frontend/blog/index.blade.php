@extends('layouts.app')

@section('title', 'KalikaShop Blog')

@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container ">
            <div class="row row-cols-2">
                <div class="col-md-12">
                    <h4 class="mb-4 fw-bold display-5 text-center">KalikaShop Blog</h4>
                </div>
                @forelse ($blogs as $blogItem)
                    <div class="col-6">
                        <div class="blog-card rounded" id="blogCard">
                            <a href="{{ url('/blog/' . $blogItem->id) }}">
                                <div class="blog-card-img">
                                    <img src="{{ asset("$blogItem->image") }}" class="w-100" id="blogItem">
                                </div>
                                <div class="blog-card-body">

                                    <div class="d-flex justify-content-between">
                                        <div class="text-muted ">
                                            {{ $blogItem->created_at->format('d F Y') }}
                                        </div>
                                        <div class="font-weight-bolder text-primary">
                                            {{ $blogItem->category }}
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ url('/blog/' . $blogItem->id) }}" class="font-weight-bold text-success">
                                    <h3 class="mx-3">{{ $blogItem->title }}</h3>
                                    <p class="text-muted mx-3">{{ substr($blogItem->description,0 ,350) }}...<span style="color:rgb(0, 119, 255);">Learn More</span></p>
                                    {{-- <a href="#" class="btn btn-outline-secondary">#{{ $blogItem->tags }}</a> --}}
                                </a>
                        </div>
                    </div>
            
            @empty
            <div class="col-md-12">
                <h5>No Blog Available</h5>
            </div>
            @endforelse
            </div>
        </div>
    </div>
    </div>


@endsection
