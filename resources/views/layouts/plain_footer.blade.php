<!-- ========== FOOTER ========== -->
  <footer class="position-absolute start-0 end-0 bottom-0">
    <div class="container pb-5 content-space-b-sm-1">
      <div class="row justify-content-between align-items-center">
        <div class="col-sm mb-3 mb-sm-0">
          <p class="small mb-0">&copy; {{ config('app_name') }} . {{date('Y')}} . All rights reserved.</p>
        </div>

        <div class="col-sm-auto">
          <!-- Socials -->
          <ul class="list-inline mb-0">
           <li class="list-inline-item">
            <a class="btn btn-soft-secondary btn-xs btn-icon" href="https://facebook.com/storyboard">
              <i class="bi-facebook"></i>
            </a>
          </li>

          <li class="list-inline-item">
            <a class="btn btn-soft-secondary btn-xs btn-icon" href="https://twitter.com/palmflow">
              <i class="bi-twitter"></i>
            </a>
          </li>

          <li class="list-inline-item">
            <a class="btn btn-soft-secondary btn-xs btn-icon" href="https://github.com">
              <i class="bi-github"></i>
            </a>
          </li>
		  </ul>
          <!-- End Socials -->
        </div>
      </div>
    </div>
  </footer>
  <!-- ========== END FOOTER ========== -->


  <!-- ========== SECONDARY CONTENTS ========== -->
  <!-- Sign Up -->
  <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <!-- Header -->
        <div class="modal-close">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- End Header -->

        <!-- Body -->
        <div class="modal-body">
          <!-- Log in -->
        <!-- Log in -->
          <div id="signupModalFormLogin" style="display: none; opacity: 0;">
            <!-- Heading -->
            <div class="text-center mb-7">
              <h2>Log in</h2>
              <p>Don't have an account yet?
                <a class="js-animation-link link" href="javascript:;" role="button"
                   data-hs-show-animation-options='{
                         "targetSelector": "#signupModalFormSignup",
                         "groupName": "idForm"
                       }'>Sign up</a>
              </p>
            </div>
            <!-- End Heading -->

            <div class="d-grid gap-2">
              <a class="btn btn-white btn-lg" href="#">
                <span class="d-flex justify-content-center align-items-center">
                  <img class="avatar avatar-xss me-2" src="{{ asset('svg/brands/google-icon.svg') }}" alt="Image Description">
                  Log in with Google
                </span>
              </a>

              <a class="js-animation-link btn btn-primary btn-lg" href="#"
                 data-hs-show-animation-options='{
                       "targetSelector": "#signupModalFormLoginWithEmail",
                       "groupName": "idForm"
                     }'>Log in with Username</a>
            </div>
          </div>
          <!-- End Log in -->

          <!-- Log in with Modal -->
          <div id="signupModalFormLoginWithEmail" style="display: none; opacity: 0;">
            <!-- Heading -->
            <div class="text-center mb-7">
              <h2>Log in</h2>
              <p>Don't have an account yet?
                <a class="js-animation-link link" href="javascript:;" role="button"
                   data-hs-show-animation-options='{
                         "targetSelector": "#signupModalFormSignup",
                         "groupName": "idForm"
                       }'>Sign up</a>
              </p>
            </div>
            <!-- End Heading -->

           <form class="" novalidate method="POST" action="{{route('login') }}">
			                        {{ csrf_field() }}

              <!-- Form -->
              <div class="mb-3">
                <label class="form-label" for="signupModalFormLoginUsername">Your username</label>
                <input type="username" class="form-control form-control-lg" name="username" id="signupModalFormLoginUsername" VALUE="{{old('username') }}" placeholder="Your username" aria-label="Username" required>
                <span class="invalid-feedback">Please enter your username.</span>

			   @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif


			  </div>
              <!-- End Form -->

              <!-- Form -->
              <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center">
                  <label class="form-label" for="signupModalFormLoginPassword">Password</label>

                  <a class="js-animation-link form-label-link" href="javascript:;"
                     data-hs-show-animation-options='{
                       "targetSelector": "#signupModalFormResetPassword",
                       "groupName": "idForm"
                     }'>Forgot Password?</a>
                </div>

                <input type="password" class="form-control form-control-lg" name="password" id="signupModalFormLoginPassword" VALUE="{{old('password') }}" placeholder="8+ characters required" aria-label="8+ characters required" required minlength="8">
                <span class="invalid-feedback">Please enter a valid password.</span>

				   @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif


			  </div>
              <!-- End Form -->

              <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary form-control-lg">Log in</button>
              </div>
            </form>
          </div>
          <!-- End Log in with Modal -->

          <!-- Sign up -->
          <div id="signupModalFormSignup">
            <!-- Heading -->
            <div class="text-center mb-7">
              <h2>Sign up</h2>
              <p>Already have an account?
                <a class="js-animation-link link" href="javascript:;" role="button"
                   data-hs-show-animation-options='{
                         "targetSelector": "#signupModalFormLogin",
                         "groupName": "idForm"
                       }'>Log in</a>
              </p>
            </div>
            <!-- End Heading -->

            <div class="d-grid gap-3">
              <a class="btn btn-white btn-lg" href="#">
                <span class="d-flex justify-content-center align-items-center">
                  <img class="avatar avatar-xss me-2" src="{{asset('svg/brands/google-icon.svg') }}" alt="Signup with Google">
                  Sign up with Google
                </span>
              </a>

              <a class="js-animation-link btn btn-primary btn-lg" href="#"
                 data-hs-show-animation-options='{
                       "targetSelector": "#signupModalFormSignupWithEmail",
                       "groupName": "idForm"
                     }'>Sign up with Email</a>

              <div class="text-center">
                <p class="small mb-0">By continuing you agree to our <a href="" target="_blank">Terms and Conditions</a></p>
              </div>
            </div>
          </div>
          <!-- End Sign up -->

          <!-- Sign up with Modal -->
          <div id="signupModalFormSignupWithEmail" style="display: none; opacity: 0;">
            <!-- Heading -->
            <div class="text-center mb-7">
              <h2>Sign up</h2>
              <p>Already have an account?
                <a class="js-animation-link link" href="javascript:;" role="button"
                   data-hs-show-animation-options='{
                         "targetSelector": "#signupModalFormLogin",
                         "groupName": "idForm"
                       }'>Log in</a>
              </p>
            </div>
            <!-- End Heading -->


            <form method="POST" action="{{route('register') }}">
			 {{ csrf_field() }}

              <!-- Form -->
              <div class="mb-3 form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label class="form-label" for="signupModalFormSignupName">Your username</label>
                <input type="text" class="form-control form-control-lg" name="email" id="signupModalFormSignupName" value="{{ old('username') }}" placeholder="Your preferred username" aria-label="username" required />
                <span class="invalid-feedback">Please enter a valid username.</span>

			  @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif


			  </div>
              <!-- End Form -->

              <!-- Form -->
              <div class="mb-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="form-label" for="signupModalFormSignupEmail">Your email</label>
                <input type="email" class="form-control form-control-lg" name="email" id="signupModalFormSignupEmail" placeholder="Your e-mail" aria-label="your e-mail" required>
                <span class="invalid-feedback">Please enter a valid email address.</span>

			  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif


			  </div>
              <!-- End Form -->

              <!-- Form -->
              <div class="mb-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="form-label" for="signupModalFormSignupPassword">Password</label>
                <input type="password" class="form-control form-control-lg" name="password" id="signupModalFormSignupPassword" placeholder="8+ characters required" aria-label="8+ characters required" required>
                <span class="invalid-feedback">Your password is invalid. Please try again.</span>

				   @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif


			  </div>
              <!-- End Form -->

              <!-- Form -->
              <div class="mb-3 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" data-hs-validation-validate-class>
                <label class="form-label" for="signupModalFormSignupConfirmPassword">Confirm password</label>
                <input type="password" class="form-control form-control-lg" id="signupModalFormSignupConfirmPassword" name="password_confirmation" placeholder="8+ characters required" aria-label="8+ characters required" required
                       data-hs-validation-equal-field="#signupModalFormSignupPassword">
                <span class="invalid-feedback">Password does not match the confirm password.</span>
              </div>
              <!-- End Form -->

              <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary form-control-lg">Sign up</button>
              </div>

              <div class="text-center">
                <p class="small mb-0">By clicking the 'Sign up' button you agree to our <a href="">Terms and Conditions</a></p>
              </div>
            </form>

          </div>
          <!-- End Sign up with Modal -->

          <!-- Reset Password -->
          <div id="signupModalFormResetPassword" style="display: none; opacity: 0;">
            <!-- Heading -->
            <div class="text-center mb-7">
              <h2>Forgot password?</h2>
              <p>Enter the email address you used when you joined and we'll send you instructions to reset your password.</p>
            </div>
            <!-- En dHeading -->


            <form class="js-validate need-validate" novalidate method="POST" action="{{route('password.request') }}">
              <div class="mb-3">
                <!-- Form -->
                <div class="d-flex justify-content-between align-items-center">
                  <label class="form-label" for="signupModalFormResetPasswordEmail" tabindex="0">Your email</label>

                  <a class="js-animation-link form-label-link" href="javascript:;"
                     data-hs-show-animation-options='{
                         "targetSelector": "#signupModalFormLogin",
                         "groupName": "idForm"
                       }'>
                    <i class="bi-chevron-left small"></i> Back to Log in
                  </a>
                </div>

                <input type="email" class="form-control form-control-lg" name="email" id="signupModalFormResetPasswordEmail" tabindex="1" placeholder="Enter your email address" aria-label="Enter your email address" required>
                <span class="invalid-feedback">Please enter a valid email address.</span>
                <!-- End Form -->
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary form-control-lg">Submit</button>
              </div>
            </form>


		   </div>
          <!-- End Reset Password -->
        </div>
        <!-- End Body -->


      </div>
    </div>
  </div>

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
