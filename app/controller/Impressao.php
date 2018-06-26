<?php
class Impressao{

	function listar_estado($tabela){
		$model_impressao = new Model_impressao();
		return $model_impressao->get('UF',$tabela,' WHERE IMPRESSO=0',' GROUP BY UF','');
	}

	function qtd_nao_impresso($value,$tabela){
		$model_impressao = new Model_impressao();
		$return = $model_impressao->get('count(*) as qtd', $tabela, ' WHERE IMPRESSO=0 AND UF="'.$value.'"', '','');
		return $return[0];
	}

	function listar_boletos($bairro,$municipio,$uf,$tabela){
		$model_impressao = new Model_impressao();
		return $model_impressao->get('CONTADOR, CEP, NOME_BANCO', $tabela, ' WHERE IMPRESSO=0 AND UF="'.$uf.'" AND MUNICIPIO="'.$municipio.'" AND BAIRRO="'.$bairro.'"', '',' ORDER BY CEP ASC');
	}

	function listar_municipios($value,$tabela){
		$model_impressao = new Model_impressao();
		/*return $model_impressao->get('MUNICIPIO', 'boletos_pj', ' WHERE IMPRESSO=0 AND UF="'.$value.'"', ' GROUP BY MUNICIPIO',' ORDER BY MUNICIPIO ASC');*/
		return $model_impressao->get('*', $tabela,' WHERE IMPRESSO=0 AND UF="'.$value.'"', '',' ORDER BY CEP ASC, MUNICIPIO ASC');
	}
	
	function listar_bairros($mucipio,$uf,$tabela){
		$model_impressao = new Model_impressao();
		return $model_impressao->get('BAIRRO', $tabela, ' WHERE MUNICIPIO="'.$mucipio.'" AND UF="'.$uf.'"', ' GROUP BY BAIRRO',' ORDER BY BAIRRO ASC');
	}	

	function impresso($value,$tabela){
		$model_impressao = new Model_impressao();
		$impresso = $model_impressao->get('IMPRESSO', $tabela,' WHERE CONTADOR="'.$value.'"','','');
		
		foreach($impresso[0] as $imp){
			if($imp == 0){
				$this->mover_arquivo($value);
			}
		}
		return $model_impressao->put('IMPRESSO=1',$tabela,'CONTADOR='.$value);		
	}

	function mover_arquivo($value,$tipo){
		$origem = "/var/www/html/unimed/assets/files/".$tipo."/separados/".$value.".xml";
		$destino = "/var/www/html/unimed/assets/files/".$tipo."/impressao/".$value.".xml";

		copy($origem, $destino);
	}
}

?>
