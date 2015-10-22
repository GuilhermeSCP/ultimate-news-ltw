<?php

	$mail=$_POST["mail"];
	$nome=$_POST["nome"];
	$pass=$_POST["pass"];
	$pass2=$_POST["pass2"];


	$db = new PDO('sqlite:database.db');
	$result = $db->query('SELECT * FROM utilizadores');
	foreach($result as $row)
	{
		if($row['email']==$mail)
		{
			header("Location: registo_falhou_mail.php");			
		}
	}
	$bh = new PDO('sqlite:database.db');
	$q= "INSERT INTO utilizadores (nome, pass, email, tipo) VALUES ('$nome', '$pass', '$mail',0);";
	$bh->exec($q);
	header("Location: registado_sucesso.php");
?>