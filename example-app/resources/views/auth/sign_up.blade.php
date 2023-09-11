@extends('templates.login')
@section('content')
<!-- <form action="{{ route('login') }}" method="POST">
        @csrf
    <div class="mb-3 ">
        <label  class="form-label">Email address</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Pass</label>
        <input type="password" name="password" class="form-control"  >
    </div>
        <button type="submit" class="btn btn-success">Đăng nhập</button>
    </form> -->
    <form class="login100-form validate-form" action="{{ route('sign_up') }}" method="POST">
        @include('templates.errors')
    @csrf

					<span class="login100-form-title">
						SIGN UP
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign up
						</button>
                        
					</div>
                    <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
							<a href="{{route('login')}}">Login</a>
						</button>
                        </div>

					
				</form>
@endsection