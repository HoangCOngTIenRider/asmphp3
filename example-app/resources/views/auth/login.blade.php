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
    <form class="login100-form " action="{{ route('login') }}" method="POST">
    @include('templates.errors')
					<span class="login100-form-title">
						Member Login
					</span>
					@csrf
					<div class="wrap-input100 " >
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 " >
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="{{route('sign_up')}}">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
@endsection