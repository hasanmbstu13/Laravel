<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<style type="text/css">
		body{ margin:0; padding: 0; }
		.Alert{
			
			padding: 10px;
		}

		.Alert--Info {
			background: red; 
		}

		.Alert--Success {
			background: #8AC48A;
			/*color: white;*/
		}

		.Alert--Error {
			background: red;
			color: white;
		}
	</style>
</head>
<body>
	
	<!-- here content is an identifer that we want to create in our section -->
	<div class="container">
		@yield('content')
	</div>

	@yield('footer')

</body>
</html>