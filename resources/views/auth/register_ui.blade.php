@extends('layouts.login_layout')
@section('content')

<!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main" class="flex-grow-1">
    <!-- Form -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-5 col-xl-4 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-dark" style="background-image: url(assets/svg/components/card-17.svg);background-color:#0099cc!important;">
          <div class="flex-grow-1 p-5">
            <!-- Blockquote -->
            <figure class="text-center">

              <div class="mb-4">
                <a href=""><img class="avatar avatar-xl avatar-4x3" src="" alt="Logo"></a>
              </div>

              <blockquote class="blockquote blockquote-light">“ Read to your  fill, Subscribe and do the other things you love to do - Read ”</blockquote>

              <figcaption class="blockquote-footer blockquote-light">
                <div class="mb-3">
                  <img class="avatar avatar-circle" src="{{ asset('img/160x160/img6.jpg') }}" alt="CEO MyStoryBoard">
                </div>

                Emmanuel Olabiyi
                <span class="blockquote-footer-source">CEO | {{ config('app_name') }}</span>
              </figcaption>
            </figure>
            <!-- End Blockquote -->


          </div>
        </div>
        <!-- End Col -->

<div class="col-lg-7 col-xl-8 d-flex justify-content-center align-items-center min-vh-lg-100" >
          <div class="flex-grow-1 mx-auto" style="max-width: 28rem; padding-top:25px;">
            <!-- Heading -->
            <div class="text-center mb-5 mb-md-7">
              <h1 class="h3">Welcome to MyStoryBoard</h1>
              <p>Fill in your details to get started.</p>
              <p>

			  <!--flash message goes here-->
			    <div class="container"> @if (session('status'))   <div class="alert alert-success">  {{ session('status') }}</div>@endif</div>

			  </p>
            </div>
            <!-- End Heading -->

            <!-- Form -->
            <form class="" method="POST" action="{{route('register') }}">
              {{ csrf_field() }}

			  <!-- Form -->

			  <div class="mb-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="form-label" for="signupModalFormSignupEmail">Your email</label>
                <input type="email" class="form-control form-control-lg shrink_form_control" name="email" id="signupModalFormSignupEmail" value="{{ old('email') }}" placeholder="Your e-mail" aria-label="email" required>
                <span class="invalid-feedback">Please enter a valid email address.</span>

			  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

			  </div>
              <!-- End Form -->

				<!-- Form -->

				<div class="mb-3 form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label class="form-label" for="signupModalFormSignupUsername">Your username</label>
                <input type="username" class="form-control form-control-lg shrink_form_control" name="username" value="{{ old('username') }}" id="signupModalFormSignupUsername" style="height:30px;"  placeholder="Your username" aria-label="username" required>
                <span class="invalid-feedback">Please enter a valid username.</span>

			  @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
			  </div>
              <!-- End Form -->

              <!-- Form -->
              <div class="mb-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="form-label" for="signupModalFormSignupPassword">Password</label>

                <div class="input-group input-group-merge" data-hs-validation-validate-class>
                  <input type="password" class="js-toggle-password form-control form-control-lg shrink_form_control" name="password" style="height:30px;"
				  id="signupModalFormSignupPassword" placeholder="8 - 15 characters required" aria-label="8 - 15 characters required" required
                          data-hs-toggle-password-options='{
                             "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                             "defaultClass": "bi-eye-slash",
                             "showClass": "bi-eye",
                             "classChangeTarget": ".js-toggle-passowrd-show-icon-1"
                           }'>
                  <a class="js-toggle-password-target-1 input-group-append input-group-text" href="javascript:;">
                    <i class="js-toggle-passowrd-show-icon-1 bi-eye"></i>
                  </a>

				   @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>

                <span class="invalid-feedback">Your password is invalid. Please try again.</span>
              </div>
              <!-- End Form -->

              <!-- Form -->
              <div class="mb-3 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label class="form-label" for="signupModalFormSignupConfirmPassword">Confirm password</label>

                <div class="input-group input-group-merge" data-hs-validation-validate-class>
                  <input type="password" class="js-toggle-password form-control-lg shrink_form_control form-control" name="password_confirmation" id="signupModalFormSignupConfirmPassword"
				  placeholder="8-15 characters required" style="height:35px;"
				  aria-label="8 - 15 characters required" required
                         data-hs-validation-equal-field="#signupModalFormSignupPassword"
                          data-hs-toggle-password-options='{
                           "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                           "defaultClass": "bi-eye-slash",
                           "showClass": "bi-eye",
                           "classChangeTarget": ".js-toggle-passowrd-show-icon-2"
                         }'>
                   <a class="js-toggle-password-target-2 input-group-append input-group-text" href="javascript:;">
                    <i class="js-toggle-passowrd-show-icon-2 bi-eye"></i>
                  </a>
                </div>

                <span class="invalid-feedback">Password does not match the confirm password.</span>
              </div>
              <!-- End Form -->

              <!-- Check -->
              <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="signupHeroFormPrivacyCheck" name="signupFormPrivacyCheck" name="remember" value="{{ old('agree') ? 'checked' : '' }}" required />
                <label class="form-check-label small" for="signupHeroFormPrivacyCheck" style="line-height:35px;font-size:12px;"> By submitting this form I have read and acknowledged the
				<a href="{{ route('privacy-policy') }}" target="_blank">Privacy Policy</a> and our <a href="{{route('terms-and-conditions')}}" target="_blank">Terms and Condition</a></label>
                <span class="invalid-feedback">Please accept our Privacy Policy & Terms and Conditions clauses.</span>
              </div>
              <!-- End Check -->

              <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Sign up</button>
              </div>

              <div class="text-center">
                <p>Already have an account? <a class="link" href="{{ route('login') }}">Log in here</a></p>
              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Form -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

@endsection
