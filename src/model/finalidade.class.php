<?php

class finalidadeModel
{

    //atributos
    private $cod; //int(11) AI PK 
    private $descricao; //varchar(40)


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
     * Get the value of descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }


    //FUNÇÕES


    //=======================CRUD===================================================

    //CREATE

    /**
     * @return [type]
     * 
     * Adiciona dados da finalidade do imovel - retorna true se funcionar / false se não funcionar
     */
    function createFinalidade()
    {
        global $conexao;

        try {

            $sql = "INSERT INTO finalidade (
                descricao
                )   
            VALUES (
               '{$this->descricao}'                          
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
     * Altera dados da finalidade do imovel a partir do codigo - retorna true se funcionar / false se não funcionar
     */
    function updateFinalidade()
    {
        global $conexao;

        try {
            $sql = "UPDATE finalidade SET descricao = '{$this->descricao}' WHERE cod = {$this->cod}";

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
     * Retorna todas as finalidades de imoveis em formato array
     */
    public function readFinalidade()
    {

        global $conexao;
        try {
            $sql = "SELECT * from finalidade";

            $resultFinalidade = mysqli_query($conexao, $sql);
            return mysqli_fetch_all($resultFinalidade);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //DELETE

    /**
     * @return [type]
     * 
     * Exclui finalidade de imovel a partir do codigo - retorna true se funcionar / false se não funcionar
     */
    public function deleteFinalidade()
    {

        global $conexao;
        try {
            $sql = "DELETE from finalidade WHERE cod = {$this->cod}";

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
     * Valida campo de "descrição" da finalidade - retorna um array com erro ou array vazio caso esteja correto ($arrMsgErro)
     */
    function validateFinalidade()
    {
        $arrMsgErro = [];
        if ($this->descricao == '') {
            $arrMsgErro[] = 'Informe a finalidade de imóvel que deseja adicionar';
        }

        return $arrMsgErro;
    }
}
