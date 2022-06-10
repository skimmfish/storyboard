{{-- @extends('layouts.admin_layout') --}}

<div class="container down-40">
<table class="table table-bordered table-responsive table_posts" >
<tbody>
@foreach($userinfo as $r)
<?php $profile_img=$r->profile_img; if(!$profile_img || !file_exists('img/160x160/'.$profile_img)){ $profile_img ='img1.jpg'; } ?>

<div><img src="{{ asset('img/160x160/'.$profile_img) }}" class="img-responsive img-circle img-avatar"/></div>

<tr> <th>Names</th><th>{{$r->name}} ({{$r->username}})</th></tr>
<tr>
<th>E-mail address</th>
<th><a href="mailto:{{$r->email}}"><u>{{$r->email}}</u></a></th>
</tr>
<tr>
    <th>Last Login</th> <th>{{$r->last_login}}</th>
</tr>
<tr>
<th>Phone number</th> <th><a href="tel:{{$r->telephone}}"><u>{{$r->telephone}}</u></a></th>
</tr>

<tr>
<th>Date Registered</th> <th>{{$r->created_at}}</th>
</tr>
<tr>
<th>Last Profile Update Date</th> <th>{{$r->updated_at}}</th>
</tr>
<tr><th>API Token</th><th>{{$r->api_token}}</th></tr>
<tr>
<th>Email Verified?</th> <th>@if($r->email_verified) Yes @else No @endif</th>
</tr>

<tr>
<th>Trials Ends at</th> <th>{{$r->trial_ends_at}}</th>
</tr>


</tbody>
@endforeach


</table>

</div>
