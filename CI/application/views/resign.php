<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Resign Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
</head>
<body class="container">
	<div class="card border-primary">
		<div class="card-header bg-primary">Resign Form</div>
		<div class="card-body">
            <span style="color: red"><?php echo validation_errors(); ?></span>
			<form action="/CI/index.php/MyController/store" method="POST">
				<fieldset class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
				</fieldset>
				<fieldset class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>">
				</fieldset>
				<fieldset class="form-group">
					<label for="phone">Phone</label>
					<input type="text" class="form-control" id="phone" name="phone" value="<?php echo set_value('phone'); ?>">
				</fieldset>
				<fieldset class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password">
				</fieldset>
                <fieldset class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword">
                </fieldset>
				<button class="btn btn-primary" type="submit" >Submit</button>
				<button class="btn btn-danger" type="Reset" >Reset</button>
			</form>
		</div>
	</div>
</body>
</html>