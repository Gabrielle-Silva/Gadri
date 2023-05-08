<?php
require_once('../../lib/config.php');
require_once(__ABS_DIR__ . 'src/model/favorito.class.php');


//instanciar objeto
$objFavorito = new favoritoModel();


//Colocando valores dos campos dentro do objeto
if (isset($_REQUEST['cod'])) {
    $objFavorito->setCod($_REQUEST['cod']);
}
if (isset($_REQUEST['cod_imovel'])) {
    $objFavorito->setCod_imovel($_REQUEST['cod_imovel']);
}
if (isset($_REQUEST['cod_usuario'])) {
    $objFavorito->setCod_usuario($_REQUEST['cod_usuario']);
}


//Ações vindas do Script
$action = $_REQUEST['action'];

switch ($action) {

    case 'inserir':

        $arrMsgErro = $objFavorito->validateFavorito();

        if (count($arrMsgErro) == 0) {


            if ($objFavorito->createFavorito() === true) {
                //TODO: se estiver na pagina de favoritos: atualizar
                echo '<script>alert("Inseriu")</script>';
            } else {
                echo '<script>alert("Erro ao inserir em favoritos")</script>';
            }
        } else {
            echo '<script>alert("' . $arrMsgErro[0] . '")</script>';
        }

        break;

    case 'excluir':

        $arrMsgErro = $objFavorito->validateFavorito();

        if (count($arrMsgErro) == 0) {


            if ($objFavorito->deleteFavorito() === true) {
                //TODO: se estiver na pagina de favoritos: atualizar
                echo '<script>alert("excluiiu")</script>';
            } else {
                echo '<script>alert("Erro ao retirar de favoritos")</script>';
            }
        } else {
            echo '<script>alert("' . $arrMsgErro[0] . '")</script>';
        }

        break;



    case 'listar':

        $arrImoveis = $objFavorito->readFavorito();
        // require_once(__ABS_DIR__ . 'src/view/imovel/favoritos.php'); 
        require_once(__ABS_DIR__ . 'src/view/imovel/imoveisList.php');

        break;



    case 'atualizar':


        break;




    default:
        echo 'Erro: Action "' . $action . '" não existe';
        break;
}
