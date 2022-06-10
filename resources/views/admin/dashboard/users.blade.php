@extends('layouts.admin_layout')
@section('content')

<div class="container down-40">
<div class="row-fluid">
    <!--posting session messages -->
    @include('flashmessage')
</div>
<!--end of flash message section-->

<h5>
<u>All Users</u>
<a href="{{route('admin.dashboard.home')}}" class="btn btn-primary btn-rounded float-left pull-right" style="float:right"><i class="bi-chevron-left"></i> Home</a>
 </h5>
<Br/><br/>
<table class="table table-responsive table-bordered table_posts" style="text-align:center">
<thead>
<tr>
    <th>S/N</th>
    <th>Names (Username)</th>
    <th>E-mail</th>
    <td><Avatartd>
    <th>Admin status</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>
@foreach($users as $u)
<tr>
    <td>{{ $id++ }}</td>
    <td><a href="#" data-attr="{{ route('admin.dashboard.userinfo',['id'=>$u->id]) }}" data-toggle="modal" id="smallButton" data-target="#userModal">{{$u->name}} ({{$u->username}}) </a></td>
    <td><a href="mailto:{{$u->email}}">{{$u->email}}</a></td>
    <td>

    <?php $profile_img=$u->profile_img; if(!$profile_img || !file_exists('img/160x160/'.$profile_img)){ $profile_img ='img1.jpg'; } ?>

    <img src="{{asset('img/160x160/'.$profile_img)}}" class="img-responsive img-circle img-avatar" /></td>
    <td>@if($u->is_admin) Admin @else User @endif </td>
    <td>
    <a href="#" data-attr="{{ route('admin.dashboard.delete_user_confirm',['id'=>$u->id]) }}" data-toggle="modal" id="smallButton" data-target="#userModal">Delete</a> | <a href="{{route('edit_user',['id'=>$u->id])}}">Edit</a>

    </td>
</tr>
@endforeach
</tbody>
</table>

{!! $users->links('vendor.pagination.bootstrap-4') !!}
</div>


<!--modal start-->
		 <!-- view user modal -->
         <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
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


@endsection
