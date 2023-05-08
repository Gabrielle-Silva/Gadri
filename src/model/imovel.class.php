<?php

class imovelModel
{

    //atributos

    private $cod; //int(11) AI PK 
    private $cod_finalidade; //int(11) 
    private $cod_tipo; //int(11) 
    private $cod_bairro; //int(11) 
    private $cod_empresa; //int(11) 
    private $logradouro; //varchar(80) 
    private $numero; //int(11) 
    private $complemento; //varchar(40) 
    private $cep; //char(9) 
    private $m2; //int(11) 
    private $quartos; //int(11) 
    private $vagas; //int(11) 
    private $valor; //decimal(12,2) 
    private $obs; //varchar(255) 
    private $desativacao; //date 
    private $foto; //varchar(255)


    //GETTERS / SETTERS

    /**
     * Get the value of cod
     */
    public function getCod()
    {
        return $this->cod;
    }

    /**
     * Set the value of cod
     * int(11) AI PK
     * @return  self
     */
    public function setCod($cod)
    {
        $this->cod = $cod;

        return $this;
    }

    /**
     * Get the value of cod_finalidade
     */
    public function getCod_finalidade()
    {
        return $this->cod_finalidade;
    }

    /**
     * Set the value of cod_finalidade
     *  int(11)
     * @return  self
     */
    public function setCod_finalidade($cod_finalidade)
    {
        $this->cod_finalidade = $cod_finalidade;

        return $this;
    }

    /**
     * Get the value of cod_tipo
     */
    public function getCod_tipo()
    {
        return $this->cod_tipo;
    }

    /**
     * Set the value of cod_tipo
     * int(11)
     * @return  self
     */
    public function setCod_tipo($cod_tipo)
    {
        $this->cod_tipo = $cod_tipo;

        return $this;
    }

    /**
     * Get the value of cod_bairro
     * 
     */
    public function getCod_bairro()
    {
        return $this->cod_bairro;
    }

