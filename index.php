<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<style type="text/css">
		#sortable { list-style-type: none; margin: 0; padding: ; width: 170px; }
  		#sortable li { background-color:#f0f0f0 ; margin: 0 3px 3px 3px; padding:10px; padding-left: 1.5em; font-size: 1.4em; height: 18px; border:1px dashed black;}
  		#sortable li span { position: absolute; margin-left: -1.3em; }
	</style>
	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $(document).ready(function(){
  	$( "#sortable" ).sortable();
  	$("#sortable").on("sortupdate",function(event,ui){
  		var data = $(this).sortable('serialize');
  		$.post('sort.php',{data:data},function(responsive){
  			alert(responsive);
  		});
  	});
  });
  </script>
</head>
<body>
	<?php
	$db = new pdo("mysql:host=localhost;dbname=sortable;charset=utf8","root","");
		$rows =$db->query("SELECT * FROM item ORDER BY rank ASC", PDO::FETCH_ASSOC);
	?>
<ul id="sortable">
	<?php foreach ($rows as $row ) {
	?>
	<li id="rank-<?php echo($row['ID']) ?>"><span><?php echo($row['title']) ?></span></li>

	<?php 
	} ?>
	
	
</ul>
</body>
</html> 