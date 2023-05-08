<div id="layoutAuthentication_content">
	<main>
		<div class="container">
			<div id="LoginForm" class="row justify-content-center">
				<div class="col-lg-7">
					<div class="card shadow-lg border-0 rounded-lg mt-5">
						<div class="card-header">
							<h3 class="text-center font-weight-light my-4">
								CRIAR CONTA
							</h3>
						</div>
						<div class="card-body">
							<form method="POST" id="criaContaForm" enctype="multipart/form-data">
								<!-- =================== MODAL E ALERT=================-->
								<?php include_once(__ABS_DIR__ . 'src/view/shared/modalConfirm.php');
								include_once(__ABS_DIR__ . 'src/view/shared/alert.php');  ?>


								<div class="form-floating mb-3">
									<input class="form-control" name="nome" id="nome" type="text" />
									<label for="nome">Nome completo</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" name="cpf_cnpj" id="cpf_cnpj" type="text" />
									<label for="cpf_cnpj">CPF</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" name="telefone" id="telefone" type="text" />
									<label for="telefone">Telefone/Celular</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" name="e_mail" id="e_mail" type="email" />
									<label for="e_mail">Endereço de email</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" name="senha" id="senha" type="password" />
									<label for="senha">Senha</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" name="confirmPassword" id="confirmPassword" type="password" />
									<label for="confirmPassword">Confrime a senha</label>
								</div>
								<div class="mt-4 mb-0">
									<div class="d-grid">
										<button class="btn btn-primary btn-block" type="button" onclick="usuarioJs.inserir()">Criar conta</button>

									</div>
								</div>
							</form>
						</div>
						<div class="card-footer text-center py-3">
							<div class="small">
								<a type="button" onclick="usuarioJs.login()">Entrar em uma conta já existente</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
</div>
<div class="fixed-bottom">
	<!-- FOOTER --------- -->
	<?php include_once(__ABS_DIR__ . 'src/view/includes/footer.php'); ?>
</div>
<script>
	$(document).ready(function() {
		var objt = $('#telefone');
		$(objt).mask(($(objt).val().length > 13) ? '(00)00000-0000' : '(00)0000-0000');
		$(objt).keypress(function() {
			$(objt).mask(($(objt).val().length < 13) ? '(00)0000-0000' : '(00)00000-00000');
		});

		var objc = $('#cpf_cnpj');
		$(objc).mask(($(objc).val().length > 14) ? '00.000.000/0000-00' : '000.000.000-00');
		$(objc).keypress(function() {
			$(objc).mask(($(objc).val().length < 14) ? '000.000.000-00' : '00.000.000/0000-00');
		});

	});
</script>