<?php
// Verifica permissão para a tela
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['login']) or ($_SESSION['perfil'] != 'a')) {
	header("Location: /index.php");
	exit;
}
?>
<?php
include_once(__ABS_DIR__ . 'js.php'); ?>
<main>
	<div class="container-fluid px-4">
		<br>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link " id="cidade-tab" onclick="ferramentasJs.listarCidade(); " data-bs-toggle="tab" data-bs-target="#cidade-tab-pane" type="button" role="tab" aria-controls="cidade-tab-pane" aria-selected="true">CIDADE

				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="bairro-tab" onclick="ferramentasJs.listarBairro(); " data-bs-toggle="tab" data-bs-target="#bairro-tab-pane" type="button" role="tab" aria-controls="bairro-tab-pane" aria-selected="false">BAIRRO</button>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">


			<div class="tab-pane fade show active" id="cidade-tab-pane" role="tabpanel" aria-labelledby="cidade-tab" tabindex="0">

				<div class="card mb-4">
					<div class="card-header">


						BAIRROS E REGIÕES
						<div class="card-body">

							<?php
							$queryCidade = "select * from cidade";
							$resultCidade = mysqli_query($conexao, $queryCidade);
							?>





							<!-- =================== MODAL E ALERT=================-->
							<?php include_once(__ABS_DIR__ . 'src/view/shared/modalConfirm.php');
							include_once(__ABS_DIR__ . 'src/view/shared/alert.php');  ?>

							<table id="datatablesSimple">
								<thead>
									<tr>
										<th>Bairro</th>
										<th>Região</th>
										<th>Cidade</th>
										<th></th>
										<th></th>
									</tr>

								</thead>

								<tbody>

									<tr id="bairroList">

										<td><input name="bairro" id="bairro" type="text"></td>
										<td><input name="regiao" id="regiao" type="text"></td>
										<td><select name="cod_cidade" id="cod_cidade">
												<option value="">Cidade</option>
												<?php while ($dataC = mysqli_fetch_array($resultCidade)) { ?>
													<option value="<?= $dataC[0] ?>"><?= $dataC[2] ?> / <?= $dataC[1] ?></option>
												<?php } ?>
											</select></td>
										<td><button type="button" class="btn btn-primary btn-block" onclick="ferramentasJs.limparBairro()">LIMPAR</button></td>
										<td><button class="btn btn-primary btn-block" type="button" onclick="ferramentasJs.criarBairro()">ADICIONAR</button></td>



									</tr>
									<!-- RESULTADOS BAIRROS -->


									<?php foreach ($arrBairro as $dataB) { ?>

										<tr id="bairroList<?= $dataB[0] ?>">



											<td><?= $dataB[1] ?></td>
											<td><?= $dataB[3] ?></td>
											<!-- FIXME: ALTERAR CODIGO POR NOME DA CIDADE -->
											<td><?= $dataB[2] ?></td>
											<td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.editarBairro(<?= $dataB[0] ?>, '<?= $dataB[1] ?>', '<?= $dataB[3] ?>', '<?= $dataB[2] ?>')">EDITAR</button></td>
											<td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.excluirBairro(<?= $dataB[0] ?>)">EXCLUIR</button></td>



										</tr>

									<?php } ?>


								</tbody>
							</table>







						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</main>