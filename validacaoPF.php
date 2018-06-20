<?php
	include_once("conf/db.php");
	include_once("app/models/Model_impressao.php");
	include_once("app/controller/Validacao.php");
	include "app/views/themes/header.php";
    //$unimed = new Unimed();
    $title = "PF";
    $tipo = "pf";
    $class = 'class="alert alert-success"';
	include "app/views/validacao/index.php";
	include "app/views/themes/footer.php";
?>		