<main class="mt-5">
	<section class="col">
		<div class="alert alert-success" role="alert">
			<h2 class="text-center">Impressão dos arquivos PF</h2>
		</div>
	</section>
	<section>
		<form action="boletos.php" method="post" id="frm_estado" name="frm_estado">
			<div class="row">
				<div class="col-12">
					Estado
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<?php
						$estados = $impressao->listar_estado();
					?>
					<select name="estado">
						<?php 
							foreach ($estados as $estado) {
								foreach ($estado as $key => $value) {
									$qtd = $impressao->qtd_nao_impresso($value);
									echo "<option value='$value'>".$value." ".$qtd['qtd']."</option>";
								}
									
							}
						?>
					</select>
					<input type="submit" name="btn_estado" class="btn-success" value="Selecionar Estado" id="btn_estado" />
				</div>
			</div>
		</form>
	</section>
	<section id="boletos"></section>
</main>
<script src="assets/js/impressao.js"></script>