<?php

$queryTipo = "select * from tipo";
$resultTipo = mysqli_query($conexao, $queryTipo);

$queryFinalidade = "select * from finalidade";
$resultFinalidade = mysqli_query($conexao, $queryFinalidade);

$queryBairro = "select * from bairro";
$resultBairro = mysqli_query($conexao, $queryBairro);


?>


<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">
                                        INSERIR IMOVEL
                                    </h3>
                                </div>

                                <!-- =================== MODAL E ALERT=================-->
                                <?php include_once(__ABS_DIR__ . 'src/view/shared/modalConfirm.php');
                                include_once(__ABS_DIR__ . 'src/view/shared/alert.php');  ?>
                                <div class="card-body">
                                    <form id="imovelForm" enctype="multipart/form-data" method="post">
                                        <input type="hidden" name="action" value="inserir">
                                        <!-- <input name="cod" class="form-control" id="cod" type="hidden" placeholder="cod" value="<.?= $arrUsuarios[0] ?>" /> -->

                                        <!--********************************************************-->
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <select class="form-control" name="cod_finalidade" id="cod_finalidade">
                                                        <option value="">Finalidade</option>
                                                        <?php while ($data = mysqli_fetch_array($resultFinalidade)) { ?>
                                                            <option value="<?php echo $data['cod'] ?>"><?php echo $data['descricao'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">

                                                    <select class="form-control" name="cod_tipo" id="cod_tipo">
                                                        <option value="">Tipo</option>
                                                        <?php while ($data = mysqli_fetch_array($resultTipo)) { ?>
                                                            <option value="<?php echo $data['cod'] ?>"><?php echo $data['descricao'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!--********************************************************-->

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control" name="cod_bairro" id="cod_bairro">
                                                        <option value="">Bairro</option>
                                                        <?php while ($data = mysqli_fetch_array($resultBairro)) { ?>
                                                            <option value="<?php echo $data['cod'] ?>"><?php echo $data['bairro'] ?></option>
                                                        <?php } ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="logradouro" name="logradouro" type="text" placeholder="Informe o logradouro" />
                                                    <label for="logradouro">Logradouro</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--********************************************************-->

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="numero" name="numero" type="text" placeholder="Informe o numero" />
                                                    <label for="numero">Numero</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="complemento" name="complemento" type="text" placeholder="Informe o complemento, se houver" />
                                                    <label for="complemento">Complemento</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--********************************************************-->

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="cep" name="cep" type="text" placeholder="Informe o cep" />
                                                    <label for="cep">Cep</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="m2" name="m2" type="number" placeholder="Informe os M2" />
                                                    <label for="m2">M<sup>2</sup></label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--********************************************************-->


                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="quartos" name="quartos" type="number" placeholder="Informe o numero de quartos" />
                                                    <label for="quartos">Quartos</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control " id="vagas" name="vagas" type="number" placeholder="Informe o numero de vagas" />
                                                    <label for="vagas">Vagas</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--********************************************************-->




                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="valor" name="valor" type="number" placeholder="Informe o valor" />
                                                    <label for="valor">Valor</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="obs" name="obs" type="text" placeholder="Observações" />
                                                    <label for="obs">Obs</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--********************************************************-->
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input type="file" class="form-control" name="foto[]" id="foto[]" accept=".png,.jpg,.jpeg" placeholder="Escolha uma foto" value="" multiple />
                                                    <label for="foto[]">Fotos</label>

                                                </div>
                                            </div>

                                        </div>

                                        <!--********************************************************-->

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="desativacao" id="desativacao" value="null" checked>
                                            <label class="form-check-label" for="desativacao">
                                                Ativo
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="desativacao" id="desativacao" value="CURDATE()">
                                            <label class="form-check-label" for="desativacao">
                                                Inativo
                                            </label>
                                        </div>
                                        <!--********************************************************-->



                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button type="button" class="btn btn-primary btn-block" onclick="imovelJs.inserirImovel()">SALVAR</button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        <!-- <div class="d-grid">
                                            <a class="btn btn-secondary btn-block" href="javascript:void(0)" type="button" onclick="">EXCLUIR IMOVEL</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- MASK -->

    <script>
        $(document).ready(function() {
            $('#cep').mask('00000-000');
        });
    </script>


</body>

</html>