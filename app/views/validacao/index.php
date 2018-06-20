<div class="mt-5 mb-5">
    <form method="post">
        <div class="form-group text-center">
            <label for="inputCodigo" <?php echo $class; ?>><h3>Código de Validação do Bilhete <?php echo $title; ?></h3></label>
            <input type="text" class="form-control" id="inputCodigo" name="inputCodigo" autofocus>
        </div>
        <button type="submit" class="btn btn-primary">Validar</button>
    </form>
</div>

<?php

    $inputCodigo = $_POST['inputCodigo'];
    if($inputCodigo){
        echo $inputCodigo;
    }


?>