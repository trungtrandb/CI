<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Account</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
</head>
<body class="container">
	<div class="card border-primary">
		<div class="card-header bg-primary">Edit Form</div>
		<div class="card-body">
			<form action="/CI/index.php/MyController/update/<?php echo($id) ?>" method="POST">
				<fieldset class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email" value="<?php echo($email) ?> ">
				</fieldset>
				<fieldset class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo($name) ?> ">
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">Phone</label>
					<input type="text" class="form-control" id="phone" name="phone" value="<?php echo($phone) ?> ">
				</fieldset>
				<button class="btn btn-primary" type="submit" >Submit</button>
				<button class="btn btn-danger" type="Reset" >Reset</button>
			</form>
		</div>
	</div>
</body>
</html>