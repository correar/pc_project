<?php
	class Model_upload{
		

		function post($values)
		{
			$con = new Db();
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO boletos_pf (CONTADOR, COD_BENEFICIARIO_PF, CPF, UF, BAIRRO, MUNICIPIO, CEP, DATA_VENCIMENTO, NOME_BANCO) VALUES(:CONTADOR, :COD_BENEFICIARIO_PF, :CPF, :UF, :BAIRRO, :MUNICIPIO, :CEP, :DATA_VENCIMENTO, :NOME_BANCO)";
			$stmt = $con->prepare($sql);
			$stmt->execute(array(':CONTADOR' => $values['CONTADOR'], ':COD_BENEFICIARIO_PF' => $values['COD_BENEFICIARIO_PF'], ':CPF' => $values['CPF'], ':UF' => $values['UF'], ':BAIRRO' => $values['BAIRRO'], ':MUNICIPIO' => $values['MUNICIPIO'], ':CEP' => $values['CEP'], ':DATA_VENCIMENTO' => $values['DATA_VENCIMENTO'], ':NOME_BANCO' => $values['NOME_BANCO']));
			return "Arquivos Armazenados";
		}

		function get()
		{

		}

		function put()
		{

		}

		function delete(){

		}
	}


?>