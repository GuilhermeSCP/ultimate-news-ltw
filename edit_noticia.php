<?php

	session_start();
	
	$TIT = utf8_encode($_POST['not_tit']);
	$INTRO = utf8_encode($_POST['not_intro']);
	$CONT = utf8_encode($_POST['not_cont']);
	$FONTE = utf8_encode($_POST['not_fonte']);
	$TAGS = utf8_encode($_POST['not_tags']);
	$STRTAGS = explode(" ",$TAGS);
	$id = utf8_encode($_POST['id']);
	
	$db = new PDO('sqlite:database.db');
	
	$query = "UPDATE noticias SET titulo='$TIT', introducao='$INTRO', conteudo='$CONT', tags='$STRTAGS', url='$FONTE' WHERE id='$id';"
	$db->exec($query);
	
	header( 'Location: noticia.php?id='. $id);
	
?>