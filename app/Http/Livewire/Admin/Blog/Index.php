<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;
use App\Models\Blog;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $blog_id;

    public function deleteBlog($blog_id)
    {
        $this->blog_id = $blog_id;
    }

    public function destroyBlog()
    {
        $blog = Blog::find($this->blog_id);
        $path ='uploads/blog/'.$blog->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $blog->delete();
        session()->flash('message','Blog Post Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $blogs = Blog ::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.blog.index',['blogs' => $blogs]);
    }

}
