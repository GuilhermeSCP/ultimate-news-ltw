<?php
	header('Content-Type:application/json');

	$string = utf8_encode($_POST['pesquisa']);
	
	
	$db = new PDO('sqlite:database.db');
	$result = $db->query('SELECT * FROM noticias WHERE titulo like "%'.$string.'%" OR introducao like "%'.$string.'%" OR autor like "%'.$string.'%" OR conteudo like "%'.$string.'%";')->fetchall();
	$json = array("size"=>count($result),"data"=>array());
	foreach($result as $row){
	$json['data'][]=array("id"=>$row['id'],"titulo"=>$row['titulo'],"intro"=>$row['introducao']);
	}
	echo json_encode($json);

?>