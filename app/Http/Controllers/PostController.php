<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $product = new Post([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'user_id' => Auth::user()->id
        ]);

        $product->save();
        return redirect('posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        if ($post->user_id != auth()->user()->id && auth()->user()->is_admin == false) {
//            flash()->overlay("You can't edit other peoples post.");
            return redirect('posts');
        }

        return view('frontend.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id != auth()->user()->id && auth()->user()->is_admin == false) {
//            flash()->overlay("You can't edit other peoples post.");
            return redirect('posts');
        }

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->save();

        return redirect('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->user_id != auth()->user()->id && auth()->user()->is_admin == false) {
//            flash()->overlay("You can't edit other peoples post.");
            return redirect('posts');
        }

        $post->delete();

        return redirect('posts');
    }
}
