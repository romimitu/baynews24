<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard');
    }


    public function complaintList()
    {
        $data = Complaint::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.complaint', compact('data'));
    }

    public function complaintDelete($id)
    {
        Complaint::where('id', $id)->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/complaints-list');
    }
}