    /**
     * Set the value of cod_bairro
     * int(11)
     * @return  self
     */
    public function setCod_bairro($cod_bairro)
    {
        $this->cod_bairro = $cod_bairro;

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
     * int(11)
     * @return  self
     */
    public function setCod_empresa($cod_empresa)
    {
        $this->cod_empresa = $cod_empresa;

        return $this;
    }

    /**
     * Get the value of logradouro
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Set the value of logradouro
     * varchar(80)
     * @return  self
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * Get the value of numero
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     * int(11)
     * @return  self
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of complemento
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set the value of complemento
     * varchar(40)
     * @return  self
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get the value of cep
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     * char(9)
     * @return  self
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get the value of m2
     */
    public function getM2()
    {
        return $this->m2;
    }

    /**
     * Set the value of m2
     * int(11)
     * @return  self
     */
    public function setM2($m2)
    {
        $this->m2 = $m2;

        return $this;
    }

    /**
     * Get the value of quartos
     */
    public function getQuartos()
    {
        return $this->quartos;
    }

    /**
     * Set the value of quartos
     * int(11)
     * @return  self
     */
    public function setQuartos($quartos)
    {
        $this->quartos = $quartos;

        return $this;
    }

    /**
     * Get the value of vagas
     */
    public function getVagas()
    {
        return $this->vagas;
    }

    /**
     * Set the value of vagas
     * int(11)
     * @return  self
     */
    public function setVagas($vagas)
    {
        $this->vagas = $vagas;

        return $this;
    }

    /**
     * Get the value of valor
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     * decimal(12,2)
     * @return  self
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of obs
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * Set the value of obs
     * varchar(255)
     * @return  self
     */
    public function setObs($obs)
    {
        $this->obs = $obs;

        return $this;
    }

    /**
     * Get the value of desativacao
     */
    public function getDesativacao()
    {
        return $this->desativacao;
    }

    /**
     * Set the value of desativacao
     * date
     * @return  self
     */
    public function setDesativacao($desativacao)
    {
        $this->desativacao = $desativacao;

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
     * varchar(255)
     * @return  self
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }


    //FUNÇÕES


    //=======================CRUD===================================================

    //CREATE

    /**
     * @return [type]
     * 
     * Adiciona imovel com todas as informações, menos foto - retorna true se funcionar / false se não funcionar
     */
    function createImovel()

    {
        global $conexao;

        try {


            $sql = "INSERT INTO imovel (
                cod_finalidade,
                cod_tipo,
                cod_bairro,
                logradouro,
                numero,
                complemento,
                cep,
                m2,
                quartos,
                vagas,
                valor,
                obs,
                desativacao,
                cod_empresa
                )   
            VALUES (
                {$this->cod_finalidade},
                {$this->cod_tipo},
                {$this->cod_bairro},
                '{$this->logradouro}',
                {$this->numero},
                '{$this->complemento}',
                '{$this->cep}',
                {$this->m2},
                {$this->quartos},
                {$this->vagas},
                {$this->valor},
                '{$this->obs}',
                {$this->desativacao},
                1         
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
     * 
     * Altera dados do imovel selecionado a partir do codigo - retorna true se funcionar / false se não funcionar
     */
    function updateImovel()
    {
        global $conexao;

        try {
            $sql = "UPDATE imovel SET cod_finalidade = {$this->cod_finalidade}, cod_tipo = {$this->cod_tipo}, cod_bairro = {$this->cod_bairro}, logradouro = '{$this->logradouro}',numero = {$this->numero}, complemento = '{$this->complemento}', cep = '{$this->cep}', m2 = {$this->m2}, quartos = {$this->quartos}, vagas = {$this->vagas}, valor = {$this->valor}, obs = '{$this->obs}', desativacao = {$this->desativacao} WHERE cod = {$this->cod}";

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
     * Retorna lista com todos os imoveis a partir a view_imoveis em formato array
     */
    public function readImovel()
    {

        global $conexao;
        try {
            $sql = "SELECT * from view_imoveis where true";
            if ($this->cod) {
                $sql .= " and cod = " . $this->cod;
            }
            if (empty($_SESSION['perfil']) || ($_SESSION['perfil'] != 'a')) {
                $sql .= " and desativacao is null";
            }
            $resultImoveis = mysqli_query($conexao, $sql);
            return mysqli_fetch_all($resultImoveis);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //DELETE

    /**
     * @return [type]
     * 
     * deleta imovel a partir do codigo - retorna true se funcionar / false se não funcionar
     */
    public function deleteImovel()
    {

        global $conexao;
        try {
            $sql = "DELETE from imovel WHERE cod = " . $this->cod;

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
     * 
     * Valida se todos os campos obrigatorios estão devidamente preenchidos - retorna um array com erro ou array vazio caso esteja correto ($arrMsgErro)
     */
    function validateImovel()
    {
        $arrMsgErro = [];
        if ($this->cod_finalidade == '') {
            $arrMsgErro[] = 'Informe a finalidade';
        }
        if ($this->cod_tipo == '') {
            $arrMsgErro[] = 'Informe o tipo';
        }
        if ($this->cod_bairro == '') {
            $arrMsgErro[] = 'Informe um bairro';
        }
        if ($this->logradouro == '') {
            $arrMsgErro[] = 'Informe o logradouro';
        }
        if ($this->cep == '') {
            $arrMsgErro[] = 'Informe o cep';
        }
        if ($this->m2 == '') {
            $arrMsgErro[] = 'Informe os metros quadrados';
        }
        if ($this->quartos == '') {
            $arrMsgErro[] = 'Informe quantos quartos';
        }
        if ($this->vagas == '') {
            $arrMsgErro[] = 'Informe quantas vagas';
        }
        if ($this->valor == '') {
            $arrMsgErro[] = 'Informe o valor';
        }


        return $arrMsgErro;
    }
}
