<?php
class Validacao{

    public function validar_boleto($codigo,$table){
        if(is_numeric($codigo)){
            $model_impressao = new Model_impressao();
            $checar = $model_impressao->get('VERIFICADO',$table,' WHERE id='.$codigo,'','');
            if($checar){
                if($checar[0]['VERIFICADO'] == 0){
                    $validar = $model_impressao->put('VERIFICADO=1, DATA_VERIFICADO=now()',$table,' id='.$codigo.' AND VERIFICADO=0','','');
                    $dados[0]='<div class="alert alert-success">';
                    $dados[1]="Boleto Validado";
                }
                else {
                    $dados[0]='<div class="alert alert-danger">';
                    $dados[1]="Boleto já validado";
                }
            }
            else{
                $dados[0]='<div class="alert alert-danger">';
                $dados[1]="Boleto não existe";
            }
        }
        else{
            $dados[0]='<div class="alert alert-danger">';
            $dados[1]="Valor não é valido";
        }
        return $dados;
    }

    public function validar_lote($codigo){

    }

}

?>