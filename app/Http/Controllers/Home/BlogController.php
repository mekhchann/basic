<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function AllBlog(){
      $blogs = Blog::latest()->get();
      return view('admin.blogs.blog_all',compact('blogs'));
    }// End the method all blogs
    public function AddBlog(){
      $categories = BlogCategory::orderBy('blog_category','ASC')->get();
      return view('admin.blogs.blogs_add', compact('categories'));
    }// End the method

    public function StoreBlog(Request $request){
      $image = $request->file('blog_image');
      $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); //34343434.JPG or PNG and gif
      Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
      $save_url = 'upload/blog/'.$name_gen;


      Blog::insert([
        'blog_category_id' => $request->blog_category_id,
        'blog_title' => $request->blog_title,
        'blog_tags' => $request->blog_tags,
        'blog_description' => $request->blog_description,
        'blog_image' => $save_url,
        'created_at' => carbon::now(),
      ]);

      $notification = array(
          'message' => 'Blog is inserted Successfully.',
          'alert-type' => 'success'
      );

      return redirect()->route('all.blog')->with($notification);
    }// End the method
}
