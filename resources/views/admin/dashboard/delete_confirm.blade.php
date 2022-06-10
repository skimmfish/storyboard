<div class="container-fluid">
<p class="text-sm">Are you sure you want to delete this post?</p>
<form action="{{route('admin.dashboard.delete_post',['id'=>$id])}}" method="POST">@method('delete') @csrf <button class="btn btn-danger" name="delete" type="submit">Delete</button> <a href="#" type="button" class="btn btn-warning close" data-dismiss="modal" aria-label="Close">No, Don't Delete</a>
</form>

</div>
