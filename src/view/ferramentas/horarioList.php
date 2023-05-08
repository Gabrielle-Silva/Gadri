<?php
// Verifica permissão para a tela
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['login']) or ($_SESSION['perfil'] != 'a')) {
    header("Location: /index.php");
    exit;
}
?>

<?php
include_once(__ABS_DIR__ . 'js.php'); ?><div class="card mb-4">
    <div class="card-header">


        HORARIOS
        <div class="card-body">


            <!-- =================== MODAL E ALERT=================-->
            <?php include_once(__ABS_DIR__ . 'src/view/shared/modalConfirm.php');
            include_once(__ABS_DIR__ . 'src/view/shared/alert.php');  ?>

            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Horario (formato 00:00:00)</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                    </tr>

                </thead>

                <tbody>

                    <tr id="horarioList">

                        <td><select name="descricao" id="descricao">
                                <option value="">Descrição</option>
                                <option value="Úteis">Úteis</option>
                                <option value="Domingos-Feriados">Domingos-Feriados</option>
                                <option value="Excepcionais">Excepcionais</option>
                            </select></td>
                        <td><input name="horario" id="horario" class="horario" type="text"></td>
                        <td>
                            <input class="form-check-input" type="radio" id="ativo1" name="ativo" value="s" checked> <label for="ativo1">Ativo</label>
                            <input class="form-check-input" type="radio" id="ativo2" name="ativo" value="n"> <label for="ativo2">Inativo</label>

                        </td>
                        <td><button type="button" class="btn btn-primary btn-block" onclick="ferramentasJs.limparHorario()">LIMPAR</button></td>
                        <td><button class="btn btn-primary btn-block" type="button" onclick="ferramentasJs.criarHorario()">ADICIONAR</button></td>



                    </tr>
                    <!-- RESULTADOS HORARIOS -->


                    <?php foreach ($arrHorario as $dataH) { ?>

                        <tr id="horarioList<?= $dataH[0] ?>">



                            <td><?= $dataH[1] ?></td>
                            <td><?= $dataH[2] ?></td>
                            <td><?php if ($dataH[3] == 's') {
                                    echo 'Ativo';
                                } else {
                                    echo 'Inativo';
                                } ?></td>
                            <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.editarHorario(<?= $dataH[0] ?>, '<?= $dataH[1] ?>', '<?= $dataH[2] ?>', '<?= $dataH[3] ?>')">EDITAR</button></td>
                            <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.excluirHorario(<?= $dataH[0] ?>)">EXCLUIR</button></td>



                        </tr>

                    <?php } ?>


                </tbody>
            </table>


        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.horario').mask('00:00:00');
    });
</script>