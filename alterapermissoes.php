<?php

	session_start();

	
	$id = $_POST['id'];
	$opcao = $_POST['tipo'];
	$db = new PDO('sqlite:database.db');
	
	$query= "UPDATE utilizadores SET tipo='$opcao' WHERE id='$id'";
	$db->exec($query);
	
	header("Location: admin.php");

?>