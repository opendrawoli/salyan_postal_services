<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>जिल्ला हुलाक कार्यालय सल्यान</title>

  <link rel="shortcut icon" href="{{asset('assets/images/favicon-32x32.png')}}">
  <!-- Stylesheets -->
   <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap-extend.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/login.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fonts/material-design/material-design.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fonts/brand-icons/brand-icons.min.css')}}">
<body class="page-login-v3 layout-full">
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
      <div class="panel">
        <div class="panel-body">
          <div class="brand">
            <img class="brand-img" src="{{asset('assets/images/logo.png')}}" alt="" width="150px">
            <p class="font-size-18">नेपाल सरकार</p>
            <p class="font-size-18">जिल्ला हुलाक कार्यालय सल्यान</p>
            <h3 class="brand-text"></h3>
          </div>
              <form id='form-login' role="form" method="POST" action="{{ route('login') }}">
                @csrf
        <div class="form-group form-material floating">
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
              <label class="floating-label">Email Address</label>
                      </div>
        
        <div class="form-group form-material floating">
            <input id="password" type="password" class="form-control" name="password" vvalue="{{ old('remember') ? 'checked' : '' }}" required>
            <label class="floating-label">Password</label>
                    </div>
                <div class="form-group clearfix">
            <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg pull-left">
                <input id="remember" type="checkbox" name="remember" >
                <label for="inputCheckbox">Remember me</label>
            </div>
        </div>
        
        <div>
        <button id="btn-login" type="submit" class="btn btn-primary btn-block btn-lg margin-top-40">Sign in</button>
      </div>
       
    </form>
        
        </div>
      </div>
  <!-- Footer -->
  <footer class="page-copyright page-copyright-inverse">
        <p>जिल्ला हुलाक कार्यालय सल्यान</p>
        <p>© 2020. All RIGHT RESERVED.</p>     
  </footer>
</body>
</html>