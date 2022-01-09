<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Http\ViewComposer;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // $this->app->bind('path.public', function() {
        //      return realpath(base_path().'/../');
        // });
    }

    public function boot()
    {
        Paginator::useBootstrap();

        View::composer('frontend.master.header', 'App\Http\ViewComposer\PublicComposer@getLastNews');
        View::composer('frontend.master.header', 'App\Http\ViewComposer\PublicComposer@getMenu');
        View::composer('frontend.master.header', 'App\Http\ViewComposer\PublicComposer@getDropdownMenu');
        View::composer(['frontend.master.latest', 'frontend.index'], 'App\Http\ViewComposer\PublicComposer@getLatestPost');
        View::composer(['frontend.master.header'], 'App\Http\ViewComposer\PublicComposer@getHeadlinePost');
        View::composer('frontend.master.mostview', 'App\Http\ViewComposer\PublicComposer@getMostViewPost');
        View::composer('frontend.index', 'App\Http\ViewComposer\PublicComposer@getFeaturedPost');
        View::composer('frontend.index', 'App\Http\ViewComposer\PublicComposer@getLastVideo');

        View::composer(['frontend.index', 'frontend.master.header', 'frontend.master.footer', 'frontend.pages.about', 'frontend.pages.comment-policy', 'frontend.pages.privacy-policy','frontend.pages.contact'],'App\Http\ViewComposer\PublicComposer@aboutInfo');


        View::composer('frontend.index', 'App\Http\ViewComposer\PublicComposer@featureNewsBottom');
        View::composer('frontend.index', 'App\Http\ViewComposer\PublicComposer@lastColumnTop');
        View::composer('frontend.index', 'App\Http\ViewComposer\PublicComposer@lastColumnBottom');
        View::composer(['frontend.category','frontend.subcategory'], 'App\Http\ViewComposer\PublicComposer@categoryPageTop');
        View::composer(['frontend.category','frontend.subcategory'], 'App\Http\ViewComposer\PublicComposer@categoryPageBottom');
        View::composer('frontend.single', 'App\Http\ViewComposer\PublicComposer@singlePageTop');
        View::composer('frontend.single', 'App\Http\ViewComposer\PublicComposer@singlePageBottom');
        View::composer('frontend.master.latest', 'App\Http\ViewComposer\PublicComposer@archiveTop');
        View::composer('frontend.master.mostview', 'App\Http\ViewComposer\PublicComposer@archiveBottom');
        View::composer('frontend.master.mostview', 'App\Http\ViewComposer\PublicComposer@mostViewNewsBottom');
        View::composer('frontend.master.followus', 'App\Http\ViewComposer\PublicComposer@followUsBottom');
    }
}
