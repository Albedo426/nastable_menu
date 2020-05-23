<?php
	$db = new pdo("mysql:host=localhost;dbname=sortable;charset=utf8","root","");
		$data = $_POST["data"];
		parse_str($data,$sirala);
		
		$rank=$sirala["rank"];
		foreach ($rank as $key => $id ) {
			$query=$db->prepare("UPDATE item SET rank=:rank where id=:id");
			$update = $query->execute(array(
			     "rank" =>$key ,
			     "id" =>  $id 
			));
		}
	?>