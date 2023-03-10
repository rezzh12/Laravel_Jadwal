@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                <div class="container-login100" style="background-image: url({{asset('images/IMG_1.jpg')}});">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
				Login Akun
				</span>
				<form method="POST" action="{{ route('login') }}">
					@csrf

					<div class="row mb-3">
						<label for="email" class="col-md-4 col-form-label text-md-end" style="color:white;">{{ __('Alamat Email') }}</label>

						<div class="col-md-6">
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<label for="password" class="col-md-4 col-form-label text-md-end" style="color:white;">{{ __('Kata Sandi') }}</label>

						<div class="col-md-6">
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-6 offset-md-4">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

								<label class="form-check-label" for="remember">
									{{ __('Remember Me') }}
								</label>
							</div>
						</div>
					</div>

					<div class="row mb-0">
						<div class="col-md-8 offset-md-4">
							<button type="submit" class="btn btn-primary">
								{{ __('Login') }}
							</button>

							@if (Route::has('password.request'))
								<a class="btn btn-link" href="{{ route('password.request') }}">
									{{ __('Lupa Password Anda ?') }}
								</a>
							@endif
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
