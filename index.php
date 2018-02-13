<!DOCTYPE html>
<html>
<head>
	<!--
		c:\Ruby24-x64\bin\setrbvars.cmd
		sass --watch ./bootstrap/scss:./bootstrap/compiler/ ./font-awesome/scss:./font-awesome/css
	-->
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="node_modules/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/style.css">
	<link rel="stylesheet" type="text/css" href="teste.css">
	<link rel="shortcut icon" href="img/icon.ico">
	<title>UniMais</title>
	
	<?php
		include "comment.php";

		$parametro = filter_input(INPUT_GET, "search");
		$mysqllink = mysqli_connect("localhost", "root", "", "universidademais");
		
		if (mysqli_connect_errno()) {
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  	}

		if ($parametro){
			$dados = mysqli_query($mysqllink,"SELECT * FROM post where name like '%$parametro%' order by name desc");
			/*$imgs = mysqli_query($mysqllink,"SELECT src
											FROM images AS I, post AS P
											WHERE I.postId = (SELECT P.id
					  										  FROM post AS P
					  										  WHERE p.name LIKE '%parametro%' order by name desc);");*/
		}

		else{
			$dados = mysqli_query($mysqllink,"SELECT * FROM post order by post_date desc");
			/*$imgs = mysqli_query($mysqllink,"SELECT src
											FROM images AS I, post AS P
											WHERE I.postId = (SELECT P.id
					  						FROM post AS P
					  						WHERE p.name LIKE '%' order by name desc);");*/
		}

		$linha = mysqli_fetch_assoc($dados);
		//$linhaImages = mysqli_fetch_assoc($imgs);
		$total = mysqli_num_rows($dados);
		//$totalImages = mysqli_num_rows($imgs);
	?>

</head>
<body>

<!--       ############## NAVBAR ############### 		-->

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

		<a class="collapse navbar-collapse ml-sm-0 ml-lg-5 my-4 text-sm-center" id="navbarImg" href="#"><img  src="img/logo_nav.png" height="80em"></a>

		<div class="container">

			<a class="navbar-brand h1 ml-sm-0 ml-lg-5 mr-lg-5" href="#"> INÍCIO </a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite,#navbarImg">

				<span class="navbar-toggler-icon"></span>	

			</button>

			<div class="collapse navbar-collapse" id="navbarSite">

				<ul class="navbar-nav mr-auto">

					<!--<li class="nav-item dropdown mr-2">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Cursos</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">Eletrônica</a>
							<a class="dropdown-item" href="#">Desenvolvimento Mobile</a>
							<a class="dropdown-item" href="#">Linguagens</a>
							<a class="dropdown-item" href="#">Ferramentas</a>
						</div>
					</li> -->

					<li class="nav-item mr-5">
						<a class="nav-link" href="equipe.html">EQUIPE</a>
					</li>

					<li class="nav-item mr-5">
						<a class="nav-link" href="equipe.html">SEJA UM CONTRIBUIDOR</a>
					</li>

					<li class="nav-item mr-5">
						<a class="nav-link" href="contato.html">CONTATO</a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item">
						<span><a href="#" class="nav-link btn text-light mr-5" data-toggle="modal" data-target="#modalTrain"> <i class="fa fa-search" style="font-size: 2rem"></i> </a></span>
					</li>
				</ul>
				<!--
				<ul class="navbar-nav ml-auto">
					<form class="form-inline justify-content-sm-center">
						<input type="search" class="form-control mr-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Pesquisar...">
						<button class="btn btn-light" type="Submit"> 	<img src="img/lupa.svg" height="15rem">
						</button>
					</form>
				</ul>
				-->
			</div>
		</div>
	</nav>

