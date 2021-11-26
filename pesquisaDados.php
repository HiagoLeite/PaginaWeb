<?php
	require_once('nav.php');
?>
<!DOCTYPE  HTML>
<html lang="pt-br">

<head>	<meta charset="utf-8">	
	<title>Centro de Custo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--ARQUIVOS DO FRAMEWORK-->
	<script src="src/jquery-3.3.1.min.js"></script>
    <script src="src/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="src/bootstrap.min.css">
    <!--ARQUIVO CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
		<section>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xs5 col-sm-5 col-md-5 col-lg-5">
					
						<div class="contForm">
							<h3>Listar departamentos por centro de custo</h3>
							<form action="" method="POST">
	  						<input type="text" name="Cet" placeholder="Centro de custo" required>
	  						<input type="submit" name="submit" value="Pesquisar" class="btn btn-warning">
	  						</form>
						</div>

						<div class="contForm">
							<h3>Listar usuários por departamento</h3>
							<form action="" method="POST">
	  							<input type="text" name="Dep" placeholder="Departamento" required>
	  							<input type="submit" name="submit" value="Pesquisar" class="btn btn-warning">
	  						</form>
						</div>

						<div class="contForm">
							<h3>Listar Geral</h3>
							<form action="" method="POST">
	  							<input type="text" name="depGeral" placeholder="Departamento" required>
								<br/><br/>
	  							<input type="text" name="cetGeral" placeholder="centro de custo" required>
								<br/><br/>
	  						<input type="submit" name="submit" value="Pesquisar" class="btn btn-warning">
	  						</form>
						</div>

					</div>
					<!-- RES PHP -->
					<div class="col-xs-8 col-sm-7 col-md-7 col-lg-7">
						
							<?php
								require_once('php/db.class.php');
								$objDb = new db();
								$link = $objDb->conecta_mysql();
								$num=0;

								if($_SERVER['REQUEST_METHOD']=="POST"){
									echo"<div class='conteudo'>";

									if(!empty($_POST['Dep'])){
										$pesquisaDep=$_POST['Dep'];	
										$sql="SELECT nomeUsu FROM usuario WHERE exists(SELECT*FROM cargo,centrodecusto,departamento 
										WHERE centrodecusto.idCentro=departamento.idCentro AND departamento.idDepartamento=cargo.idDepartamento and cargo.idcargo=usuario.idCargo and departamento.nomeDep='$pesquisaDep')";
										$res=mysqli_query($link,$sql);
										
										echo "<table class='table table-bordered table-dark'>";
										echo" <thead>";
										echo"<tr> <th scope='col'>#</th>";
										echo "<th scope='col'>Usuário </th> </tr>";
										echo" </thead>";
										echo"<tbody>";
										while ($row = mysqli_fetch_array($res)){
											$num++;
											echo "<tr>";
											echo" <th scope='row'>".$num."</th>";
											echo "<td>".$row['nomeUsu']."</td>";
											echo "</tr>";
										}
										echo"</tbody>";
										echo "<table>";
									}else if(!empty($_POST['Cet'])){
										$pesquisaCet=$_POST['Cet'];	
										$sql="SELECT nomeDep FROM departamento WHERE exists(SELECT*FROM centrodecusto
										WHERE centrodecusto.idCentro=departamento.idCentro AND centrodecusto.valor='$pesquisaCet')";
										$res=mysqli_query($link,$sql);
										echo "<table class='table table-bordered table-dark'>";
										echo" <thead>";
										echo"<tr> <th scope='col'>#</th>";
										echo "<th scope='col'> Departamento </th></tr>";
										echo" </thead>";
										echo"<tbody>";
										while ($row = mysqli_fetch_array($res)){
											$num++;
											echo "<tr>";
											echo" <th scope='row'>".$num."</th>";
											echo "<td>".$row['nomeDep']."</td>";
											echo "</tr>";
										}
										echo"</tbody>";
										echo "<table>";
									}else if(!empty($_POST['cetGeral']) && !empty($_POST['depGeral']) ){
										$pesquisaDepGeral=$_POST['depGeral'];
										$pesquisaCetGeral=$_POST['cetGeral'];	
										$sql="SELECT nomeUsu, nomeDep, valor FROM usuario,centrodecusto, departamento,cargo 
										WHERE centrodecusto.idCentro=departamento.idCentro AND departamento.idDepartamento=cargo.idDepartamento AND cargo.idcargo=usuario.idCargo AND departamento.nomeDep='$pesquisaDepGeral' AND centrodecusto.valor='$pesquisaCetGeral' ";
										$res=mysqli_query($link,$sql);
										echo "<table class='table table-bordered table-dark'>";
										echo" <thead>";
										echo"<tr> <th scope='col'>#</th>";
										echo"<th scope='col'>Usuário</th> <th scope='col'>Departamento</th> <th scope='col'>Centro Custo</th></tr>";
										echo" </thead>";
										echo"<tbody>";
										while ($row = mysqli_fetch_array($res)){
											$num++;
											echo "<tr>";
											echo" <th scope='row'>".$num."</th>";
											echo "<td>".$row['nomeUsu']."</td>";
											echo "<td>".$row['nomeDep']."</td>";
											echo "<td>".$row['valor']."</td>";
											echo "</tr>";
										}
										echo"</tbody>";
										echo "<table>";
									}
									echo"</div>";			
								}		
							?>
						
					</div>
				</div>		
			</div>
		</section>
</body>
</html> 