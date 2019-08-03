<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function getPost(){
        $posts = DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.userid')
                ->select('posts.id as postid', 'posts.*', 'users.id as userid', 'users.role','users.name')
                ->orderBy('posts.created_at', 'desc')
                ->get();
  

        $count = DB::table('comments')
                    ->select('postid',DB::raw("COUNT(comment) as count"))
                    ->join("posts","comments.postid","=","posts.id")
                    ->groupBy('postid')
                    ->get();
                    
        return view('page.postlist', compact('posts','count'));
    }

    public function post(Request $request){
        if ($request->ajax()){
            $user = Auth::user();
            $post = new Post;

            $post->userid = $user->id;
            $post->post = $request->input('post');
            $post->status = 0 ;
            $post->save();
            
            return response($post);
        }
    }

    public function getComment(Request $request){
        if ($request->ajax()){
           $comments = DB::table('comments')
                    ->join('users', 'users.id', '=', 'comments.userid')
                    ->select('comments.id as commentid', 'comments.*', 'users.id as userid', 'users.role','users.name')
                    ->where('postid', '=', $request->id)
                    ->get();
            
            return view('page.commentlist', compact('comments','count'));
        }
    }

    public function makeComment(Request $request){
        if ($request->ajax()){
            $user = Auth::user();
            $comment = new Comment;

            $comment->userid = $user->id;
            $comment->postid = $request->postid;
            $comment->comment = $request['commenttext'.$request->postid];

            $comment->save();

            return response($comment);
        }
    }
}
