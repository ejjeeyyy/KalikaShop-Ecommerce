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
        // $blog->slug = Str::slug($validateData['slug']);
        $blog->description = $validateData['description'];
       
        $uploadPath = 'uploads/blog/';
        if($request->hasFile('image')){
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/blog/',$filename);
            $blog->image = $uploadPath.$filename;
        }

        
        // $blog->meta_title = $validateData['meta_title'];
        // $blog->meta_keyword = $validateData['meta_keyword'];
        // $blog->meta_description = $validateData['meta_description'];
    
        // $blog->status = $request->status == true ? '1':'0';
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
       

        // $uploadPath = 'uploads/blog/';
        // if($request->hasFile('image')){

        //     $path ='uploads/blog/'.$blog->image;
        //     if(File::exists($path)){
        //         File::delete($path);
        //     }

        //     $file = $request->file('image');

        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$ext;

        //     $file->move('uploads/blog/',$filename);
        //     $blog->image = $uploadPath.$filename;
        // }

        if($request->hasFile('image')){
            $uploadPath = 'uploads/blog/';
            $i= 1;
            foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $blog->blogImages()->create([
                    'blog_id' => $blog->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        
        $blog->update();

        return redirect('admin/blog')->with('message','Blog Updated Successfully!');
    }
}
