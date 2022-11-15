
<div>
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Blog Post Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form wire:submit.prevent="destroyBlog">
      <div class="modal-body">
        <h6>Are you sure you want to delete this blog post?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger text-white">Yes. Delete</button>
      </div>
    </form>

    </div>
  </div>
</div>


<div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Blog Posts
                        <a href="{{ url('admin/blog/create') }}" class="btn btn-primary btn-sm float-end">Add Blog</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Description</th>
                                {{-- <th>Tags</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>
                                        <img src="{{ asset("$blog->image") }}" style="width: 70px; height: 70px" alt="Blog">
                                    </td>
                                    <td>{{ $blog->category }}</td>
                                    <td style="max-width: 500px;">{{ substr($blog->description,0 ,300) }}...</td>
                                    {{-- <td>{{ $blog->tags }}</td> --}}
                                    <td>
                                        <a href="{{ url('admin/blog/'.$blog->id.'/edit') }}" class="btn btn-success">Edit</a>                            
                                        <a href="#" wire:click="deleteBlog({{$blog->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@push('script')

<script>
    window.addEventListener('close-modal', event => {

        $('#deleteModal').modal('hide');

    });
</script>


@endpush