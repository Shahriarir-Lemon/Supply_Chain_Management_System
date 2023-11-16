<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign in</title>


  <style>
    .card-body.login-card-body {
      width: 360px;
      
      height: 350px;
      align-self: center;
      
    }
   
.aa
    {
        background-image: url('{{ asset('Dashboard/img/bg') }}');
        background-size: cover;
    }
    

  </style>




  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin_inf/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('admin_inf/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin_inf/dist/css/adminlte.min.css')}}">
</head>
<h1>Bakery Shop</h1>
<br>

<body class="aa hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b></b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">


        <h3><b>
            <center style="color: green;">Sign in to your account</center>
          </b>
        </h3><br>

        @if(session('error'))
        <div class="text-danger text center">{{session('error')}}</div>
        @endif

        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif


        <form action="{{ route('customer_login') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          @error('email')
          <div class="text-dangrer">{{$message}}</div>
          @enderror
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          @error('password')
          <div class="text-dangrer">{{$message}}</div>
          @enderror


          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input name="remember" type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div><br>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <br>
        <p class="mb-1">
          <a href="forgot-password.html">Forgot Password ?</a> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
          <a href="{{ route('customer_registration_form') }}" class="text-center">Create Account</a>
        </p>
        </p>

      </div>

    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{asset('admin_inf/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('admin_inf/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('admin_inf/dist/js/adminlte.min.js')}}"></script>
</body>

</html>