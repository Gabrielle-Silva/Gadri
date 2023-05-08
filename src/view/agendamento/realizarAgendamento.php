<div class="modal fade modal-fullscreen" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style="background-color: #1c282f; height: 100px;">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">AGENDE SUA VISITA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: grey;">




                <?php
                $queryCod_horario = "select * from horario";
                $resultHorario = mysqli_query($conexao, $queryCod_horario);

                ?>


                <div>
                    <!-- TODO: PAGINA DE AGENDAMENTO SE HOUVER SESSÃO ATIVA -->

                    <form id="AgendamentoForm" class="row">
                        <?php
                        $arrMsgErro[] = '';
                        if (count($arrMsgErro) > 1) {
                            include_once(__ABS_DIR__ . 'src/view/Shared/alert.php');
                        } ?>
                        <input class="form-control" name="action" id="action" type="hidden" value="inserirAgendamento" />
                        <input class="form-control" name="cod_imovel" id="cod_imovel" type="hidden" value="" />
                        <input class="form-control" name="cod_usuario" id="cod_usuario" type="hidden" value="<?= $_SESSION["login"] ?>" />
                        <input class="form-control" name="data" id="data" type="hidden" value="" />
                        <input class="form-control" name="cod_horario" id="cod_horario" type="hidden" value="" />



                        <!-- CALENDARIO -->
                        <div class="col align-self-center col-agendamento">
                            <div id='calendar' style="overflow: auto; height: auto"></div>
                            <button type="button" id="btn-callendar" class="btn btn-primary btn-sm" onclick="loadCalendar(); this.style.display = 'none';">ABRIR CALENDARIO</button>
                        </div>


                        <div class="col align-self-center col-agendamento">
                            <h2 id="dia" style="height: 100px">Escolha uma data!</h2>



                            <!-- HORARIO -->
                            <div class="btn-group btn-group-toggle" style="margin: 10px auto" id="horarios" data-toggle="buttons">

                                <?php while ($data = mysqli_fetch_array($resultHorario)) { ?>
                                    <label class="btn btn-secondary <?php echo $data['descricao'] ?>" onclick="getHorarioValue(document.getElementById('horario<?= $data['cod'] ?>').value)" for="horario" style="display: none;">
                                        <input type="radio" name="horario" id="horario<?= $data['cod'] ?>" value="<?= $data['cod'] ?>" autocomplete="off"> <?php echo $data['horario'] ?>
                                    </label>
                                <?php } ?>


                            </div>
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <hr>
                                    <p>-</p>
                                    <input class="form-control" id="obs" type="text" placeholder="Observações:" />
                                    <label for="obs">Observações:</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- USUARIO -->
                                <?php if (isset($_SESSION['login']) && $_SESSION['perfil'] == 'a') {
                                    $queryUsuarios = "select * from usuario";
                                    $resultUsuarios = mysqli_query($conexao, $queryUsuarios); ?>
                                    <div class="form-floating mb-3">
                                        <p>Usuários:</p>
                                        <select class="form-control" name="cod_usuario" id="cod_usuario">
                                            <option value="">Usuarios</option>
                                            <?php while ($data = mysqli_fetch_array($resultUsuarios)) { ?>
                                                <option value="<?php echo $data['cod'] ?>"><?php echo $data['nome'] ?> - <?php echo $data['e_mail'] ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                <?php
                                } else if (isset($_SESSION['login']) && $_SESSION['perfil'] == 'u') { ?>
                                    <input class="form-control" name="cod_usuario" id="cod_usuario" type="hidden" value="<?= $_SESSION["login"] ?>" />
                                <?php
                                } ?>

                            </div>
                        </div>
                    </form>
                    <!-- TODO: SE NÃO HOUVER SESSÃO, EVIAR PARA PAGINA DE LOGIN -->
                </div>


            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="agendamentoJs.inserirAgendamento()" data-bs-dismiss="modal">Agendar</button>
            </div>

        </div>
    </div>
</div>