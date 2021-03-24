<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tags = Tag::paginate(5);
        return view('admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $currentID = DB::table('Tags')->select('id')->orderBy('id', 'desc')->limit(1)->get();;
        $currentID = $currentID[0]->id;
        $last = ++$currentID;
        return view('admin.tags.create', compact('last'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        Tag::create($request->all());
        return redirect()->route('tags.index')->with('success','Tag created!');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $Tag = Tag::find($id);
        if($Tag == null)
        {
            return redirect()->route('tags.index');
        }
        return view('admin.tags.edit',compact('Tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $Tag = Tag::find($id);
        // $category->slug=null;
        $Tag->update($request->all());

        return redirect()->route('tags.index')->with('success','Tag updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $Tag = Tag::find($id);
        $Tag->delete();
        session()->flash('deleted', 'Tag with id ' . $id . ' deleted successfully');

        return redirect()->back();
    }
}
