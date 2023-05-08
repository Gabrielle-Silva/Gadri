<?php
require_once('../../lib/config.php');
require_once(__ABS_DIR__ . 'src/model/cidade.class.php');


//instanciar objeto
$objCidade = new cidadeModel();


//Colocando valores dos campos dentro do objeto
if (isset($_REQUEST['cod'])) {
    $objCidade->setCod($_REQUEST['cod']);
}
if (isset($_REQUEST['uf'])) {
    $objCidade->setUf($_REQUEST['uf']);
}
if (isset($_REQUEST['cidade'])) {
    $objCidade->setCidade($_REQUEST['cidade']);
}



//Ações vindas do Script
$action = $_REQUEST['action'];

switch ($action) {

    case 'inserir':

        $arrMsgErro = $objCidade->validateCidade();

        if (count($arrMsgErro) == 0) {


            if ($objCidade->createCidade() === true) {
                $msgResultPositive = 'Cidade inserida com sucesso';
            } else {
                $msgResultNegative = 'Erro ao inserir cidade';
            }
        } else {
            $msgResultNegative = 'Verifique os campos';
        }
        $arrCidade = $objCidade->readCidade();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/cidadeList.php');


        break;





    case 'listar':

        $arrCidade = $objCidade->readCidade();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/cidadeList.php');

        break;



    case 'atualizar':

        $arrMsgErro = $objCidade->validateCidade();

        if (count($arrMsgErro) == 0) {

            if ($objCidade->updateCidade() === true) {
                $msgResultPositive = 'Dados atualizados com sucesso';
            } else {
                $msgResultNegative = 'Erro ao atualizar cidade';
            }
        } else {
            $msgResultNegative = 'Verifique os campos';
        }
        $arrCidade = $objCidade->readCidade();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/cidadeList.php');

        break;


    case 'excluir':


        if ($objCidade->deleteCidade() === true) {
            $msgResultPositive = 'Dados excluidos com sucesso';
        } else {
            $msgResultNegative = 'Erro ao excluir';
        }
        $arrCidade = $objCidade->readCidade();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/cidadeList.php');

        break;


    default:
        echo 'Erro: Action "' . $action . '" não existe';
        break;
}
