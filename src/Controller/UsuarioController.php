<?php
require_once('../../lib/config.php');
require_once(__ABS_DIR__ . 'src/model/usuario.class.php');


//instanciar objeto
$objUsuario = new usuarioModel();


//Colocando valores dos campos dentro do objeto
if (isset($_REQUEST['cod'])) {
    $objUsuario->setCod($_REQUEST['cod']);
}
if (isset($_REQUEST['cod_empresa'])) {
    $objUsuario->setCod_empresa($_REQUEST['cod_empresa']);
}
if (isset($_REQUEST['nome'])) {
    $objUsuario->setNome($_REQUEST['nome']);
}
if (isset($_REQUEST['cpf_cnpj'])) {
    $objUsuario->setCpf_cnpj($_REQUEST['cpf_cnpj']);
}
if (isset($_REQUEST['telefone'])) {
    $objUsuario->setTelefone($_REQUEST['telefone']);
}
if (isset($_REQUEST['e_mail'])) {
    $objUsuario->setE_mail($_REQUEST['e_mail']);
}
if (isset($_REQUEST['senha'])) {
    $objUsuario->setSenha($_REQUEST['senha']);
}
if (isset($_REQUEST['perfil'])) {
    $objUsuario->setPerfil($_REQUEST['perfil']);
}
if (isset($_REQUEST['foto'])) {
    $objUsuario->setFoto($_REQUEST['foto']);
}
if (isset($_REQUEST['endereco'])) {
    $objUsuario->setEndereco($_REQUEST['endereco']);
}
if (isset($_REQUEST['bairro'])) {
    $objUsuario->setBairro($_REQUEST['bairro']);
}
if (isset($_REQUEST['cidade'])) {
    $objUsuario->setCidade($_REQUEST['cidade']);
}
if (isset($_REQUEST['confirmPassword'])) {
    $confirmPassword = $_POST['confirmPassword'];
}
if (isset($_REQUEST['e_mail'])) {
    $e_mail = $_POST['e_mail'];
}
if (isset($_REQUEST['senha'])) {
    $senha = $_POST['senha'];
}
if (isset($_REQUEST['confirmPassword'])) {
    $senha2 = $_POST['confirmPassword'];
}




//Ações vindas do Script
$action = $_REQUEST['action'];

