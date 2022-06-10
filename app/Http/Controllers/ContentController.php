<?php

namespace App\Http\Controllers;

//model classes and utility classes to run the app
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Thunder\Shortcode\ShortcodeFacade;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use DB;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = DB::select("SELECT * FROM contents WHERE publish_status=1 ORDER by created_at DESC LIMIT 5");
        $posts = \App\Models\Content::where(['deleted_at'=>null,'publish_status'=>1])->skip(1)->orderBy('created_at','DESC')->paginate(10);
        $user = new User;

        $fblog = $this->getfirstblog();
        $allTags = $this->get_tags();

		return view('blog.index',compact('posts'))->with(['title'=>'My Story Board Home','userInstance'=>$user, 'fblog'=>$fblog,'tags'=>$allTags,'startup'=>$this->getByCat('startup_story')]);
		//return $posts->toArray();
    }

/*
*getfirstblog
@param none
*/
public function getfirstblog(){
return $first = \App\Models\Content::where('publish_status',true)->orderBy('created_at','DESC')->first();
}

/*
*getByCat()
*@param String<$category>
*/
public function getByCat($cat){
    return $data = \App\Models\Content::where(['tags'=>$cat])->get();
}
/*
*get_tags() for fetching all tags
*@param none
*/
public function get_tags(){
return $tags = \App\Models\TagManager::all();
}
/**
     *
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

		 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$rules = [
		'post_title'=>'required|max:140',
		'description'=>'required',
		'post_body'=>'required',
        'category'=>'required',
        'ads_selected'=>'required',
        'tags'=>'required'
		];

		$messages = [
		'description'=>'A befitting description is very important here',
		'required'=>'This field is required'
		];

		$validate = $request->validate($rules);
        //instantiating a new content object
        $content = new Content;
		$content->post_title = $request->post_title;
		$content->post_body = $request->post_body;
		$content->description = $request->description;
		$content->user_id = auth()->id();
		$content->publish_status = 0;
		$content->category = $request->category;
        $content->ads_selected = $request->ads_selected;
        $content->tags = $request->tags;
        $content->post_bg_img = $request->file('post_bg_img');
        $content->post_banner_one = '';
        $content->post_banner_two = '';
        $content->save();

        return redirect()->route('admin.dashboard.home')->with('success','New story post has been created successfully');
    }

/*
*@param $FILE object
*
*/
public function saveFile(Request $request, Content $content){
$bgFile = $request->file('post_bg_img');

}


/***save new post to DB
**via the API instead of via the web interface
*/
public function saveStore(Request $request){
$user = User::where('api_token', $request->get('api_token'))->first();

 $content = Content::create(
 $request->input()
 );

 if ($request->has('published'))
 {
 $content->published = 1;
 $content->save();
 }
 return response()->json([ 'message' => 'The event has been created',], 200);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //clap_count variable
        $clap_count = 0;
		$singlePost = Content::find($id);

        if($singlePost->publish_status==false){
        //return redirect()->back();
        return redirect()->route('errors.404');
        }

        $clap = \App\Models\Clap::where(['post_id'=>$id])->get();
        if(sizeof($clap)>0){
        foreach($clap as $x){$clap_count = $x['clap_count'];}
        }

		//fetching the comments
		$comments = DB::select("SELECT *FROM comments WHERE post_id=? AND pub_status=?",[$id,1]);

		//initializing the user's model
		$user = new User;
		//related stories
        $category='';$post_title='';$description='';$tags='';


		$related = $this->relatedStories($singlePost->category);
		return view('blog.show',['post'=>$singlePost,'comments'=>$comments,'userModel'=>$user,'title'=>$singlePost->post_title, 'relatedStoryModel'=>$related,'claps'=>$clap_count,
        'tag'=>$singlePost->tags,'description'=>$description
    ]);
}

/*
*
*
*/
public static function get_post_user_params($postid,$f){
$authorModel = null;
$post = \App\Models\Content::find($postid);
$fieldValue = null;

foreach($post as $e){
//$f represents content model column fields that belongs to the users
$authorModel = \App\Models\User::find($e[$f]);
}

foreach($authorModel as $t){
$fieldValue = $t[$f];
}

return $fieldValue;
}

/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $post = \App\Models\Content::where('id',$id)->get();
    $request = new Request;
    $post->post_body = $request->post_body;
    $post->post_title = $request->post_title;
    $post->description = $request->description;
    $post->ads_selected = $request->ads_selected;

    $rules = [
		'post_title'=>'required|max:140',
		'description'=>'required',
		'post_body'=>'required',
        'ads_selected' => 'required'
		];

		$messages = [
		'description'=>'A befitting description is very important here',
		'required'=>'This field is required'
		];

        $validate = $request->validate($rules);

    //saving the updated info to the db table

    $post->save($request->all());

    $post->save();
    $_SESSION['message']="Post modified successfully!";

    //redirecting to
//    return redirect()->route('admin.dashboard.home');

    }


/**
*To show the privacy policy page
*
*/

public function privacypolicy(){
return view('blog.privacypolicy');
}


//this returns the comoments from the comments table using the one-to-many relationship model
public function comments(){
return 	$this->hasMany('App\Comment')->where('pub_status',true);
}


//using the eloquent ORM model to get related stories based on the category of the current story been read by the reader
public function relatedStories($category){
if(!$category){
    $category ='trending';
}
$related = Content::where(['publish_status'=>1, 'category'=>$category])->orderBy('created_at','DESC')->take(4)->skip(1)->get();

//$related = DB::select("SELECT post_bg_img, post_title, description FROM contents WHERE publish_status=? AND category=?",[1,$category]);

return $related;
}

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, $id)
{
//
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//custom functions to handle content filtering
public function findByCategory($cat){
	$postByCategory = DB::select("SELECT *FROM contents WHERE category =? AND publish_status=? ORDER BY created_at DESC",[$cat,1]);
	return view('blog.cat')->with('postByCategory',$postByCategory);

}

/***
 * API methods starts here
 *
 */

public function getApiContent(){
$blogPosts = Content::where(['publish_status'=>1])->orderBy('created_at','asc')->take(7)->get();
return $blogPosts->toArray();
}

public function parsebbcode($code){
    $facade = new ShortcodeFacade();

}


/*
*@param int <$id>
*@param int <$status>
*/
public function pubupdate($id,$pub_status){

    $post = Content::find($id);
    $post->publish_status = $pub_status;
    $post->save();

    $msg = "Post's publish status updated successfully!";
    return redirect()->route('admin.dashboard.home')->with('success',$msg);;

}

public function delete($id){
   $p = \App\Models\Content::find($id);
   $p->delete();
   $_SESSION['message']='Post deleted successfully';
   return redirect()->route('admin.dashboard.home');
}
}
