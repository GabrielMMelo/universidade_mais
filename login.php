<!DOCTYPE html>
<html>
<head>
	<?php

		$mysqllink = mysqli_connect("localhost", "root", "", "universidademais");
		
		if (mysqli_connect_errno()) {
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		mysqli_query($mysqllink, "SET NAMES 'utf8'");
		mysqli_query($mysqllink, 'SET character_set_connection=utf8');
		mysqli_query($mysqllink, 'SET character_set_client=utf8');
		mysqli_query($mysqllink, 'SET character_set_results=utf8');

	?>

	<title> LOGIN </title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="node_modules/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/style.css">
	<link rel="stylesheet" type="text/css" href="teste.css">
	<link rel="stylesheet" type="text/css" href="prism.css">
	<link rel="shortcut icon" href="img/icon.ico">
</head>
<body>

	<div class="container">

		<div class="card mt-5 card_md" style="width: 30rem;" >
			
			<div class="card-title"> 

				<h1 class="display-2 text-center">LOGIN</h1>
				<br>

			</div>

			<div class="card-block ml-5">
				<form action="" method="post">
					<label class="lead">Author</label>
					<br>
					<input type="text" name="name">
					<br>
					<br>
					<label class="lead">Password</label>
					<br>
					<input type="password" name="pass">
					<br>
					<br>
					<div class=" ml-5">
					<input type="hidden" name="action" value="login">
					<input type="submit" name="submit" value="Submit">
					</div>
				</form>
			</div>

		</div>
	</div>

	<?php
		if (isset($_POST['action'])) {
			if ($_POST['action'] == 'login') {	
				$name = $_POST['name'];
				$pass = $_POST['pass'];
				
				$query = mysqli_query($mysqllink, "SELECT * FROM authors WHERE name = '$name' and pass = MD5('$pass');");

				$line = mysqli_fetch_assoc($query);

				

				if(empty($line)) {

					echo '<script> alert("SENHA INCORRETA") </script>';

				}

				else {
					echo '<script> alert(" name") </script>';					
					session_start(['cookie_lifetime' => 10,]);
					if(session_id()) {
						$_SESSION['name'] = $name;
						$_SESSION['pass'] = $pass;	
					}
					
					header('location:menu.php');
				}
			}			
		}

	?>
</body>
</html>