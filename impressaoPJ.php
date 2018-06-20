<?php
	include_once("conf/db.php");
	include_once("app/models/Model_impressao.php");
	include_once("app/controller/ImpressaoPJ.php");
	include "app/views/themes/header.php";
	$impressao = new ImpressaoPJ();
	include "app/views/impressao_pj/index.php";
	include "app/views/themes/footer.php";
?>		