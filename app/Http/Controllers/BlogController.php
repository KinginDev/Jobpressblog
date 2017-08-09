<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;

class BlogController extends Controller
{
  public function index(){
    $posts = Post::orderBy('created_at','desc')->paginate(15);
    $tags = Tag::all();
    $categories = Category::all();
    $recposts = Post::orderBy('created_at','desc')->paginate(3);


    return view('blog.index')->withPosts($posts)->withTags($tags)->withCategories($categories)->withRecposts($recposts);
  }

  public function SinglePost($slug){

    //fetch from the th db based on slug
      $post = Post::where('slug', '=', $slug)->first();
      $tags = Tag::all();
      $categories = Category::all();
    $recposts = Post::orderBy('created_at','desc')->paginate(3);

      //return the view and pass the object
      return view('blog.single')->withPost($post)->withTags($tags)->withCategories($categories)->withRecposts($recposts);


  }
}
