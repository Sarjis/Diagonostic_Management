<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function posts()
    {
        $posts = Post::all();
        return view('welcome', ['posts' => $posts]);
        //return response()->json(['posts' => $posts]);
    }
}
