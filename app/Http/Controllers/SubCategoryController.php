<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subcategory-list');
        $this->middleware('permission:subcategory-create', ['only' => ['create','store']]);
        $this->middleware('permission:subcategory-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:subcategory-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        $subcategories = SubCategory::with('category')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.attribute.subcategory', compact('subcategories','categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $data = $request->all();
        $data = SubCategory::create($data);
        Session::flash('message','Added  Successfully');
        return redirect('/subcategories'); 
    }

    public function show(SubCategory $subcategory)
    {
        $data = SubCategory::with('category')->find($subcategory->id);
        return response()->json($data);
    }

    public function edit(SubCategory $subcategory)
    {
        //
    }

    public function update(Request $request, SubCategory $subcategory)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $data = $request->all(); 
        $subcategory->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/subcategories');
    }

    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/subcategories');
    }
}
