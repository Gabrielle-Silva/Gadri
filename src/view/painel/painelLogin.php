<?php
if (!isset($_SESSION)) session_start();

if (!empty($_SESSION['login'])) {
    header("Location: /index.php");
    //NÃO ESTÁ FUNCIONANDO -- NÃO ATUALIZA URL
    //echo '<script>window.location.href("/index.php")</script>';
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

<!-- TODO: CARREGAR CONTEUDO ONLOAD APENAS NO PAINEL LOGIN -->

<body class="bg-primary bg-2-body" id="painelLogin">
    <!-- NAV --------- -->
    <?php include_once(__ABS_DIR__ . 'src/view/includes/nav.php'); ?>
    <br><br><br>

    <div id="layoutSidenav_content">









    </div>
    <!-- INCLUINDO SCRIPTS -->
    <?php
    include_once(__ABS_DIR__ . 'src/view/usuario/usuarioJs.php');
    include_once(__ABS_DIR__ . 'js.php');
    ?>



</body>