<!--       ############## CAROUSEL ############### 		-->

	<div id="carouselId" class="carousel slide" data-ride="carousel">
		
		<ol class="carousel-indicators">

			<li class="active" data-target="#carouselId" data-slide-to="0"></li>
			<li data-target="#carouselId" data-slide-to="1"></li>
			<li data-target="#carouselId" data-slide-to="2"></li>
			
		</ol>

		<div class="carousel-inner" >
			
			<div class="carousel-item active">
				
				<img class="img-fluid d-block" src="img/logo_carrousel.jpg">
				<!--
				<div class="carousel-caption d-none d-lg-block text-dark">
					
					<h1>Primeiro slide</h1>
					<p class="lead"> Este é o primeiro slide do site do EMakers</p>

				</div>
				-->
			</div>

			<div class="carousel-item">

				<img class="img-fluid d-block" src="img/logo_carrousel.jpg">

				<!--
				<div class="carousel-caption d-none d-lg-block text-dark">
					
					<h1>Segundo slide</h1>
					<p class="lead"> Este é o segundo slide do site do EMakers</p>

				</div>
				-->
			</div>

			<div class="carousel-item">

				<img class="img-fluid d-block" src="img/logo_carrousel.jpg">

				<!--

				<div class="carousel-caption d-none d-lg-block text-dark">
					
					<h1>Terceiro slide</h1>
					<p class="lead"> Este é o terceiro slide do site do EMakers</p>

				</div>
				
				-->

			</div>
		</div>

		<a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">

			<span class="carousel-control-prev-icon"></span>
			<span class="sr-only">Anterior</span>
			
		</a>

		<a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">

			<span class="carousel-control-next-icon"></span>
			<span class="sr-only">Próximo</span>
			
		</a>
	</div>


<!-- ########### SUB NAVBAR ########## -->
<nav class="navbar navbar-expand-lg navbar-light bg-white ">

		<div class="container">
			<div class="row text-center my-5 ml-5 justify-content-center">			
				
			<ul class="navbar-nav mr-auto">
				<div class="col-3">
				<li class="nav-item ml-lg-5 mr-lg-3 mr-sm-0 justify-content-sm-center text-dark">
					<a class="animate one nav-link  dropdown-toggle" href="#" data-toggle="dropdown" id="navLP"><span class="repeat">L</span><span class="repeat">I</span><span class="repeat">N</span><span class="repeat">G</span><span class="repeat">U</span><span class="repeat">A</span><span class="repeat">G</span><span class="repeat">E</span ><span class="repeat">N</span><span class="repeat">S</span>
          
        </a>
					<div class="dropdown-menu rounded">
						<a class="dropdown-item" href="#">Python</a>
						<a class="dropdown-item" href="#">C++</a>
						<a class="dropdown-item" href="#">VBA</a>
						<a class="dropdown-item" href="#">Javascript</a>
					</div>
				</li>

				</div>

				<div class="col-3">
				<li class="nav-item dropdown mr-3">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navMCU">MICROCONTROLADORES</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Arduino</a>
						<a class="dropdown-item" href="#">ESP8266</a>
						<a class="dropdown-item" href="#">PIC</a>
					</div>
				</li>

				</div>	
				<div class="col-3">
				<li class="nav-item mr-3">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navIC">INTELIGÊNCIA COMPUTACIONAL</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Redes Neurais Artificiais</a>
						<a class="dropdown-item" href="#">Fuzzy</a>
						<a class="dropdown-item" href="#">Algoritmos Genéticos</a>
					</div>
				</li>
				</div>
				<div class="col-3">
				<li class="nav-item mr-3">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navTOOLS">FERRAMENTAS</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Eletrônica</a>
						<a class="dropdown-item" href="#">Desenvolvimento Mobile</a>
						<a class="dropdown-item" href="#">Linguagens</a>
						<a class="dropdown-item" href="#">Ferramentas</a>
					</div>
				</li>


			</ul>
		</div>
	</div>
		</div>
	</nav>


