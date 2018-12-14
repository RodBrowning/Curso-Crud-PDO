<?php

	define('host','sql212.epizy.com');
	define('dbname','epiz_23151776_crudpdo');
	define('username','epiz_23151776');
	define('password','drRymgcEU');
	try{
		$con = new PDO("mysql:host=".host.";dbname=".dbname, username, password);
	}catch(PDOException $e){
		exit("Error: ".$e->getMessage());
	}
	
?>