<?php
	
	$mysqllink = mysqli_connect("localhost", "root", "", "universidademais");
	
	if (mysqli_connect_errno()) {
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysqli_query($mysqllink, "SET NAMES 'utf8'");
	mysqli_query($mysqllink, 'SET character_set_connection=utf8');
	mysqli_query($mysqllink, 'SET character_set_client=utf8');
	mysqli_query($mysqllink, 'SET character_set_results=utf8');
	
	if(isset($_POST['action'])){
		if($_POST['action'] == 'comment'){
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
		}

		else if (($_POST['action'] == 'subcomment')){
			$flag = FALSE;
			if (isset($_POST['comment'])) {
				$comment = $_POST['comment'];
			    if ($comment != "") {
			    	$flag = TRUE;
			    	if (isset($_POST['commentId'])) {
						$commentId = $_POST['commentId'];
					}
					else{
						header('Location:i.php');
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
				$query = mysqli_query($mysqllink, "INSERT INTO subcomments (commentId, name, comment) VALUES ('$commentId', '$name','$comment');");
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

		}
	}
?>

