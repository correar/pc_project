<main>
	<section>
		<div class="<?php echo $class; ?>"><?php echo $message; ?></div>
	</section>
	<?php
	if($class == "success-return"){
	?>
		<section>
			<input type="button" name="btn_separar" class="btn-success" value="Iniciar Separação dos boletos"></button>
		</section>
	<?php
	}
	?>
</main>