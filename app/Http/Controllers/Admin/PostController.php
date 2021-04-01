<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::with('category','tags')->orderby('id', 'desc')->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $currentID = DB::table('Posts')->select('id')->latest('id')->first();
        if ($currentID != NULL) {
            $newId = ++$currentID->id;
        }else{
            $newId = 1;
        }

        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();

        return view('admin.posts.create', compact('newId', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image',
        ]);

        $data = $request->all();
        $data['thumbnail'] = Post::uploadImage($request);


        $post = Post::create($data);
        $post->tags()->sync($request->tags);

        session()->flash('success', 'Post created');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('title', 'id');

        if ($post == null) {
            return redirect()->route('admin.posts.index');
        }
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required|integer',
            'thumbnail' => 'nullable|image',
        ]);

        $post = Post::find($id);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            Storage::delete($post->thumbnail);
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("images/{$folder}"); //TODO incorrect photo update
            }

        $post->update($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        Storage::delete($post->thumbnail);
        $post->tags()->sync([]);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted!');
    }
}
