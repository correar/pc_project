<?php
	class Model_impressao{
		

		function post($values,$table)
		{
			$con = new Db();
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO ".$table." (CONTADOR, COD_BENEFICIARIO_PF, CPF, UF, BAIRRO, MUNICIPIO, CEP, DATA_VENCIMENTO, NOME_BANCO) VALUES(:CONTADOR, :COD_BENEFICIARIO_PF, :CPF, :UF, :BAIRRO, :MUNICIPIO, :CEP, :DATA_VENCIMENTO, :NOME_BANCO)";
			$stmt = $con->prepare($sql);
			$stmt->execute(array(':CONTADOR' => $values['CONTADOR'], ':COD_BENEFICIARIO_PF' => $values['COD_BENEFICIARIO_PF'], ':CPF' => $values['CPF'], ':UF' => $values['UF'], ':BAIRRO' => $values['BAIRRO'], ':MUNICIPIO' => $values['MUNICIPIO'], ':CEP' => $values['CEP'], ':DATA_VENCIMENTO' => $values['DATA_VENCIMENTO'], ':NOME_BANCO' => $values['NOME_BANCO']));
			return "Arquivos Armazenados";
		}

		function get($values,$tables,$where,$group,$order)
		{
			$con = new DB();
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT ".$values." FROM ".$tables.$where.$group.$order;
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$resp = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $resp;
		}

		function put($values,$table,$where)
		{
			$con = new DB();
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE ".$table." SET ".$values." WHERE ".$where;
			$stmt = $con->prepare($sql);
			$stmt->execute();
		}

		function delete(){

		}
	}


?>
