<?php
	header('Content-Type:application/json');

	session_start();
	
	$AUTOR = utf8_encode($_SESSION['nome']);
	$COMENT = utf8_encode($_POST['text']);
	$ID_NOTICIA = $_POST['id'];
	setlocale(LC_ALL, 'Portuguese_Portugal.1252');
	$DATA = date("Y-m-d\TG:i:s");
	
	$db = new PDO('sqlite:database.db');
	
	$query= "INSERT INTO comentarios (id_noticia,autor,data,texto) VALUES ('$ID_NOTICIA','$AUTOR','$DATA','$COMENT');";
	$db->exec($query);

	$return = array("id"=>$ID_NOTICIA,"autor"=>$AUTOR,"data"=>$DATA,"coment"=>$COMENT);
	echo json_encode($return);
	
?>
