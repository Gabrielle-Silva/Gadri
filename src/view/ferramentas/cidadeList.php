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
                <button class="nav-link active" id="cidade-tab" onclick="ferramentasJs.listarCidade(); " data-bs-toggle="tab" data-bs-target="#cidade-tab-pane" type="button" role="tab" aria-controls="cidade-tab-pane" aria-selected="true">CIDADE

                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="bairro-tab" onclick="ferramentasJs.listarBairro(); " data-bs-toggle="tab" data-bs-target="#bairro-tab-pane" type="button" role="tab" aria-controls="bairro-tab-pane" aria-selected="false">BAIRRO</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">


            <div class="tab-pane fade show active" id="cidade-tab-pane" role="tabpanel" aria-labelledby="cidade-tab" tabindex="0">

                <div class="card mb-4">
                    <div class="card-header">


                        CIDADES E ESTADOS
                        <div class="card-body">







                            <!-- =================== MODAL E ALERT=================-->
                            <?php include_once(__ABS_DIR__ . 'src/view/shared/modalConfirm.php');
                            include_once(__ABS_DIR__ . 'src/view/shared/alert.php');  ?>

                            <table id="datatablesSimple">
                                <thead>

                                    <tr>
                                        <th>UF</th>
                                        <th>Cidade</th>
                                        <th></th>
                                        <th></th>
                                    </tr>

                                </thead>

                                <tbody>

                                    <tr id="cidadeList">

                                        <td><input name="uf" id="uf" type="text"></td>
                                        <td><input name="cidade" id="cidade" type="text"></td>
                                        <td><button type="button" class="btn btn-primary btn-block" onclick="ferramentasJs.limparCidade()">LIMPAR</button></td>
                                        <td><button class="btn btn-primary btn-block " type="button" onclick="ferramentasJs.criarCidade()">ADICIONAR</button></td>



                                    </tr>
                                    <!-- RESULTADOS CIDADES -->


                                    <?php foreach ($arrCidade as $dataC) { ?>

                                        <tr id="cidadeList<?= $dataC[0] ?>">




                                            <td><?= $dataC[1] ?></td>
                                            <td><?= $dataC[2] ?></td>
                                            <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.editarCidade(<?= $dataC[0] ?>, '<?= $dataC[1] ?>', '<?= $dataC[2] ?>')">EDITAR</button></td>
                                            <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.excluirCidade(<?= $dataC[0] ?>)">EXCLUIR</button></td>



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