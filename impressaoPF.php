<?php
	include_once("conf/db.php");
	include_once("app/models/Model_impressao.php");
	include_once("app/controller/ImpressaoPF.php");
	include "app/views/themes/header.php";
	$impressao = new ImpressaoPF();
	include "app/views/impressao_pf/index.php";
	include "app/views/themes/footer.php";
?>		