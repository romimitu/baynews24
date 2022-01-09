<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tag-list');
        $this->middleware('permission:tag-create', ['only' => ['create','store']]);
        $this->middleware('permission:tag-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:tag-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $tags = Tag::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.attribute.tag', compact('tags'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags,name',
        ]);
        $data = $request->all();
        $data = Tag::create($data);
        Session::flash('message','Added  Successfully');
        return redirect('/tags');  
    }

    public function show(Tag $tag)
    {
        $data = tag::find($tag->id);
        return response()->json($data);
    }

    public function edit(Tag $tag)
    {
        //
    }

    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags,name,'.$tag->id,
        ]);
        $data = $request->all(); 
        $tag->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/tags');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/tags');
    }

    
    public function saveTag(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags,name',
        ]);
        $data = Tag::create([
            'name' => request()->input('name'),
            'status' => 1
        ]);
        return response()->json($data);
    }
}
