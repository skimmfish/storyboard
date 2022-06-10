@extends('layouts.admin_layout')
@section('content')

<div class="container push-d80">
<h5><u>New Story</u>
<a href="{{route('admin.dashboard.home')}}" class="btn btn-primary btn-rounded float-left pull-right" style="float:right"><i class="bi-chevron-left"></i> Home</a>

</h5><br/><br/>

<form action="{{ route('admin.dashboard.savepost')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Title</label>
    <input type="text" name="post_title" value="{{old('post_title')}}" placeholder="What is your story's title" style="font-size:24px !important;" class="form-control input-lg" />
</div>
<div class="form-group">
    <label>Post Description</label>
    <textarea name="description" class="form-control input-lg" value="{{old('description')}}" placeholder="A short description"></textarea>
</div>

<div class="form-group">
    <label>Story Body</label>
<textarea name="post_body" class="form-control input-lg textarea" value="{{old('post_body')}}" placeholder="Story content"></textarea>
</div>
<div class="form-group rowx">
<div class="col-md-8">
<label>Post Background Image</label>
<input type="file" name="post_bg_img" class="form-control" />
</div>
</div>
<div class="form-group">
    <label>Ads Selected</label>
<select name="ads_selected" class="form-control">
  <option value="">Select an option</option>
  <option>1</option>
  <option>2</option>
</select>
</div>
<div class="form-group">
    <label>Story Genre/Category</label>
    <select name="category" class="form-control">
<option value="">Select a category</option>
@foreach(\App\Models\Categories::all() as $x)
<option value="{{$x->name}}">{{ ucfirst($x->name) }}</option>
@endforeach
</select>

</div>

<div class="form-group">
        <label>Tags</label>
    <input type="text" name="tags" value="{{old('tags')}}" placeholder="Your story's tag helps to search for your post easily, separate with comma" class="form-control input-lg" />
</div>

<hr/>
<div class="form-group">
<button type="submit" name="save" class="btn btn-primary">Submit Story</button>
</div>
</form>
</div>

@endsection
