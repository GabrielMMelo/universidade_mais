<html>
<head>
	<?php
		if (isset($_POST['action'])) {			
			if ($_POST['action'] == 'logout') {
				session_start();
				unset($_SESSION['name'], $_SESSION['pass']);
			}
		}

		session_start(['cookie_lifetime' => 120,]);
		if (!isset($_SESSION['name']) OR !isset($_SESSION['pass'])) {
		    unset($_SESSION['name'], $_SESSION['pass']);
			header("Location:login.php");

		}

	?>

	<title>VIEW POSTS</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="node_modules/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/style.css">
	<link rel="stylesheet" type="text/css" href="teste.css">
	<link rel="stylesheet" type="text/css" href="prism.css">
	<link rel="shortcut icon" href="img/icon.ico">

</head>
<body>
	<div class="container justify-content-center">
		<div class="row text-right mt-3">
			<div class="col-8 text-left">
				<span class="lead">Usuário:</span><span class="lead"><b><i><?php echo $_SESSION['name']?></i></b></span>
			</div>
			<div class="col-4">
				<form action="" method="post">
						<input type="hidden" name="action" value="logout">
						<input class="btn btn-danger" type="submit" name="submit" value="Logout">
				</form>
			</div>
		</div>
	</div>

<table cellpadding="5" cellspacing="5" width="40%" border="2 pt">
<tr>
	
	<td><b>Name</b></td>
	<td><b>Author</b></td>
	<td><b>Content</b></td>
	<td><b>Main Image</b></td>
	<td><b>Date</b></td>
	<td><b>EDIT</b></td>
	<td><b>DELETE</b></td>

</tr>

<?php 
	
	$mysqllink = mysqli_connect("localhost", "root", "", "universidademais");

	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

  	$post = mysqli_query($mysqllink,"SELECT * FROM post order by post_date desc");
  	$linha = mysqli_fetch_assoc($post);
	$total = mysqli_num_rows($post);
	if ($total){
		do{
?>

<tr bgcolor="#F6F6F6">
	
	<td><b><?php echo $linha['name'] ?></b></td>
	<td><b><?php echo $linha['author'] ?></b></td>
	<td><b><?php echo $linha['content'] ?></b></td>
	<td><b><?php echo $linha['img'] ?></b></td>
	<td><b><?php echo $linha['post_date'] ?></b></td>
	<td class="text-center"><b><a href="edit.php?id=<?php echo $linha['id'];?>"><span class="fa fa-edit text-success"></span></a></b></td>
	<td class="text-center"><b><a href="?delete=true&id=<?php echo $linha['id'];?>"><span class="fa fa-trash text-danger"></span></a></b></td>
	
</tr>

	<?php 

		} while($linha = mysqli_fetch_assoc($post));

		mysqli_free_result($post);
	}
	

	?>
</table>

<?php 

	if (isset($_GET['delete'])) {

		if ($_GET['delete'] == "true") {

			$id = $_GET['id'];
			$file_name = 'D:/wamp64/tmp/'.$id.'.sql';
			echo $file_name;
			$query1 = mysqli_query($mysqllink,"SELECT * INTO OUTFILE '$file_name' FROM post;");
			$query2 = mysqli_query($mysqllink, "DELETE FROM post WHERE id = '$id';");
			mysqli_close($mysqllink);
			if ($query2){
				echo '<script> location.href="view.php" </script>';
			}
		}
	
	}	

?>


</body>
</html>