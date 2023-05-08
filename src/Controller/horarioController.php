<?php
require_once('../../lib/config.php');
require_once(__ABS_DIR__ . 'src/model/horario.class.php');


//instanciar objeto
$objHorario = new horarioModel();


//Colocando valores dos campos dentro do objeto
if (isset($_REQUEST['cod'])) {
    $objHorario->setCod($_REQUEST['cod']);
}
if (isset($_REQUEST['descricao'])) {
    $objHorario->setDescricao($_REQUEST['descricao']);
}
if (isset($_REQUEST['horario'])) {
    $objHorario->setHorario($_REQUEST['horario']);
}
if (isset($_REQUEST['ativo'])) {
    $objHorario->setAtivo($_REQUEST['ativo']);
}


//Ações vindas do Script
$action = $_REQUEST['action'];

switch ($action) {

    case 'inserir':

        $arrMsgErro = $objHorario->validateHorario();

        if (count($arrMsgErro) == 0) {


            if ($objHorario->createHorario() === true) {
                $msgResultPositive = 'Horario inserido com sucesso';
            } else {
                $msgResultNegative = 'Erro ao inserir Horario. Verifique se o horario esta no formato 00:00:00';
            }
        } else {
            $msgResultNegative = 'Verifique os campos';
        }
        $arrHorario = $objHorario->readHorario();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/HorarioList.php');



        break;





    case 'listar':


        $arrHorario = $objHorario->readHorario();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/horarioList.php');
        break;



    case 'atualizar':

        $arrMsgErro = $objHorario->validateHorario();

        if (count($arrMsgErro) == 0) {

            if ($objHorario->updateHorario() === true) {
                $msgResultPositive = 'Dados atualizados com sucesso';
            } else {
                $msgResultNegative = 'Erro ao atualizar horario. Verifique se o horario esta no formato 00:00:00';
            }
        } else {
            $msgResultNegative = 'Verifique os campos';
        }
        $arrHorario = $objHorario->readHorario();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/horarioList.php');

        break;


    case 'excluir':


        if ($objHorario->deleteHorario() === true) {
            $msgResultPositive = 'Dados excluidos com sucesso';
        } else {
            $msgResultNegative = 'Erro ao excluir';
        }
        $arrHorario = $objHorario->readHorario();
        require_once(__ABS_DIR__ . 'src/view/ferramentas/horarioList.php');

        break;


    default:
        echo 'Erro: Action "' . $action . '" não existe';
        break;
}
