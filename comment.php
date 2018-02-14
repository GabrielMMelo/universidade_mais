<?php
	
	$mysqllink = mysqli_connect("localhost", "root", "", "universidademais");

	$flag = FALSE;
	if (isset($_POST['comment'])) {
		$comment = $_POST['comment'];
	    if ($comment != "") {
	    	$flag = TRUE;
	    	if (isset($_POST['postId'])) {
				$postId = $_POST['postId'];
			}
			if (isset($_POST['name'])) {
				$name = $_POST['name'];
			}
	    }
	}
	

	if($flag){
		
		
		if ($name == ""){
			$name = "Anônimo";
		}
		
		if ($mysqllink) {
		$query = mysqli_query($mysqllink, "INSERT INTO comments (postId, name, comment) VALUES ('$postId', '$name','$comment');");
			if($query) {
				header('Location:index.php');
			}
			else {
				die("ERRO: ". mysqli_error($mysqllink));
			}	
		}

		else{
			die("ERRO: ". mysqli_error($mysqllink));
		}
	}

	else{
		header('Location:index.php');
	}
?>

