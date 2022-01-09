<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\AddType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use DB;
use File;

class AdvertiseController extends Controller
{
    public function index()
    {
        $data = Advertise::with('adtype')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.ad.index', compact('data'));
    }

    public function create()
    {
        $adtype = AddType::orderBy('created_at', 'desc')->where('status', 1)->get();
        return view('admin.ad.create', compact('adtype'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'add_type_id' => 'required',
            'title' => 'required|unique:advertises,title',
        ]);

        DB::transaction(function () use ($request) {
            $post = $request->except('image'); 
            $post['image']=uploadFile('image',$request,'uploads/ad/');

            $post = Advertise::create([
                'add_type_id' => request()->input('add_type_id'),
                'title' => request()->input('title'),
                'link' => request()->input('link'),
                'image' => $post['image'],
                'status' => request()->input('status'),
            ]);
        });
        Session::flash('message','Added  Successfully');
        return redirect('/advertises');
    }

    public function show(Advertise $advertise)
    {
        //
    }

    public function edit(Advertise $advertise)
    {
        $adtype = AddType::orderBy('created_at', 'desc')->where('status', 1)->get();
        $ad = Advertise::with('adtype')->find($advertise->id);
        return view('admin.ad.edit', compact('ad','adtype'));
    }

    public function update(Request $request, Advertise $advertise)
    {
        $this->validate($request, [
            'add_type_id' => 'required',
            'title' => 'required|unique:advertises,title,'.$advertise->id,
        ]);

        DB::transaction(function () use ($request, $advertise) {
            $postdata = $request->except('image');
            if ($request->hasFile('image')){
                $previmg=$advertise->image;
                $image_path = public_path().'/'.$previmg;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
                $image=uploadFile('image',$request,'uploads/ad/');
                DB::update('update advertises set image="'.$image.'" where id='.$advertise->id.' ');
            }

            $postdata = Advertise::whereId($advertise->id)->update([
                'add_type_id' => request()->input('add_type_id'),
                'title' => request()->input('title'),
                'status' => request()->input('status'),
                'link' => request()->input('link'),
            ]);
        });
        Session::flash('message','Update  Successfully');
        return redirect('/advertises');
    }

    public function destroy(Advertise $advertise)
    {
        $image=$advertise->image;
        $image_path = public_path().'/'.$image;

        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $advertise->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/advertises');
    }
}
