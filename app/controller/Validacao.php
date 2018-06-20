<?php
class Validacao{

    public function validar_boleto($codigo,$table){
        $model_impressao = new Model_impressao();
        $validar = $model_impressao->put('id',$table,' id='.$codigo.' AND VALIDADO=0','','');
        if($validar){
            $dados[0]="Success";
            $dados[1]="Boleto Validado";
        }
        else {
            $dados[0]="Error";
            $dados[1]="Boleto já validado";
        }
    }

    public function validar_lote($codigo){

    }

}

?>