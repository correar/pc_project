<?php
	include_once("conf/db.php");
	include_once("app/models/Model_impressao.php");
	include_once("app/controller/Validacao.php");
    include "app/views/themes/header.php";
    $title = "PJ";
    $tipo = "pj";
    $class = 'class="alert alert-warning"';
    
	//$unimed = new Unimed();
	include "app/views/validacao/index.php";
	include "app/views/themes/footer.php";
?>		