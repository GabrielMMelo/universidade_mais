<?php
	
	$flag = FALSE;

	if (isset($_POST['name'])) {

		$name = strip_tags(trim($_POST['name']));

	
		if (isset($_POST['content'])) {

			$content = $_POST['content'];	

				

			if (isset($_POST['author'])) {

				$author = strip_tags(trim($_POST['author']));

				if (isset($_POST['img'])) {

					$img = strip_tags(trim($_POST['img']));
					$flag = TRUE;

				}

				else {
					echo '<script> alert("DEU MERDA NA IMG")</script>';
				}

			}

			else {
				echo '<script> alert("DEU MERDA NO AUTHOR")</script>';
			}

		}

		else {
				echo '<script> alert("DEU MERDA NO CONTENT")</script>';
		}

	}

	else {
				echo '<script> alert("DEU MERDA NO NAME")</script>';
	}


	if ($flag) {
		$mysqllink = mysqli_connect("localhost", "root", "", "universidademais");

		if (mysqli_connect_errno()) {
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  	}

	  	mysqli_query($mysqllink, "SET NAMES 'utf8'");
		mysqli_query($mysqllink, 'SET character_set_connection=utf8');
		mysqli_query($mysqllink, 'SET character_set_client=utf8');
		mysqli_query($mysqllink, 'SET character_set_results=utf8');

		$query = mysqli_query($mysqllink, "INSERT INTO post (name, content, author, img) VALUES ('$name','$content','$author', '$img');");

		if($query){
			header('location:new.html');
		}

	}

	else {

		echo '<script>alert("DEU MERDA PRA CARALHO")</script>';

	}
?>