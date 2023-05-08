<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('../../lib/config.php');
require_once('../model/agendamento.class.php');

require(__ABS_DIR__ . '/lib/PHPMailer/src/Exception.php');
require(__ABS_DIR__ . '/lib/PHPMailer/src/PHPMailer.php');
require(__ABS_DIR__ . '/lib/PHPMailer/src/SMTP.php');



//instanciar objeto
$objAgendamento = new agendamentoModel();

//Colocando valores dos campos dentro do objeto
//Colocando valores dos campos dentro do objeto
if (isset($_REQUEST['cod'])) {
    $objAgendamento->setCod($_REQUEST['cod']);
}
if (isset($_REQUEST['cod_imovel'])) {
    $objAgendamento->setCod_imovel($_REQUEST['cod_imovel']);
}
if (isset($_REQUEST['cod_usuario'])) {
    $objAgendamento->setCod_usuario($_REQUEST['cod_usuario']);
}
if (isset($_REQUEST['data'])) {
    $objAgendamento->setData($_REQUEST['data']);
}
if (isset($_REQUEST['data_cancelamento'])) {
    $objAgendamento->setData_cancelamento($_REQUEST['data_cancelamento']);
}
if (isset($_REQUEST['cod_horario'])) {
    $objAgendamento->setCod_horario($_REQUEST['cod_horario']);
}
if (isset($_REQUEST['horario_cancelamento'])) {
    $objAgendamento->setHorario_cancelamento($_REQUEST['horario_cancelamento']);
}
if (isset($_REQUEST['obs'])) {
    $objAgendamento->setObs($_REQUEST['obs']);
}

$sucesso = '';
$action = $_REQUEST['action'];

switch ($action) {
    case 'inserir':
        $arrMsgErro = $objAgendamento->validateAgendamento();

        if (count($arrMsgErro) == 0) {
            if ($objAgendamento->createAgendamento() === true) {
                //TODO: CHAMAR CONTROLER PARA ENVIO DE EMAIL, AO INVÉS DE ENVIAR POR AQUI
                $arrAgendamento = $objAgendamento->readAgendamento();
                try {
                    $mail = new PHPMailer(true);
                    $mail->CharSet = 'UTF-8';
                    // Configurações do servidor
                    $mail->isSMTP();        //Devine o uso de SMTP no envio
                    $mail->SMTPAuth = true; //Habilita a autenticação SMTP
                    $mail->Username   = 'gadri.imob@outlook.com';
                    $mail->Password   = 'GADRI@@gadri';
                    // Criptografia do envio SSL também é aceito
                    $mail->SMTPSecure = 'tls';
                    // Informações específicadas
                    $mail->Host = 'smtp-mail.outlook.com';
                    $mail->Port = 587;
                    // Define o remetente                  
                    $mail->setFrom('gadri.imob@outlook.com', 'GADRI Imóveis');
                    // Define o destinatário
                    $mail->addAddress($_SESSION['email'], $_SESSION['nome']);
                    // Conteúdo da mensagem
                    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
                    $mail->Subject = 'GADRI IMÓVEIS - Agendamento de visita';
                    $texto = '<body
                    style="background-color: #1c282f; color: white; font-family: sans-serif"
                >
                    <hr />
                    <p style="text-align: center">
                        <span style="font-size: 14px">Ol&aacute; ' . $_SESSION['nome'] . '!</span>
                    </p>
            
                    <p style="text-align: center">
                        <span style="font-size: 16px; border-bottom: #be7500 solid 2px"
                            ><strong>Sua visita foi agendada com sucesso!</strong></span
                        >
                    </p>
            
                    <p style="text-align: center">&nbsp;</p>
            
                    <table
                        align="center"
                        border="2"
                        cellspacing="1"
                        style="height: 20px; width: 500px; box-shadow: 5px 5px #be7500;"
                    >
                        <tbody>
                            <tr>
                                <td style="text-align: center">
                                    <strong>' . $arrAgendamento[0][14] . ' para ' . $arrAgendamento[0][15] . ' - ' . $arrAgendamento[0][9] . ' - ' . $arrAgendamento[0][10] . '/' . $arrAgendamento[0][13] . ' </strong
                                    >(codigo: ' . $arrAgendamento[0][5] . ')
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center">
                                    <strong>' . $arrAgendamento[0][6] . ', ' . $arrAgendamento[0][7] . '. ' . $arrAgendamento[0][8] . '</strong>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><strong>&agrave;s ' . $arrAgendamento[0][4] . ' horas - data: ' . $arrAgendamento[0][3] . '</strong></td>
                            </tr>
                        </tbody>
                    </table>
            
                    <p style="text-align: center">&nbsp;</p>
            
                    <p style="text-align: center">
                        Pedimos que cancelamentos e altera&ccedil;&otilde;es de&nbsp;agendamento
                        sejam feitas com antecedencia&nbsp;atrav&eacute;s do site, acessando seu
                        perfil e selecionando a op&ccedil;&atilde;o &#39;Agendamentos&#39;.
                    </p>
            
                    <p style="text-align: center; font-size: 11px">
                        Para entrar em contato conosco via Whatsapp: (41) 99999-9999
                    </p>
            
                    <p style="text-align: center">&nbsp;</p>
            
                    <p style="text-align: center">
                        <span style="font-size: 16px">Nossa equipe agradece!</span>
                    </p>
            
                    <p style="text-align: center">
                        <img alt="GADRI IM&Oacute;VEIS" src="https://i.ibb.co/VVxH0kr/Logo.png" style="width: 200px" />
                    </p>
                    <div style="border-bottom: #be7500 solid 2px"></div>
            
                    <p>&nbsp;</p>
            
                    <p>&nbsp;</p>
                </body>';
                    $mail->Body = $texto;
                    $mail->AltBody = strip_tags($texto);
                    // Enviar
                    $mail->send();
                    $msgResultPositive = 'Agendamento realizado com sucesso!! Verifique seu email';

                    /* $msgResultPositive = 'A mensagem foi enviada!'; */
                } catch (Exception $e) {
                    $msgResultPositive = 'Agendamento realizado, porém email não pode ser enviado. Mailer Error: {$mail->ErrorInfo}';
                }
            } else {
                $msgResultNegative = 'Não foi possivel realizar o agendamento. Caso o problema persista, entre em contato conosco.';
            }
        } else {
            $msgResultNegative = 'Verifique os campos';
        }
        include_once(__ABS_DIR__ . 'src/view/shared/modalConfirm.php');
        break;


    case 'excluir':


        if ($objAgendamento->deleteAgendamento() === true) {
            $msgResultPositive = 'Dados excluidos com sucesso';
        } else {
            $msgResultNegative = 'Erro ao excluir';
        }
        $arrAgendamento = $objAgendamento->readAgendamento();
        require_once(__ABS_DIR__ . 'src/view/agendamento/agendamentosList.php');

        break;

    case 'cancelar':


        if ($objAgendamento->updateAgendamento() === true) {
            $msgResultPositive = 'Visita cancelada';
        } else {
            $msgResultNegative = 'Erro ao cancelar. Se o erro persistir, entre em contato conosco.';
        }
        $arrAgendamento = $objAgendamento->readAgendamento();
        require_once(__ABS_DIR__ . 'src/view/agendamento/agendamentosList.php');

        break;
    case 'listar':

        $arrAgendamento = $objAgendamento->readAgendamento();
        require_once(__ABS_DIR__ . 'src/view/agendamento/agendamentosList.php');

        break;
}
