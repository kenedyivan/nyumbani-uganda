<?php

namespace App\Http\Controllers\User;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agent;
use App\Comment;
use App\Property;
use Input, Redirect, Auth;

class UserBlogPostsController extends Controller
{
    function getAllPosts(Request $request){
        $posts = Post::orderBy('created_at','DESC')->paginate(3);
        return view('users.user_blog_post_listings')
        ->with('posts',$posts)
        ->with('property_type',$this->property_types);
    }

    function showPost(Request $request, $slug){
        $posts = Post::where('slug',$slug)->first();
        	$comments = $posts->comments;
        $recentComments = Comment::orderBy('id','Desc')->take(2)->get();
        $properties = Property::orderBy('id','Desc')->take(3)->get();
        $property = Property::orderBy('id','Asc')->take(3)->get();

        return view('users.user_blog_post')
        ->with(['posts'=>$posts,'comments'=>$comments,
        'recentComments'=>$recentComments,
        'properties'=>$properties,
        'property'=>$property])
        ->with('property_type',$this->property_types);


    }

    function postComment(Request $request){
    	$comment = new Comment();
    	$comment->post_id  = Input::get('on_post');
    	$comment->user_id  = Auth::guard('agent')->id();
    	if(Input::has('body')) $comment->body = Input::get('body');

        $slug = Input::get('slug');
        $posts = Post::where('slug',$slug)->first();
        	$comments = $posts->comments;
        	$recentComments = Comment::orderBy('id','Desc')->take(2)->get();
        if($comment->save())
        return redirect(route('user.show.posts',['slug'=>$slug]))
        ->with(['posts'=>$posts,'comments'=>$comments,
        'recentComments'=>$recentComments])
        ->with('property_type',$this->property_types);


    }
}
