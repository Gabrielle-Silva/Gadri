<?php
require_once('../../lib/config.php');
require_once(__ABS_DIR__ . 'src/model/finalidade.class.php');


//instanciar objeto
$objFinalidade = new finalidadeModel();


//Colocando valores dos campos dentro do objeto
if (isset($_REQUEST['cod'])) {
    $objFinalidade->setCod($_REQUEST['cod']);
}
if (isset($_REQUEST['descricao'])) {
    $objFinalidade->setDescricao($_REQUEST['descricao']);
}



//Ações vindas do Script
$action = $_REQUEST['action'];

switch ($action) {

    case 'inserir':

        $arrMsgErro = $objFinalidade->validateFinalidade();

        if (count($arrMsgErro) == 0) {


            if ($objFinalidade->createFinalidade() === true) {
                $msgResultPositive = 'Finalidade inserido com sucesso';
            } else {
                $msgResultNegative = 'Erro ao inserir finalidade';
            }
        } else {
            $msgResultNegative = 'Verifique os campos';
        }
        $arrFinalidade = $objFinalidade->readFinalidade();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/finalidadeList.php');



        break;





    case 'listar':


        $arrFinalidade = $objFinalidade->readFinalidade();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/finalidadeList.php');
        break;



    case 'atualizar':

        $arrMsgErro = $objFinalidade->validateFinalidade();

        if (count($arrMsgErro) == 0) {

            if ($objFinalidade->updateFinalidade() === true) {
                $msgResultPositive = 'Dados atualizados com sucesso';
            } else {
                $msgResultNegative = 'Erro ao atualizar finalidade';
            }
        } else {
            $msgResultNegative = 'Verifique os campos';
        }
        $arrFinalidade = $objFinalidade->readFinalidade();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/finalidadeList.php');

        break;


    case 'excluir':


        if ($objFinalidade->deleteFinalidade() === true) {
            $msgResultPositive = 'Dados excluidos com sucesso';
        } else {
            $msgResultNegative = 'Erro ao excluir';
        }
        $arrFinalidade = $objFinalidade->readFinalidade();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/finalidadeList.php');

        break;


    default:
        echo 'Erro: Action "' . $action . '" não existe';
        break;
}
