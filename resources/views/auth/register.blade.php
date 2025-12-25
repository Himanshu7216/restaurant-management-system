
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- Custom Font Icons -->
    <link rel="stylesheet" href="{{ asset('admin/css/font.css') }}">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.default.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('admin/img/favicon.ico') }}">

  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Get Started</h1>
                  </div>
                  <p>Create an account to access smart tools, insights, and seamless management.</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form action="{{ url('register') }}" method="post" class="text-left form-validate">
                    @csrf 
                    <div class="form-group-material">
                      <input id="name" type="text" name="name"  required autofocus autocomplete="name" data-msg="Please enter your name" class="input-material">
                      <label for="name" class="label-material">{{ __('Name') }}</label>
                    </div>
                    <div class="form-group-material">
                      <input id="email" type="email" name="email"  required autocomplete="email" data-msg="Please enter a valid email address" class="input-material">
                      <label for="email" class="label-material">{{ __('Email') }}</label>
                    </div>
                    <div class="form-group-material">
                      <input id="phone" type="text" name="phone"  required autocomplete="phone" data-msg="Please enter a valid Phone Number" class="input-material">
                      <label for="phone" class="label-material">{{ __('Phone') }}</label>
                    </div>
                    <div class="form-group-material">
                      <input id="address" type="text" name="address"  required autocomplete="address" data-msg="Please enter your Address" class="input-material">
                      <label for="address" class="label-material">{{ __('Address') }}</label>
                    </div>
                    <div class="form-group-material">
                      <input id="password" type="password" name="password" required autocomplete="new-password" data-msg="Please enter your password" class="input-material">
                      <label for="password" class="label-material">{{ __('Password') }}</label>
                    </div>
                    <div class="form-group-material">
                      <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="password_confirmation" data-msg="Please enter same password" class="input-material">
                      <label for="password_confirmation" class="label-material">{{ __('Confirm Password') }}</label>
                    </div>

                    <div class="form-group terms-conditions text-center">
                      <input id="register-agree" name="registerAgree" type="checkbox" required value="1" data-msg="Your agreement is required" class="checkbox-template">
                      <label for="register-agree">I agree with the terms and policy</label>
                    </div>

                    <div class="form-group text-center mb-5">
                      <input id="register" type="submit" value="Register"  class="btn btn-primary">
                    </div>
                  </form><small>Already have an account? </small><a href="{{ route('login') }}" class="signup">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  


        <!-- JavaScript files-->
<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendor/popper.js/umd/popper.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin/js/front.js') }}"></script>
  </body>
</html>