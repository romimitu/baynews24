<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:video-list');
        $this->middleware('permission:video-create', ['only' => ['create','store']]);
        $this->middleware('permission:video-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:video-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $videos = Video::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.attribute.video', compact('videos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:videos,title',
            'youtube_id' => 'required',
        ]);
        $data = $request->all();
        $data = Video::create($data);
        Session::flash('message','Added  Successfully');
        return redirect('/videos');
    }

    public function show(Video $video)
    {
        $data = Video::find($video->id);
        return response()->json($data);
    }

    public function edit(Video $video)
    {
        //
    }

    public function update(Request $request, Video $video)
    {
        $this->validate($request, [
            'title' => 'required|unique:videos,title,'.$video->id,
            'youtube_id' => 'required',
        ]);
        $data = $request->all(); 
        $video->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/videos');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/videos');
    }
}
