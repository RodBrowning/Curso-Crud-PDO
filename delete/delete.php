<?php
	
	include('../conexao.php');
	$id = $_GET['id'];
	if(!isset($id)){
		echo 'Erro';
	}else{
		
		$sql = 'delete from user where id=:id';
		$query = $con->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->execute();

		header('Location: ../index.php');
	}
?>