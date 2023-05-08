<?php
session_start();

include_once('database.php');



//define('__ABS_DIR__', 'http://localhost:8080/');
define('__TITULO__', 'GADRI Imóveis');
define('__ABS_DIR__', $_SERVER['DOCUMENT_ROOT'] . '/');




// function checarSessao()
// {
//     if (!isset($_SESSION['login'])) {
//         sessaoLogout();
//     }
// }

// function sessaoLogout()
// {
//     session_destroy();
//     header('Location: /src/view/painel/painelLogin.php');
// }


// if ($ignoraSessao == false) checarSessao();



//require_once(__ABS_DIR__ . 'src/model/usuario.class.php'); --> Estava dando erros chamar por aqui : Chamar class pelo controller


//COLOCAR INICIO DE CADA PAGINA QUE SÓ PODE SER ACESSADA POR SESSÃO
// <?php 
// session_start ();
// if(!isset($_SESSION["login"]))

// 	require_once(__ABS_DIR__ . 'src/view/painel/painelLogin.php');
// 
