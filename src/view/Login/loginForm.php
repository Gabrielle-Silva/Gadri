<div id="layoutAuthentication_content">
	<main>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-5">
					<div class="card shadow-lg border-0 rounded-lg mt-5">
						<div class="card-header">
							<h3 class="text-center font-weight-light my-4">LOGIN</h3>
						</div>

						<div class="card-body">
							<form method="POST" id="loginForm" enctype="multipart/form-data" action="/src/Controller/UsuarioController.php">
								<!-- =================== ALERT=================-->
								<?php include_once(__ABS_DIR__ . 'src/view/Shared/alert.php'); ?>

								<input type="hidden" name="action" value="iniciarSessao">
								<div class="form-floating mb-3">
									<input class="form-control" id="e_mail" name="e_mail" type="email" placeholder="name@example.com" />
									<label for="e_mail">Email</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" id="senha" name="senha" type="password" placeholder="Password" />
									<label for="senha">Senha</label>
								</div>
								<div class="form-check mb-3">
									<input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
									<label class="form-check-label" for="inputRememberPassword">Lembrar senha</label>
								</div>
								<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
									<a class="small" type="button" onclick="usuarioJs.esqueciS()">Esqueceu a senha?</a>
									<button class="btn btn-primary" type="submit">Login</button>
								</div>
							</form>
						</div>
						<div class="card-footer text-center py-3">
							<div class="small">
								<a type="button" onclick="usuarioJs.criar()">Criar uma conta</a>
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