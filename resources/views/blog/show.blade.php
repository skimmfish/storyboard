@extends('layouts.simple_pages_header')
@section('content')

<!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main">
    <!-- Article Description -->
    <div class="container content-space-t-3 content-space-t-lg-4 content-space-b-2">
      <div class="w-lg-65 mx-lg-auto">
        <div class="mb-4">
        <h1 class="h2 center text-lg text-lg gd" style="text-transform:Capitalize;">{{$post->post_title}}</h1>

    </div>

        <div class="row align-items-sm-center mb-5">
          <div class="col-sm-7 mb-4 mb-sm-0">
            <!-- Media -->
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0">

			<img class="avatar avatar-circle" src="{{ asset('img/160x160/'.\App\Models\User::find($post->user_id)->profile_img)}}" alt="{{\App\Models\User::find($post->user_id)->username}}">
              </div>

              <div class="flex-grow-1 ms-3">
                <h5 class="mb-0">
                  <a class="text-dark text-sm" href="{{route('blog.author_posts',['id'=>$post->user_id])}}">{{\App\Models\User::find($post->user_id)->name}}</a>
                </h5>
                <span class="d-block small">1 day ago</span>
              </div>
            </div>
            <!-- End Media -->
          </div>
          <!-- End Col -->

          <div class="col-sm-5">
            <div class="d-flex justify-content-sm-end align-items-center">
              <span class="text-cap mb-0 me-2 text-sm" style="font-size:11px"><small>Follow Us</small></span>

              <div class="d-flex gap-2">
                <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="">
                  <i class="bi-facebook"></i>
                </a>
                <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="https://twitter.com/courseunit42?ref_src=twsrc%5Etfw" data-show-count="false"><i class="bi-twitter"></i></a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                  <i class="bi-instagram"></i>
                </a>
                <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                  <i class="bi-telegram"></i>
                </a>
              </div>
            </div>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->

<div class="floating_widget" id="floating_widget">
<a href="#" onClick="closeDiv('floating_widget')"><p class="share-box close-btn">x</p></a>

<!--facebook-->
<div class="share-box" style="border:0"><a href="https://web.facebook.com/sharer/sharer.php?u={{URL::current()}}"><i class="bi-facebook"></i></a></div>
<!--twitter-->
<div class="share-box" style="border:0"><a href='https://twitter.com/share' data-show-count='false' data-via='courseunit42'><i class="bi-twitter"></i></a></div>
<!--twitter-->
<div class="share-box" style="border:0"><a href=""><i class="bi-instagram"></i></a></div>
<div class="share-box" style="border:0;margin-left:-12px;margin-top:-8px;"><div class="count_box">{{ $claps }}</div>
<a href="#" onClick="addClap({{$post->id}})" role="button"><img src="{{asset('img/icons/clap2.png')}}" class="share-brand" style="width:68px;height:68px;" loading="lazy"/></a></div>

</div>

<div class="my-4 my-sm-8">
        <img class="img-fluid rounded-lg" src="{{ asset('img/1920x1080/'.$post->post_bg_img) }}" alt="{{$post->post_title}}">
      </div>

      <div class="w-lg-100 mx-lg-auto gd">
        <p style="line-height:40px;">
		{{ $post->post_body }}
</p>


        <!-- Blockquote -->
        <figure class="bg-light text-center p-7 my-7">
          <blockquote class="blockquote blockquote-lg family-font text-md">We support humanity, we give back to the needy You may contribute your quota by <a href="https://paypal.me/stacymal?country.x=LS&locale.x=en_US">dropping your widow's mite here <img src="{{asset('img/icons/tea-cup.jpg') }}" class="img-responsive img-circled" alt="Tea cup" loading="lazy"></img></a> </blockquote>
          <!--
          <figcaption class="blockquote-footer">
            Emmanuel
            <span class="blockquote-footer-source"><i>For the Management</i></span>
          </figcaption>-->
        </figure>
        <!-- End Blockquote -->

        </div>
      <div class="w-lg-100 mx-lg-auto" style="line-height:40px;">

        <!-- Card -->
        <div class="card bg-dark text-center my-4" style="background-image: url(assets/svg/components/wave-pattern-light.svg);">
          <div class="card-body">
            <h4 class="text-white mb-4">Want to get the next episode in your email? Subscribe to our mailing list!</h4>

            <div class="w-lg-75 mx-lg-auto">
              <form method="POST" action="{{ route('emailsubscription') }}">
			                          {{ csrf_field() }}

                <!-- Input Card -->
                <div class="input-card input-card-sm border">
                  <div class="input-card-form">
                    <label for="subscribeForm" class="form-label visually-hidden">Enter email</label>
                    <input type="email" class="form-control" id="subscribeForm" value="{{ old('email') }}" placeholder="Enter email" aria-label="Enter email" required />
                  </div>
                  <button type="button" class="btn btn-primary">Subscribe</button>
                </div>
                <!-- End Input Card -->
              </form>
            </div>
          </div>
        </div>
        <!-- End Card -->

        <!--start of comments-->
<div>
@include('blog.comments')
</div>
<!--end of comments-->


        <div class="row justify-content-sm-between align-items-sm-center mt-5">
          <div class="col-sm mb-2 mb-sm-0">
            <div class="d-flex align-items-center">
              <span class="text-cap mb-0 me-2">Share:</span>

              <a class="btn btn-ghost-secondary btn-sm btn-icon rounded-circle me-2" href="https://web.facebook.com/sharer/sharer.php?u={{URL::current()}}">

                <i class="bi-facebook"></i>
              </a>
              <a class="btn btn-ghost-secondary btn-sm btn-icon rounded-circle me-2" href='https://twitter.com/share' class='twitter-share-button' data-show-count='false' data-via='courseunit42'>
                <i class="bi-twitter"></i>
              </a>
              <a class="btn btn-ghost-secondary btn-sm btn-icon rounded-circle me-2" href="https://instagram.com/palmstoryboard">
                <i class="bi-instagram"></i>
              </a>
              
            </div>
          </div>
          <!-- End Col -->

          <div class="col-sm-auto">
            <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#" data-toggle="tooltip" data-placement="top" title="Bookmark story">
              <i class="bi-bookmark"></i>
            </a>
            <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#" data-toggle="tooltip" data-placement="top" title="Report">
              <i class="bi-flag"></i>
            </a>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Page Description -->
 </main>
  <!-- ========== END MAIN CONTENT ========== -->


@endsection
