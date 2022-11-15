@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Blog Post
                        <a href="{{ url('admin/blog') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/blog/'.$blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ $blog->title }}" class="form-control" />
                                @error('title') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Category</label>
                                <input type="text" name="category" value="{{ $blog->category }}" class="form-control" />
                                @error('category') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" />
                                <img src="{{ asset($blog->image) }}" width="60px" height="60px" />
                                @error('image') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            {{-- <div class="col-md-6 mb-3">
                                <label>Tags</label>
                                <input type="text" name="tags" value="{{ $blog->tags }}" class="form-control" />
                                @error('tags') <small class="text-danger">{{$message}}</small> @enderror
                            </div> --}}
                            <div class="col-md-12">
                                <h4>Caption</h4>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ $blog->description }}</textarea>
                                @error('description') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            {{-- <div class="col-md-6 mb-3">
                                <label>Status</label><br/>
                                <input type="checkbox" name="status" {{ $blog->status == '1' ? 'checked':'' }}/>
                                @error('status') <small class="text-danger">{{$message}}</small> @enderror
                            </div>

                            <div class="col-md-12">
                                <h4>SEO Tags</h4>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" value="{{ $blog->meta_title }}" class="form-control" />
                                @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="3">{{ $blog->meta_keyword }}</textarea>
                                @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3">{{ $blog->meta_description }}</textarea>
                                @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
                            </div> --}}

                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection