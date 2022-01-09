<?php
namespace App\Http\ViewComposer;

use App\Models\Post;
use App\Models\Video;
use App\Models\Category;
use App\Models\About;
use App\Models\Advertise;
use Illuminate\View\View;
use DB;
use Auth;
class PublicComposer
{
    public function getMenu(View $view)
    {
        $menus = Category::with('subCategory')
        //->where('status', 1)->where('subCategory.name', '!=','অন্যান্য')
        ->orderBy('slno', 'asc')
        ->get();
        $view->with('menus', $menus);
    }
    public function getDropdownMenu(View $view)
    {
        $dropdownmenus = Category::with('subCategory')
        ->where('status', 2)
        ->orderBy('slno', 'asc')
        ->get();
        $view->with('dropdownmenus', $dropdownmenus);
    }

    public function getHeadlinePost(View $view)
    {
        $scrollpost = Post::with('category')
        ->where('topnews', 1)
        ->where('status', 1)
        ->where('approved', 1)
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        $view->with('scrollpost', $scrollpost);
    }

    public function getLatestPost(View $view)
    {
        $latestpost = Post::with('category')
        ->where('status', 1)
        ->where('approved', 1)
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        $view->with('latestpost', $latestpost);
    }

    public function getMostViewPost(View $view)
    {
        $date = \Carbon\Carbon::today()->subDays(7);
        $mostview = Post::with('category')
        ->where('status', 1)
        ->where('approved', 1)
        ->where('created_at','>=',$date)
        ->orderBy('view_count', 'desc')
        ->paginate(10);
        $view->with('mostview', $mostview);
    }

    public function getFeaturedPost(View $view)
    {
        $featuredpost = [];
        $featuredpost['mainpost']  = Post::with('category')->where('status', 1)->where('approved', 1)
        ->where('featured_sl', 1)->orderBy('created_at', 'desc')->take(1)->get();

        $featuredpost['subpost']  = Post::with('category')->where('status', 1)->where('approved', 1)
        ->whereBetween('featured_sl', [2, 5])->orderBy('featured_sl', 'asc')->take(4)->get();

        $featuredpost['topnews']  = Post::with('category')->where('status', 1)->where('approved', 1)
        ->orderBy('top_sl', 'asc')->take(12)->get();
        $view->with('featuredpost', $featuredpost);
    }

    public function getLastVideo(View $view)
    {
        $videos = Video::orderBy('created_at', 'desc')->take(1)->get();
        $view->with('videos', $videos);
    }
    public function getLastNews(View $view)
    {
        $aboutinfo = Post::orderBy('id', 'desc')->take(1)->get();
        $updatedate = $aboutinfo[0]->updated_at;
        $view->with('updatedate', $updatedate);
    }

    public function aboutInfo(View $view)
    {
        $abouts = About::where('id',1)->get();
        $view->with('abouts', $abouts);
    }

    public function featureNewsBottom(View $view)
    {
        $adOne = Advertise::where('add_type_id',1)->where('status',1)->take(1)->get();
        $view->with('adOne', $adOne);
    }
    public function lastColumnTop(View $view)
    {
        $adTwo = Advertise::where('add_type_id',2)->where('status',1)->take(1)->get();
        $view->with('adTwo', $adTwo);
    }
    public function lastColumnBottom(View $view)
    {
        $adThree = Advertise::where('add_type_id',3)->where('status',1)->take(1)->get();
        $view->with('adThree', $adThree);
    }
    public function categoryPageTop(View $view)
    {
        $adFour = Advertise::where('add_type_id',4)->where('status',1)->take(1)->get();
        $view->with('adFour', $adFour);
    }
    public function categoryPageBottom(View $view)
    {
        $adFive = Advertise::where('add_type_id',5)->where('status',1)->take(1)->get();
        $view->with('adFive', $adFive);
    }
    public function singlePageTop(View $view)
    {
        $adSix = Advertise::where('add_type_id',6)->where('status',1)->take(1)->get();
        $view->with('adSix', $adSix);
    }
    public function singlePageBottom(View $view)
    {
        $adSeven = Advertise::where('add_type_id',7)->where('status',1)->take(1)->get();
        $view->with('adSeven', $adSeven);
    }
    public function archiveTop(View $view)
    {
        $adEight = Advertise::where('add_type_id',8)->where('status',1)->take(1)->get();
        $view->with('adEight', $adEight);
    }
    public function archiveBottom(View $view)
    {
        $adNine = Advertise::where('add_type_id',9)->where('status',1)->take(1)->get();
        $view->with('adNine', $adNine);
    }
    public function mostViewNewsBottom(View $view)
    {
        $adTen = Advertise::where('add_type_id',10)->where('status',1)->take(1)->get();
        $view->with('adTen', $adTen);
    }
    public function followUsBottom(View $view)
    {
        $adEleven = Advertise::where('add_type_id',11)->where('status',1)->take(1)->get();
        $view->with('adEleven', $adEleven);
    }

}
