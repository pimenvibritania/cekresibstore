<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Partner Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('css/login.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">

</head>
<body>
    {{-- <div class="text-center mt-5">
        <h1 style="font-size:; font-family: 'Fjalla One', sans-serif; color:#c0392b; font-weight:bold; text-shadow: 2px 2px rgba(0,0,0,0.5);"> 
            <span style="font-weight: normal; color:#f39c12 ;">Partner Login </span>
            Billionaire Store</h1>
    </div>     --}}
	<div class="container h-100 ">
    
		<div class="d-flex justify-content-center h-100">

			<div class="user_card">
                
				<div class="d-flex justify-content-center">
                    
					<div class="brand_logo_container">
						<img src="{{URL::asset('adminlte/img/bs.jpg')}}" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="text-center">
                            <h1 style="font-size:; font-family: 'Fjalla One', sans-serif; color:#C0392B; font-weight:bold; text-shadow: 2px 2px rgba(255,255,255,0.5); margin-bottom:20px; margin-top:-15px;">
                                User Login
                            </h1>
                        </div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
                            <input id="email" type="email" class="form-control  input_user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email...">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
                            <input id="password" type="password" class="form-control input_pass @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>

                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" class="btn login_btn">
                                {{ __('Login') }}
                            </button>
                        </div>
					</form>
				</div>
				
				
			</div>
		</div>
	</div>
</body>
</html>
