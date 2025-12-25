@if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif


<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
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
                    <h1>Hello Again!</h1>
                  </div>
                    <p>Sign in to your Food Hut account and continue serving fresh, delicious experiences every day.</p>
                </div>
              </div>
            </div>

            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form action="{{ route('login') }}" method="post" class="form-validate">
                    @csrf
                    <div class="form-group">
                      <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" data-msg="Please enter your email" class="input-material">
                      <label for="email" class="label-material" >{{ __('Email') }}</label>
                    </div>

                    <div class="form-group">
                      <input id="password" type="password" name="password" required  autocomplete="current-password" data-msg="Please enter your password" class="input-material">
                      <label for="password" class="label-material" >{{ __('Password') }}</label>

                    

                  <div class="form-group terms-conditions mt-4 ">
                      <input id="remember_me" name="remember" type="checkbox" required value="1"  class="checkbox-template">
                      <label for="remember_me">{{ __('Remember me') }}</label>
                    </div>

                    </div>
                    <button type="submit" class="btn btn-primary mb-4">Sign In</button>
                  </form>
                  
                  @if (Route::has('password.request'))
                    <a class="forgot-pass" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
                  <br>
                  <small>New to Food Hut?</small>
                    <a href="{{ url('register') }}" class="signup">Create an account</a>

                  
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