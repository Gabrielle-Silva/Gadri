<?php
include_once(__ABS_DIR__ . 'js.php');
?>

<main>
	<div class="container-fluid px-4">

		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-table me-1"></i>
				AGENDAMENTOS

				<!-- =================== MODAL =================-->
				<?php include_once(__ABS_DIR__ . 'src/view/shared/modalConfirm.php');
				?>
				<div class="card-body">
					<table id="datatablesSimple">
						<?php if (isset($_SESSION['login']) && $_SESSION['perfil'] == 'a') { ?>
							<div class="form-check form-switch">
								<input src="/src/view/usuario/usuarioJs.php" onclick="switchbtn(this);" class="form-check-input" type="checkbox" name="checkbox" role="switch" id="flexSwitchCheckChecked">
								<label class="form-check-label" for="flexSwitchCheckChecked">Agendamentos futuros</label>
							</div>
						<?php
						} ?>
				</div>
				<thead>
					<tr>
						<th>Nome usuario</th>
						<th>Data</th>
						<th>horario</th>
						<th>Cód imóvel</th>
						<th>logradouro</th>
						<th>numero</th>
						<th>Complemento</th>
						<th>Bairro</th>
						<th>Cidade</th>
						<th>Situação</th>
						<th></th>

					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Nome usuario</th>
						<th>Data</th>
						<th>horario</th>
						<th>Cód imóvel</th>
						<th>logradouro</th>
						<th>numero</th>
						<th>Complemento</th>
						<th>Bairro</th>
						<th>Cidade</th>
						<th>Situação</th>
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					<!-- RESULTADOS AGENDAMENTOS -->
					<?php foreach ($arrAgendamento as $dataA) { ?>
						<tr>
							<?php if (isset($_SESSION['login']) && $_SESSION['perfil'] == 'a') { ?>
								<td><a href="javascript:void(0)" onclick="usuarioJs.atualizar(<?= $dataA[1] ?>)"><?php echo $dataA[2] ?></a></td>
							<?php
							} else { ?>
								<td><a href="#"><?= $dataA[2] ?></a></td>

							<?php
							} ?>
							<td><?= $dataA[3] ?></td>
							<td><?= $dataA[4] ?></td>
							<td><a href="javascript:void(0)" onclick="imovelJs.imovelInfo(<?= $dataA[5] ?>)"><?= $dataA[5] ?></a></td>
							<td><?= $dataA[6] ?></td>
							<td><?= $dataA[7] ?></td>
							<td><?= $dataA[8] ?></td>
							<td><?= $dataA[9] ?></td>
							<td><?= $dataA[10] ?></td>
							<td><?php if (!empty($dataA[12]) && ($dataA[12] >= $dataA[3])) {
									echo 'Não compareceu';
								} else if (!empty($dataA[12]) && ($dataA[12] < $dataA[3])) {
									echo 'Cancelado';
								} else if (empty($dataA[12]) && ($dataA[3] < date('Y-m-d'))) {
									echo 'Realizado';
								} else {
									echo 'Ativo';
								}
								?></td>
							<td><?php if (empty($dataA[12]) && ($dataA[3] >= date('Y-m-d'))) { ?>
									<button type="button" class="btn btn-primary btn-block" onclick="agendamentoJs.cancelarAgendamento(<?= $dataA[0] ?>)">CANCELAR</button>
								<?php
								}
								if ($_SESSION['perfil'] == 'a') { ?>
									<button type="button" class="btn btn-secondary btn-block" onclick="agendamentoJs.excluirAgendamento(<?= $dataA[0] ?>)">EXCLUIR</button> <?php
																																										} ?>


			</div>
			</td>
			</tr>
		<?php }
		?>
		</tbody>
		</table>

		</div>
	</div>
	</div>
</main>