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
				<button class="nav-link " id="finalidade-tab" onclick="ferramentasJs.listarFinalidade(); " data-bs-toggle="tab" data-bs-target="#finalidade-tab-pane" type="button" role="tab" aria-controls="finalidade-tab-pane" aria-selected="true">FINALIDADE

				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="tipo-tab" onclick="ferramentasJs.listarTipo(); " data-bs-toggle="tab" data-bs-target="#tipo-tab-pane" type="button" role="tab" aria-controls="tipo-tab-pane" aria-selected="false">TIPO</button>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">


			<div class="tab-pane fade show active" id="finalidade-tab-pane" role="tabpanel" aria-labelledby="finalidade-tab" tabindex="0">

				<div class="card mb-4">
					<div class="card-header">


						TIPOS
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
										<th>Tipo - Descrição</th>										
										<th></th>
										<th></th>
									</tr>

								</thead>

								<tbody>

									<tr id="tipoList">

										<td><input name="descricao" id="descricao" type="text"></td>									
										<td><button type="button" class="btn btn-primary btn-block" onclick="ferramentasJs.limparTipo()">LIMPAR</button></td>
										<td><button class="btn btn-primary btn-block" type="button" onclick="ferramentasJs.criarTipo()">ADICIONAR</button></td>



									</tr>
									<!-- RESULTADOS TIPOS -->


									<?php foreach ($arrTipo as $dataT) { ?>

										<tr id="tipoList<?= $dataT[0] ?>">



											<td><?= $dataT[1] ?></td>											
											<td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.editarTipo(<?= $dataT[0] ?>, '<?= $dataT[1] ?>')">EDITAR</button></td>
											<td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.excluirTipo(<?= $dataT[0] ?>)">EXCLUIR</button></td>



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