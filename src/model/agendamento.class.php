<?php

class agendamentoModel
{

    //atributos
    private $cod; //int(11) AI PK 
    private $cod_imovel; //int(11) 
    private $cod_usuario; //int(11) 
    private $data; //date 
    private $data_cancelamento; //date 
    private $cod_horario; //int(11) 
    private $horario_cancelamento; //time 
    private $obs; //varchar(255)


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
     * Get the value of cod_imovel
     */
    public function getCod_imovel()
    {
        return $this->cod_imovel;
    }

    /**
     * Set the value of cod_imovel
     *
     * @return  self
     */
    public function setCod_imovel($cod_imovel)
    {
        $this->cod_imovel = $cod_imovel;

        return $this;
    }

    /**
     * Get the value of cod_usuario
     */
    public function getCod_usuario()
    {
        return $this->cod_usuario;
    }

    /**
     * Set the value of cod_usuario
     *
     * @return  self
     */
    public function setCod_usuario($cod_usuario)
    {
        $this->cod_usuario = $cod_usuario;

        return $this;
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of data_cancelamento
     */
    public function getData_cancelamento()
    {
        return $this->data_cancelamento;
    }

    /**
     * Set the value of data_cancelamento
     *
     * @return  self
     */
    public function setData_cancelamento($data_cancelamento)
    {
        $this->data_cancelamento = $data_cancelamento;

        return $this;
    }

    /**
     * Get the value of cod_horario
     */
    public function getCod_horario()
    {
        return $this->cod_horario;
    }

    /**
     * Set the value of cod_horario
     *
     * @return  self
     */
    public function setCod_horario($cod_horario)
    {
        $this->cod_horario = $cod_horario;

        return $this;
    }

    /**
     * Get the value of horario_cancelamento
     */
    public function getHorario_cancelamento()
    {
        return $this->horario_cancelamento;
    }

    /**
     * Set the value of horario_cancelamento
     *
     * @return  self
     */
    public function setHorario_cancelamento($horario_cancelamento)
    {
        $this->horario_cancelamento = $horario_cancelamento;

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
     *
     * @return  self
     */
    public function setObs($obs)
    {
        $this->obs = $obs;

        return $this;
    }



    //FUNÇÕES


    //=======================CRUD===================================================

    //CREATE

    /**
     * @return [type]
     * 
     * Insere agendamento de visita a partir de codigo de usuario e do imovel escolhido - retorna true se funcionar / false se não funcionar
     */
    function createAgendamento()
    {
        global $conexao;

        try {

            $sql = "INSERT INTO agendamento (
                cod_imovel,
                cod_usuario,
                data,
                cod_horario                
                )   
            VALUES (
                {$this->cod_imovel},
                {$this->cod_usuario},
                '{$this->data}',
                {$this->cod_horario}                       
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


    //READ

    /**
     * @return Array
     * 
     * Retorna todos agendamentos em formato array - se houver codigo de usuario retorna apenas dele
     */
    public function readAgendamento()
    {

        global $conexao;
        try {
            $sql = "SELECT * from view_agendamento where true";
            if ($this->cod_usuario) {
                $sql .= " and cod_usuario = " . $this->cod_usuario;
            }
            if ($this->cod_imovel) {
                $sql .= " and cod_imovel = " . $this->cod_imovel;
            }

            $resultUsuarios = mysqli_query($conexao, $sql);
            return mysqli_fetch_all($resultUsuarios);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    //UPDATE

    /**
     * @return [type]
     * 
     * Cancela o agendamento com a data atual - retorna true se funcionar / false se não funcionar
     */
    function updateAgendamento()
    {
        global $conexao;

        try {
            $sql = "UPDATE agendamento SET data_cancelamento = CURDATE() WHERE cod = {$this->cod}";

            if (mysqli_query($conexao, $sql)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
        }
    }
    //DELETE

    /**
     * @return [type]
     * 
     * Deleta agendamento a partir do codigo - retorna true se funcionar / false se não funcionar
     */
    function deleteAgendamento()
    {
        global $conexao;

        try {

            $sql = "DELETE FROM agendamento WHERE cod = {$this->cod}";

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
     * Valida se os campos necessários para agendamento estão informados - retorna um array com erro ou array vazio caso esteja correto ($arrMsgErro)
     */
    function validateAgendamento()

    {

        $arrMsgErro = [];
        /*    $date = strtotime($this->data); */



        if ($this->cod_usuario == '') {
            $arrMsgErro[] = 'Realize o login para conseguir agendar sua visita!';
        }
        if ($this->cod_imovel == '') {
            $arrMsgErro[] = 'Selecione o código do imóvel';
        }
        if ($this->data == '') {
            $arrMsgErro[] = 'Escolha uma data';
        }
        if ($this->cod_horario == '') {
            $arrMsgErro[] = 'Selecione um horario';
        }
        /*   if ($this->data <= date("d-m-Y")) {
            $arrMsgErro[] = 'Data invalida. Escolha uma data futura';
        } */

        return $arrMsgErro;
    }
}
