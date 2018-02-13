<?php
	function new_comment($postId, $mysqllink, $array){
		$comment = "";
		$flag = FALSE;
		for ($i = 1; $i <count($array)+1; $i++) {
			$comment = filter_input(INPUT_GET, "comment".$i);
			if ($comment != "") {
				$flag = TRUE;
				break;
			}
		}

		if($flag){
			$name = filter_input(INPUT_GET, "name".$i);
			if ($name == ""){
				$name = "Anônimo";
			}
			$comment = filter_input(INPUT_GET, "comment".$i);
			//$index = substr("name2", strlen("name2") - 1, 1);
			
			$postId = $array[$i-1];
			echo $postId;

			//$mysqllink = mysqli_connect("localhost", "root", "", "universidademais");

			if ($mysqllink) {
			$query = mysqli_query($mysqllink, "INSERT INTO comments (postId, name, comment) VALUES ('$postId', '$name','$comment');");
			if($query) {
				location('index.php');
			}
			else {
				die("ERRO: ". mysqli_error($mysqllink));
			}	
			}

			else{
				die("ERRO: ". mysqli_error($link));
			}
		}
	}
?>

