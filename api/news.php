<?php

	header('Content-Type:application/json');
	
	$DATE_INI = $_GET['start_date'];
	$DATE_END = $_GET['end_date'];
	$TAGS = $_GET['tags'];

	$json = array("result"=>"success","server_name"=>"Ultimate News","data"=>array());

	/*$tags_array = explode(" ",$TAGS);*/

	$db = new PDO('sqlite:../database.db');
	$query = "SELECT * FROM noticias;";
	$result = $db->query($query);

		foreach($result as $row)
		{
			if(strcmp($row['data'],$DATE_INI)>=0 && strcmp($row['data'],$DATE_END)<=0)
				$json['data'][]=array("id"=>$row['id'],"title"=>utf8_decode($row['titulo']),"date"=>$row['data'],"text"=>utf8_decode($row['conteudo']),"posted_by"=>utf8_decode($row['autor']),"url"=>"http://gnomo.fe.up.pt/~ei10105/Trabalho/noticia.php?id=".$row['id']);
					
		}
		echo json_encode($json);

?>