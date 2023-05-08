<?php
require_once('../../lib/config.php');
require_once(__ABS_DIR__ . 'src/model/bairro.class.php');


//instanciar objeto
$objBairro = new bairroModel();


//Colocando valores dos campos dentro do objeto
if (isset($_REQUEST['cod'])) {
    $objBairro->setCod($_REQUEST['cod']);
}
if (isset($_REQUEST['bairro'])) {
    $objBairro->setBairro($_REQUEST['bairro']);
}
if (isset($_REQUEST['regiao'])) {
    $objBairro->setRegiao($_REQUEST['regiao']);
}
if (isset($_REQUEST['cod_cidade'])) {
    $objBairro->setCod_cidade($_REQUEST['cod_cidade']);
}


//Ações vindas do Script
$action = $_REQUEST['action'];

switch ($action) {

    case 'inserir':

        $arrMsgErro = $objBairro->validateBairro();

        if (count($arrMsgErro) == 0) {


            if ($objBairro->createBairro() === true) {
                $msgResultPositive = 'Bairro inserido com sucesso';
            } else {
                $msgResultNegative = 'Erro ao inserir bairro';
            }
        } else {
            $msgResultNegative = 'Verifique os campos';
        }
        $arrBairro = $objBairro->readBairro();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/bairroList.php');



        break;





    case 'listar':


        $arrBairro = $objBairro->readBairro();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/bairroList.php');
        break;



    case 'atualizar':

        $arrMsgErro = $objBairro->validateBairro();

        if (count($arrMsgErro) == 0) {

            if ($objBairro->updateBairro() === true) {
                $msgResultPositive = 'Dados atualizados com sucesso';
            } else {
                $msgResultNegative = 'Erro ao atualizar bairro';
            }
        } else {
            $msgResultNegative = 'Verifique os campos';
        }
        $arrBairro = $objBairro->readBairro();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/bairroList.php');

        break;


    case 'excluir':


        if ($objBairro->deleteBairro() === true) {
            $msgResultPositive = 'Dados excluidos com sucesso';
        } else {
            $msgResultNegative = 'Erro ao excluir';
        }
        $arrBairro = $objBairro->readBairro();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/bairroList.php');

        break;


    default:
        echo 'Erro: Action "' . $action . '" não existe';
        break;
}
