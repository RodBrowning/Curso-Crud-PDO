<?php

	include('../conexao.php');
	
	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$company = $_POST['company'];
		$language = $_POST['language'];
		$email = $_POST['email'];

		$sql = 'update user set name=:name, company=:company, language=:language, email=:email  where id=:id';
		$query = $con->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->bindParam(':name', $name, PDO::PARAM_STR);
		$query->bindParam(':company', $company, PDO::PARAM_STR);
		$query->bindParam(':language', $language, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();

		header('location: ../index.php');
	}

	$id = $_GET['id'];
	$sql = 'select * from user where id=:id';
	$query = $con->prepare($sql);
	$query->bindParam(':id', $id, PDO::PARAM_INT);
	$query->execute();

	if($query->rowCount()>0){
		$results = $query->fetchAll(PDO::FETCH_OBJ);

		foreach ($results as $row) {
		
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container mt-5">
		<h1 class="h1 text-center">Edit profile</h1>
		<hr>
		<div class="row justify-content-center">
			<div class="col-md-6">
				
				<form method="post" class="form-group">	
					<div class="form-group row">
						<input type="hidden" name="id" value="<?php echo $row->id?>">
						<label for='name' class="col-sm-2">Name</label>
					    <div class="col-sm-10">
						    <input class="form-control form-control-sm" type="text" name='name' value="<?php echo $row->name?>">
					    </div>
					</div>				
					<div class="form-group row">
						<label class="col-sm-2" for='company'>Company</label>
					    <div class="col-sm-10">
						    <input class="form-control form-control-sm" type="text" name='company' value="<?php echo $row->company?>">
					    </div>
					</div>				
					<div class="form-group row">
						<label class="col-sm-2" for='language'>Language</label>
					    <div class="col-sm-10">
						    <input class="form-control form-control-sm" type="text" name='language' value="<?php echo $row->language?>">
					    </div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2" for='email'>Email</label>
					    <div class="col-sm-10">
						    <input class="form-control form-control-sm" type="email" name='email' value="<?php echo $row->email?>">
					    </div>
					</div>
					<input class="form-control form-control-sm btn btn-sm btn-success btn-block" type="submit" value="Atualizar" name="update">					
					<?php
							# code...
						}
					}

					?>
				</form>
				<a class="form-control form-control-sm btn btn-sm btn-primary btn-block" href="../index.php"><<-Back</a>
			</div>

		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>