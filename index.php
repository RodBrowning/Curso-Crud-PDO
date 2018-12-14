<?php

	include('conexao.php');



	if(isset($_POST['insert'])){

		$name = $_POST['name'];
		$company= $_POST['company'];
		$language= $_POST['language'];
		$email = $_POST['email'];

		$sql = 'insert into user (name, company, language, email) values(:name, :company, :language, :email)';

		$query2 = $con->prepare($sql);
		$query2->bindParam(':name', $name, PDO::PARAM_STR);
		$query2->bindParam(':company', $company, PDO::PARAM_STR);
		$query2->bindParam(':language', $language, PDO::PARAM_STR);
		$query2->bindParam(':email', $email, PDO::PARAM_STR);

		$query2->execute();
	}
	
	$sql= 'select * from user';
	$query = $con->prepare($sql);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);

	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Crud PDO</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container mt-5">
		<h1 class="h1 text-center">Profiles</h1>
		<hr>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<button class="form-control-sm btn btn-sm btn-info btn-block mb-3" type="button" data-toggle="collapse" data-target="#formCad">Fomulario de Cadastro</button>
				<div class="collapse mb-3" id="formCad">
					<form method="post" >	
						<div class="form-group row">						
							<label class="col-sm-2" for='name'>Name</label>
						    <div class="col-sm-10">						    
							    <input class="form-control form-control-sm" type="text" name='name'>
						    </div>
						</div>			
						<div class="form-group row">						
							<label class="col-sm-2" for='company'>Company</label>
						    <div class="col-sm-10">						    
							    <input class="form-control form-control-sm" type="text" name='company'>
						    </div>
						</div>			
						<div class="form-group row">						
							<label class="col-sm-2" for='language'>Language</label>
						    <div class="col-sm-10">						    
							    <input class="form-control form-control-sm" type="text" name='language'>
						    </div>
						</div>			
						<div class="form-group row">						
							<label class="col-sm-2" for='email'>Email</label>
						    <div class="col-sm-10">						    
							    <input class="form-control form-control-sm" type="email" name='email'>
						    </div>
						</div>			
						<input class="form-control form-control-sm btn-sm btn btn-info btn-block" type="submit" value="Criar" name="insert">
					</form>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-10 col-sm-12 table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Nome</th>
							<th>Company</th>					
							<th></th>							
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>			
						<?php
							$rowNum = 1;
							if($query->rowCount() >0){
								foreach ($results as $row) {
						?>
						<tr>
							<td><?php echo $rowNum?></td>
							<td><?php echo $row->name?></td>
							<td><?php echo $row->company?></td>
							<td><a class="form-control form-control-sm btn-sm btn btn-info" href="/profile.php?id=<?php echo $row->id?>">More</a></td>
							<td><a class="form-control form-control-sm btn-sm btn btn-primary" href="/edit/edit.php?id=<?php echo $row->id?>">Edit</a></td>
							<td>
								<form action="/delete/delete.php?id=<?php echo $row->id?>" method="post">
									<button type="submit" class="form-control form-control-sm btn-sm btn btn-danger"  href="/delete/delete.php?id=<?php echo $row->id?>" onclick="return confirm('Deletar?')">Delete</button>
								</form>								
							</td>
						</tr>
						<?php 
						$rowNum++;	}
						}			
						?>			
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>