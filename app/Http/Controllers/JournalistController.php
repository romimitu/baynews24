<?php

namespace App\Http\Controllers;

use App\Models\Journalist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use DB;
use File;
use PDF;

class JournalistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Journalist::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.journalist.index', compact('data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Journalist $journalist)
    {
        $data = Journalist::find($journalist->id);
        $districts = DB::select('select id, name from districts');
        return view('admin.journalist.single', compact('data', 'districts'));
    }

    public function edit(Journalist $journalist)
    {
        $data = Journalist::find($journalist->id);
        $districts = DB::select('select id, name from districts');
        return view('admin.journalist.edit', compact('data','districts'));
    }

    public function update(Request $request, Journalist $journalist)
    {
        DB::transaction(function () use ($request, $journalist) {
            $data = $request->all();
            $journalist->update($data);
        });
        Session::flash('message', 'Succesfully updated');
        return redirect('/journalists');
    }

    public function destroy(Journalist $journalist)
    {
        $image=$journalist->image;
        $cv=$journalist->cv;
        $image_path = public_path().'/uploads/journalist/'.$image;
        $cv_path = public_path().'/uploads/cv/'.$cv;

        if(File::exists($cv_path)) {
            File::delete($cv_path);
        }
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $journalist->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/journalists');
    }
    public function getupozila(Request $request)
    {
        $data = DB::select('select id, name from upazilas where district_id="'. $request->district.'" ');
        return response()->json($data);
    }

    public function printId(Request $request, Journalist $journalist)
    {
        $pdf = PDF::loadView('admin.id-card-pdf', ["journalist" => [$request->journalist]]);
        $pdf->setPaper('A4', '');
        return $pdf->stream($journalist->name_en . "_" . $journalist->mobile . "-" . str_pad($journalist->id + 1, 4, '0', STR_PAD_LEFT) . '.pdf');
    }
}
