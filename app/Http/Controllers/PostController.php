<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\PostTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use DB;
use File;
use Bengali;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:post-list');
        $this->middleware('permission:post-create', ['only' => ['create','store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = Post::with('category','subCategory','tag')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.post.index', compact('data'));
    }

    public function create()
    {
        $category = Category::orderBy('created_at', 'desc')->where('status', 1)->get();
        $subcategory = SubCategory::orderBy('created_at', 'desc')->where('status', 1)->get();
        $tags = Tag::orderBy('created_at', 'desc')->where('status', 1)->get();
        return view('admin.post.create', compact('category','subcategory','tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            //'category_id' => 'required',
            //'sub_category_id' => 'required',
            'tags' => 'required',
            'title' => 'required|unique:posts,title',
        ]);

        DB::transaction(function () use ($request) {
            $post = $request->except('image'); 
            $post['image']=uploadFileWithCrop('image',$request,'uploads/post/');
            
            Post::where('featured_sl', request()->input('featured_sl'))
            ->update(['featured_sl' => '99']);
            Post::where('top_sl', request()->input('top_sl'))
            ->update(['top_sl' => '99']);

            $post = Post::create([
                'category_id' => request()->input('category_id'),
                'sub_category_id' => request()->input('sub_category_id'),
                'title' => request()->input('title'),
                'subtitle' => request()->input('subtitle'),
                'featured_sl' => request()->input('featured_sl'),
                'top_sl' => request()->input('top_sl'),
                'image' => $post['image'],
                'description' => request()->input('description'),
                'caption' => request()->input('caption'),
                'reporter' => request()->input('reporter'),
                'topnews' => request()->input('topnews'),
                'status' => request()->input('status'),
                'processed_by' => auth()->user()->id,
            ]);

            foreach ($request->tags as $key=>$data) {
                $data = new PostTag();
                $data->tag_id = $request->tags[$key];
                $data->post_id = $post->id;
                $data->save();
            }
        });
        Session::flash('message','Added  Successfully');
        return redirect('/posts');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        $category = Category::orderBy('created_at', 'desc')->where('status', 1)->get();
        $subcategory = SubCategory::orderBy('created_at', 'desc')->where('status', 1)->get();
        $tags = Tag::orderBy('created_at', 'desc')->where('status', 1)->get();
        $post = Post::with('category','subCategory','tag')->find($post->id);        
        $tagsObjectArray = $post->tag->toArray();
        $tagsArray = array_column($tagsObjectArray, 'tag_id');
        return view('admin.post.edit', compact('post','category','subcategory','tags','tagsArray'));
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'tags' => 'required',
            'title' => 'required|unique:posts,title,'.$post->id,
        ]);

        DB::transaction(function () use ($request, $post) {

            $rows = DB::table('post_tags')->where('post_id', $post->id);
            $rows->delete();

            $postdata = $request->except('image');
            if ($request->hasFile('image')){
                $previmg=$post->image;
                $image_path = public_path().'/'.$previmg;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }

                $image=uploadFileWithCrop('image',$request,'uploads/post/');
                DB::update('update posts set image="'.$image.'" where id='.$post->id.' ');
            }

            Post::where('featured_sl', request()->input('featured_sl'))
            ->update(['featured_sl' => '99']);
            Post::where('top_sl', request()->input('top_sl'))
            ->update(['top_sl' => '99']);
            
            $postdata = Post::whereId($post->id)->update([
                'category_id' => request()->input('category_id'),
                'sub_category_id' => request()->input('sub_category_id'),
                'title' => request()->input('title'),
                'subtitle' => request()->input('subtitle'),
                'featured_sl' => request()->input('featured_sl'),
                'top_sl' => request()->input('top_sl'),
                'description' => request()->input('description'),
                'caption' => request()->input('caption'),
                'reporter' => request()->input('reporter'),
                'topnews' => request()->input('topnews'),
                'status' => request()->input('status'),
                'processed_by' => auth()->user()->id,
            ]);

            foreach ($request->tags as $key=>$data) {
                $data = new PostTag();
                $data->tag_id = $request->tags[$key];
                $data->post_id = $post->id;
                $data->save();
            }
        });
        Session::flash('message','Update  Successfully');
        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        $image=$post->image;
        $image_path = public_path().'/'.$image;

        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $post->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/posts');
    }


    public function getSubCat(Request $request)
    {
        $data = SubCategory::where('category_id', $request->category_id)->get();
        return response()->json($data);
    }

    public function postApproved(Request $request, Post $post)
    {
        $data = Post::whereId($request->id)->update([
            'approved' => $request->approved==null ? "0" : $request->approved,
        ]);

        Session::flash('message','News Approved Has Been update.');
        return redirect('/posts');
    }

    public function postFeatured(Request $request, Post $post)
    {
        $data = Post::whereId($request->id)->update([
            'featured' => $request->featured==null ? "0" : $request->featured,
        ]);

        Session::flash('message','News Featured Has Been update.');
        return redirect('/posts');
    }
}
