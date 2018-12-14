<?php

	include('conexao.php');
	$id = $_GET['id'];


	if(isset($id)){
		$sql = 'select * from user where id=:id';		
		$query = $con->prepare($sql);
		$query->bindParam(':id',$id,PDO::PARAM_INT);
		$query->execute();

		
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
	<h1 class="h1 text-center">Profile</h1>
	<hr>
	<div class="row justify-content-center">
		<div class="col-md-8">
			
<?php
	if($query->rowCount()>0){

	?>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Name</th>
	      <th scope="col">Company</th>
	      <th scope="col">language</th>
	      <th scope="col">email</th>
	    </tr>
	  </thead>
	  <tbody>   

	<?php
	$result = $query->fetchAll(PDO::FETCH_OBJ);
	foreach ($result as $row) {
?>
	<tr>
      <th scope="row"><?php echo $row->id?></th>
      <td><?php echo $row->name?></td>
      <td><?php echo $row->company?></td>
      <td><?php echo $row->language?></td>
      <td><?php echo $row->email?></td>
    </tr>	


					<?php
				}
	?>
		</tbody>
	</table>
	<?php
  
		}
	}
?>   
		<a href="index.php" class="btn btn-primary form-control form-control-sm btn-sm btn-block"><<-Back</a>
		</div>
	</div>
</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
