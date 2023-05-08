<!-- Filtros de pesquisa TODO: CONFIGURAR PARA QUE FUNCIONE-->
<div class="container mt-5 mb-5">
    <!--  <div id="topfilter" class="d-flex justify-content-end">
        <label for="busca">Busca: </label>
        <input type="text" class="form-control">
        <label for="order">Ordernar por: </label>
        <select name="oder" id="oerder">
            <option value="">selecione</option>
            <option value="">recentes</option>
            <option value="">valor</option>
            <option value="">tamanho</option>
        </select>

    </div> -->
    <div class="row g-1">
        <!-- botao para adicionar imovel apenas para admin-->
        <?php if (isset($_SESSION['login']) && $_SESSION['perfil'] == 'a') { ?>
            <div class="d-flex ">
                <button class="btn btn-secondary btn-block" type="button" onclick="imovelJs.imovelform()">ADICIONAR IMOVEL</button>

            </div>
        <?php
        } ?>

        <!-- =================== MODAL =================-->
        <?php include_once(__ABS_DIR__ . 'src/view/shared/modalConfirm.php');
        ?>

        <?php foreach ($arrImoveis as $dataI) { ?>
            <div class="col-md-4">
                <div class="p-card">
                    <div class="p-carousel">
                        <div class="carousel slide" data-ride="carousel" id="carousel-<?= $dataI[0] ?>">
                            <div class="carousel-inner" role="listbox">
                                <!-- fotos -->
                                <?php $arr_foto = explode(",", $dataI[8]); ?>
                                <div class="carousel-item active"><img class="w-100 d-block" src="/assets/img/imoveis/imv<?= $dataI[0] ?>/<?= $arr_foto[0] ?>" alt="Slide Image"></div>
                                <div class="carousel-item"><img class="w-100 d-block" src="/assets/img/imoveis/imv<?= $dataI[0] ?>/<?= $arr_foto[1] ?>" alt="Slide Image"></div>
                                <div class="carousel-item"><img class="w-100 d-block" src="/assets/img/imoveis/imv<?= $dataI[0] ?>/<?= $arr_foto[2] ?>" alt="Slide Image"></div>

                            </div>
                            <div>
                                <a class="carousel-control-prev" href="#carousel-<?= $dataI[0] ?>" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-<?= $dataI[0] ?>" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-<?= $dataI[0] ?>" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-<?= $dataI[0] ?>" data-slide-to="1"></li>
                                <li data-target="#carousel-<?= $dataI[0] ?>" data-slide-to="2"></li>
                            </ol>
                        </div>
                    </div>
                    <!--  detalhes -->
                    <div class="p-details ">
                        <!--  botao de ativar/desativar apenas para admin -->
                        <?php if (isset($_SESSION['login']) && $_SESSION['perfil'] == 'a') {
                            $queryAtivos = "select cod from imovel where desativacao is null";
                            $resultAtivos = mysqli_query($conexao, $queryAtivos);
                            $rows = [];
                            while ($row = mysqli_fetch_array($resultAtivos)) {
                                $rows[] = $row[0];
                            }
                            if (in_array($dataI[0], $rows, TRUE)) { ?>
                                <button id="btn-ativarIm" class="btn btn-block btn-sm ativo" type="button" style="width: 100%;" onclick="imovelJs.ativarDesativar(this, <?= $dataI[0] ?>)">DESATIVAR</button>
                            <?php
                            } else { ?>
                                <button id="btn-ativarIm" class="btn btn-block btn-sm " type="button" style="width: 100%;" onclick="imovelJs.ativarDesativar(this, <?= $dataI[0] ?>)">ATIVAR</button>
                        <?php
                            }
                        } ?>
                        <div role="button" onclick="imovelJs.imovelInfo('<?= $dataI[0] ?>')">
                            <div id="descricaoImovel" class="d-flex justify-content-between align-items-center mx-2">

                                <h5><?= $dataI[2] ?> - <?= $dataI[12] ?> / <?= $dataI[13] ?></h5>
                                <span><small class="text-muted">Cód <?= $dataI[0] ?></small></span>
                            </div>

                            <div class="mx-2">
                                <hr class="line">
                            </div>

                            <div class="info d-flex justify-content-between mt-2 spec mx-2">
                                <div class="d-flex flex-column align-items-center">
                                    <h6 class="mb-0">Quartos</h6>
                                    <span><?= $dataI[4] ?></span>
                                </div>

                                <div class="d-flex flex-column align-items-center">
                                    <h6 class="mb-0">Vagas</h6>
                                    <span><?= $dataI[5] ?></span>
                                </div>

                                <div class="d-flex flex-column align-items-center">
                                    <h6 class="mb-0">Área</h6>
                                    <span><?= $dataI[3] ?>m<sup>2</sup></span>
                                </div>

                                <div class="d-flex flex-column align-items-center">
                                    <h6 class="mb-0"><?= $dataI[1] ?></h6>
                                    <span>R$ <?= $dataI[6] ?></span>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <!- CONFIGURAR BOTÃO BAIBAMAIS-->
                                <!-- <button id="btn-saibamais" class="btn btn-block btn-sm" type="button"><i class="bi bi-info-circle" onclick="imovelJs.imovelInfo('<?= $dataI[0] ?>')"></i></button><br> -->
                                <!-- Button trigger modal -->
                                <button type="button" id="btn-agendar" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="agendamentoJs.agendaImovel(<?= $dataI[0] ?>);">
                                    AGENDAR VISITA
                                </button>

                                <!-- Modal -->
                                <div id="modalAgendamento">

                                    <?php include_once(__ABS_DIR__ . 'src/view/agendamento/realizarAgendamento.php'); ?>
                                </div>


                                <?php if (isset($_SESSION['login']) && $_SESSION['perfil'] == 'a') { ?>
                                    <button id="btn-edit" class="btn btn-block btn-sm btn-edit" type="button"><i class="bi bi-pencil-square" onclick="imovelJs.editarImovel(<?= $dataI[0] ?>)"></i></i></button>
                                    <?php
                                } else if (isset($_SESSION['login']) && $_SESSION['perfil'] == 'u') {
                                    $queryFavoritos = "select cod_imovel from favorito where cod_usuario = " . $_SESSION['login'];
                                    $resultFavoritos = mysqli_query($conexao, $queryFavoritos);
                                    $rows = [];
                                    while ($row = mysqli_fetch_array($resultFavoritos)) {
                                        $rows[] = $row[0];
                                    }
                                    if (in_array($dataI[0], $rows, TRUE)) { ?>
                                        <button onclick="imovelJs.favoritar(this, <?= $dataI[0] ?>, <?= $_SESSION['login'] ?>)" id="btn-like" class=" btn-like btn btn-block btn-sm favorito" type="button"><i class="bi bi-heart"></i></i></button>
                                    <?php
                                    } else { ?>
                                        <button onclick="imovelJs.favoritar(this, <?= $dataI[0] ?>, <?= $_SESSION['login'] ?>)" id="btn-like" class=" btn-like btn btn-block btn-sm" type="button"><i class="bi bi-heart-fill"></i></i></button>

                                    <?php
                                    }
                                } else { ?>
                                    <button onclick="alert('Faça login para salvar imovel aos favoritos')" id="btn-like" class=" btn-like btn btn-block btn-sm" type="button"><i class="bi bi-heart-fill"></i></i></button>

                                <?php
                                } ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>



    </div>
</div>
<footer>
    <!-- footer  -->
    <?php include_once(__ABS_DIR__ . 'src/view/includes/footer.php'); ?>
</footer>