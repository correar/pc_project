<?php

Class Unimed{

	public function pessoa_fisica_nimpresso(){
		$model_impressao = new Model_impressao();
		return $model_impressao->get('count(*) as total','boletos_pf',' WHERE IMPRESSO=0','','');
	}

	public function pessoa_fisica_impresso(){
		$resposta = array();
		$dados = array();
		$total = 0;
		$model_impressao = new Model_impressao();
		$impressos = $model_impressao->get('count(*) as total, DATA_IMPRESSO','boletos_pf',' WHERE IMPRESSO=1',' GROUP BY DATA_IMPRESSO',' ORDER BY DATA_IMPRESSO ASC');
		foreach($impressos as $k=>$impresso){
			foreach($impresso as $key=>$value){
				if($key === 'DATA_IMPRESSO'){
					if($value){
						$data_impresso = explode(' ',$value);
						$data = explode('-',$data_impresso[0]);
						$dia = $data[2];
						$mes = $data[1];
						$ano = $data[0];
						$dados[$k][$key] = $dia.'/'.$mes.'/'.$ano;
					}
				}
				else if($key === 'total'){
					$dados[$k][$key] = $value;
					$total += $value;
				}
			}

		}
		array_push($resposta, array($dados, $total));
		
		return $resposta;
	}

	public function pessoa_juridica_nimpresso(){
		$model_impressao = new Model_impressao();
		return $model_impressao->get('count(*) as total','boletos_pj',' WHERE IMPRESSO=0','','');
	}

	public function pessoa_juridica_impresso(){
		$resposta = array();
		$dados = array();
		$total = 0;
		$model_impressao = new Model_impressao();
		$impressos = $model_impressao->get('count(*) as total, DATA_IMPRESSO','boletos_pj',' WHERE IMPRESSO=1',' GROUP BY DATA_IMPRESSO',' ORDER BY DATA_IMPRESSO ASC');
		foreach($impressos as $k=>$impresso){
			foreach($impresso as $key=>$value){
				if($key === 'DATA_IMPRESSO'){
					if($value){
						$data_impresso = explode(' ',$value);
						$data = explode('-',$data_impresso[0]);
						$dia = $data[2];
						$mes = $data[1];
						$ano = $data[0];
						$dados[$k][$key] = $dia.'/'.$mes.'/'.$ano;
					}
				}
				else if($key === 'total'){
					$dados[$k][$key] = $value;
					$total += $value;
				}
			}

		}
		array_push($resposta, array($dados, $total));
		
		return $resposta;
	}

}

?>
