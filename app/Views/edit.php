<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Detail</title>
	<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
</head>
<body class="bg-dark font-weight-bold">
	<div class="container">
		<h2 class="text-center text-info mt-4">Edit Detail</h2>
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6 text-white ">
			  <form action="<?= base_url('student/update') ?>" method="post"enctype="multipart/form-data">
			    <div class="form-group">
			      <label for="email">First Name:</label>
			      <input type="hidden" name="id" value="<?=$user['id']?>">
			      <input type="text" class="form-control" name="first_name" value="<?=$user['first_name']?>" >
			    </div>
			    <div class="form-group">
			      <label for="email">Last Name:</label>
			      <input type="text" class="form-control"value="<?=$user['last_name']?>" name="last_name">
			    </div>
			    <div class="form-group">
			      <label for="email">Address:</label>
			      <textarea name="address"cols="1" rows="1" class="form-control"><?=$user['address']?></textarea>
			    </div>
			    <div class="form-group">
			      <label for="pwd">Email:</label>
			      <input type="text" class="form-control" value="<?=$user['email']?>" name="email">
			    </div>
			    <div class="form-group">
			      <label for="pwd">Phone No:</label>
			      <input type="text" class="form-control" value="<?=$user['mobile']?>" name="mobile">
			    </div>
			    <div class="form-group">
		          <label for="pwd">Upload Picture</label>
		          <input type="file" name="img" class="form-control" >
		        </div>
			    <div class="d-flex justify-content-between">
			      <button type="submit" class="btn btn-success" name="save">Save</button>
		          <button type="button" class="btn btn-danger">Close</button>
		        </div>
		      </form>
	       </div>
		</div>
	</div>
</body>
</html>