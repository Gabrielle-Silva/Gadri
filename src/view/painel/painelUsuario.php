<html>

<head>
    <?php
    include_once('../../../lib/config.php');  ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= __TITULO__ ?></title>

    <!-- LINKS CSS -->
    <?php include_once(__ABS_DIR__ . 'css.php'); ?>

</head>

<body class="sb-nav-fixed" id="inicio">

    <!-- MENU NAVEGAÇÃO (NAV BAR)-->
    <?php include_once(__ABS_DIR__ . 'src/view/includes/nav.php');
    ?>





    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"><?= $_SESSION['nome'] ?></div>
                        <a class="nav-link" href="javascript:void(0)" onclick="usuarioJs.atualizar(<?= $_SESSION['login'] ?>)">
                            <div class="sb-nav-link-icon"></i></div>
                            Cadastro
                        </a>
                        <a class="nav-link" href="javascript:void(0)" onclick="agendamentoJs.listarAgendamentoUsu(<?= $_SESSION['login'] ?>)">
                            <div class="sb-nav-link-icon"></i></div>
                            Agendamentos
                        </a>

                        <a class="nav-link" href="javascript:void(0)" onclick="imovelJs.favoritos(<?= $_SESSION['login'] ?>)">
                            <div class="sb-nav-link-icon"></i></div>
                            Favoritos
                        </a>


                        <div class="sb-sidenav-menu-heading">---</div>
                        <a class="nav-link" href="/src/view/Login/fimsessao.php">
                            <div class="sb-nav-link-icon"></i></div>
                            Sair
                        </a>



                    </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">

            <!-- AQUI CHAMA CONTEUDOS PELO usuarioJs.php -->



        </div>
    </div>



    <!-- INCLUINDO SCRIPTS -->
    <?php
    include_once(__ABS_DIR__ . 'src/view/usuario/usuarioJs.php');
    include_once(__ABS_DIR__ . 'src/view/imovel/imovelJs.php');
    include_once(__ABS_DIR__ . 'src/view/agendamento/agendamentoJs.php');
    include_once(__ABS_DIR__ . 'js.php');
    ?>



</body>

</html>