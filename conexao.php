<?php
	
	define('host','localhost');
	define('dbname','pdo');
	define('username','root');
	define('password','');
	
	try{
		$con = new PDO("mysql:host=".host.";dbname=".dbname, username, password);
	}catch(PDOException $e){
		exit("Error: ".$e->getMessage());
	}
	
?>