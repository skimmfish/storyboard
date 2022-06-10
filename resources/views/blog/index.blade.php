@extends('layouts.app')
@section('content')

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main">
    <!-- Hero -->
    <div class="position-relative">
      <!-- Swiper Main Slider -->
      <div class="js-swiper-blog-journal-hero swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide d-flex gradient-x-overlay-sm-dark bg-img-start" style="background-image: url({{asset('img/1920x1080/'.$fblog->post_bg_img) }}); min-height: 40rem;">
            <!-- Container -->
            <div class="container d-flex align-items-center" style="min-height: 40rem;">
              <div class="w-lg-50 me-3">
                <!-- Media -->
                <div class="d-flex align-items-center mb-3">
                  <div class="flex-shrink-0">
                    <div class="avatar avatar-circle">
    <img class="avatar-img" src="{{ asset('img/160x160/'.\App\Models\User::find($fblog->user_id)->profile_img) }}" alt="{{ \App\Models\User::find($fblog->user_id)->name }}">
                    </div>
                  </div>

                  <div class="flex-grow-1 ms-3">
                    <a class="text-white" href="blog-article.html">{{ \App\Models\User::find($fblog->user_id)->name }} </a>
                  </div>
                </div>
                <!-- End Media -->

                <div class="mb-5">
                  <h2 class="h1 text-white">{{$fblog->post_title}}</h2>
                </div>

                <a class="btn btn-primary btn-transition" href="{{ route('blog.show',['id'=>$fblog->id]) }}">Read article <i class="bi-chevron-right small ms-1"></i></a>
              </div>
            </div>
            <!-- End Container -->
          </div>


          </div>


          </div>
        </div>

        <!-- Swiper Pagination -->
        <div class="js-swiper-blog-journal-hero-pagination swiper-pagination swiper-pagination-light swiper-pagination-vertical swiper-pagination-middle-y-end me-3 d-lg-none"></div>
      </div>
      <!-- End Swiper Main Slider -->

      <!-- Swiper Thumbs Slider -->
      <div class="d-none d-lg-block container translate-middle-y position-absolute top-50 start-0 end-0 zi-2">
        <div class="translate-middle-y position-absolute top-50 end-0">
          <div class="js-swiper-blog-journal-hero-thumbs swiper" style="opacity:0;max-width: 13rem;">
            <div class="swiper-wrapper">
              <!-- Slide -->
              <div class="swiper-slide swiper-pagination-progress swiper-pagination-progress-light py-3">
                <p class="text-white">Front Interview with a Lead Designer of the Hubble</p>

                <div class="swiper-pagination-progress-body">
                  <div class="js-swiper-pagination-progress-body-helper swiper-pagination-progress-body-helper"></div>
                </div>
              </div>
              <!-- End Slide -->

              <!-- Slide -->
              <div class="swiper-slide swiper-pagination-progress swiper-pagination-progress-light py-3">
                <p class="text-white">Front Corporate - let's work together</p>

                <div class="swiper-pagination-progress-body">
                  <div class="js-swiper-pagination-progress-body-helper swiper-pagination-progress-body-helper"></div>
                </div>
              </div>
              <!-- End Slide -->

              <!-- Slide -->
              <div class="swiper-slide swiper-pagination-progress swiper-pagination-progress-light py-3">
                <p class="text-white">How Google Assistant now helps you record stories</p>

                <div class="swiper-pagination-progress-body">
                  <div class="js-swiper-pagination-progress-body-helper swiper-pagination-progress-body-helper"></div>
                </div>
              </div>
              <!-- End Slide -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Swiper Thumbs Slider -->
    </div>
    <!-- End Hero -->



<!-- Card Grid -->
    <div class="container content-space-2 content-space-lg-3">
        <h4><u>Trending Stories</u></h4><br/><br/>
      <div class="row justify-content-lg-between">
        <div class="col-lg-8 mb-10 mb-lg-0">
          <div class="d-grid gap-7 mb-7">
            <!-- Card -->


			@foreach($posts as $post)

            <div class="card card-flush card-stretched-vertical">
              <div class="row">
                <div class="col-sm-5">
                  <img class="card-img" src="{{ asset('img/1920x1080/'.$post->post_bg_img) }}" alt="{{$post->post_title}}" loading="lazy">
                </div>
                <!-- End Col -->

                <div class="col-sm-7">
                  <!-- Card Body -->
                  <div class="card-body">
                    <div class="mb-2">
                      <a class="card-link" href="/categories/{{$post->category}}">{{ ucfirst($post->category) }}</a>
                    </div>

                    <h3 class="card-title">
                      <a class="text-dark" href="{{route('blog.show',['id'=>$post->id]) }}">{{ $post->post_title }}</a>
                    </h3>

                    <p class="card-text">{{ $post->description }}</p>

                    <!-- Card Footer -->
                    <div class="card-footer">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
        <a class="avatar avatar-circle" href="">
            <img class="avatar-img" src="{{ asset('img/160x160/'.\App\Models\User::find($post->user_id)->profile_img) }}" alt="">
                          </a>
                        </div>

                        <div class="flex-grow-1 ms-3">
                          <a class="card-link link-dark" href="blog-author-profile.html"></a>
                          <p class="card-text small">{{ date('F d, Y, H:i:s a', strtotime($post->created_at)) }}</p>
                        </div>
                      </div>
                    </div>
                    <!-- End Card Footer -->
                  </div>
                  <!-- End Card Body -->
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
            </div>
            <!-- End Card -->

			@endforeach

          <!-- Sticky Block End Point -->
          <div id="stickyBlockEndPoint"></div>

          <!-- Pagination -->
          {!! $posts->links('vendor.pagination.bootstrap-4') !!}
          <!-- End Pagination -->
        </div>
        <!-- End Col -->
