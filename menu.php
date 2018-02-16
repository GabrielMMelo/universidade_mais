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
	<title>MENU</title>
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

		<h1 class="display-2 text-center">MENU</h1>
			<h4 class="text-muted text-center"> Universidade+ </h4>
			
			<div class="row">
				
				<div class="col-6">
					
					<div class="card mt-5 text-center">
						<h2 class="display-4"> View all posts </h2>	
						<hr>
						<div class="card-block mb-3">

							<a class="btn btn-success btn-lg" href="view.php"> VIEW </a>

						</div>

					</div>

				</div>

				<div class="col-6">
					
					<div class="card mt-5 text-center">
						<h2 class="display-4"> Add a new post </h2>	
						<hr>
						<div class="card-block mb-3">

							<a class="btn btn-success btn-lg" href="new.php"> ADD </a>

						</div>

					</div>

				</div>

			</div>

	</div>

<script src="node_modules/jquery/dist/jquery.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
<script src="tinymce/mytinymce.js"></script>
<script src="prism.js"></script>
</body>
</html>