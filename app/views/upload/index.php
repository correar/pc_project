		<main class="mt-5">
				<section class="col">
					<h2 class="text-center">Upload de arquivos</h2>
				</section>
				<section>
					<div class="card border-success">
						<div class="card-header">Boletos Pessoa Física</div>
						<div class="card-body">
							<form action="upload.php" method="post" enctype="multipart/form-data" id="frm_pf" name="frm_pf">
								<label>Arquivo: </label>
								<input type="file" name="arquivo_pf" id="arquivo_pf" accept=".xml" />
								<input type="hidden" name="pf" value="pf">
								<input type="submit" name="btn_pf" class="btn-success" value="Enviar Boletos PF" id="btn_pf" />
							</form>
						</div>
						<div class="card-footer">
							<div class="alert alert-danger alert-dismissible fade show" role="alert" id="error_pf">
							</div>
							<div class="alert alert-success alert-dismissible fade show" role="alert" id="result_pf">
							</div>
							<div class="progress" id="prog_pf">
		  						<div id="percent_pf" class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><span id="percentVal"></span></div>
							</div>
						</div>
					</div>
				</section>
				<br />
				<section>
					<div class="card border-success">
						<div class="card-header">Boletos Pessoa Jurídica</div>
						<div class="card-body">
							<form action="upload.php" method="post" enctype="multipart/form-data">
								<label>Arquivo: </label>
								<input type="file" name="arquivo_pj" id="arquivo_pj" accept=".xml" />
								<input type="hidden" name="pj" value="pj">
								<input type="submit" name="btn_pj" class="btn-success" value="Enviar Boletos PJ" id="btn_pj" />
							</form>
						</div>
						<div class="card-footer">
							<div class="alert alert-danger alert-dismissible fade show" role="alert" id="error_pj">
							</div>
							<div class="alert alert-success alert-dismissible fade show" role="alert" id="result_pj">
							</div>
							<div class="progress" id="prog_pj">
		  						<div id="percent_pj" class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><span id="percentVal"></span></div>
							</div>
						</div>
					</div>
					
				</section>
		</main>
		<script src="assets/js/upload.js"></script>