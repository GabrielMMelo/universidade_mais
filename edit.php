<html>
<head>
	<?php

	$mysqllink = mysqli_connect("localhost", "root", "", "universidademais");

	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

  	if (isset($_GET['id'])) {
  		$id = (int)$_GET['id'];
  		$post = mysqli_query($mysqllink, "SELECT * FROM post WHERE id = '$id';");
  		$linha = mysqli_fetch_array($post);
  	}
  	?>
	<title><?php echo $linha['name']?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="node_modules/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/style.css">
	<link rel="stylesheet" type="text/css" href="teste.css">
	<link rel="stylesheet" type="text/css" href="prism.css">
	<link rel="shortcut icon" href="img/icon.ico">
</head>
<body>
	<div class="container" id="conteudo">

		<h1 class="display-2 text-center">EDIT POST</h1>
		<h4 class="text-muted text-center"> Universidade+ </h4>
		<form action="" method="post" enctype="multipart/form-data">

			<label class="lead">Title:</label>
			<br>
			<input type="text" name="name" value="<?php echo $linha['name']; ?>">
			<br>
			<br>
			<!-- IMPLEMENTAR TELA DE LOGIN COM CADASTROS PARA JA FAZER REFERENCIA A UM AUTHOR -->
			<label class="lead">Author:</label>
			<br>
			<input type="text" name="author" value="<?php echo $linha['author']; ?>">
			<br>
			<br>
			<label class="lead">Main image path:</label>
			<br>
			<input type="text" name="img" value="<?php echo $linha['img'];?>">
			<br>
			<br>
			<label class="lead">Content:</label><br>
			<textarea id="textarea" type="text" name="content"> <?php echo $linha['content'];?></textarea>
			<br>
			<input type="hidden" name="action" value="edit">
			<div class="text-center">
				<input class="btn btn-lg mt-4 " type="submit" value="EDIT">
			</div>	
		</form>
	</div>

	<?php

		if (isset($_POST['action'])){

			if ($_POST['action'] == "edit"){

				$name = strip_tags(trim($_POST['name']));
				$content = $_POST['content'];
				$author = strip_tags(trim($_POST['author']));	
				$img = strip_tags(trim($_POST['img']));
				$query = mysqli_query($mysqllink, "UPDATE post SET name = '$name', content = '$content', author = '$author', img = '$img' WHERE id = '$id';");
				if ($query){
					echo '<script> location.href="view.php" </script>';
				}

			}
		}

	?>

<script src="node_modules/jquery/dist/jquery.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
<script src="tinymce/mytinymce.js"></script>
<script src="prism.js"></script>

</body>
</html>