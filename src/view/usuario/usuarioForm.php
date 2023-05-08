<div id="layoutAuthentication">
	<div id="layoutAuthentication_content">
		<main>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-7">
						<div class="card shadow-lg border-0 rounded-lg mt-5">
							<div class="card-header">
								<h3 class="text-center font-weight-light my-4">
									<?php if ($_SESSION['perfil'] == 'u') {
										echo 'Meus dados';
									} else {
										echo "Dados do usuário";
									} ?>
								</h3>
							</div>
							<!-- =================== MODAL E ALERT=================-->
							<?php include_once(__ABS_DIR__ . 'src/view/shared/modalConfirm.php');
							include_once(__ABS_DIR__ . 'src/view/shared/alert.php');  ?>

							<div class="card-body">
								<form id="usuarioForm" enctype="multipart/form-data" method="post">
									<input name="cod" class="form-control" id="cod" type="hidden" placeholder="cod" value="<?= $arrUsuarios[0] ?>" />
									<input type="hidden" name="action" value="editar">

									<div class="d-flex justify-content-end rounded-circle center-cropped mx-auto" style="width: 250px; height: 250px;background-image: url('/assets/img/usuario/<?= $arrUsuarios[8] ?>');">

										<div style="align-self:flex-end; align-items: flex-end">
											<input type="file" accept=".png,.jpg,.jpeg" class="form-control" name="foto" id="foto" style="display: none;" />
											<label for="foto" class="btn btn-primary btn-block rounded-circle"><svg xmlns="http://www.w3.org/2000/svg" style="height:30; width: 30; padding: 15%" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
													<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
													<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
												</svg></label>
										</div>

									</div>


									<!--********************************************************-->
									<div class="form-floating mb-3">
										<input name="nome" class="form-control" id="nome" type="text" placeholder="Nome" value="<?= $arrUsuarios[2] ?>" <?php if ($_SESSION['perfil'] != 'a') {
																																							echo 'readonly="readonly"';
																																						} ?> />
										<label for="nome">NOME</label>
									</div>

									<!--********************************************************-->

									<div class="form-floating mb-3">
										<input name="cpf_cnpj" class="form-control" id="cpf_cnpj" type="cpf" placeholder="CPF" value="<?= $arrUsuarios[3] ?>" <?php if ($_SESSION['perfil'] != 'a') {
																																									echo 'readonly="readonly"';
																																								} ?> />
										<label for="cpf_cnpj">CPF/CNPJ</label>
									</div>
									<!--********************************************************-->

									<div class="form-floating mb-3">
										<input name="telefone" class="form-control" id="telefone" type="text" placeholder="Telefone" value="<?= $arrUsuarios[4] ?>" />
										<label for="telefone">Telefone/Celular</label>
									</div>
									<!--********************************************************-->

									<div class="form-floating mb-3">
										<input name="e_mail" class="form-control" id="e_mail" type="email" placeholder="name@example.com" value="<?= $arrUsuarios[5] ?>" <?php if ($_SESSION['perfil'] != 'a') {
																																												echo 'readonly="readonly"';
																																											} ?> />
										<label for="e_mail">Endereço de email</label>
									</div>
									<!--********************************************************-->

									<div class="form-floating mb-3">
										<input name="endereco" class="form-control" id="endereco" type="text" placeholder="Endereço" value="<?= $arrUsuarios[9] ?>" />
										<label for="endereco">Endereço</label>
									</div>
									<!--********************************************************-->

									<div class="form-floating mb-3">
										<input name="bairro" class="form-control" id="bairro" type="text" placeholder="Bairro" value="<?= $arrUsuarios[10] ?>" />
										<label for="bairro">Bairro</label>
									</div>
									<!--********************************************************-->

									<div class="form-floating mb-3">
										<input name="cidade" class="form-control" id="cidade" type="Cidade" placeholder="Cidade" value="<?= $arrUsuarios[11] ?>" />
										<label for="cidade">Cidade</label>
									</div>
									<!--********************************************************-->
									<input type="hidden" name="senha" class="form-control" id="senha" type="password" placeholder="senha atual" value="<?= $arrUsuarios[6] ?>" readonly="readonly" />
									<!-- TODO: Gera uma senha aleatória e envia para o email e implementar nova senha -->
									<!-- 		<.?php if ($_SESSION['perfil'] == 'u') { ?>


											<div class="form-floating mb-3">
												<input type="hidden" name="senhaAtualHide" class="form-control" id="senhaAtualHide" type="password" placeholder="senha atual" value="<.?= $arrUsuarios[6] ?>" readonly="readonly" />
												<input name="senhaAtual" class="form-control" id="senhaAtual" type="password" placeholder="senha atual" value="" />
												<label for="senhaAtual">Senha atual</label>
											</div>
											<div class="form-floating mb-3">
												<input name="senha" class="form-control" id="senha" type="password" placeholder="senha" value="" />
												<label for="senha">Nova senha</label>
											</div>
											<div class="form-floating mb-3">
												<input name="senhaConfirm" class="form-control" id="senhaConfirm" type="password" placeholder="senha" value="" />
												<label for="senhaConfirm">Confirme a senha</label>

											</div>

										<.?php
										} else { ?>
											<a class="btn btn-secondary btn-block">Enviar uma nova senha para e-mail</a>
											<input type="hidden" name="senha" id="senha" type="password" placeholder="senha" value="<.?= $arrUsuarios[6] ?>" style="display:none;" />

										<.?php
										}  ?> -->
									<!--********************************************************-->


									<div class="mt-4 mb-0">
										<div class="d-grid">
											<button type="button" class="btn btn-primary btn-block" onclick="usuarioJs.editar(<?= $arrUsuarios[0] ?>)">SALVAR</button>

										</div>
									</div>

								</form>
							</div>
							<div class="card-footer text-center py-3">
								<div class="small">
									<div class="d-grid">
										<a class="btn btn-secondary btn-block" href="javascript:void(0)" onclick="usuarioJs.apagar(<?= $arrUsuarios[0] ?>); usuarioJs.pesquisar()">EXCLUIR CONTA</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
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