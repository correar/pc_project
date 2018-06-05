<div class="row">
	<div class="col-12">
		<form action="boletos.php" method="POST">
		<div class="card">
				<input type="hidden" name="estado" value="<?php echo $estado; ?>">
		    	<?php
		    	$Mid = 0;
		    	$Bid = 0;
				foreach ($municipios as $municipio) {
					foreach ($municipio as $Mkey => $Mvalue) {
						echo '<div class="card-header text-white bg-primary">';
							echo $Mvalue;
						echo '</div>';
						$bairros = $impressao->listar_bairros($Mvalue,$estado);
						foreach ($bairros as $bairro) {
							foreach ($bairro as $Bkey => $Bvalue) {
								echo '<div class="card-header text-white bg-secondary">';
									echo $Bvalue.' <input type="submit" name="enviar_'.$Bid.'" value="Imprimir" class="btn-success">';
								echo '</div>';
								$boletos = $impressao->listar_boletos($Bvalue,$Mvalue,$estado);
								foreach ($boletos as $boleto) {
									echo '<div class="card-body">';
									foreach ($boleto as $key => $value) {
										if($key == "CONTADOR"){
											echo '<input type="checkbox" name="'.$Mid.'-'.$Bid.'[]" value="'.$value.'" id="'.$value.'"> '.$value."</br>";
										}
										else{
											echo $value."</br>";
										}
									}
									echo "</div>";
								}
								echo ' <input type="submit" name="enviar_'.$Bvalue.'" value="Imprimir" class="btn-success">';
								$Bid++;
							}
						}
						$Mid++;
					}
				}
				?>
			
		</div>
		</form>
	</div>
</div>