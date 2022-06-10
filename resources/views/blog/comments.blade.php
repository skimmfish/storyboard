
<div class="row" style="margin-bottom:20px">
@guest
<p class="gd">Please <a href="{{route('loginpost',['postid'=>$post->id])}}" class="btn btn-primary btn-rounded"> login to post</a> your thoughts on this story</p>
@else
<p><h5><i>You got some comments?</i></h5></p>
<div class="comment_box">
 {!! Form::open(['route'=> 'comments.store', 'class'=>'form', 'method'=>'POST']) !!}

<div class="form-field">
 {!! Form::text('comment', "", [ 'class' => 'form-control', 'style'=>'height:90px;margin-top:15px;border-radius:15px;font-weight:400;height:80px;border:1px solid #cfcfcf','placeholder' => Auth::user()->name. ', You can enter some comments here!']) !!}

 {!! Form::hidden('post_id', $post->id, [ 'class' => 'form-control input-lg responsive']) !!}
 {!! Form::hidden('author_id', Auth::user()->id, [ 'class' => 'form-control input-lg responsive']) !!}
</div>

<div class="form-group">
 {!! Form::submit('Comment',['class' => 'btn btn-info btn-lg', 'style' => 'display:block;margin:10px auto 0 auto;width:auto;padding:15px 45px 15px 45px;background-color:#0d2453;border:0;border-radius:6px;font-size:13px;width:100%' ]) !!}
</div>

	 {!! Form::close() !!}

</div>

<br/><br/><br/>

<hr/>
<h3>Comments</h3>
<hr/>
<p class="text-xs"> {{ count(\App\Models\Comment::where('post_id',$post->id)->get()) }} thought(s) on <b>{{ \App\Models\Content::find($post->id)->post_title }}</b></p>
@foreach(\App\Models\Comment::where('post_id',$post->id)->get() as $e)

<?php
$profile_img=\App\Models\User::find($e['author_id'])->profile_img;
if(!$profile_img || !file_exists('img/160x160/'.$profile_img)){
    $profile_img = 'img1.jpg';
}
?>


<div class="comm-pr"><div style="border-radius:50%;background-image:url({{asset('img/160x160/'.$profile_img) }} );background-repeat:no-repeat;background-position:center;background-size:cover;width:40px;height:40px;"></div>
<div class="text-sm">{{ $e['comment'] }} <br/> <p><small class="text-xs up-10"> Posted by <b>{{ \App\Models\User::find($e['author_id'])->name }}</b> On <i>{{ \App\Models\Comment::parseDate($e['created_at']) }}</i></small></p></div></div>
@endforeach

</div>
@endif
