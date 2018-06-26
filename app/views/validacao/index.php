<div class="mt-5 mb-5">
    <form method="post">
        <div class="form-group text-center">
            <div <?php echo $class; ?> role="alert"><h3>Código de Validação do Bilhete <?php echo $titulo; ?></h3></div>
            <input type="text" class="form-control" id="inputCodigo" name="inputCodigo" autofocus>
        </div>
        <button type="submit" class="btn btn-primary">Validar</button>
    </form>
</div>

<?php

    $inputCodigo = $_POST['inputCodigo'];
    if($inputCodigo){
        
        $tabela = "boletos_".$tipo;
        $resp = $validar->validar_boleto($inputCodigo,$tabela);
        echo $resp[0];        
            echo $resp[1].' '.$inputCodigo;
        echo '</div>';
        
    }


?>