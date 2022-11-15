<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
    return view('admin.blog.index');
    }

    public function create()
    {
    return view('admin.blog.create');
    }

    public function store(BlogFormRequest $request)
    {
        $validateData = $request->validated();

        $blog = new Blog;
        $blog->title = $validateData['title'];
        $blog->category = $validateData['category'];
        // $blog->tags = $validateData['tags'];
        $blog->description = $validateData['description'];
       
        $uploadPath = 'uploads/blog/';
        if($request->hasFile('image')){
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/blog/',$filename);
            $blog->image = $uploadPath.$filename;
        }


        $blog->save();

        return redirect('admin/blog')->with('message','Blog Added Successfully!');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog')); 
    }

    public function update(BlogFormRequest $request, $blog)
    {
        $validateData = $request->validated();

        $blog = Blog::findOrFail($blog);

        $blog->title = $validateData['title'];
        $blog->category = $validateData['category'];
        // $blog->tags = $validateData['tags'];
        $blog->description = $validateData['description'];
       

        $uploadPath = 'uploads/blog/';
        if($request->hasFile('image')){

            $path ='uploads/blog/'.$blog->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/blog/',$filename);
            $blog->image = $uploadPath.$filename;
        }

        
        $blog->update();

        return redirect('admin/blog')->with('message','Blog Updated Successfully!');
    }
}
