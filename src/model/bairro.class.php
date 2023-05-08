<?php

class bairroModel
{


    // NOTE: 
    // O SISTEMA PREVÊ USO EM UMA AREA PEQUENA E ESPECIFICA DE REGIÕES.
    // PARA IMPORTAÇÃO DE UM BANCO DE DADOS COMPLETO, PODE SER DESCARTADA A OPÇÃO DE CREATE/UPDATE/DELETE DA CLASSE, ASSIM COMO TELAS ADMINISTRATIVAS COM O MESMO FIM.



    //atributos
    private $cod; //int(11) AI PK 
    private $bairro; //varchar(40) 
    private $regiao; //varchar(40) 
    private $cod_cidade; //int(11)


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
     *
     * @return  self
     */
    public function setCod($cod)
    {
        $this->cod = $cod;

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
     * Set the value of regiao
     *
     * @return  self
     */
    public function setRegiao($regiao)
    {
        $this->regiao = $regiao;

        return $this;
    }

    /**
     * Get the value of regiao
     */
    public function getRegiao()
    {
        return $this->regiao;
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
     * Get the value of cod_cidade
     */
    public function getCod_cidade()
    {
        return $this->cod_cidade;
    }

    /**
     * Set the value of cod_cidade
     *
     * @return  self
     */
    public function setCod_cidade($cod_cidade)
    {
        $this->cod_cidade = $cod_cidade;

        return $this;
    }

    //FUNÇÕES


    //=======================CRUD===================================================

    //CREATE

    /**
     * @return [type]
     * 
     * Adiciona bairros / regiões à cidade - retorna true se funcionar / false se não funcionar
     */
    function createBairro()
    {
        global $conexao;

        try {

            $sql = "INSERT INTO bairro (
                bairro,
                regiao,
                cod_cidade
                )   
            VALUES (
               '{$this->bairro}',                          
               '{$this->regiao}',                          
               {$this->cod_cidade}                         
            )";

            if (mysqli_query($conexao, $sql)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
        }
    }

    //UPDATE

    /**
     * @return [type]
     * 
     * Altera dados do bairro a partir do codigo - retorna true se funcionar / false se não funcionar
     */
    function updateBairro()
    {
        global $conexao;

        try {
            $sql = "UPDATE bairro SET bairro = '{$this->bairro}', regiao = '{$this->regiao}', cod_cidade = {$this->cod_cidade} WHERE cod = {$this->cod}";

            if (mysqli_query($conexao, $sql)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
        }
    }

    //READ

    /**
     * @return Array
     * 
     * Retorna todos os bairros/regiões em formato array
     */
    public function readBairro()
    {

        global $conexao;
        try {
            $sql = "SELECT * from bairro";
            $resultBairro = mysqli_query($conexao, $sql);
            return mysqli_fetch_all($resultBairro);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //DELETE

    /**
     * @return [type]
     * 
     * Exclui bairro/região a partir do codigo - retorna true se funcionar / false se não funcionar
     */
    public function deleteBairro()
    {

        global $conexao;
        try {
            $sql = "DELETE from bairro WHERE cod = {$this->cod}";

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
     * Valida se todos os campos estão devidamente preenchidos - retorna um array com erro ou array vazio caso esteja correto ($arrMsgErro)
     */
    function validateBairro()
    {
        $arrMsgErro = [];
        if ($this->bairro == '') {
            $arrMsgErro[] = 'Informe o bairro que deseja adicionar';
        }
        if ($this->regiao == '') {
            $arrMsgErro[] = 'Informe a região da cidade em que o bairro se encontra';
        }
        if ($this->cod_cidade == '') {
            $arrMsgErro[] = 'Selecione a cidade onde esta localizado o bairro informado';
        }

        return $arrMsgErro;
    }
}
