<?php

$name = filter_input(INPUT_GET, "name");
$content = filter_input(INPUT_GET, "content");

$link = mysqli_connect("localhost", "root", "", "universidademais");

if ($link) {
	$query = mysqli_query($link, "INSERT INTO post (name, content) VALUES ('$name','$content');");
	if($query) {
		header("Location: CRUD2.php");
	}
	else {

		die("ERRO: ". mysqli_error($link));
	}	
}

else{
	die("ERRO: ". mysqli_error($link));
}