switch ($action) {

    case 'iniciarSessao':

        $arrMsgErro = $objUsuario->validateLogin();


        if (count($arrMsgErro) > 0) {
            header('Location: /src/view/painel/painelLogin.php');
        } else {

            $res = mysqli_query($conexao, "SELECT * FROM usuario WHERE e_mail='$e_mail'and senha='$senha'");
            $result = mysqli_fetch_array($res);

            if ($result) {

                $_SESSION['email'] = $result["e_mail"];
                $_SESSION['nome'] = $result["nome"];
                $_SESSION['perfil'] = $result["perfil"];
                $_SESSION["login"] = $result["cod"];
                $_SESSION["foto"] = $result["foto"];


                if ($_SESSION['perfil'] == 'a') {
                    header('Location: /src/view/painel/painelADM.php');
                }
                if ($_SESSION['perfil'] == 'u') {
                    header('Location: /src/view/painel/painelUsuario.php');
                }
            } else {
                $arrMsgErro[] = 'Senha e/ou email invalido';
                header('Location: /src/view/painel/painelLogin.php');
            }
        }



        break;

        // TODO: alterar para criar login
    case 'inserir':

        $arrMsgErro = $objUsuario->validateUsuario();

        if ($objUsuario->getSenha() != $senha2) {
            $arrMsgErro[] = 'Senhas não conferem';
        }
        if (count($arrMsgErro) == 0) {


            if ($objUsuario->createUsuario() === true) {


                $msgResultPositive = "Conta criada com sucesso";
            } else {
                $msgResultNegative = "Erro ao criar conta";
            }
        } else {
            $msgResultNegative = 'Verifique os campos';
        }
        require_once(__ABS_DIR__ . 'src/view/login/CriarContaForm.php');
        break;





    case 'editar':
        // echo '<script>alert("' . $objUsuario->getCod() . '")</script>';
        $arrMsgErro = $objUsuario->validateUsuario();
        if (!empty($_FILES['foto']['name'])) {
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
        }

        if (count($arrMsgErro) == 0) {


            if ($objUsuario->updateUsuario() === true) {

                if (!empty($_FILES['foto']['name'])) {
                    $sql = "SELECT * FROM usuario WHERE cod = '" . $_REQUEST['cod'] . "'";
                    $resulUsuario = mysqli_query($conexao, $sql);
                    while ($data = mysqli_fetch_array($resulUsuario)) {
                        $arquivo_tmp = $_FILES['foto']['tmp_name'];
                        $arquivo = $_FILES['foto']['name'];
                        $ext = pathinfo($arquivo, PATHINFO_EXTENSION);

                        if (move_uploaded_file($arquivo_tmp, __ABS_DIR__ . 'assets/img/usuario/usu' . $data['cod'] . '.' . $ext)) {
                            $sql = "update usuario set foto = 'usu" . $data['cod'] . '.' . $ext . "' where cod = " . $data['cod'];

                            mysqli_query($conexao, $sql);
                            /*  if ($_SESSION['perfil'] == 'u') {
                                $_SESSION['foto'] = "usu" . $data['cod'] . '.' . $ext;
                            } */
                        } else {
                            $arrMsgErro[] = 'Erro ao salvar foto';
                        }
                    }
                }

                $msgResultPositive = 'Conta atualizada com sucesso';
            } else {

                $msgResultNegative = 'Erro ao atualizar';
            }
        } else {

            $msgResultNegative = 'Verifique os campos';
        }


        $arrUsuarios = $objUsuario->readUsuario()[0];
        require_once(__ABS_DIR__ . 'src/view/usuario/usuarioForm.php');
        break;



    case 'apagar':

        if ($objUsuario->deleteUsuario() === true) {

            /* TODO:EXCLUIR ARQUIVO DE FOTO DO USUARIO*/
            echo '<script>alert("Conta excluida com sucesso")</script>';
        } else {

            echo '<script>alert("Erro ao excluir")</script>';
        }
        require_once(__ABS_DIR__ . 'src/view/usuario/usuarioList.php');

        break;


    case 'listar':

        //$objUsuario->setCod(null);
        $arrUsuarios = $objUsuario->readUsuario();
        require_once(__ABS_DIR__ . 'src/view/usuario/usuarioList.php');

        break;





    case 'atualizar':

        $arrUsuarios = $objUsuario->readUsuario()[0];
        $objUsuario->setCod($arrUsuarios[0]);
        $objUsuario->setNome($arrUsuarios[2]);
        $objUsuario->setCpf_cnpj($arrUsuarios[3]);
        $objUsuario->setTelefone($arrUsuarios[4]);
        $objUsuario->setE_mail($arrUsuarios[5]);
        $objUsuario->setSenha($arrUsuarios[6]);
        $objUsuario->setPerfil($arrUsuarios[7]);
        $objUsuario->setFoto($arrUsuarios[8]);
        $objUsuario->setEndereco($arrUsuarios[9]);
        $objUsuario->setBairro($arrUsuarios[10]);
        $objUsuario->setCidade($arrUsuarios[11]);


        require_once(__ABS_DIR__ . 'src/view/usuario/usuarioForm.php');

        break;

    case 'criar':

        require_once(__ABS_DIR__ . 'src/view/Login/CriarContaForm.php');

        break;
    case 'login':

        require_once(__ABS_DIR__ . 'src/view/Login/loginForm.php');

        break;
    case 'esqueciS':

        require_once(__ABS_DIR__ . 'src/view/Login/EsqueciSenhaForm.php');

        break;




    default:
        echo 'Erro: Action "' . $action . '" não existe';
        break;
}
