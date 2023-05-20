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
                <button class="nav-link active" id="finalidade-tab" onclick="ferramentasJs.listarFinalidade(); " data-bs-toggle="tab" data-bs-target="#finalidade-tab-pane" type="button" role="tab" aria-controls="finalidade-tab-pane" aria-selected="true">FINALIDADE

                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tipo-tab" onclick="ferramentasJs.listarTipo(); " data-bs-toggle="tab" data-bs-target="#tipo-tab-pane" type="button" role="tab" aria-controls="tipo-tab-pane" aria-selected="false">TIPO</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">


            <div class="tab-pane fade show active" id="finalidade-tab-pane" role="tabpanel" aria-labelledby="finalidade-tab" tabindex="0">

                <div class="card mb-4">
                    <div class="card-header">


                        FINALIDADES
                        <div class="card-body">







                            <!-- =================== MODAL E ALERT=================-->
                            <?php include_once(__ABS_DIR__ . 'src/view/shared/modalConfirm.php');
                            include_once(__ABS_DIR__ . 'src/view/shared/alert.php');  ?>

                            <table id="datatablesSimple">
                                <thead>

                                    <tr>
                                      
                                        <th>Finalidade - Descrição</th>
                                        <th></th>
                                        <th></th>
                                    </tr>

                                </thead>

                                <tbody>

                                    <tr id="finalidadeList">

                                        
                                        <td><input name="descricao" id="descricao" type="text"></td>
                                        <td><button type="button" class="btn btn-primary btn-block" onclick="ferramentasJs.limparFinalidade()">LIMPAR</button></td>
                                        <td><button class="btn btn-primary btn-block " type="button" onclick="ferramentasJs.criarFinalidade()">ADICIONAR</button></td>



                                    </tr>
                                    <!-- RESULTADOS FINALIDADE -->


                                    <?php foreach ($arrFinalidade as $dataF) { ?>

                                        <tr id="finalidadeList<?= $dataF[0] ?>">




                                            <td><?= $dataF[1] ?></td>
                                           
                                            <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.editarFinalidade(<?= $dataF[0] ?>, '<?= $dataF[1] ?>')">EDITAR</button></td>
                                            <td><button type="button" class="btn btn-secondary btn-block" onclick="ferramentasJs.excluirFinalidade(<?= $dataF[0] ?>)">EXCLUIR</button></td>



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