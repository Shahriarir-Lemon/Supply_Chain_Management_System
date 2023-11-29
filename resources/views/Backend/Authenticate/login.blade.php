<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>User Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<style>
    body
    {
      margin-top: 25px;
    }
</style>
<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-left my-3">
						<img src="{{ asset('Main1/img/scm.png') }}" alt="logo" width="100" height="auto">
                        &nbsp; <span style="color: green;font-weight: 700;">Supply Chain Management System</span>

					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>


                            @if(session('error'))
                            <div class="text-danger text center">{{session('error')}}</div>
                            @endif
                    
                            @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                            @endif



			<form method="POST" action="{{route('admin_post_login')}}" class="needs-validation" novalidate="" autocomplete="off">
                @csrf
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Username : </label>
									<input id="email" type="text" class="form-control" name="user_name" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>


                                @error('email')
                                <div class="text-dangrer">{{$message}}</div>
                                @enderror


								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password : </label>
										
									</div>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

                                @error('password')
                                <div class="text-dangrer">{{$message}}</div>
                                @enderror

								<div class="d-flex align-items-center">
									<div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label">Remember Me</label>
									</div>
									<button type="submit" class="btn btn-primary ms-auto">
										Login
									</button>
								</div>
							</form>
						</div>
						
					</div>
				
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('userlogin/js/login.js') }}"></script>
</body>
</html>
