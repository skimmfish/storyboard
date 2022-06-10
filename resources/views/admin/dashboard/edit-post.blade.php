@extends('layouts.admin_layout')
@section('content')

<div class="container push-d80">

<h5><u>Modifying Post</u> <a href="{{route('admin.dashboard.home')}}" class="btn btn-primary btn-rounded float-left pull-right" style="float:right"><i class="bi-chevron-left"></i> Home</a>
</h5>
<hr/>
<form action="{{ route('admin.dashboard.edit_post',['id'=>$id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    @foreach($singlePost as $c)
    <div class="form-group">
        <label>Title</label>
    <input type="text" name="post_title" value="{{$c->post_title}}" style="font-size:24px !important;" class="form-control input-lg" />
</div>
<div class="form-group">
    <label>Post Description</label>
    <textarea name="description" class="form-control input-lg">{{ $c->description }}</textarea>
</div>

<div class="form-group">
    <label>Story Body</label>
<textarea name="post_body" class="form-control input-lg textarea">{{ nl2br($c->post_body) }}</textarea>
</div>
<div class="form-group rowx">
<div class="col-md-8">    <label>Post Background Image</label>
<input type="file" name="post_bg_img" />
</div>
<div class="col-md-4" style="background:url({{ asset('img/1920x1080/'.$c->post_bg_img) }}); background-position:center;background-size:cover;border-radius:7px;height:100px;">
</div>
</div>
<div class="form-group">
    <label>Ads Selected</label>
<select name="ads_selected" class="form-control">
  <option value="{{$c->ads_selected}}">Select an option</option>
  <option>1</option>
  <option>2</option>
</select>
</div>
<div class="form-group">
    <label>Story Genre/Category</label>
    <select name="category" class="form-control">
  <option value="{{$c->category}}">{{ ucfirst($c->category) }} - Select a category</option>
@foreach(\App\Models\Categories::all() as $x)
<option value="{{$x->name}}">{{ ucfirst($x->name) }}</option>
@endforeach
</select>

</div>
@endforeach
<hr/>
<div class="form-group">
<button type="submit" name="save" class="btn btn-primary">Save & Update</button>
</div>
</form>
</div>
@endsection
