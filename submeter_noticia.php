<?php

	session_start();
	
	$TIT = utf8_encode($_POST['not_tit']);
	$AUTOR = utf8_encode($_SESSION['nome']);
	$INTRO = utf8_encode($_POST['not_intro']);
	$CONT = utf8_encode($_POST['not_cont']);
	$FONTE = utf8_encode($_POST['not_fonte']);
	$TAGS = utf8_encode($_POST['not_tags']);
	$STRTAGS = explode(" ",$TAGS);
	setlocale(LC_ALL, 'Portuguese_Portugal.1252');
	$DATA = date("Y-m-d\TG:i:s");
	
	$db = new PDO('sqlite:database.db');
	
	$query= "INSERT INTO noticias (data, autor, titulo, introducao, conteudo, tags, url) VALUES ('$DATA','$AUTOR','$TIT','$INTRO','$CONT','$STRTAGS','$FONTE');";
	$db->exec($query);
	
	header( 'Location: home.php ');
	
?>