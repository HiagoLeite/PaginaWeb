<?php
	require_once('nav.php');
?>
<!DOCTYPE  HTML>
<html lang="pt-br">

<head>	
	<meta charset="utf-8">	
	<title>Index</title>
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
		<div class="container" >
			<div class="row justify-content-center">
				<!-- Criar Usuario -->
				<div class="col-xs-4 col-sm-6 col-md-4 col-lg-4">	
					<div class="conteudo">
						<h2>Criar Usuário</h2>
						<form action="php/registra.php" method="POST">
							<input type="text" name="nomeUsu" placeholder="nome" required>
							<br/><br/>
							<input type="text" name="nomeCar" placeholder="cargo" required>
							<br/><br/>
							<input type="text" name="nomeDep" placeholder="departamento" required>
							<br/><br/>
							<input type="text" name="nomeCet" placeholder="centro de custo" required>
							<br/><br/>
							<button type="submit" class="btn btn-warning">Cadastrar</button>
						</form>
					</div>
				</div>
				<!-- Atualizar Usuario -->
				<div class="col-xs-4 col-sm-6 col-md-4 col-lg-4">
					<div class="conteudo">
						<h2>Atualizar Usuário</h2>
						<form action="php/atualizar.php" method="POST">
								
								<input type="text" name="nomeTroca" placeholder="nome atual" required>
								<br/><br/>
								<input type="text" name="nomeNovo" placeholder="nome novo" >
								<br/><br/>

								<input type="text" name="departamentoTroca" placeholder="departamento atual" required>
								<br/><br/>
								<input type="text" name="departamentoNovo" placeholder="departamento novo">
								<br/><br/>

								<input type="text" name="cargoTroca" placeholder="cargo atual" required>
								<br/><br/>
								<input type="text" name="cargoNovo" placeholder="cargo novo">
								<br/><br/>
								<button type="submit" class="btn btn-warning">Atualizar</button>
							</form>
					</div>
				</div>
				<!-- Deletar Usuario -->
				<div class="col-xs-4 col-sm-6 col-md-4 col-lg-4">
					<div class="conteudo">
						<h2>Deletar Usuário</h2>
						<form action="php/deletar.php" method="POST">
								<input type="text" name="nomeDel" placeholder="nome" required>
								<br/><br/>
								<input type="text" name="departamentoDel" placeholder="departamento" required>
								<br/><br/>
								<input type="text" name="centroCustoDel" placeholder="centro de custo" required>
								<br/><br/>
								<button type="submit" class="btn btn-warning">Deletar</button>
							</form>
					</div>
				</div>

			</div>
		</div>
	</section>
		
</body>
</html> 