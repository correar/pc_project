<?php
	include_once("conf/db.php");
	include_once("app/models/Model_impressao.php");
	include_once("app/controller/Impressao.php");
	$impressao = new Impressao();
	$estado = $_POST['estado'];
	foreach ($_POST as $key => $value) {
		if($key != "estado"){
			foreach ($value as $k => $v) {
				$impressao->impresso($v);
			}
		}
	}
	$municipios = $impressao->listar_municipios($estado);
	include "app/views/impressao/boletos.php";
?>
<script src="assets/js/impressao.js"></script>