<?php
include_once(__ABS_DIR__ . 'js.php'); ?>
<main>
	<div class="container-fluid px-4">

		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-table me-1"></i>
				USUÁRIOS CADASTRADOS
				<div class="card-body">

					<button class="btn btn-primary btn-block" type="button">
						<!--  -->
					</button>
					<div class="d-flex ">
						<button class="btn btn-primary btn-block" type="button" onclick="usuarioJs.criar()">NOVO</button>

					</div>


					<table id="datatablesSimple">
						<thead>
							<tr>
								<!-- <th><input class="form-check-input" type="checkbox" id="inlineCheckbox" value="all"> </th> -->
								<th>Nome</th>
								<th>CPF</th>
								<th>Email principal</th>

								<th>telefone principal</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<!-- <th><input class="form-check-input" type="checkbox" id="inlineCheckbox" value="all"> </th> -->
								<th>Nome</th>
								<th>CPF</th>
								<th>Email principal</th>
								<th>telefone principal</th>

							</tr>
						</tfoot>
						<tbody>
							<!-- RESULTADOS USUÁRIO -->


							<?php foreach ($arrUsuarios as $data) { ?>

								<tr id="usuarioList<?= $data[0]  ?>">




									<!-- <td><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?= $data[0] ?>"></td> -->
									<td href="javascript:void(0)" onclick="usuarioJs.atualizar(<?= $data[0] ?>)" style="cursor: pointer;"><?= $data[2] ?></td>
									<td href="javascript:void(0)" onclick="usuarioJs.atualizar(<?= $data[0] ?>)" style="cursor: pointer;"><?= $data[3] ?></td>
									<td href="javascript:void(0)" onclick="usuarioJs.atualizar(<?= $data[0] ?>)" style="cursor: pointer;"><?= $data[4] ?></td>
									<td href="javascript:void(0)" onclick="usuarioJs.atualizar(<?= $data[0] ?>)" style="cursor: pointer;"><?= $data[5] ?></td>



								</tr>

							<?php } ?>


						</tbody>
					</table>



				</div>
			</div>
		</div>
</main>