<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Boletos Unimed</title>
		<!--<link rel="stylesheet" href="assets/css/index.css"> -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col offset-3">
					<h1>Boletos da Unimed PF e PJ</h1>
				</div>
			</div>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<a class="navbar-brand" href="index.php">Unimed</a>
			 	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    	<span class="navbar-toggler-icon"></span>
			  	</button>

  				<div class="collapse navbar-collapse" id="navbarSupportedContent">
    				<ul class="navbar-nav mr-auto">
				      <li class="nav-item active">
				      	<a class="nav-link" href="carregar.php">Upload de Arquivos</a>
				      </li>
				      <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="impressaoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Impressão dos Boletos</a>
						<div class="dropdown-menu" aria-labelledby="impressaoDropdown">
          					<a class="dropdown-item" href="impressaoPF.php">Pessoa Física</a>
							<div class="dropdown-divider"></div>
          					<a class="dropdown-item" href="impressaoPJ.php">Pessoa Jurídica</a>
        				</div>
				      </li>
					  <li class="nav-item">
				        <a class="nav-link" href="validacao.php">Validação dos Boletos</a>
				      </li>
    				</ul>
  				</div>
			</nav>
