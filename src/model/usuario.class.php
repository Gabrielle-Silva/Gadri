<?php

include_once('../../lib/config.php');

/**
 * [Description usuarioModel]
 */
class usuarioModel
{



    //atributos
    private $cod; //int(11) PRIMARY KEY auto_increment
    private $cod_empresa; //int(11)not null
    private $nome; //varchar(80) not null
    private $cpf_cnpj; //varchar(20) not null
    private $telefone; //varchar(20) not null
    private $e_mail; //varchar(80) not null
    private $senha; //varchar(100) not null 
    private $perfil; //enum("a","u") not null default "u"
    private $foto; //varchar(80) default "fotodefault.png"
    private $endereco; //varchar(80)
    private $bairro; //varchar(80)
    private $cidade; //varchar(80)


    //GETTERS / SETTERS

    /**
     * @param mixed $dados
     * 
     * Função de construtor
     */
    public function __construct()
    {

        /* $this->preencher($dados); */
    }


    /**
     * Get the value of cod
     */
    public function getCod()
    {
        return $this->cod;
    }

    /**
     * Set the value of cod
     *
     * @return  self
     */
    public function setCod($cod)
    {
        $this->cod = $cod;

        return $this;
    }

    /**
     * Get the value of cod_empresa
     */
    public function getCod_empresa()
    {
        return $this->cod_empresa;
    }

    /**
     * Set the value of cod_empresa
     *
     * @return  self
     */
    public function setCod_empresa($cod_empresa)
    {
        $this->cod_empresa = $cod_empresa;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of cpf_cnpj
     */
    public function getCpf_cnpj()
    {
        return $this->cpf_cnpj;
    }

    /**
     * Set the value of cpf_cnpj
     *
     * @return  self
     */
    public function setCpf_cnpj($cpf_cnpj)
    {
        $this->cpf_cnpj = $cpf_cnpj;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of e_mail
     */
    public function getE_mail()
    {
        return $this->e_mail;
    }

    /**
     * Set the value of e_mail
     *
     * @return  self
     */
    public function setE_mail($e_mail)
    {
        $this->e_mail = $e_mail;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of perfil
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Set the value of perfil
     *
     * @return  self
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

        return $this;
    }



    /**
     * Get the value of foto
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     *
     * @return  self
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get the value of endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get the value of bairro
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     *
     * @return  self
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of cidade
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @return  self
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }



    //FUNÇÕES


    //=======================CRUD===================================================

    //CREATE
    /**
     * @return [type]
     * Cria um usuario com dados obrigatórios - retorna true se funcionar / false se não funcionar
     */
    function createUsuario()
    {
        global $conexao;

        try {

            $sql = "INSERT INTO usuario (
                cod_empresa,
                nome,
                cpf_cnpj,
                telefone,
                e_mail,
                senha,
                foto
                )   
            VALUES (
                1,
                '{$this->nome}',
                '{$this->cpf_cnpj}',
                '{$this->telefone}',
                '{$this->e_mail}',
                '{$this->senha}',
                'fotodefault.png'           
            )";

            if (mysqli_query($conexao, $sql)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //UPDATE

    /**
     * @return [type]
     * Altera dados do usuario a partir do código incluindo dados não obrigatórios - retorna true se funcionar / false se não funcionar
     */
    function updateUsuario()
    {
        global $conexao;

        try {
            $sql = "UPDATE usuario SET nome = '{$this->nome}', cpf_cnpj = '{$this->cpf_cnpj}', telefone = '{$this->telefone}', e_mail = '{$this->e_mail}',endereco = '{$this->endereco}', bairro = '{$this->bairro}', cidade = '{$this->cidade}' WHERE cod = {$this->cod}";


            if (mysqli_query($conexao, $sql)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    //READ

    /**
     * @return Array
     * 
     * Retorna todos os usuarios em formato array
     */
    public function readUsuario()
    {

        global $conexao;
        try {
            $sql = "SELECT * from usuario";
            if ($this->cod) {
                $sql .= " WHERE cod = " . $this->cod;
            }
            $resultUsuarios = mysqli_query($conexao, $sql);
            return mysqli_fetch_all($resultUsuarios);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //DELETE

    /**
     * @return [type]
     * 
     * Exclui usuario a partir do codigo - retorna true se funcionar / false se não funcionar
     * 
     */
    public function deleteUsuario()
    {

        global $conexao;
        try {
            $sql = "DELETE from usuario WHERE cod = " . $this->cod;

            if (mysqli_query($conexao, $sql)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }




    //=================================================================================



    /**
     * @return [type]
     * Valida se todos os campos orbigatórios estão devidamente preenchidos e a senha contem mais de 6 caracteres para criar conta - retorna um array com erro ou array vazio caso esteja correto ($arrMsgErro)
     */
    function validateUsuario()
    {
        $arrMsgErro = [];
        if ($this->nome == '') {
            $arrMsgErro[] = 'Informe o nome';
        }
        if ($this->cpf_cnpj == '') {
            $arrMsgErro[] = 'Informe CPF ou CNPJ valido';
        }
        if ($this->telefone == '') {
            $arrMsgErro[] = 'Informe um telefone ou celular';
        }
        if ($this->e_mail == '') {
            $arrMsgErro[] = 'Informe um email';
        }
        if ($this->senha == '') {
            $arrMsgErro[] = 'Informe a senha';
        }
        if ($this->senha != '') {
            if (strlen($this->senha) < 6) {
                $arrMsgErro[] = 'A senha deve conter pelo menos 6 caracteres';
            }
        }
        return $arrMsgErro;
    }


    /**
     * @return [type]
     * 
     * Valida se os campos de senha e email estão preenchidos para login - retorna um array com erro ou array vazio caso esteja correto ($arrMsgErro)
     */
    function validateLogin()
    {
        $arrMsgErro = [];

        if ($this->e_mail == '') {
            $arrMsgErro[] = 'Informe um email';
        }
        if ($this->senha == '') {
            $arrMsgErro[] = 'Informe a senha';
        }

        return $arrMsgErro;
    }
};
