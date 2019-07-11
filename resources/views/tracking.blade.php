   
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customer Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('css/login.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">

</head>
<body>
<div class="container mt-1">
    @if (session('success'))
        <div class="alert alert-success alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{session('success')}}</strong>
        </div>
    @endif

    @if (session('danger'))
        <div class="alert alert-danger alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{session('danger')}}</strong>
        </div>
    @endif

</div>
            
       
	<div class="container h-100">
    
		<div class="d-flex justify-content-center h-100">

			<div class="user_card">
                
				<div class="d-flex justify-content-center">
                    
					<div class="brand_logo_container">
						<img src="{{URL::asset('adminlte/img/bs.jpg')}}" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
                    <form method="GET" action="{{route('tracking')}}">
                        @csrf
                        <div class="text-center">
                                <h1 style="font-size:2.5em; font-family: 'Fjalla One', sans-serif; color:#C0392B; font-weight:bold; text-shadow: 2px 2px rgba(255,255,255,0.5); margin-bottom:35px;">
                                    Customer Login
                                </h1>
                            </div>
						<div class="input-group ">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
                            <input type="text" class="form-control"  placeholder="No HP" name="cari" value="{{old('cari')}}">
                            {{-- <input type="text" class="form-control" placeholder="Invoice..." name="cari" value="{{old('cari')}}"> --}}

                         
						</div>
                        
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" value="CARI" class="btn login_back">
                                    Login
                                
                            </button>

                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" class="btn login_btn"><a href="{{route('frontpage')}}" style="color:white; text-decoration:none;">
                                    Back
                                </a>
                            </button>
                        </div>
                    </form>
				</div>
				
				
			</div>
		</div>
	</div>
</body>
</html>
