
@extends('layouts.plain_header')
@section('content')
<div class="container centra">

<!--ads_segment_one-->
<div class="ads_segment"></div>

<!--content area ./mid-section based on the grid structure-->
<div class="content-area">

<div class="content-area-header">
<div class="author_img">
<img src="{{ asset('img/160x160/'.\App\Models\User::find($post->user_id)->profile_img) }}" class="img-responsive img-circle" loading="lazy" /><br/> <small class="small-xs text-center">{{ \App\Models\User::find($post->user_id)->name }} </small>
</div>

<div class="post-title">{{$post->post_title }} <br/> <small class="small-xs">Posted on {{\App\Models\Content::parseDate($post->created_at) }}, <b>Posted in <a href="">{{ ucfirst($post->category) }}</a> Category </small></b>
</div>
<!-- ./content-area-header-->
</div>

<hr/>

<div class="post_area">
<!--post body here-->

<div class="post_bg_img" style="background:url({{asset('img/1920x1080/'.$post->post_bg_img) }});"></div>

{{$post->post_body}}

<!--subscription form-->
<div class="mid_post_ads">
<h2>Want to Get Next Episode In Your Mailbox?</h2>

<form method="POST" action="{{route('emailsubscription')}}" style="margin-top:15px;">
{{ csrf_field() }}
    <input type="hidden" name="post_id_sub_to" value="{{$post->id}}" />
<div class="subs_form form-group"><input type="email" name="_email" value="{{old('email')}}" required class="form-control" placeholder="Enter your e-mail address here"/><button class="btn btn-warning">Subscribe</button></div>
</form>
</div>

<!----- comments segment--->
@guest
<div>Please kindly <a href="{{route('login')}}" class="btn btn-circle">Login Here</a> to post comments </div>
@else
@include('blog.comments')

@endif
<!-- ./post_area-->
</div>
</div>


<!--third section-->
<div class="ads_segment"></div>
<!--end of main ./centra div-->
</div>

@endsection


