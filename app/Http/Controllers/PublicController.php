<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Models\Complaint;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\Member;
use App\Models\Journalist;
use App\Models\Video;
use App\Models\Album;
use DB;
use File;

class PublicController extends Controller
{
    public function homePage()
    {
        $bdpost = Post::with('category','subCategory','tag')->where('category_id', '1')
        ->where('status', 1)->where('approved', 1)->orderBy('created_at', 'desc')->paginate(11);
        $worldpost = Post::with('category','subCategory','tag')->where('category_id', '6')
        ->where('status', 1)->where('approved', 1)->orderBy('created_at', 'desc')->paginate(11);
        $politicspost = Post::with('category','subCategory','tag')->where('category_id', '4')
        ->where('status', 1)->where('approved', 1)->orderBy('created_at', 'desc')->paginate(11);
        $opinionpost = Post::with('category','subCategory','tag')->where('category_id', '14')
        ->where('status', 1)->where('approved', 1)->orderBy('created_at', 'desc')->paginate(11);
        $sportspost = Post::with('category','subCategory','tag')->where('category_id', '7')
        ->where('status', 1)->where('approved', 1)->orderBy('created_at', 'desc')->paginate(11);
        $economicspost = Post::with('category','subCategory','tag')->where('category_id', '5')
        ->where('status', 1)->where('approved', 1)->orderBy('created_at', 'desc')->paginate(11);
        $techpost = Post::with('category','subCategory','tag')->where('category_id', '12')
        ->where('status', 1)->where('approved', 1)->orderBy('created_at', 'desc')->paginate(11);
        $crime = Post::with('category','subCategory','tag')->where('category_id', '8')
        ->where('status', 1)->where('approved', 1)->orderBy('created_at', 'desc')->paginate(11);
        $entertainmentpost = Post::with('category','subCategory','tag')->where('category_id', '2')
        ->where('status', 1)->where('approved', 1)->orderBy('created_at', 'desc')->paginate(11);
        $viral = Post::with('category','subCategory','tag')->where('category_id', '11')
        ->where('status', 1)->where('approved', 1)->orderBy('created_at', 'desc')->paginate(11);

        return view('frontend.index', compact('bdpost','worldpost','politicspost','opinionpost','sportspost','economicspost','techpost','crime','entertainmentpost','viral'));
    }


    public function getPostByCategory($id, $slug)
    {
        $posts = Post::with('category','subCategory','tag')
        ->where('category_id', $id)
        ->where('status', 1)
        ->where('approved', 1)
        ->orderBy('created_at', 'desc')->paginate(15);

        $subcats = SubCategory::where('category_id', $id)
        ->orderBy('created_at', 'asc')->get();
        return view('frontend.category', compact('posts','subcats'));
    }
    public function getPostBySubCategory($id, $slug)
    {
        $posts = Post::with('category','subCategory','tag')
        ->where('sub_category_id', $id)
        ->where('status', 1)
        ->where('approved', 1)
        ->orderBy('created_at', 'desc')->paginate(15);
        return view('frontend.subcategory', compact('posts'));
    }

    public function getPostByTag($id, $slug)
    {
        $posts = Post::with('category','subCategory','tag.tags')
        ->whereHas('tag.tags', function ($query) use ($id) {
            return $query->where('tag_id', '=', $id);
        })
        ->where('status', 1)
        ->where('approved', 1)
        ->orderBy('created_at', 'desc')->paginate(15);        
        $tag = Tag::find($id);
        return view('frontend.tag', compact('posts', 'tag'));
    }
    public function singlePost($id, $slug)
    {
        $post = post::with('category','subCategory','tag','tag.tags')->find($id);
        $blogkey = 'news_' . $post->id;
        if (!Session::has($blogkey)) {
            $viewCount = $post->view_count + 1;
            $post->update(['view_count' => $viewCount]);
            Session::put($blogkey, 1);
        }
        return view('frontend.single', compact('post'));
    }

    public function getVideo()
    {
        $data = Video::orderBy('created_at', 'desc')->paginate(15);
        return view('frontend.pages.video', compact('data'));
    }
    public function getPhotoAlbum()
    {
        $data = Album::orderBy('created_at', 'desc')->paginate(15);
        return view('frontend.pages.album', compact('data'));
    }
    
    public function singleVideoPost($id, $slug)
    {
        $data = Video::find($id);
        return view('frontend.pages.single-video', compact('data'));
    }
    
    public function singlePhotoAlbum($id, $slug)
    {
        $post = Album::with('photo')->find($id);
        return view('frontend.pages.single-album', compact('post'));
    }
    public function getMember()
    {
        $data = Member::orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.pages.member', compact('data'));
    }
    public function aboutUs()
    {
        return view('frontend.pages.about');
    }
    public function commentPolicy()
    {
        return view('frontend.pages.comment-policy');
    }
    public function privacyPolicy()
    {
        return view('frontend.pages.privacy-policy');
    }
    public function contactUs()
    {
        return view('frontend.pages.contact');
    }
    public function complaintsOpinions()
    {
        return view('frontend.pages.complaint-opinion');
    }

    public function journalistApply()
    {
        $districts = DB::select('select name from districts order by name');
        return view('frontend.pages.journalist-apply', compact('districts'));
    }

    public function journalistApplySave(Request $request)
    {
        $this->validate($request, [
            'name_en'=> 'required',
            'name_bn'=> 'required',
            'father'=> 'required',
            'mother'=> 'required',
            'mobile'=> 'required|unique:journalists,mobile',
            'phone'=> 'required',
            'email'=> 'required',
            'facebook'=> 'required',
            'birthdate'=> 'required',
            'birthmonth'=> 'required',
            'birthyear'=> 'required',
            'district'=> 'required',
            'nid'=> 'required',
            'blood_group'=> 'required',
            'present_address'=> 'required',
            'permanent_address'=> 'required',
            'education'=> 'required',
        ]);
        $data = $request->except('image', 'cv');
        $data['image']=uploadFile('image',$request,'uploads/journalist/');
        $data['cv']=uploadFile('cv',$request,'uploads/cv/');
        $data = Journalist::create($data);
        Session::flash('message','Submitted Successfully');
        return redirect('/journalist-apply'); 
    }
    public function complaintSave(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'details' => 'required',
        ]);
        $data = $request->all();
        $data = Complaint::create($data);
        Session::flash('message','Submitted Successfully');
        return redirect('/complaints-opinions');  
    }

    public function archivesPost(Request $request)
    {
        $posts = Post::with('category','subCategory','tag')
        ->whereDate('created_at', $request->date)
        ->where('status', 1)
        ->where('approved', 1)
        ->orderBy('updated_at', 'desc')->paginate(15);
        $date = $request->date;
        return view('frontend.archives', compact('posts', 'date'));
    }
}

