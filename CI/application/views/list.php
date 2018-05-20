<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List Users</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
</head>
<body class="container">
	<table id="users_table" class="table table-striped table-bordered" cellspacing="0" width="100%" style="width:100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th>Name</th>
				<th></th>
			</tr>
		</tfoot>
	</table>
	<a href="/CI/index.php/MyController/create" class="btn btn-primary">Add new account</a>
	<!-- Button to Open the Modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
		Open modal
	</button>

	<!-- The Modal -->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header bg-info">
					<h4 class="modal-title">Resign Form</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- Modal body -->
				<div class="modal-body">
					<div class="erro_mess" style="color:red"></div>
					<form action="/CI/index.php/MyController/store" method="POST" id="form">
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
					<button class="btn btn-primary" type="button" id="submit">Submit</button>
					<button class="btn btn-danger" type="Reset" >Reset</button>
				</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#users_table').DataTable( {
				serverSide : true,
				processing :true,
				ajax :  {
					url :"/CI/index.php/MyController/users",
					type :"POST"
				}
			} );


		});

		
		$('#submit').click(function(){
			var data = $('#form').serialize()
			$.ajax({
				type : 'POST',
				url : '/CI/index.php/MyController/store',
				data : data,
				datatype :'json',
				success :function(data)
               {                       
                    $('.erro_mess').html(data);
               }
			});
		})
	</script>	
</body>
</html>