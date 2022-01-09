<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdvertiseController;
use App\Http\Controllers\JournalistController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Auth::routes([
	'register' => false, 
	'reset' => false, 
	'verify' => false,
]);


Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('videos', VideoController::class);
    Route::resource('albums', AlbumController::class);
    Route::resource('photos', PhotoController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('abouts', AboutController::class);
    Route::resource('posts', PostController::class);
    Route::resource('members', MemberController::class);
    Route::resource('advertises', AdvertiseController::class);
    Route::resource('journalists', JournalistController::class);
    Route::get('/getsubcategory', [PostController::class, 'getSubCat']);
    Route::get('/getupozila', [JournalistController::class, 'getupozila']);
    Route::post('/post-approved/{id}', [PostController::class, 'postApproved']);
    Route::post('/post-featured/{id}', [PostController::class, 'postFeatured']);
    Route::get('/showAlbum', [AlbumController::class, 'showAlbum']);
    Route::post('/savetag', [TagController::class, 'saveTag']);

    Route::get('/print-id/{journalist}', [JournalistController::class, 'printId'])->name('print-id');
});


Route::get('/about-us', [PublicController::class, 'aboutUs']);
Route::get('/managing-committee', [PublicController::class, 'getMember']);
Route::get('/privacy-policy', [PublicController::class, 'privacyPolicy']);
Route::get('/complaints-opinions', [PublicController::class, 'complaintsOpinions']);
Route::get('/contact-us', [PublicController::class, 'contactUs']);
Route::get('/comment-policy', [PublicController::class, 'commentPolicy']);
Route::post('/complaints', [PublicController::class, 'complaintSave']);
Route::get('/complaints-list', [HomeController::class, 'complaintList']);
Route::Delete('/complaints-list/{id}', [HomeController::class, 'complaintDelete']);


Route::get('/', [PublicController::class, 'homePage']);
Route::get('/video-gallery', [PublicController::class, 'getVideo']);
Route::get('/photo-gallery', [PublicController::class, 'getPhotoAlbum']);
Route::get('/video-gallery/{id}/{slug}', [PublicController::class, 'singleVideoPost']);
Route::get('/photo-gallery/{id}/{slug}', [PublicController::class, 'singlePhotoAlbum']);

Route::get('/{id}/tag/{tag}', [PublicController::class, 'getPostByTag']);
Route::get('/news/{id}/{slug}', [PublicController::class, 'singlePost']);
Route::get('/{id}/{cat}/', [PublicController::class, 'getPostByCategory']);
Route::get('/{id}/{cat}/{subcat}', [PublicController::class, 'getPostBySubCategory']);
Route::get('/archives', [PublicController::class, 'archivesPost']);
Route::get('/journalist-apply', [PublicController::class, 'journalistApply']);
Route::post('/journalist-apply-save', [PublicController::class, 'journalistApplySave']);

