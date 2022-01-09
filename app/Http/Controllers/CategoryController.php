<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category-list');
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = Category::orderBy('slno', 'asc')->paginate(20);
        return view('admin.attribute.category', compact('categories'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
        ]);
        $data = $request->all();
        $data = Category::create($data);
        Session::flash('message','Added  Successfully');
        return redirect('/categories');  
    }

    public function show(Category $category)
    {
        $data = Category::find($category->id);
        return response()->json($data);
    }
    public function edit(Category $category)
    {

    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$category->id,
        ]);
        $data = $request->all(); 
        $category->update($data);
        Session::flash('message', 'Succesfully updated');
        return redirect('/categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/categories');
    }
}
