<?php
// Verifica permissão para a tela
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['login']) or ($_SESSION['perfil'] != 'a')) {
    header("Location: /index.php");
    exit;
}
?>

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




    <!--  FIXME: ARRUMAR CHAMADAS DAS PAGINAS -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Listar</div>
                        <a class="nav-link" onclick="usuarioJs.pesquisar() ">
                            <div class="sb-nav-link-icon"></i></div>
                            Usuários
                        </a>
                        <a class="nav-link" href="javascript:void(0)" onclick="imovelJs.pesquisar()">
                            <div class="sb-nav-link-icon"></i></div>
                            Imóveis
                        </a>
                        <a class="nav-link" href="javascript:void(0)" onclick="agendamentoJs.listarAgendamento()">
                            <div class="sb-nav-link-icon"></i></div>
                            Agendamentos
                        </a>
                        <div class="sb-sidenav-menu-heading">GERENCIAR / FERRAMENTAS</div>



                        <a class="nav-link" href="javascript:void(0)" onclick="callPage('/src/view/ferramentas/tipoFinalidadeList')">
                            <div class="sb-nav-link-icon"></i></div>
                            Gerenciar tipos e finalidades
                        </a>
                        <a class="nav-link" href="javascript:void(0)" onclick="ferramentasJs.listarHorario(); ">
                            <div class="sb-nav-link-icon"></i></div>
                            Gerenciar horarios
                        </a>
                        <a class="nav-link" href="javascript:void(0)" onclick="ferramentasJs.listarCidade(); ">
                            <div class="sb-nav-link-icon"></i></div>
                            Gerenciar cidades
                        </a>
                        <!-- <a class="nav-link" href="javascript:void(0)" onclick="ferramentasJs.listarBairro(); ">
                            <div class="sb-nav-link-icon"></i></div>
                            Gerenciar bairros/regiões
                        </a> -->
                        <!-- <a class="nav-link" href="javascript:void(0)" onclick="callPage('/src/view/ferramentas/relatorio')">
                            <div class="sb-nav-link-icon"></i></div>
                            Gerar Relatórios
                        </a> -->
                        <div class="sb-sidenav-menu-heading">---</div>
                        <a class="nav-link" href="/src/view/Login/fimsessao.php">
                            <div class="sb-nav-link-icon"></i></div>
                            Sair
                        </a>



                    </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">

            <!-- AQUI CHAMA CONTEUDOS  -->



        </div>
    </div>



    <!-- INCLUINDO SCRIPTS -->
    <?php
    include_once(__ABS_DIR__ . 'src/view/usuario/usuarioJs.php');
    include_once(__ABS_DIR__ . 'src/view/imovel/imovelJs.php');
    include_once(__ABS_DIR__ . 'src/view/agendamento/agendamentoJs.php');
    include_once(__ABS_DIR__ . 'src/view/ferramentas/ferramentasJs.php');
    include_once(__ABS_DIR__ . 'js.php');
    ?>






</body>

</html>