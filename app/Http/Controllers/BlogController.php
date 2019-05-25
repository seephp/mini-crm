<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('home', compact('posts'));
    }

    public function showPost($post)
    {
          $post = Post::find($post);

          return view('frontend.post', compact('post'));
    }
}
