<!DOCTYPE html>
<html>
    
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('css/login.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">

</head>
<!--Coded with love by Mutiullah Samim-->
<body>
    <div class="text-center mt-5">
        <h1 style="font-size:6vw; font-family: 'Fjalla One', sans-serif; color:#c0392b; font-weight:bold; text-shadow: 2px 2px rgba(0,0,0,0.5); margin-bottom:50px;"> 
            <span style="font-weight: normal; color:#f39c12 ;">Cek Resi </span>
            Billionaire Store</h1>
    </div>    
	<div class="container h-100">
    
		<div class="d-flex justify-content-center h-100">

			<div class="user_card">
                
				<div class="d-flex justify-content-center">
                    
					<div class="brand_logo_container">
						<img src="{{URL::asset('adminlte/img/bs.jpg')}}" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="mymargin">
                    
						<div class="input-group ">
                            <a href="{{route('resi.index')}}">
							<button class="btn btn-primary btnmargin mt-5 ">
                                <i class="fa fa-users fabig float-left"></i>
                                <span>Login as Partner</span>
                            </button>
                            </a>
						</div>
						<div class="input-group">
							<button class="btn btn-success btnmargin mt-3">
								<a href="{{route('track')}}" style="color:white; text-decoration:none;">
									<i class="fa fa-user fabig float-left"></i>
									<span>Login as Customer</span>
								</a>
                            </button>
						</div>
                        
				</div>
				
				
			</div>
		</div>
	</div>
</body>
</html>
