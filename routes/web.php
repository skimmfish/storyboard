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

Route::get('about-us', function(){
    return view('about-us',['title'=>'About MyStoryBoard']);
})->name('about-us');

Route::middleware('auth:api', 'throttle:60, 1')->get('/user', function(Request $request){

return $request->user();

});

Route::get('404',function(){return view('errors.404',['title'=>'Page not found']); })->name('errors.404');

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
	return view('contact-us')->with('title','Contact Us - MyStoryBoard');
})->name('contact-us');


//for contact us form
Route::post('contact_models','\App\Http\Controllers\ContactusController@store')->name('contact_models.store');

Route::get('terms_of_use', function(){
	return view('terms_of_use')->with('title','Terms of Use - MyStoryBoard');
});

//for returning story genre pages
Route::get('genre', function(){
	return view('genre')->with('title','Story Genre - MyStoryBoard');
});

//for getting posts based on tags
Route::get('tags/{tag}',function($tag){})->name('blog.tags');

//new story
Route::post('contents/store', '\App\Http\Controllers\ContentController@store')->name('contents.store');

Auth::routes(['verify'=>true]);

//Route::post('emailsubscription','\App\Http\Controllers\EmailSubscriptionController@store')->name('emailsubscription');

Route::post('emailsubscription','\App\Http\Controllers\EmailSubscriptionController@store')->name('emailsubscription');


//author's profile
Route::get('author/{id}',function($id){
    $allposts = \App\Models\Content::where(['user_id'=>$id,'publish_status'=>true])->orderBy('created_at','DESC')->paginate(10);
    //fetching the user's name
    $user = \App\Models\User::find($id)->name;
    return view('blog.author_posts')->with(['pagetitle'=>"Stories written by $user",'allposts'=>$allposts,'title'=>"Stories written by $user",'id'=>$id]);
})->name('blog.author_posts');

/*------------------
================================
Authenticated endpoints
=================================
*/

//redirecting to the dashboard
Route::get('home',function(){
    return redirect()->route('admin.dashboard.home')->with(['title'=>"Admin's Dashboard"]);
})->name('admin.dashboard.home')->middleware(['auth','admin']);

//grouped routes for the admin's dashboard
Route::middleware(['auth','admin','verified'])->prefix('dashboard')->group(function(){

    Route::post('savepost','\App\Http\Controllers\ContentController@store')->name('admin.dashboard.savepost');

    //dashboard home
    Route::get('/',function(){
        $posts = \App\Models\Content::where(['deleted_at'=>NULL])->paginate(15);
        return view('admin.dashboard.home',['title'=>"Admin's Dashboard",'allposts'=>$posts,'id'=>1]);
    })->name('admin.dashboard.home');

    //updating the pub_status of a post
    Route::get('update_status/{id}/{pub_status}','\App\Http\Controllers\ContentController@pubupdate')->name('blog.pub_status');

    //for confirming if a post should be deleted
    Route::get('delete_confirm/{id}',function($id){
        return view('admin.dashboard.delete_confirm',['id'=>$id]);
    })->name('admin.dashboard.delete_confirm');

    //route for confirming if a use should be deleted
    Route::get('delete_user_confirm/{id}',function($id){
        return view('admin.dashboard.delete_user_confirm',['id'=>$id]);
    })->name('admin.dashboard.delete_user_confirm');

    //deleting a user
    Route::get('delete_user','\App\Http\Controllers\UserController@delete')->name('admin.dashboard.delete_user');

    //deleting a post
    Route::delete('delete_post/{id}','\App\Http\Controllers\ContentController@delete')->middleware('auth')->name('admin.dashboard.delete_post');

    //view for modifying posts
    Route::get('edit-post/{id}',function($id){
        $singlePost = \App\Models\Content::where(['id'=>$id])->get();
        return view('admin.dashboard.edit-post')->with(['title'=>'Modifying Post','id'=>$id,'singlePost'=>$singlePost]);
    })->name('admin.dashboard.edit-post');

    //Editting a post via this route
    Route::put('edit/{id}','App\Http\Controllers\ContentController@update')->name('admin.dashboard.edit_post');

    //Sort posts by category
    Route::get('sort_by_category/{cat}',function($cat){
        $allposts = \App\Models\Content::where(['category'=>$cat])->orderBy('category','DESC')->paginate(10);
        return view('admin.dashboard.home')->with(['allposts'=>$allposts,'cats'=>'catpage','pagetitle'=>'Sorting Posts by'.$cat, 'title'=>'Sorting Posts by category'.$cat,'id'=>1]);
    })->name('admin.dashboard.sort_by_category');

	//for creating new post
	Route::get('new-post',function(){
		return view('admin.dashboard.newpost')->with('title','New Article');
	})->name('admin.dashboard.newpost');

    Route::get('new-post/ebooks',function(){
        return view('admin.dashboard.new-ebook',['title'=>'New e-Book']);
    })->name('admin.dashboard.new-ebook');

    //all ads for the site
    Route::get('ads',function(){

    })->name('admin.dashboard.ads');

    //all users
    Route::get('users','\App\Http\Controllers\UserController@index')->name('admin.dashboard.users');

    Route::get('userinfo/{id}','\App\Http\Controllers\UserController@fetchUser')->name('admin.dashboard.userinfo');

    //for editing users
    Route::get('edit-user/{id}',function($id){
        return view('admin.dashboard.edit_user',['id'=>$id])->with('title',"Modifying User's Profile");
    })->name('edit_user');
    //end of the dashboard route group
});

//saving new comment
Route::post('savecomment','\App\Http\Controllers\CommentController@store')->middleware(['auth','verified'])->name('comments.store');

//authenticated route to post comments
Route::get('loginpost/{postid}',function($postid){

    return redirect()->route('blog.show',['id'=>$postid]);

})->name('loginpost')->middleware(['auth','verified']);

Route::get('logout',function(){
    Auth::logout();
    return redirect()->route('blog.index');
})->name('logout');




?>
