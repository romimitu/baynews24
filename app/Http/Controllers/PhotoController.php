<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use File;

class PhotoController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:photos,title',
            'image' => 'required',
        ]);
        $data = $request->except('image'); 
        $data['image']=uploadFile('image',$request,'uploads/album/'.$request->album_id.'/');
        $data = Photo::create($data);
        Session::flash('message','Added  Successfully');
        return redirect('/albums/'.$request->album_id.'');
    }

    public function show(Photo $photo)
    {
        //
    }

    public function edit(Photo $photo)
    {
        //
    }

    public function update(Request $request, Photo $photo)
    {
        //
    }

    public function destroy(Photo $photo)
    {
        $image=$photo->image;
        $image_path = public_path().'/'.$image;

        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $photo->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect()->back();
    }
}
