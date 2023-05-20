<?php
require_once('../../lib/config.php');
require_once(__ABS_DIR__ . 'src/model/tipo.class.php');


//instanciar objeto
$objTipo = new tipoModel();


//Colocando valores dos campos dentro do objeto
if (isset($_REQUEST['cod'])) {
    $objTipo->setCod($_REQUEST['cod']);
}
if (isset($_REQUEST['descricao'])) {
    $objTipo->setDescricao($_REQUEST['descricao']);
}



//Ações vindas do Script
$action = $_REQUEST['action'];

switch ($action) {

    case 'inserir':

        $arrMsgErro = $objTipo->validateTipo();

        if (count($arrMsgErro) == 0) {


            if ($objTipo->createTipo() === true) {
                $msgResultPositive = 'Tipo inserido com sucesso';
            } else {
                $msgResultNegative = 'Erro ao inserir tipo';
            }
        } else {
            $msgResultNegative = 'Verifique os campos';
        }
        $arrTipo = $objTipo->readTipo();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/tipoList.php');



        break;





    case 'listar':


        $arrTipo = $objTipo->readTipo();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/tipoList.php');
        break;



    case 'atualizar':

        $arrMsgErro = $objTipo->validateTipo();

        if (count($arrMsgErro) == 0) {

            if ($objTipo->updateTipo() === true) {
                $msgResultPositive = 'Dados atualizados com sucesso';
            } else {
                $msgResultNegative = 'Erro ao atualizar tipo';
            }
        } else {
            $msgResultNegative = 'Verifique os campos';
        }
        $arrTipo = $objTipo->readTipo();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/tipoList.php');

        break;


    case 'excluir':


        if ($objTipo->deleteTipo() === true) {
            $msgResultPositive = 'Dados excluidos com sucesso';
        } else {
            $msgResultNegative = 'Erro ao excluir';
        }
        $arrTipo = $objTipo->readTipo();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/tipoList.php');

        break;


    default:
        echo 'Erro: Action "' . $action . '" não existe';
        break;
}
