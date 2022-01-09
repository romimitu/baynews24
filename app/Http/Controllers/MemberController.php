<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use DB;
use File;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:member-list');
        $this->middleware('permission:member-create', ['only' => ['create','store']]);
        $this->middleware('permission:member-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:member-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $data = Member::orderBy('created_at', 'desc')->paginate(12);
        return view('admin.member.index', compact('data'));
    }

    public function create()
    {
        return view('admin.member.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
            'designation' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            $data = $request->except('image'); 
            $data['image']=uploadFile('image',$request,'uploads/member/');

            $member = Member::create($data);
        });
        Session::flash('message','Added  Successfully');
        return redirect('/members');
    }

    public function show(Member $member)
    {
        //
    }

    public function edit(Member $member)
    {
        $post = Member::find($member->id);
        return view('admin.member.edit', compact('post'));
    }

    public function update(Request $request, Member $member)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
            'designation' => 'required',
        ]);

        $data = $request->except('image'); 
        if ($request->hasFile('image')){
            $data['image']=uploadFile('image',$request,'uploads/member/');
        }
        $member->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/members');
    }

    public function destroy(Member $member)
    {
        $image=$member->image;
        $image_path = public_path().'/uploads/member/'.$image;

        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $member->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/members');
    }
}
