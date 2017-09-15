<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Session;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request,$post_id){
          if(Auth::check()){
        $this->validate($request , array(
          'subject' => 'max:100',
          'comment' => 'required'
        ));
      }else{
        $this->validate($request , array(
          'name' => 'required|max:50',
          'email' =>'required|max:255',
          'subject' => 'max:100',
          'comment' => 'required'
        ));
      }
          $comment = new Comment;
          $post = Post::find($post_id);

          if(Auth::check()){
            ##check if the commentor is an admin the store the name and email as the logged in user
            $name = Auth::user()->name;
            $email= Auth::user()->email;



          $comment->name = $name;
          $comment->email = $email;
          $comment->subject = $request->subject;
          $comment->approved = true;
          $comment->user = true;
          $comment->post_id = $request->post_id;
          $comment->comment = $request->comment;
        }else{
          $comment->name =$request->name;
          $comment->email = $request->email;
          $comment->subject = $request->subject;
          $comment->approved = true;
          $comment->user = false;
          $comment->post_id = $request->post_id;
          $comment->comment = $request->comment;
        }
        $comment->save();

        Session::flash('success', 'The comment was uploaded successfully');

        return redirect()->route('blog.single', $post->slug);


    }
}
