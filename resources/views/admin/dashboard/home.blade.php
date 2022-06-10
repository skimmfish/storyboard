@extends('layouts.admin_layout')

@section('content')

<!--start of the main div-->
<div class="container down-40">
    <div class="row-fluid">
    <!--posting session messages -->
    @include('flashmessage')
</div>
<div class="col-md-9">

{!! $allposts->links('vendor.pagination.bootstrap-4') !!}


@if(isset($cats)) {{-- show the back link here --}}
<a href="{{route('admin.dashboard.home')}}" class="btn btn-primary btn-rounded"><i class="bi-chevron-left"></i> Back</a><br/><Br/>
@endif

@if(isset($pagetitle)) <h5><u>{{$pagetitle}}</u></h5> @endif

<table class="table table-responsive table-bordered table_posts">
<thead>
<tr>
    <th>S/N</th>
    <th>Post Title</th>
    <th>Category</th>
    <th>Tags</th>
    <th>Earnings</th>
    <th>Date <hr/> Last Updated </th>
    </tr>
</thead>
<tbody>

@foreach($allposts as $s)

<tr>
    <td>{{ $id++ }}</td>
    <td>{{ $s->post_title }}
<hr/>
        @if($s->publish_status==1)  <a href="{{route('blog.pub_status',['id'=>$s->id,'pub_status'=>0])}}" class="text-info">Unpublish</a>       @else <a class="text-success" href="{{route('blog.pub_status',['id'=>$s->id,'pub_status'=>1])}}">Publish</a> @endif
        | <a href="{{ route('admin.dashboard.edit-post',['id'=>$s->id]) }}">Edit</a> | <a href="{{ route('blog.show',['id'=>$s->id] )}}" class="text-success" target="_blank">View</a> | <a href="#" data-attr="{{ route('admin.dashboard.delete_confirm',['id'=>$s->id]) }}" data-toggle="modal" id="smallButton" data-target="#postModal" class="text-danger">Delete</a>

    </td>
    <td><a href="/dashboard/sort_by_category/{{ $s->category }}" class="text-primary">{{ ucfirst($s->category) }} </a></td>
    <td>{{ $s->tags }} </td>
    <td>0</td>
    <td>{{ $s->created_at }} <hr/> {{ $s->updated_at }}</td>
    <td><a href="">View Statistics</a></td>
</tr>
@endforeach
</tbody>
</table>
 {!! $allposts->links('vendor.pagination.bootstrap-4') !!}

</div>

<div class="col-3"></div>

<!--end of main div-->
</div>

<!--modal start-->
		 <!-- view user modal -->
         <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"style="border-radius:50%;width:35px;height:35px;border:0;color:#0d2453;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection
