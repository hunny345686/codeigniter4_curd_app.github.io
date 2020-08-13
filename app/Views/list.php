<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Curd Opretion</title>

	 <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
    <style>
      .pagination
      {
        display: flex;
        justify-content: center;
      }

          .pagination a {
            color: #fff;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
          }

          .pagination a.active {
            color: white;
            border: 1px solid #4CAF50;
          }

          .pagination a:hover:not(.active) {background-color: #ddd;}
      
    </style>
</head>
<body class="bg-dark font-weight-bold" >

	<!-- start Display All recordes -->

	<div class="container mt-4">
  <h2 class="text-center text-light">Codeigniter 4 Curd Opration</h2>

<?php 
  if (session()->getFlashdata('itme')) {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong><?= session()->getFlashdata('itme'); ?></strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php  
}

 ?>
  

  <button class="btn btn-success float-right m-3" data-toggle="modal" data-target="#add_student" >Add Student</button>
  <span class="alert-success"></span>
  <table class="table text-capitalize text-white">
    <thead class="thead-dark">
      <tr>
        <th>Picture</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone No</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      <?php
         foreach ($students_detail as $stu_det) {
      	 ?>
      	 	<tr>
            <td>
              <?php if($stu_det['img'] != null) {?>
              <img src="<?= base_url("upload/img")."/".$stu_det['img']?>" alt="abc" class ="img-fluid" style ="width: 50px; height: 50px; border-radius: 50%;">
            <?php }else{
              ?>
              <img src="<?= base_url("upload/img")."/user-dummy-pic.png"?>" alt="abc" class ="img-fluid" style ="width: 50px; height: 50px;">
              <?php  

            } ?>

            </td>
      	 		<td><?= $stu_det['first_name']?></td>
      	 		<td><?= $stu_det['last_name']?></td>
      	 		<td><?= $stu_det['email']?></td>
      	 		<td><?= $stu_det['address']?></td>
      	 		<td><?= $stu_det['mobile']?></td>
      	 		<td>
      	 			<a href="edit/<?= $stu_det['id']?>" class="btn btn-info mr-2">Edit</a>
      	 			<a href="delete/<?= $stu_det['id']?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" >Delete</a>
      	 		</td>
      	 	</tr>
      <?php }  ?> 
    </tbody>
  </table>
  <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li><a href="#">&laquo;</a></li>
    <li class="page-item mr-4"><?= $pager->links() ?></li>
  </ul>
</nav>


<!-- End Display All recordes -->

<!-- start Add Student Model -->

<div class="container">
  <div class="modal fade" id="add_student">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Student Deatil</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="insert" method="post" enctype="multipart/form-data">
		    <div class="form-group">
		      <label for="email">First Name:</label>
		      <input type="text" class="form-control"placeholder="Enter First Name" name="first_name">
		    </div>
		    <div class="form-group">
		      <label for="email">Last Name:</label>
		      <input type="text" class="form-control"placeholder="Enter Last Name" name="last_name">
		    </div>
		    <div class="form-group">
		      <label for="email">Address:</label>
		      <textarea name="address"cols="1" rows="1" class="form-control"placeholder="Enter Address"></textarea>
		    </div>
		    <div class="form-group">
		      <label for="pwd">Email:</label>
		      <input type="text" class="form-control" placeholder="Enter Email" name="email">
		    </div>
		    <div class="form-group">
		      <label for="pwd">Phone No:</label>
		      <input type="text" class="form-control" placeholder="Enter Phone No" name="mobile">
		    </div>
        <div class="form-group">
          <label for="pwd">Upload Picture</label>
         <input type="file" name="img" class="form-control" >
        </div>
		    <div class="modal-footer">
		      <button type="submit" class="btn btn-success" name="save">Save</button>
	          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        </div>
		  </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php //echo ; ?>
<!-- end Add Student Model -->
</body>
</html>