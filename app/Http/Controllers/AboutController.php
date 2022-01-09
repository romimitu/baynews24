<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $abouts = About::orderBy('created_at', 'asc')->paginate(1);
        return view('admin.about.index', ['abouts' => $abouts]); 
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(About $about)
    {
        //
    }

    public function edit($id)
    {
        $about = About::find($id);
        return view('admin.about.edit', ['about' => $about]);
    }

    public function update(Request $request, $id)
    {
        $about = About::find($id);
        $data = $request->all();
        $about->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/abouts');
    }

    public function destroy(About $about)
    {
        //
    }
}
