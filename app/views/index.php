<?php
	$nimpresso_pf = $unimed->pessoa_fisica_nimpresso();
	$impressos_pf = $unimed->pessoa_fisica_impresso();
	$total_validados_pf = 0;
	$nimpresso_pj = $unimed->pessoa_juridica_nimpresso();
	$impressos_pj = $unimed->pessoa_juridica_impresso();
	$total_validados_pj = 0;

	foreach($impressos_pf as $impresso){
		foreach($impresso as $key=>$value){
			if($key == 0){
				$dadosimpresso_pf = $value;
			}
			else if($key == 1){
				$pftotal = $value;
			}
		}
	}

	foreach($impressos_pj as $impresso){
		foreach($impresso as $key=>$value){
			if($key == 0){
				$dadosimpresso_pj = $value;
			}
			else if($key == 1){
				$pjtotal = $value;
			}
		}
	}
?>
<!-- Pessao Física -->
<div class="row" style="padding-top:50px;padding-bottom:50px;margin:auto;">
	<div class="card text-white bg-danger mb-3 offset-2" style="max-width: 150rem;">
		<div class="card-header">PF NÃO IMPRESSOS</div>
		<div class="card-body">
			<p class="card-text"><?php echo $nimpresso_pf[0]["total"]; ?></p>
		</div>
	</div>

	<div class="card text-white bg-warning mb-3 offset-1" style="max-width: 150rem;">
		<div class="card-header">PF IMPRESSOS</div>
		<div class="card-body">
			<p class="card-text"><?php echo $pftotal; ?></p>
		</div>
	</div>

	<div class="card text-white bg-success mb-3 offset-1" style="max-width: 150rem;">
		<div class="card-header">PF VALIDADOS</div>
		<div class="card-body">
			<p class="card-text"><?php echo $total_validados_pf; ?></p>
		</div>
	</div>
</div>

<table class="table">
	<thead>
		<tr>
			<th>DATA IMPRESSÃO</th>
			<th>TOTAL</th>
		</tr>
	</thead>
</table>
<div style="height:150px;overflow-y:scroll;overflow-x:hidden;margin-top:-17px;">
	<table class="table">
		<tbody>
		<?php
		foreach($dadosimpresso_pf as $impresso){
			echo "<tr><td>".$impresso['DATA_IMPRESSO']."</td><td>";
			echo $impresso['total']."</td></tr>";
		}
		?>
		</tbody>
	</table>
</div>
<!-- Pessao Jurídica -->
<div class="row" style="padding-top:50px;padding-bottom:50px;margin:auto;">
	<div class="card text-white bg-danger mb-3 offset-2" style="max-width: 150rem;">
		<div class="card-header">PJ NÃO IMPRESSOS</div>
		<div class="card-body">
			<p class="card-text"><?php echo $nimpresso_pj[0]["total"]; ?></p>
		</div>
	</div>

	<div class="card text-white bg-warning mb-3 offset-1" style="max-width: 150rem;">
		<div class="card-header">PJ IMPRESSOS</div>
		<div class="card-body">
			<p class="card-text"><?php echo $pjtotal; ?></p>
		</div>
	</div>

	<div class="card text-white bg-success mb-3 offset-1" style="max-width: 150rem;">
		<div class="card-header">PF VALIDADOS</div>
		<div class="card-body">
			<p class="card-text"><?php echo $total_validados_pj; ?></p>
		</div>
	</div>
</div>

<table class="table">
	<thead>
		<tr>
			<th>DATA IMPRESSÃO</th>
			<th>TOTAL</th>
		</tr>
	</thead>
</table>
<div style="height:150px;overflow-y:scroll;overflow-x:hidden;margin-top:-17px;">
	<table class="table">
		<tbody>
		<?php
		foreach($dadosimpresso_pj as $impresso){
			echo "<tr><td>".$impresso['DATA_IMPRESSO']."</td><td>";
			echo $impresso['total']."</td></tr>";
		}
		?>
		</tbody>
	</table>
</div>




