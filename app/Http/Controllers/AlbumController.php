<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use File;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:album-list');
        $this->middleware('permission:album-create', ['only' => ['create','store']]);
        $this->middleware('permission:album-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:album-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $albums = Album::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.attribute.album', compact('albums'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:albums,title',
            'cover_image' => 'required',
        ]);
        $data = $request->except('cover_image'); 
        $data['cover_image']=uploadFile('cover_image',$request,'uploads/album/');
        $data = Album::create($data);
        Session::flash('message','Added  Successfully');
        return redirect('/albums');
    }

    public function show(Album $album)
    {
        $album = Album::with('photo')->find($album->id);
        return view('admin.attribute.photo-album', compact('album'));
    }

    public function edit(Album $album)
    {
        //
    }
    
    public function update(Request $request, Album $album)
    {
        $this->validate($request, [
            'title' => 'required|unique:albums,title,'.$album->id,
        ]);

        $data = $request->except('cover_image');
        if ($request->hasFile('cover_image')){
            $previmg=$album->cover_image;
            $image_path = public_path().'/'.$previmg;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $image=uploadFile('cover_image',$request,'uploads/album/');
            DB::update('update albums set cover_image="'.$image.'" where id='.$album->id.' ');
        }

        $album->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/albums');
    }

    public function destroy(Album $album)
    {
        $image=$album->cover_image;
        $image_path = public_path().'/'.$image;

        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $album->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/albums');
    }
    
    public function showAlbum(Request $request)
    {
        $data = Album::where('id', $request->id)->get();
        return response()->json($data);
    }
}
