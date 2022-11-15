@extends('layouts.app')

@section('title', 'KalikaShop Blog')

@section('content')

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">KalikaShop Blog Posts</h4>
                </div>
                @forelse ($blogs as $blogItem)
                    <div class="col-6 col-md-3">
                        <div class="category-card tex" id="blogCard">
                            <a href="{{ url('/blog/' . $blogItem->id) }}">
                                <div class="category-card-img">
                                <img src="{{ asset("$blogItem->image") }}" class="w-100" id="blogItem">
                                </div>
                                <div class="category-card-body" >

                                    <div class="d-flex justify-content-between">
                                        <div class="text-muted ">
                                            {{ $blogItem->created_at->format('d F Y') }}
                                        </div>
                                            <div class="font-weight-bolder text-primary">
                                                {{ $blogItem->category }}
                                            </div>
                                 
                                    </div>
                                </div>
                                <a href="{{ url('/blog/' . $blogItem->id) }}" class="font-weight-bold text-success ">
                                    <h3 class="mx-3">{{ $blogItem->title }}</h3>

                                    <p class="text-muted mx-3">{{ $blogItem->description }}</p>
                                    {{-- <a href="#" class="btn btn-outline-secondary">#{{ $blogItem->tags }}</a> --}}
                                </a>        
                        </div>
                        
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


@endsection
