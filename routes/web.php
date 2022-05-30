<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CommentController;

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

Route::get('/', '\App\Http\Controllers\ContentController@index')->name('blog.index');

Route::get('about-us', '\App\Http\Controllers\ContentController@index')->name('about-us');

Route::middleware('auth:api', 'throttle:60, 1')->get('/user', function(Request $request){

return $request->user();

});


//signup route
/*
Route::get('register',function(){
    return view('auth.signup')->with('title',"Reader's Signup" );
})->name('auth.signup');
*/
//Route::post('register','\App\Http\Controllers\Auth\RegisterController@store')->name('newsignup');


//authenticated routes ensures that if the user is not authenticated, the route returns such due to inauthorization back to the login page
Route::get('admin/dashboard',function(){
//only authenticated users may enter
})->middleware('auth');

Route::get('dashboard/settings',function(){
return view('admin.dashboard.settings');
})->middleware(['auth','admin'])->name('admin.dashboard.settings');


//for creating new story
Route::get('blog/new',function(){ return view('blog.new'); })->middleware('auth')->name('blog.new');


//privacy policy
Route::get('privacy-policy',function(){

})->name('privacy-policy');

//Terms and conditions
Route::get('terms-and-conditions',function(){

})->name('terms-and-conditions');

Route::group(['prefix'=>'admin','namespace'=>'admin'], function(){

	Route::resource('user','UsersController');
	Route::resource('categories','\App\Http\Controllers\CategoriesController');

});


//for capturing all the inputs on the login form  here
//Route::post('/register',['as'=>'/signup', 'uses'=>'\App\Http\Controllers\UserController@store'])->name('register');

Route::get('blog/{id}/comments','\App\Http\Controllers\CommentController@index')->name('blog.comments');

Route::get('blog','\App\Http\Controllers\ContentController@index');

//for single blog posts
Route::get('blog/{id}','\App\Http\Controllers\ContentController@show')->name('blog.show');

Route::post('comments/store','\App\Http\Controllers\CommentController@store')->name('comments.store');

//for returning posts based on categories
Route::get('categories/{cat}', '\App\Http\Controllers\ContentController@findByCategory')->name('blog.cat');

Route::post('authenticate','Auth\LoginController@authenticate');

Route::get('pages/privacypolicy', '\App\Http\Controllers\ContentController@create')->name('blog.privacypolicy');

Route::get('contact-us', function(){
	return view('contact')->with('title','Contact Us - My Story Board');
})->name('contact-us');

Route::get('terms_of_use', function(){
	return view('terms_of_use')->with('title','Terms of Use - My Story Board');
});

//for returning story genre pages
Route::get('genre', function(){
	return view('genre')->with('title','Story Genre - My Story Board');
});

//new story
Route::post('contents/store', '\App\Http\Controllers\ContentController@store')->name('contents.store');

Auth::routes(['verify'=>true]);

//Route::post('emailsubscription','\App\Http\Controllers\EmailSubscriptionController@store')->name('emailsubscription');

Route::post('emailsubscription','\App\Http\Controllers\EmailSubscriptionController@store')->name('emailsubscription');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*------------------
================================
Authenticated endpoints
=================================
*/

Route::middleware(['auth'])->prefix('dashboard')->group(function(){

    Route::get('admin',function(){})->name('admin.dashboard.index');

});

Route::get('author/{id}',function($id){})->name('author.storyprofile');

//saving new comment
Route::post('savecomment','\App\Http\Controllers\CommentController@store')->name('comments.store');

//authenticated route to post comments
Route::get('loginpost',function(){})->name('loginpost')->middleware('auth');

//Route::get('login',function(){})->name('login.postcomment');

?>
