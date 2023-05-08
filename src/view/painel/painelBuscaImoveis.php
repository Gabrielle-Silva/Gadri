<html>

<head>
    <?php
    include_once('../../../lib/config.php'); ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= __TITULO__ ?></title>

    <!-- LINKS CSS -->
    <?php include_once(__ABS_DIR__ . 'css.php'); ?>

</head>

<body class="sb-nav-fixed" id="painelBuscaImoveis">
    <!-- =================== MODAL E ALERT=================-->
    <?php include_once(__ABS_DIR__ . 'src/view/shared/modalConfirm.php');
    ?>
    <?php
    $queryImoveis = "select * from view_imoveis";
    $resultImoveis = mysqli_query($conexao, $queryImoveis);

    $queryTipo = "select * from tipo";
    $resultTipo = mysqli_query($conexao, $queryTipo);

    $queryFinalidade = "select * from finalidade";
    $resultFinalidade = mysqli_query($conexao, $queryFinalidade);



    ?>
    <!-- MENU NAVEGAÇÃO (NAV BAR)-->
    <?php include_once(__ABS_DIR__ . 'src/view/includes/nav.php'); ?>



    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">FILTROS</div>

                        <label class="nav-link" for="tipo">Tipo:</label>
                        <select name="tipo" id="tipo" class="selectnav">
                            <option value="">selecione</option>
                            <?php while ($data = mysqli_fetch_array($resultTipo)) { ?>
                                <option value="<?php echo $data['cod'] ?>"><?php echo $data['descricao'] ?></option>
                            <?php } ?>
                        </select>
                        <label class="nav-link" for="finalidade">Finalidade:</label>
                        <select name="finalidade" id="finalidade" class="selectnav">
                            <option value="">selecione</option>
                            <?php while ($data = mysqli_fetch_array($resultFinalidade)) { ?>
                                <option value="<?php echo $data['cod'] ?>"><?php echo $data['descricao'] ?></option>
                            <?php } ?>
                        </select>

                        <label class="nav-link" for="quartos">Quartos:</label>
                        <input type="number" name="quartos" id="quartos">

                        <label class="nav-link" for="vagas">Vagas:</label>
                        <input type="number" name="vagas" id="vagas">

                        <label class="nav-link" for="m2">M<sub>2</sub></label>
                        <input type="number" name="m2" id="m2">

                        <label class="nav-link" for="valorF">Valor:</label>
                        <input type="number" name="valorI" id="valorI" placeholder="De:">
                        <input type="number" name="valorF" id="valorF" placeholder="Até:">

                        <div class="sb-sidenav-menu-heading">---</div>
                        <a class="nav-link">
                            <button id="btn-filtro" class="btn btn-block btn-sm">Filtrar</button>
                        </a>



                    </div>

            </nav>
        </div>

        <div id="layoutSidenav_content">








        </div>

    </div>



    <!-- INCLUINDO SCRIPTS -->
    <?php
    include_once(__ABS_DIR__ . 'src/view/imovel/imovelJs.php');
    include_once(__ABS_DIR__ . 'src/view/agendamento/agendamentoJs.php');
    include_once(__ABS_DIR__ . 'js.php');
    ?>



</body>

</html>