</div>

        <div class="col-lg-3">
          <div class="mb-7">
            <div class="mb-3">
              <h5>Subscribe for E-mail Episodes</h5>
            </div>

            <!-- Form -->
            <form action="{{ route('emailsubscription') }}" method="POST">
                    @csrf
            <div class="mb-2">
                <input type="email" class="form-control" placeholder="Enter email" aria-label="Enter email" required style="width:100%;" />
              </div>
              <div class="d-grid">
                <button type="button" class="btn btn-primary">Subscribe</button>
              </div>
            </form>
            <!-- End Form -->

            <p class="form-text">Get special and exclusive episode from MyStoryBoard.</p>
          </div>

          <!--
          <div class="mb-7">
            <div class="mb-3">
              <h3>Productivity</h3>
            </div>

            <ul class="list-group list-group-lg">
              <li class="list-group-item">
                <a href="#">
                  <div class="row align-items-center">
                    <div class="col">
                      <h5 class="mb-1">Here's how to dodge distractions</h5>
                      <p class="text-body small mb-0">Feb 08, 2020</p>
                    </div>

                    <div class="col-auto">
                      <i class="bi-chevron-right"></i>
                    </div>
                  </div>
                </a>
              </li>

              <li class="list-group-item">
                <a href="#">
                  <div class="row align-items-center">
                    <div class="col">
                      <h5 class="mb-1">Ideas to stay productive</h5>
                      <p class="text-body small mb-0">Feb 09, 2020</p>
                    </div>

                    <div class="col-auto">
                      <i class="bi-chevron-right"></i>
                    </div>
                  </div>
                </a>
              </li>

              <li class="list-group-item">
                <a href="#">
                  <div class="row align-items-center">
                    <div class="col">
                      <h5 class="mb-1">Classic design principles</h5>
                      <p class="text-body small mb-0">Feb 10, 2020</p>
                    </div>

                    <div class="col-auto">
                      <i class="bi-chevron-right"></i>
                    </div>
                  </div>
                </a>
              </li>
               </ul>
          </div>
-->
          <!-- Sticky Block Start Point -->
          <div id="stickyBlockStartPoint"></div>

          <div class="js-sticky-block"
               data-hs-sticky-block-options='{
                 "parentSelector": "#stickyBlockStartPoint",
                 "targetSelector": "#header",
                 "breakpoint": "md",
                 "startPoint": "#stickyBlockStartPoint",
                 "endPoint": "#stickyBlockEndPoint",
                 "stickyOffsetTop": 80
               }'>

               @if(count($startup)>0)
            <div class="mb-7">
              <div class="mb-3">
                <h3><u>Startup Stories</u></h3>
              </div>

              <div class="d-grid gap-2">
                <!-- Card -->
                @foreach($startup as $u)

                <a class="d-block" href="{{ route('blog.show',['id'=>$u->id]) }}">
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                      <div class="avatar avatar-lg">
<img class="avatar-img" loading="lazy" src="{{ asset('img/1920x1080/'.$u->post_bg_img) }}" alt="{{ $u->post_title }}">
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="text-inherit mb-0"> {{ $u->post_title }}</h5>
                    </div>
                  </div>
                </a>
                @endforeach
                <!-- End Card -->

                </div>
                @endif
            </div>

            <div class="mb-7">
              <div class="mb-3">
                <h3><u>Tags</u></h3>
              </div>
                @foreach($tags as $t)
              <a class="btn btn-soft-secondary btn-xs mb-1" href="{{ route('blog.tags',['tag'=>$t->tag_name]) }}">{{ $t->tag_name }}</a>
                @endforeach
            </div>
          </div>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Card Grid -->



</main>

@endsection
