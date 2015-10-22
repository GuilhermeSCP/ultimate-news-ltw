<?php

	session_start();

	$mail=$_POST["mail"];
	$pass=$_POST["pass"];

	$db = new PDO('sqlite:database.db');
	$result = $db->query('SELECT * FROM utilizadores');
		
	foreach($result as $row)
	{
		if($row['email']==$mail && $row['pass']==$pass)
		{
			$_SESSION['mail']=$mail;
			$_SESSION['nome']=$row['nome'];
			$_SESSION['permissao']=$row['tipo'];
			header("Location: login_sucesso.php");
			exit();
		}
		else
		{
			header("Location: login_falhou.php");
		}
	}

?>