<!--       ############## INICIO CONTEUDO ############### 		-->
<!-- <img class="img-fluid" src="img/bg_tools.png"> -->

	<div class="row">

		<div class="col-2 mt-5 ">

			<div class="col-12 semi_rounded bg-dark text-light ">
			

				<div class="ml-4">
					<a href="#" class="btn text-light">Oi</a>
					<br>
					<a href="#" class="btn text-light">Oi</a>
					<br>	

				</div>	

			</div>
			
			

		</div>

		<div class="col-9 ">
			<?php
			$count = 0;
			if($total) {
				do{
					$count = $count + 1;
					$n = 'name'.$count;
					$c = 'comment'.$count;
			?>
					 <!-- Title -->
          <h1 class="mt-4 text-center"><?php echo $linha['name']?></h1>

          <!-- Author -->
          <p class="lead">
            por
            <a href="#"><?php echo $linha['author']?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p><i>Postado em <?php echo $linha['post_date']; $postId = $linha['id']; $array[] = $postId;?></i></p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="img/post_example.jpg" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead"><?php echo $linha['content']?></p>

          <blockquote class="blockquote">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">Someone famous in
              <cite title="Source Title">Source Title</cite>
            </footer>
          </blockquote>

          <hr>

      	
        <div class="col-12">
          	
          
	          <!-- Comments Form -->
	          <div class="card my-4">
	            <h5 class="card-header bg_roxo text-light">Deixe um comentário:</h5>
	            <div class="card-body">
	            	<form action="<?php echo $_SERVER['PHP_SELF'];?>">
	                	<div class="form-group">
	                		<label>Nome:</label>
	                		<br>
	                		<input type="text" name="<?php echo $n ?>">
	                		<br>
	                		<br>
	                		<label>Comentário:</label>
	                		<br>
	                  		<textarea class="form-control" name="<?php echo $c ?>" rows="3"></textarea>
	                	</div>
	                	<button type="submit" class="btn btn-dark box_generic">Submit</button>
	        	    </form>
	    	    </div>
	        </div>
	    </div>
	    
		<?php
			$comments = mysqli_query($mysqllink,"SELECT * FROM comments where postId = '$postId' order by date desc");

			$linhaC = mysqli_fetch_assoc($comments);
			//$linhaImages = mysqli_fetch_assoc($imgs);
			$totalC = mysqli_num_rows($comments);
			if ($totalC){
				do{

		?>


	    	<div class="col-12">
          <!-- Single Comment -->
		          <div class="media mb-4">
		          	<?php

		          	$rand = rand(1,3);

		          	switch ($rand) {

		          		case 1:
		          	?>
		            <img class="d-flex mr-3 rounded-circle" src="img/user1.png" alt="">
		            <?php 
		            		break;

		            	case 2: 
		            ?>
		            <img class="d-flex mr-3 rounded-circle" src="img/user2.png" alt="">

		            <?php 
		            		break;

		            	case 3: 
		            ?>
		            <img class="d-flex mr-3 rounded-circle" src="img/user3	.png" alt="">
		            <?php 
		            		break;
		            }

		            ?>
		            <div class="media-body">
		              <h5 class="mt-0"><?php echo $linhaC['name'] ?></h5>
		              <p>
		              	<?php echo $linhaC['comment']; ?>
		              </p>
		            </div>
		          </div>
		        </div>

		<?php
				} while($linhaC = mysqli_fetch_assoc($comments));
			}
		} while($linha = mysqli_fetch_assoc($dados));
				new_comment($postId, $mysqllink, $array);
				mysqli_free_result($dados);}

				mysqli_close($mysqllink);
				echo "_FECHADO_";
			?>

		    </div>
        </div>

		</div>
		


	</div>


	<!-- ###################### FOOTER ######################## -->

	<div class="bg-dark text-light justify-content-center text-center">
		<div class="row">
			<div class="my-5 col-sm-12 text-center">
				<h2 class=" display-4 "> Onde estamos?</h2>
				<p class="lead"> Endereço, contato e redes!</p>
			</div>
		</div>
	
        <a class="animate one">
            <span class="repeat">c</span><span class="repeat">s</span><span class="repeat">s</span><span class="repeat">3</span> &nbsp;
            <span class="repeat">a</span><span class="repeat">n</span><span class="repeat">i</span><span class="repeat">m</span ><span class="repeat">a</span><span class="repeat">t</span><span class="repeat">i</span><span class="repeat">o</span><span class="repeat">n</span><span class="repeat">s</span>
          
        </a>

		<div class="row justify-content-center">
			<div class="col-sm-12 col-md-6 col-lg-6 text-light ">

				<div class=" mx-auto mb-5 rounded" id="googleMap" style="width:80%;height:400px;"></div>

			</div>

			<div class="row col-6  mt-lg-5 mt-md-3 mt-sm-0 ">
				
				<div class="col-4 col-sm-4">
					
					<a class="text-light" href="http://facebook.com/EMakersUFLA">
						
						<i class="fa fa-facebook-square fa-5x mr-3 mr-sm-3 mr-md-3 mr-lg-3" aria-hidden="true"></i>
					
					</a>

				</div>


				<div class=" col-4 col-sm-4">
					
					<a class="text-light" href="http://facebook.com/EMakersUFLA">
					
						<i class="fa fa-instagram fa-5x mr-4" aria-hidden="true"></i>
					
					</a>

				</div>

				<div class="col-4 col-sm-4">
					
					<a class="text-light" href="http://facebook.com/EMakersUFLA">

						<i class="fa fa-youtube-square fa-5x mr-5 mb-lg-5 mb-md-3 mb-sm-5" aria-hidden="true"></i>

					</a>

				</div>

				<div class="col-12 col-sm-12 ml-3">
					
					<p class="ml-5 ml-lg-0 ml-md-0 ml-sm-0 mr-0 mr-sm-5 mr-md-5 mr-lg-5 mt-sm-0 mt-md-0 mt-lg-0 mt-4 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

				</div>

			</div>



		</div>

	</div>


	<!-- ############## MODALS ################# -->

	<!-- ANDROID -->
	<div class="modal fade" id="modalAndroid" role="dialog">
		
		<div class="modal-dialog" role="document">

			<div class="modal-content">
				
				<div class="modal-header">
					
					<h5 class="modal-title"> Soluções mobile</h5>

					<button class="close" type="button" data-dismiss="modal">
						
						<span>&times;</span>

					</button>

				</div>

				<div class="modal-body">
					
					<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>

				</div>				

				<div class="modal-footer">
					<button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>


				</div>

			</div>
			


		</div>

	</div>


	<!-- IoT -->
	<div class="modal fade" id="modalIoT" role="dialog">
		
		<div class="modal-dialog" role="document">

			<div class="modal-content">
				
				<div class="modal-header">
					
					<h5 class="modal-title"> Soluções em IoT com microcomputadores e microcontroladores</h5>

					<button class="close" type="button" data-dismiss="modal">
						
						<span>&times;</span>

					</button>

				</div>

				<div class="modal-body">
					
					<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>

				</div>				

				<div class="modal-footer">
					<button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>


				</div>

			</div>
			


		</div>

	</div>

	<!-- IC -->
	<div class="modal fade" id="modalIC" role="dialog">
		
		<div class="modal-dialog" role="document">

			<div class="modal-content">
				
				<div class="modal-header">
					
					<h5 class="modal-title"> Soluções em inteligência computacional</h5>

					<button class="close" type="button" data-dismiss="modal">
						
						<span>&times;</span>

					</button>

				</div>

				<div class="modal-body">
					
					<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>

				</div>				

				<div class="modal-footer">
					<button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>


				</div>

			</div>
			


		</div>

	</div>


	<!-- Ferramentas -->
	<div class="modal fade" id="modalTools" role="dialog">
		
		<div class="modal-dialog" role="document">

			<div class="modal-content">
				
				<div class="modal-header">
					
					<h5 class="modal-title"> Consultoria em integração de ferramentas corporativas</h5>

					<button class="close" type="button" data-dismiss="modal">
						
						<span>&times;</span>

					</button>

				</div>

				<div class="modal-body">
					
					<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>

				</div>				

				<div class="modal-footer">
					<button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>


				</div>

			</div>
			


		</div>

	</div>

	<!-- Plataformas -->
	<div class="modal fade" id="modalPlat" role="dialog">
		
		<div class="modal-dialog" role="document">

			<div class="modal-content">
				
				<div class="modal-header">
					
					<h5 class="modal-title"> Desenvolvimento de plataformas de aprendizagem</h5>

					<button class="close" type="button" data-dismiss="modal">
						
						<span>&times;</span>

					</button>

				</div>

				<div class="modal-body">
					
					<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>

				</div>				

				<div class="modal-footer">
					<button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>


				</div>

			</div>
			


		</div>

	</div>

	<!-- Treinamentos -->
	<div class="modal fade" id="modalTrain" role="dialog">
		
		<div class="modal-dialog" role="document">

			<div class="modal-content">
				
				<div class="modal-header">
					
					<h5 class="modal-title"> Treinamentos</h5>

					<button class="close" type="button" data-dismiss="modal">
						
						<span>&times;</span>

					</button>

				</div>

				<div class="modal-body">
					
					<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>

				</div>				

				<div class="modal-footer">
					<button class="btn btn-danger" type="button" data-dismiss="modal">Fechar</button>


				</div>

			</div>
			


		</div>

	</div>
	
<script src="js/style.js"></script>
<script src="js/maps.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
<script src="node_modules/jquery/dist/jquery.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="function.js"></script>
</body>
</html>