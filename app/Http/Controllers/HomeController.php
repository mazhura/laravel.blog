<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')
            ->orderBy('id','desc')
            ->paginate(2);

        return view('home.index',compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();
        $post->views +=1;
        $post->update();
        return view('home.show',compact('post'));
    }
}
