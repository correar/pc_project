<?php
	include_once("conf/db.php");
	include_once("app/models/Model_impressao.php");
	include_once("app/controller/Index.php");
	include "app/views/themes/header.php";
	$unimed = new Unimed();
	include "app/views/index.php";
	include "app/views/themes/footer.php";
?>		