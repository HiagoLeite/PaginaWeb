<!DOCTYPE  HTML>
<html lang="pt-br">

<head>	<meta charset="utf-8">	
	<title>Departamento</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--ARQUIVOS DO FRAMEWORK-->
	<script src="src/jquery-3.3.1.min.js"></script>
    <script src="src/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="src/bootstrap.min.css">
    <!--ARQUIVO CSS-->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
	<!--BARRA DE NAVEGAÇÃO-->
	<nav id="nav" class="navbar navbar-expand-lg navbar navbar-light">
		<div class="container">
	  		<a class="navbar-brand" href="index.html">logo</a>
        	<div class="navbar-header">
	  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	  		</button>
	  	
	  		<div class="collapse navbar-collapse" id="navbarNavDropdown">
	    		<ul class="navbar-nav">
	      			
	    			<li class="nav-item">
	      			<a class="nav-link" href="paginaAtualizarDeletar.html">Atualizar|Deletar</a>	
	      			</li>
	      			<li class="nav-item">
	        		<a class="nav-link" href="paginaDepartamento.php">Lista departamento</a>
	      			</li>
	      			<li class="nav-item">
	        		<a class="nav-link" href="paginaCentroCusto.php">Lista centro custo</a>
	      			</li>
	      			<li class="nav-item">
	        		<a class="nav-link" href="paginaImporLista.php">Lista geral</a>
	      			</li>
	    		</ul>
	    	</div>
	  		</div>
	  	</div>	
	</nav>
		<section>
			<div class="container">
				<div class="row justify-content-center">
					<div  class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<div class="conteudo">
							
							<h2>Lista de usuários por departamento</h2>
							<form action="" method="POST">
	  							<input type="text" name="Dep" placeholder="Departamento" required>
	  							<input type="submit" name="submit" value="Pesquisar" class="btn btn-warning">
	  						</form>
							<br/>

							<?php

								require_once('php/db.class.php');
								
								$objDb = new db();
							    $link = $objDb->conecta_mysql();
								if($_SERVER['REQUEST_METHOD']=="POST"){
									$pesquisaDep=$_POST['Dep'];	
									$sql="SELECT nomeUsu FROM usuario WHERE exists(SELECT*FROM cargo,centrodecusto,departamento 
										WHERE centrodecusto.idCentro=departamento.idCentro AND departamento.idDepartamento=cargo.idDepartamento and cargo.idcargo=usuario.idCargo and departamento.nomeDep='$pesquisaDep')";
									$res=mysqli_query($link,$sql);
									echo "<table class='centro' border=\"1\">";
	  								echo "<tr><th> Usuário </th></tr>";
									while ($row = mysqli_fetch_array($res)){
										echo "<tr>";
										echo "<td>".$row['nomeUsu']."</td>";
										echo "</tr>";

									}
									echo "<table>";
								}
							?>
						</div>
					</div>
					
				</div>	
			</div>
		</section>
</body>
</html> 