<?php

class horarioModel
{

    //atributos

    private $cod; //int(11) AI PK 
    private $descricao; //varchar(20) 
    private $horario; //time 
    private $ativo; //enum('s','n')

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

    /**
     * Get the value of horario
     */
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * Set the value of horario
     *
     * @return  self
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;

        return $this;
    }

    /**
     * Get the value of ativo
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set the value of ativo
     *
     * @return  self
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    //FUNÇÕES


    //=======================CRUD===================================================

    //CREATE

    /**
     * @return [type]
     * 
     * Adiciona horarios de visita à imovel - retorna true se funcionar / false se não funcionar
     */
    function createHorario()
    {
        global $conexao;

        try {

            $sql = "INSERT INTO horario (
                descricao,
                horario,
                ativo
                )   
            VALUES (
               '{$this->descricao}',                          
               '{$this->horario}',                          
               '{$this->ativo}'                          
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
     * Altera dados do horario a partir do codigo - retorna true se funcionar / false se não funcionar
     */
    function updateHorario()
    {
        global $conexao;

        try {
            $sql = "UPDATE horario SET descricao = '{$this->descricao}', horario = '{$this->horario}', ativo = '{$this->ativo}' WHERE cod = {$this->cod}";

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
     * Retorna todos os horarios em formato array
     */
    public function readHorario()
    {

        global $conexao;
        try {
            $sql = "SELECT * from horario";

            $resultHorario = mysqli_query($conexao, $sql);
            return mysqli_fetch_all($resultHorario);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //DELETE

    /**
     * @return [type]
     * 
     * Exclui horario de visita a partir do codigo - retorna true se funcionar / false se não funcionar
     */
    public function deleteHorario()
    {

        global $conexao;
        try {
            $sql = "DELETE from horario WHERE cod = {$this->cod}";

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
     * Valida se os campos de horario estão devidamente preenchidos - retorna um array com erro ou array vazio caso esteja correto ($arrMsgErro)
     */
    function validateHorario()
    {
        $arrMsgErro = [];
        if ($this->descricao == '') {
            $arrMsgErro[] = 'Informe a descrição sobre o dia do horario que deseja adicionar';
        }
        if ($this->horario == '') {
            $arrMsgErro[] = 'Informe o horario a ser adicionado';
        }

        return $arrMsgErro;
    }
}
