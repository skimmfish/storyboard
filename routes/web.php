<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

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

Route::get('/', 'ContentController@index')->name('/');

Route::middleware('auth:api', 'throttle:60, 1')->get('/user', function(Request $request){

return $request->user();

});


//authenticated routes ensures that if the user is not authenticated, the route returns such due to inauthorization back to the login page
Route::get('admin/dashboard',function(){
//only authenticated users may enter
})->middleware('auth');

Route::get('dashboard/settings',function(){
return view('admin.dashboard.settings');
})->middleware('auth')->name('admin.dashboard.settings');


Route::get('blog/new',function(){ return view('blog.new'); })->middleware('auth')->name('blog.new');


Route::group(['prefix'=>'admin','namespace'=>'Admin'], function(){

	Route::resource('user','UsersController');
	Route::resource('categories','CategoriesController');

});


//for capturing all the inputs on the login form  here
Route::post('/register',['as'=>'/signup', 'uses'=>'UserController@store'])->name('register');

Auth::routes();

//for login form
/*Route::get('/login',function(){
	return view('login');
})->name('login');
*/

Route::get('blog/{id}/comments','CommentController@index')->name('blog.comments');

Route::get('blog','ContentController@index');

//for single blog posts
Route::get('blog/{id}','ContentController@show')->name('blog.show');

Route::post('comments/store','CommentController@store')->name('comments.store');

//for returning posts based on categories
Route::get('categories/{cat}', 'ContentController@findByCategory')->name('blog.cat');

Route::post('authenticate','Auth\LoginController@authenticate');

Route::get('pages/privacypolicy', 'ContentController@create')->name('blog.privacypolicy');

Route::get('contact-us', function(){
	return view('contact');
});

Route::get('contact-us', function(){
	return view('contact')->with('title','Contact Us - My Story Board');
});

Route::get('terms_of_use', function(){
	return view('terms_of_use')->with('title','Terms of Use - My Story Board');
});

//for returning story genre pages
Route::get('genre', function(){
	return view('genre')->with('title','Story Genre - My Story Board');
});

//new story
Route::post('contents/store', 'ContentController@store')->name('contents.store');

?>
