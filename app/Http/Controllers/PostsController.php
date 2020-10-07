<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function show($slug)
    {
        //$post = DB::table('posts')->where('slug', $slug)->first();
        $post = Post::where('slug', $slug)->firstOrfail();
    
        return view('post', [
             'post' => $post
         ]
         );
    }
    
}
