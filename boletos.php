<?php
	include_once("conf/db.php");
	include_once("app/models/Model_impressao.php");
	include_once("app/controller/Impressao.php");
	$impressao = new Impressao();
	$estado = $_POST['estado'];
	$tabela = $_POST['tabela'];
	foreach ($_POST as $key => $value) {
		if($key != "estado"){

			foreach ($value as $k => $v) {
				$impressao->impresso($v,$tabela);
			}
		}
	}
	$municipios = $impressao->listar_municipios($estado,$tabela);
	include "app/views/impressao/boletos.php";
?>
<script src="assets/js/impressao.js"></script>