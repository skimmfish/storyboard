@extends('layouts.simple_pages_header')
@section('content')

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main">
    <!-- Contact Form -->
    <div class="container content-space-t-3 content-space-t-lg-5 content-space-b-2">
      <div class="row">
        <div class="col-lg-6 mb-9 mb-lg-0">
          <!-- Heading -->
          <div class="mb-5">
            <h3>About MyStoryBoard</h3>
            <p><small>We'd love to talk about MyStoryBoard a lil' bit</small></p>
          </div>
          <!-- End Heading -->

          <!-- Leaflet -->
          <div class="overflow-hidden">
            <div id="map" style="background:url({{asset('img/1920x1080/img2.jpg')}}); background-size:cover;background-position:center;width:100%;height:500px;border-radius:10px;margin-bottom:30px;line-height:450px;text-align:center;">
           </div>
          </div>
          <!-- End Leaflet -->

          <div class="row">

            <!-- End Col -->

            <div class="col-sm-6">
              <h5 class="mb-1">Email us:</h5>
              <p><a href="mailto:hello@storyboard.com">hello@storyboard.com</a></p>
            </div>
            <!-- End Col -->

            <div class="col-sm-6">
              <h5 class="mb-1">Address:</h5>
              <p>#25, Olorombo Street, Aladesanmi, Asero, Abeokuta, Ogun State, Nigeria.</p>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <!-- End Col -->

        <div class="col-lg-6">
          <div class="ps-lg-5" style="padding-top:95px;">

          <p style="font-weight:400"><u>MyStoryboard</u> is a place where lovers of stories and gistlovers hang out to feed their eyes with real and true life stories. We ensure that all the stories published on this page are well researched, this give us the inkling that it would be of help to our teaming subscribers and readers.</p>

    <p style="font-weight:400">Many of our stories are marriage and relationship related. Our life-long vision is to ensure that every home works out via giving our marital counseling and advices within the scope of what is revealed. We hope to start hosting live TV interviews on marriage and all things marriage-related and humna relationships.</p>

    <p style="font-weight:400">
    Our futuristic road map includes hosting hosting editorial pieces from writers with the intent and purpose of earning passive income from their writings, and we believe that your earnings would be commensurate with your writing expertise. In case you have any questions, kindly check in to our <a href="{{route('contact-us')}}">contact us</a> page and hit us up, we'd be available to answer all your questions.
    </p>

      </div>
      <!-- End Row -->
    </div>
    <!-- End Contact Form -->
  </main>


@endsection
