<?php
	include_once("conf/db.php");
	include_once("app/models/Model_impressao.php");
	include_once("app/controller/Validacao.php");
	include "app/views/themes/header.php";
	$validar = new Validacao();
    $titulo = $_GET['titulo'];
	$tipo = $_GET['tipo'];
	if($tipo == 'pf'){
		$class = 'class="alert alert-primary"';
	}
	else {
		$class = 'class="alert alert-secondary"';
	}
	include "app/views/validacao/index.php";
	include "app/views/themes/footer.php";
?>		