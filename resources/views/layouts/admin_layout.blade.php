<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @if(isset($title)) {{ $title }} @else {{ 'Admin Dashboard' }}	@endif - MyStoryBoard	</title>

    <!-- Styles -->


  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
  <!-- CSS Implementing Plugins -->

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="{{ asset('css/vendor.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/aos/dist/aos.css') }}">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="{{ asset('css/theme.minc619.css?v=1.0') }}">

<!--custom styling for fonts and other elements-->
<link rel="stylesheet" href="{{asset('css/custom.css') }}" >
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<style>
@font-face {font-family: "GD Sherpa Regular";
  src: url("{{asset('font/0aee6008b82cde991ec28387169bb13e.eot') }}"); /* IE9*/
  src: url("{{asset('font/0aee6008b82cde991ec28387169bb13e.eot?#iefix') }}") format("embedded-opentype"), /* IE6-IE8 */
  url("{{asset('font/0aee6008b82cde991ec28387169bb13e.woff2') }}") format("woff2"), /* chrome、firefox */
  url("{{asset('font/0aee6008b82cde991ec28387169bb13e.woff') }}") format("woff"), /* chrome、firefox */
  url("{{asset('font/0aee6008b82cde991ec28387169bb13e.ttf') }}") format("truetype"), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
  url("{{asset('font/0aee6008b82cde991ec28387169bb13e.svg#GD Sherpa Regular') }}") format("svg"); /* iOS 4.1- */
}
body{
font-family:'GD Sherpa Regular','Brandon Grotesque' !important;font-size:13.5px;COLOR:#000;
}
.form-label, .accordion-body, p{font-size:15px;line-height:34px;font-weight:600;}
ul>li{line-height:35px;}
.img_circle{
	width:40px;height:40px;border-radius:50%;
}
.form-control{font-size:13px;}
h6{font-size:19px;font-weight:700;font-family:'GD Sherpa Regular','Spartan','Brandon Grotesque';}
.mb-0{

	font-family:'Spartan','GD Sherpa Regular','Brandon Grotesque';font-size:20px;line-height:40px;

}
</style>

<!--modals loader-->
<script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#postModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
</script>

