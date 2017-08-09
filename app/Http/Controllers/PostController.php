<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Auth;
use Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){

      $this->middleware('auth');

  }

    public function index()
    {
      $posts = Post::orderBy('created_at','desc')->paginate(10);
       return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      $tags = Tag::all();
      return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , array(
          'title' => 'required|max:255',
          'category_id' =>'required|integer',
          'tags'    =>  'required',
          'body' => 'required'

        ));
        $post = new Post;
         $slug = str_slug($request->title);

        $post->title = $request->title;
        $post->slug = $slug;
        $post->author = Auth::user()->name;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
//image
if ($request->hasFile('featured_image')) {
        $image = $request->file('featured_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/featured_image/' . $filename);
        Image::make($image)->resize(870, 400)->save($location);
        $post->image = $filename;
      }
        $post->save();
        $post->tags()->sync($request->tags, false);
        Session::flash('success','The Blog post was uploaded successfully');

        return redirect()->route('post.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);


        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $cats = array();
        foreach($categories as $category){
           #code......
           $cats[$category->id] = $category->name;
        }
        foreach($tags as $tag){
         #code......
         $tags2[$tag->id] = $tag->name;
      }
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request , array(
        'title' => 'required|max:255',
        'category_id' =>'required|integer',
        'body' => 'required'

      ));
      $post = Post::find($id);
       $slug = str_slug($request->title);

      $post->title = $request->title;
      $post->slug = $slug;
      $post->category_id  = $request->category_id;
      $post->body = $request->body;

      $post->save();
      //sync with the db
      if(isset($request->tags)){
       $post->tags()->sync($request->tags);
      }else{
            $post->tags()->sync(array());
      }
      Session::flash('success','The Blog post was updated successfully');

      return redirect()->route('post.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
