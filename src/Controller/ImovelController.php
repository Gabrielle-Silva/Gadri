<?php
require_once('../../lib/config.php');
require_once(__ABS_DIR__ . 'src/model/imovel.class.php');


//instanciar objeto
$objImovel = new imovelModel();


//Colocando valores dos campos dentro do objeto
if (isset($_REQUEST['cod'])) {
    $objImovel->setCod($_REQUEST['cod']);
}
if (isset($_REQUEST['cod_finalidade'])) {
    $objImovel->setCod_finalidade($_REQUEST['cod_finalidade']);
}
if (isset($_REQUEST['cod_tipo'])) {
    $objImovel->setCod_tipo($_REQUEST['cod_tipo']);
}
if (isset($_REQUEST['cod_bairro'])) {
    $objImovel->setCod_bairro($_REQUEST['cod_bairro']);
}
if (isset($_REQUEST['cod_empresa'])) {
    $objImovel->setCod_empresa($_REQUEST['cod_empresa']);
}
if (isset($_REQUEST['logradouro'])) {
    $objImovel->setLogradouro($_REQUEST['logradouro']);
}
if (isset($_REQUEST['numero'])) {
    $objImovel->setNumero($_REQUEST['numero']);
}
if (isset($_REQUEST['complemento'])) {
    $objImovel->setComplemento($_REQUEST['complemento']);
}
if (isset($_REQUEST['cep'])) {
    $objImovel->setCep($_REQUEST['cep']);
}
if (isset($_REQUEST['m2'])) {
    $objImovel->setM2($_REQUEST['m2']);
}
if (isset($_REQUEST['quartos'])) {
    $objImovel->setQuartos($_REQUEST['quartos']);
}
if (isset($_REQUEST['vagas'])) {
    $objImovel->setVagas($_REQUEST['vagas']);
}
if (isset($_REQUEST['valor'])) {
    $objImovel->setValor($_REQUEST['valor']);
}
if (isset($_REQUEST['obs'])) {
    $objImovel->setObs($_REQUEST['obs']);
}
if (isset($_REQUEST['desativacao'])) {
    $objImovel->setDesativacao($_REQUEST['desativacao']);
}
if (isset($_REQUEST['foto'])) {
    $objImovel->setFoto($_REQUEST['foto']);
}


//Ações vindas do Script
$action = $_REQUEST['action'];