</head>
<body>


  <!-- ========== HEADER ========== -->
  <header id="header" class="navbar navbar-expand-lg navbar-end navbar-absolute-top navbar-light navbar-show-hide"
          data-hs-header-options='{
            "fixMoment": 1000,
            "fixEffect": "slide"
          }'>


    <div class="container">
      <nav class="js-mega-menu navbar-nav-wrap">
        <!-- Default Logo -->
        <a class="navbar-brand" href="{{ route('blog.index') }}" aria-label="{{ config('app_name') }}" style="font-family:Chiller;font-size:35px;color:#000">
          StoryBoard
    </a>
        <!-- End Default Logo -->

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-default">
            <i class="bi-list"></i>
          </span>
          <span class="navbar-toggler-toggled">
            <i class="bi-x"></i>
          </span>
        </button>
        <!-- End Toggler -->

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <div class="navbar-absolute-top-scroller">
            <ul class="navbar-nav">
              <!-- Landings -->
              <li class="hs-has-mega-menu nav-item">
                <a id="landingsMegaMenu" class="hs-mega-menu-invoker nav-link" aria-current="page" href="{{ route('blog.index') }}" aria-expanded="false">Home</a>

                <!-- Mega Menu -->
                <div class="hs-mega-menu" aria-labelledby="landingsMegaMenu" style="min-width: 30rem;">
                  <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">

                    </div>
                    <!-- End Col -->

                    <div class="col-lg-6">
                      <div class="navbar-dropdown-menu-inner">
                        <div class="row">

                  </div>
                  <!-- End Row -->
                </div>
                <!-- End Mega Menu -->
              </li>
              <!-- End Landings -->

              <!-- Company -->
              <li class="hs-has-sub-menu nav-item">
                <a id="companyMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="{{route('admin.dashboard.home')}}" role="button" aria-expanded="false">Dashboard</a>

                <!-- Mega Menu -->
                <div class="hs-sub-menu dropdown-menu" aria-labelledby="companyMegaMenu" style="min-width: 14rem;">
                <a class="dropdown-item " href="{{route('admin.dashboard.home') }}">All Posts</a>
                <a class="dropdown-item " href="{{route('admin.dashboard.newpost') }}">New Post</a>
                  <a class="dropdown-item " href="{{ route('admin.dashboard.new-ebook') }}">Upload new e-Book</a>
                  <a class="dropdown-item " href="{{ route('admin.dashboard.users') }}">Users</a>
                  <a class="dropdown-item " href="{{ route('admin.dashboard.ads') }}">Ads & Impressions</a>
                  <a class="dropdown-item " href="{{ route('logout') }}">Logout</a>

                </div>
                <!-- End Mega Menu -->
              </li>
              <!-- End Company -->
              <!-- Button -->
              <li class="nav-item">


				@if(Auth::check())
						@if(Auth::user()->is_admin==true)
					<a href="{{ route('admin.dashboard.home') }}"><img src="{{asset('img/160x160/'.Auth::user()->profile_img) }}" alt="{{Auth::user()->username}}" class="img_circle"/></a>
				@else
					<a href="{{ route('admin.dashboard.home') }}"><img src="{{asset('img/160x160/'.Auth::user()->profile_img) }}" alt="{{Auth::user()->username}}" class="img_circle"/></a>
								@endif
								@else
					<a class="btn btn-light btn-transition" href="{{route('login') }}" style="border-radius:7px;font-weight:700;">Get Started <i class="bi-chevron-right small ms-1" style="color:#000000;"></i></a>

				@endif

				</a>
              </li>
              <!-- End Button -->
            </ul>
          </div>
        </div>
        <!-- End Collapse -->
      </nav>
    </div>
  </header>

  <!-- ========== END HEADER ========== -->

   <!-- ========== END HEADER ========== -->

       @yield('content')


@include('layouts.footer')




  <!-- Go To -->
  <a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;"
     data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": "2rem"
         },
         "show": {
           "bottom": "2rem"
         },
         "hide": {
           "bottom": "-2rem"
         }
       }
     }'>
    <i class="bi-chevron-up"></i>
  </a>
  <!-- ========== END SECONDARY CONTENTS ========== -->


  <!-- JS Implementing Plugins -->
  <script src="{{ asset('js/vendor.min.js') }}"></script>
  <script src="{{ asset('vendor/aos/dist/aos.js') }}"></script>

  <!-- JS Front -->
  <script src="{{ asset('js/theme.min.js') }}"></script>

  <!-- JS Plugins Init. -->
  <script>
    (function() {
      // INITIALIZATION OF HEADER
      // =======================================================
      new HSHeader('#header').init()


      // INITIALIZATION OF MEGA MENU
      // =======================================================
      new HSMegaMenu('.js-mega-menu', {
          desktop: {
            position: 'left'
          }
        })


      // INITIALIZATION OF SHOW ANIMATIONS
      // =======================================================
      new HSShowAnimation('.js-animation-link')


      // INITIALIZATION OF BOOTSTRAP VALIDATION
      // =======================================================
      HSBsValidation.init('.js-validate', {
        onSubmit: data => {
          data.event.preventDefault()
          alert('Submited')
        }
      })


      // INITIALIZATION OF BOOTSTRAP DROPDOWN
      // =======================================================
      HSBsDropdown.init()


      // INITIALIZATION OF GO TO
      // =======================================================
      new HSGoTo('.js-go-to')


      // INITIALIZATION OF AOS
      // =======================================================
      AOS.init({
        duration: 650,
        once: true
      });


      // INITIALIZATION OF TEXT ANIMATION (TYPING)
      // =======================================================
      HSCore.components.HSTyped.init('.js-typedjs')
    })()
  </script>




<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>

