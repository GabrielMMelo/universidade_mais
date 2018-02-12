<html>
<head>
	<title>Teste</title>
	<meta charset="utf-8">
	<?php
	$parametro = filter_input(INPUT_GET, "parametro");
	$mysqllink = mysqli_connect("localhost", "root", "", "universidademais");

	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

	if ($parametro){
		$dados = mysqli_query($mysqllink,"SELECT * FROM post where name like '%$parametro%' order by name desc");
		$imgs = mysqli_query($mysqllink,"SELECT src
										FROM images AS I, post AS P
										WHERE I.postId = (SELECT P.id
				  										  FROM post AS P
				  										  WHERE p.name LIKE '%parametro%' order by name desc);");
	}

	else{
		$dados = mysqli_query($mysqllink,"SELECT * FROM post order by post_date desc");
		$imgs = mysqli_query($mysqllink,"SELECT src
										FROM images AS I, post AS P
										WHERE I.postId = (SELECT P.id
				  						FROM post AS P
				  						WHERE p.name LIKE '%' order by name desc);");
	}

	$linha = mysqli_fetch_assoc($dados);
	//$linhaImages = mysqli_fetch_assoc($imgs);
	$total = mysqli_num_rows($dados);
	//$totalImages = mysqli_num_rows($imgs);

	?>
</head>
<body>

	<div>
		<h1>TESTE LOCO</h1>
		<p>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>">
				<input type="text" name="parametro">
				<input type="submit" value="Buscar">
			</form>
		</p>

		<p>
			
			<a href="new_post.html">NEW POST</a>

		</p>

		<table border="1">
			
			<tr>
				<td>ID</td>
				<td>NAME</td>
				<td>CONTENT</td>
			</tr>

			<?php

			if($total) {
				do{
			?>

			<tr>
				<td><?php echo $linha['id']?></td>
				<td><?php echo $linha['name']?></td>
				<td><?php echo $linha['content']?></td>
			<?php 
			if ($totalImages){
			?>
			</tr>
		

			<tr>
				<td><?php echo $linhaImages['src']?></td>
			</tr>
		</table>
			<?php
		}
		} while($linha = mysqli_fetch_assoc($dados));

		mysqli_free_result($dados);}

		mysqli_close($mysqllink);
		?>
			


	</div>

</body>
</html>