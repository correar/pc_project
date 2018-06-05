<?php
	include_once("conf/db.php");
	include_once("app/models/Model_impressao.php");
	include_once("app/controller/Impressao.php");
	include "app/views/themes/header.php";
	$impressao = new Impressao();
	include "app/views/impressao/index.php";
	include "app/views/themes/footer.php";
?>		