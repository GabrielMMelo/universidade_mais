<!DOCTYPE html>
<html>
<head>
	<!--
		c:\Ruby24-x64\bin\setrbvars.cmd
		sass --watch ./bootstrap/scss:./bootstrap/compiler/ ./font-awesome/scss:./font-awesome/css
	-->
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="node_modules/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/style.css">
	<link rel="stylesheet" type="text/css" href="teste.css">
	<link rel="stylesheet" type="text/css" href="tinymce/prism.css">
	<link rel="shortcut icon" href="img/icon.ico">
	<title>UniMais</title>
	
	<?php
		header('Content-Type: text/html; charset=utf-8');

		//include "comment.php";

		$param = filter_input(INPUT_GET, "search");
		$mysqllink = mysqli_connect("localhost", "root", "", "universidademais");
		
		if (mysqli_connect_errno()) {
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  	}

	  	mysqli_query($mysqllink, "SET NAMES 'utf8'");
		mysqli_query($mysqllink, 'SET character_set_connection=utf8');
		mysqli_query($mysqllink, 'SET character_set_client=utf8');
		mysqli_query($mysqllink, 'SET character_set_results=utf8');
		if ($param){
			$dados = mysqli_query($mysqllink,"SELECT * FROM post where name like '%$param%' order by name desc");
		}

		else{
			$dados = mysqli_query($mysqllink,"SELECT * FROM post order by post_date desc");
		}

		$line = mysqli_fetch_assoc($dados);
		$total = mysqli_num_rows($dados);
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

					<li class="nav-item mr-5">
						<a class="nav-link" href="#">CURSO</a>
					</li>

					<li class="nav-item mr-5">
						<a class="nav-link" href="#">SOBRE NÓS</a>
					</li>


					<li class="nav-item mr-5">
						<a class="nav-link" href="#">SEJA UM CONTRIBUIDOR</a>
					</li>

					<li class="nav-item mr-5">
						<a class="nav-link" target="_blank" href="login.php">LOGIN</a>
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
<nav class="navbar navbar-expand-lg navbar-light bg-light ">

		<div class="#">
			<div class="row text-center mt-2  justify-content-center">			
				
			<ul class="navbar-nav mr-auto ">
				<div class="col-4 ">
				<li class="nav-item ml-lg-0 mr-lg-5 mr-sm-0 justify-content-sm-center">
					<a class="animate one nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navLP"><span class="repeat text-dark display-4">L</span><span class="repeat text-dark">I</span><span class="repeat text-dark">N</span><span class="repeat text-dark">G</span><span class="repeat text-dark">U</span><span class="repeat text-dark">A</span><span class="repeat text-dark">G</span><span class="repeat text-dark">E</span ><span class="repeat text-dark">N</span><span class="repeat text-dark">S</span>   <span class="repeat text-dark">D</span><span class="repeat text-dark">E</span><br><span class="repeat text-dark display-4">&nbsp;P</span><span class="repeat text-dark">R</span><span class="repeat text-dark">O</span><span class="repeat text-dark">G</span><span class="repeat text-dark">R</span><span class="repeat text-dark">A</span ><span class="repeat text-dark">M</span><span class="repeat text-dark">A</span><span class="repeat text-dark">Ç</span><span class="repeat text-dark">Ã</span><span class="repeat text-dark">O</span>

        			</a>

					<ul class="dropdown-menu rounded ml-5" id="primary-menu">
						<li><a class="dropdown-item" href="#">Python</a></li>
						<li><a class="dropdown-item" href="#">C++</a></li>
						<li><a class="dropdown-item" href="#">VBA</a></li>
						<li><a class="dropdown-item" href="#">Javascript</a></li>
					</ul>
				</li>

				</div>

				<div class="col-4">
				<li class="nav-item dropdown  mr-5">
					<a class="animate one nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navLP"><br><span class="repeat text-dark display-4">M</span><span class="repeat text-dark">I</span><span class="repeat text-dark">C</span><span class="repeat text-dark">R</span><span class="repeat text-dark">O</span><span class="repeat text-dark">C</span><span class="repeat text-dark">O</span><span class="repeat text-dark">N</span ><span class="repeat text-dark">T</span><span class="repeat text-dark">R</span><span class="repeat text-dark">O</span><span class="repeat text-dark">L</span><span class="repeat text-dark">A</span><span class="repeat text-dark">D</span><span class="repeat text-dark">O</span><span class="repeat text-dark">R</span><span class="repeat text-dark">E</span><span class="repeat text-dark">S</span>
						<br>
        			</a>
					<ul class="dropdown-menu mt-lg-5">
						<li><a class="dropdown-item" href="#">Arduino</a></li>
						<li><a class="dropdown-item" href="#">ESP8266</a></li>
						<li><a class="dropdown-item" href="#">PIC</a></li>
					</ul>
				</li>

				</div>	
				<div class="col-4">
				<li class="nav-item mr-5 ml-lg-5 mb-sm-5 mb-lg-0 mb-md-0">
					<a class="animate one nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navLP"><span class="repeat text-dark display-4">I</span><span class="repeat text-dark">N</span><span class="repeat text-dark">T</span><span class="repeat text-dark">E</span><span class="repeat text-dark">L</span><span class="repeat text-dark">I</span><span class="repeat text-dark">G</span><span class="repeat text-dark">Ê</span ><span class="repeat text-dark">N</span><span class="repeat text-dark">C</span><span class="repeat text-dark">I</span><span class="repeat text-dark">A</span> <br> <span class="repeat text-dark display-4">C</span><span class="repeat text-dark">O</span><span class="repeat text-dark">M</span><span class="repeat text-dark">P</span><span class="repeat text-dark">U</span><span class="repeat text-dark">T</span><span class="repeat text-dark">A</span><span class="repeat text-dark">C</span><span class="repeat text-dark">I</span><span class="repeat text-dark">O</span><span class="repeat text-dark">N</span><span class="repeat text-dark">A</span><span class="repeat text-dark">L</span> <br>
        			</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Redes Neurais Artificiais</a></li>
						<li><a class="dropdown-item" href="#">Fuzzy</a></li>
						<li><a class="dropdown-item" href="#">Algoritmos Genéticos</a></li>
					</ul>
				</li>
				</div>
				<div class="col-4">
				<li class="nav-item mr-5 ml-lg-5 mt-sm-4">
					<a class="animate one nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navLP"><span class="repeat text-dark display-4">F</span><span class="repeat text-dark">E</span><span class="repeat text-dark">R</span><span class="repeat text-dark">R</span><span class="repeat text-dark">A</span><span class="repeat text-dark">M</span><span class="repeat text-dark">E</span><span class="repeat text-dark">N</span ><span class="repeat text-dark">T</span><span class="repeat text-dark">A</span><span class="repeat text-dark">S</span><br>
        			</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Eletrônica</a></li>
						<li><a class="dropdown-item" href="#">Desenvolvimento Mobile</a></li>
						<li><a class="dropdown-item" href="#">Linguagens</a></li>
						<li><a class="dropdown-item" href="#">Ferramentas</a></li>
					</ul>
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

		<div class="col-9 mt-5">
			<?php
			$count = 0;
			if($total) {
				do{
					$count = $count + 1;
					$n = 'name'.$count;
					$c = 'comment'.$count;
			?>
					 <!-- Title -->
          <h1 class="mt-4 text-center"><?php echo $line['name']?></h1>

          <!-- Author -->
          <p class="lead">
            por
            <a href="#"><?php echo $line['author']?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p><i>Postado em <?php echo $line['post_date'];
          					$postId = $line['id'];
          				   ?></i></p>

          <hr>

          <!-- Preview Image -->
          <div class="text-center">
          	<img class="img-fluid rounded" src="img/<?php echo $line['img']?>" alt="">
		  </div>          
          <hr>

          <!-- Post Content -->
          <p class="lead"><?php echo $line['content']?></p>

          <!--<blockquote class="blockquote">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">Someone famous in
              <cite title="Source Title">Source Title</cite>
            </footer>
          </blockquote>-->

          	<?php
          	$aut = $line['author'];
			$author = mysqli_query($mysqllink,"SELECT * FROM authors where name = '$aut';");

			$lineA = mysqli_fetch_assoc($author);
			//$lineImages = mysqli_fetch_assoc($imgs);
			$totalA = mysqli_num_rows($author);
			if ($totalA){
				do{

			?>

          <div class="bg-light">
				
				<div class="row ">


					<div class="col-4 my-4 mx-5 text-center">

						<h2 class="display-4"><?php echo $lineA['name']?></h2>

						<img class="img-fluid heavy_rounded mt-5" src="img/<?php echo $lineA['img']?>" alt="<?php echo $lineA['name']?>">
						

					</div>

					<div class="col-6 mt-5 mb-3 text-center">

						<p class="lead">
							
							<?php echo $lineA['bio']; ?>

						</p>
						
						<div class="row mt-5">

							<div class="col-4 col-sm-4">
								
								<a class="text-dark" href="<?php echo $lineA['linkedin']?>">
									
									<i class="fa fa-linkedin-square fa-5x mr-3 mr-sm-3 mr-md-3 mr-lg-3" aria-hidden="true"></i>
								
								</a>

							</div>


							<div class=" col-4 col-sm-4">
								
								<a class="text-dark" href="<?php echo $lineA['instagram']?>">
								
									<i class="fa fa-instagram fa-5x mr-4" aria-hidden="true"></i>
								
								</a>

							</div>

							<div class="col-4 col-sm-4">
								
								<a class="text-dark" href="<?php echo $lineA['twitter']?>">

									<i class="fa fa-twitter-square fa-5x mr-5 mb-lg-5 mb-md-3 mb-sm-5" aria-hidden="true"></i>

								</a>

							</div>

						</div>


					</div>
						


				</div>          	


          </div>

          	<?php 
          		} while($lineC = mysqli_fetch_assoc($author));
				mysqli_free_result($author);
			}
			?>

          <hr>


<!--       ############## COMMENT FIELD ############### 		-->
        <div class="col-12">
          	
          
	          <!-- Comments Form -->
	          <div class="card my-4" id="comments">
	            <h5 class="card-header bg-dark text-light">Deixe um comentário:</h5>
	            <div class="card-body">
	            	<form action="comment.php" method="post">
	                	<div class="form-group">
	                		<input type="hidden" name="action" value="comment">
	                		<input type="hidden" name="postId" value="<?php echo $postId?>">
	                		<label class="lead">Nome:</label>
	                		<br>
	                		<input type="text" name="name">
	                		<br>
	                		<br>
	                		<label class="lead">Comentário:</label>
	                		<br>
	                  		<textarea class="form-control" name="comment" rows="3"></textarea>
	                	</div>
	                	<div class="text-center">
	                		<button type="submit" class="btn btn-lg btn-success box_generic">Enviar</button>
	                	</div>
	        	    </form>
	    	    </div>
	        </div>
	    </div>
	    
		<?php
			$comments = mysqli_query($mysqllink,"SELECT * FROM comments where postId = '$postId' order by date desc");

			$lineC = mysqli_fetch_assoc($comments);
			//$lineImages = mysqli_fetch_assoc($imgs);
			$totalC = mysqli_num_rows($comments);
			if ($totalC){
				do{

		?>

		<!-- ###################### SHOW COMMENTS ######################## -->
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
		            <div class="media-body" id="<?php echo $lineC['id'];?>">
			            <h5 class="mt-0"><?php echo $lineC['name'] ?></h5>
			            <p>
			            	<?php echo $lineC['comment'];?>
			            </p>
    	                <p class="text-right lead text-muted"><?php echo $lineC['date']?></p>

		    <!-- ###################### SUBCOMMENTS ######################## -->   
		            <?php

		            	$commentId = $lineC['id'];
		            	// Select subcomments to same $commentId
			            $subcomments = mysqli_query($mysqllink,"SELECT * FROM subcomments where commentId = '$commentId' order by date asc");

	  					$lineS = mysqli_fetch_assoc($subcomments);
						//$lineImages = mysqli_fetch_assoc($imgs);
						$totalS = mysqli_num_rows($subcomments);
						if ($totalS){
							do{

		            ?>

		    <!-- ###################### SHOW SUBCOMMENTS ######################## -->   
	              	<div class="media-body">
	              		<div class="bg-light rounded">
	              			<div class="mx-3">
				                <h6 class="mt-3"><?php echo $lineS['name'] ?></h6>
				                <p>
				              		<?php echo $lineS['comment']; ?>
				                </p>
				                <p class="text-right lead text-muted"><?php echo $lineS['date']?></p>
			                </div>
		            	</div>
	            	</div>
	                <?php

	                	} while($lineS = mysqli_fetch_assoc($subcomments));
						mysqli_free_result($subcomments);
					}

	                ?>
	              		<form action="index.php#<?php echo $lineC['id'];?>" method="post">
		              		<input type="hidden" name="commentId" value="<?php echo $lineC['id'];?>">
		              		<input type="hidden" name="action" value="answer">
		              		<button type="submit" class="btn btn-sm btn-dark">Responder</button>
	              		</form>
		          </div>
		        </div>
		    </div>

		<?php
			// If "Responder" button is pressed -> open the answer field
			if(isset($_POST['action'])){
				if($_POST['action'] == 'answer' and $_POST['commentId'] == $lineC['id']) {
		?>
			<div class="container mx-5">
				<div class="row">
					<div class="col-11 justify-content-center">
						<div class="card my-4">
				            <div class="card-body">
				            	<form action="comment.php" method="post">
				                	<div class="form-group">
				                		<input type="hidden" name="action" value="subcomment">
				                		<input type="hidden" name="commentId" value="<?php echo $lineC['id'];?>">
				                		<label class="lead">Nome:</label>
				                		<br>
				                		<input type="text" name="name">
				                		<br>
				                		<br>
				                		<label class="lead">Comentário:</label>
				                		<br>
				                  		<textarea class="form-control" name="comment" rows="2"></textarea>
				                	</div>
				                	<div class="text-center">
				                		<button type="submit" class="btn btn-md btn-success box_generic">Enviar</button>
				                	</div>
				        	    </form>
				    	    </div>
				    	</div>
				    </div>
		        </div>
		    </div>

		<?php			
				}
			}

				} while($lineC = mysqli_fetch_assoc($comments));
				mysqli_free_result($comments);
			}
		} while($line = mysqli_fetch_assoc($dados));
				mysqli_free_result($dados);}

				mysqli_close($mysqllink);
			?>

		    </div>
        </div>

		</div>
		


	</div>


	<!-- ###################### FOOTER ######################## -->

	<div class="bg-dark text-light justify-content-center text-center">
		
		<h5>UniMais</h5>

	</div>


	<!-- ############## MODALS ################# -->

	
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
<script src="node_modules/jquery/dist/jquery.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="function.js"></script>
<script src="tinymce/prism.js"></script>
</body>
</html>