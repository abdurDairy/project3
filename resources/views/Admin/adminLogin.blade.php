<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Login Form | CodingLab</title> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('loginRegister/loginStyle.css') }}">
    {{-- BOOTSTRAP CSS CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        
        <div class="title"><span>Admin Login</span></div>
        {{-- ALERT MESSAGE START  --}}
        @if (Session::has('error'))
          <div class="alert alert-danger" role="alert" style="text-align:center;color:#fff; background:red; padding:10px 0;">
            <strong>{{ session::get('error') }}</strong>
          </div>
        @endif
        {{-- ALERT MESSAGE END  --}}
        {{-- ALERT MESSAGE FOR SUCCESS START  --}}
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        {{-- ALERT MESSAGE END  --}}
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="email" name="admin_email" placeholder="Email" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="admin_pass" placeholder="Password" required>
          </div>
          <div class="pass"><a href="#">Forgot password?</a></div>
          <div class="row button">
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Not a member? <a href="{{ route('admin.register') }}">Signup now</a></div>
        </form>
      </div>
    </div>

  </body>
</html>
