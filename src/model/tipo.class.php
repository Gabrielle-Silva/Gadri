<?php

class tipoModel
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
     * Adiciona dados de tipo de imovel - retorna true se funcionar / false se não funcionar
     */
    function createTipo()
    {
        global $conexao;

        try {

            $sql = "INSERT INTO tipo (
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
     * Altera dados do tipo de imovel a partir do codigo - retorna true se funcionar / false se não funcionar
     */
    function updateTipo()
    {
        global $conexao;

        try {
            $sql = "UPDATE tipo SET descricao = '{$this->descricao}' WHERE cod = {$this->cod}";

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
     * Retorna todos os tipos de imoveis em formato array
     */
    public function readTipo()
    {

        global $conexao;
        try {
            $sql = "SELECT * from tipo";

            $resultTipo = mysqli_query($conexao, $sql);
            return mysqli_fetch_all($resultTipo);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //DELETE

    /**
     * @return [type]
     * 
     * Exclui tipo de imovel a partir do codigo - retorna true se funcionar / false se não funcionar
     */
    public function deleteTipo()
    {

        global $conexao;
        try {
            $sql = "DELETE from tipo WHERE cod = {$this->cod}";

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
     * Valida campo de "descrição" do tipo - retorna um array com erro ou array vazio caso esteja correto ($arrMsgErro)
     */
    function validateTipo()
    {
        $arrMsgErro = [];
        if ($this->descricao == '') {
            $arrMsgErro[] = 'Informe o tipo de imóvel que deseja adicionar';
        }

        return $arrMsgErro;
    }
}
