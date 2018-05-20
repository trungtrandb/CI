<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

	<!-- data table -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
</head>
<body class="container">
	<div class="card border-primary">
		<div class="card-header">Login Form</div>
		<div class="card-body">
			<span style="color: red"><?php echo validation_errors(); ?></span>
			<form action="/CI/index.php/MyController/login" method="POST">
				<fieldset class="form-group">
					<label for="mail">User Name</label>
					<input type="text" class="form-control" id="mail"  name ="email" placeholder="Your email address">
				</fieldset>
				<fieldset class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Your password" name="password">
				</fieldset>
				<input type="submit" class="btn btn-primary" value="Submit">
				<a href="/CI/index.php/MyController/create" class="btn btn-primary">Resign</a>
			</form>
		</div>
	</div>
</body>
</html>