switch ($action) {


    case 'inserir':


        switch ($_FILES['foto']['error']) {
            case UPLOAD_ERR_INI_SIZE:
                $arrMsgErro[] = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $arrMsgErro[] = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                break;
            case UPLOAD_ERR_PARTIAL:
                $arrMsgErro[] = "The uploaded file was only partially uploaded";
                break;
            case UPLOAD_ERR_NO_FILE:
                $arrMsgErro[] = "Nenhum arquivo enviado";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $arrMsgErro[] = "Missing a temporary folder";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $arrMsgErro[] = "Failed to write file to disk";
                break;
            case UPLOAD_ERR_EXTENSION:
                $arrMsgErro[] = "File upload stopped by extension";
                break;
        }

        $arrMsgErro = $objImovel->validateImovel();
        if (count($arrMsgErro) == 0) {




            if ($objImovel->createImovel() === true) {
                $sql = "SELECT * FROM imovel WHERE logradouro = '" . $_REQUEST['logradouro'] . "' and numero = '" . $_REQUEST['numero'] . "' and complemento = '" . $_REQUEST['complemento'] . "'";
                $resultImovel = mysqli_query($conexao, $sql);
                while ($imovel = mysqli_fetch_array($resultImovel)) {

                    if (!file_exists(__ABS_DIR__ . 'assets/img/imoveis/imv' . $imovel['cod'])) {
                        mkdir(__ABS_DIR__ . 'assets/img/imoveis/imv' . $imovel['cod']);
                    }
                    $queryFotos = '';
                    $files = $_FILES['foto']['name'];
                    $total_count = count($_FILES['foto']['name']);
                    for ($i = 0; $i < $total_count; $i++) {
                        $ext = pathinfo($_FILES['foto']['name'][$i], PATHINFO_EXTENSION);
                        $tmpFilePath = $_FILES['foto']['tmp_name'][$i];
                        if ($tmpFilePath != '') {

                            $newFilePath = __ABS_DIR__ . 'assets/img/imoveis/imv' . $imovel['cod'] . '/imv' . $imovel['cod'] . 'foto' . $i . '.' . $ext;

                            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                                $queryFotos .= 'imv' . $imovel['cod'] . 'foto' . $i . '.' . $ext . ',';
                                /*  if ($i == 0) {
                                    $sql = "update imovel set foto = 'imv" . $imovel['cod'] . 'foto' . $i . '.' . $ext;
                                    mysqli_query($conexao, $sql);
                                } */

                                $msgResultPositive = 'Imovel inserido com sucesso';
                            } else {
                                $msgResultNegative = 'Erro ao salvar fotos';
                            }
                        }
                    }

                    $sqlFotos = "update imovel set foto = '" . substr($queryFotos, 0, -1) . "' where cod = " . $imovel['cod'];
                    mysqli_query($conexao, $sqlFotos);
                }
            } else {

                $msgResultNegative = 'Erro ao inserir imovel';
            }
        } else {
            $msgResultNegative = 'Erro ao inserir imovel - Verifique os campos';
        }
        require_once(__ABS_DIR__ . 'src/view/imovel/imovelForm.php');

        /*    if (!empty($_FILES['foto']['name'])) {
            foreach ($_FILES['foto']['name'] as $data) {
                echo '<script>alert(" ' .  $total_count . '")</script>';
            }
        } else {
            echo '<script>alert("não tem foto ")</script>';
        } */
        break;


    case 'ativar':

        global $conexao;

        $sql = "UPDATE imovel set desativacao = null WHERE cod = " . $_REQUEST['cod'];

        mysqli_query($conexao, $sql);



        break;
    case 'desativar':

        global $conexao;
        $sql = "UPDATE imovel set desativacao = curdate() WHERE cod = " . $_REQUEST['cod'];

        mysqli_query($conexao, $sql);



        break;

    case 'exluir':
        if ($objImovel->deleteImovel() === true) {
            $msgResultPositive = 'Imovel excluido com sucesso';
        } else {
            $msgResultNegative = 'Não foi possivel excluir imóvel: agendamentos associados à ele. Considere apenas desativa-lo ou deletar agendamentos';
        }
        $objImovel->setCod('');
        $arrImoveis = $objImovel->readImovel();
        require_once(__ABS_DIR__ . 'src/view/imovel/imoveisList.php');
        break;


    case 'listar':

        $arrImoveis = $objImovel->readImovel();
        require_once(__ABS_DIR__ . 'src/view/imovel/imoveisList.php');

        break;
    case 'editarImovel':
        $arrImovel = $objImovel->readImovel()[0];
        require_once(__ABS_DIR__ . 'src/view/imovel/imovelFormEdit.php');

        break;
    case 'imovelform':

        require_once(__ABS_DIR__ . 'src/view/imovel/imovelForm.php');

        break;
    case 'listarInfo':

        $arrImoveis = $objImovel->readImovel();
        // window.location = '/src/view/agendamento/realizarAgendamento.php';
        require_once(__ABS_DIR__ . 'src/view/imovel/imovelInfo.php');

        break;


    case 'atualizar':
        $arrMsgErro = $objImovel->validateImovel();
        if (count($arrMsgErro) == 0) {


            if ($objImovel->updateImovel() === true) {
                $msgResultPositive = 'Imovel atualizado com sucesso';
            } else {
                $msgResultNegative = 'Não foi possivel atualizar dados';
            }
        } else {
            $msgResultNegative = 'Verifique os campos';
        }
        $arrImovel = $objImovel->readImovel()[0];
        require_once(__ABS_DIR__ . 'src/view/imovel/imovelFormEdit.php');

        break;




    default:
        echo 'Erro: Action "' . $action . '" não existe';
        break;
}
