<div class="row">
	<div class="col-12">
		<form action="boletos.php" method="POST">
		<div class="card">
				<input type="hidden" name="estado" value="<?php echo $estado; ?>">
		    	<?php
			    	$Mid = 0;
			    	$Bid = 0;
			    	$municipio_atual='-1';
			    	$bairro_atual='-1';
					foreach ($municipios as $municipio) {
						if($municipio_atual<>$municipio['MUNICIPIO']){
							$Mid++;
							echo '<div class="card-header text-white bg-primary">';
								echo $municipio['MUNICIPIO'];
							echo '</div>';
							$municipio_atual=$municipio['MUNICIPIO'];
						}
						if($bairro_atual<>$municipio['BAIRRO']){
							$Bid++;
							echo '<div class="card-header text-white bg-secondary">';
								echo '<input type="checkbox" id="'.$Mid.'-'.$Bid.'" class="cb-selector" data-for="'.$Mid.'-'.$Bid.'\["> '.$municipio['BAIRRO'];
								echo $Bvalue.' <input type="submit" name="enviar" value="Imprimir" class="btn-success">';
							echo '</div>';
							$bairro_atual = $municipio['BAIRRO'];
						}
						echo '<div class="card-body">';
							echo '<input type="checkbox" name="'.$Mid.'-'.$Bid.'[]" value="'.$municipio['CONTADOR'].'" id="'.$Mid.'-'.$Bid.'"> '.$municipio['CONTADOR']."<br/>CEP ".$municipio['CEP']."<br/>BANCO ".$municipio['NOME_BANCO']."<br/>";
						echo "</div>";
					}
				?>
		</div>
		</form>
	</div>
</div>