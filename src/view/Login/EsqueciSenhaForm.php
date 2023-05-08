<div id="layoutAuthentication_content">
	<main>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-5">
					<div class="card shadow-lg border-0 rounded-lg mt-5">
						<div class="card-header">
							<h3 class="text-center font-weight-light my-4">
								RECUPERAR SENHA
							</h3>
						</div>
						<div class="card-body">
							<div class="small mb-3 text-muted">
								Insira seu endereço de email e nós enviaremos a você um
								link para resetar sua senha.
							</div>
							<form>
								<div class="form-floating mb-3">
									<input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
									<label for="inputEmail">Endereço de email</label>
								</div>
								<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
									<a class="small" type="button" onclick="usuarioJs.login()">Retornar para login</a>
									<a class="btn btn-primary" href="#">Resetar senha</a>
								</div>
							</form>
						</div>
						<div class="card-footer text-center py-3">
							<div class="small">
								<a type="button" onclick="usuarioJs.criar()">Crie sua conta aqui!</a>
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