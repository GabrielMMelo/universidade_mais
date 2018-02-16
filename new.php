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
	<title>New post</title>
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
	<div class="container" id="conteudo">

		<h1 class="display-2 text-center">NEW POST</h1>
			<h4 class="text-muted text-center"> Universidade+ </h4>
		
			<form action="submit.php" method="post" enctype="multipart/form-data">

				<label class="lead">Title:</label>
				<br>
				<input type="text" name="name">
				<br>
				<br>
				<!-- IMPLEMENTAR TELA DE LOGIN COM CADASTROS PARA JA FAZER REFERENCIA A UM AUTHOR -->
				<label class="lead">Author:</label>
				<br>
				<input type="text" name="author">
				<br>
				<br>
				<label class="lead">Main image path:</label>
				<br>
				<input type="text" name="img">
				<br>
				<br>
				<label class="lead">Content:</label><br>
				<textarea id="textarea" type="text" name="content" ></textarea>
				<br>
				<div class="text-center">
					<input class="btn btn-lg mt-4 " type="submit" value="SUBMIT">
				</div>	
			</form>

	</div>

<script src="node_modules/jquery/dist/jquery.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
<script src="tinymce/mytinymce.js"></script>
<script src="prism.js"></script>
</body>
</html>