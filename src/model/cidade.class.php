<?php

class cidadeModel
{


    // NOTE: 
    // ASSIM COMO NA CLASSE 'BAIRRO', EM CASO DE IMPORTAÇÃO DE DADOS COMPLETOS DE CIDADES/ESTADOS, DESCARTAR AS FUNÇÕES DE MANIPULAÇÃO DESTAS INFORMAÇÕES.
    // AS INFORMAÇÕES SÃO PREVISTAS PARA USO EM UM UNICO PÁIS. PARA ADIÇÃO DE PAÍSES, SERÁ NECESSÁRIA A CRIAÇÃO E MODIFICAÇÃO DE COLUNAS/TABELAS NO BANCO DE DADOS, ASSIM COMO TODAS AS TELAS COM ESTA INFORMAÇÃO CONTIDA.


    //atributos
    private $cod; //int(11) AI PK 
    private $uf; //varchar(2) 
    private $cidade; //varchar(80)

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
     * Get the value of uf
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set the value of uf
     *
     * @return  self
     */
    public function setUf($uf)
    {
        $this->uf = $uf;

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
     * 
     * Adiciona cidades - retorna true se funcionar / false se não funcionar
     */
    function createCidade()
    {
        global $conexao;

        try {

            $sql = "INSERT INTO cidade (
                uf,
                cidade                
                )   
            VALUES (
               '{$this->uf}',                          
               '{$this->cidade}'                          
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
     * Altera dados da cidade a partir do codigo - retorna true se funcionar / false se não funcionar
     */
    function updateCidade()
    {
        global $conexao;

        try {
            $sql = "UPDATE cidade SET uf = '{$this->uf}', cidade = '{$this->cidade}' WHERE cod = {$this->cod}";

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
     * Retorna todas as cidades/estados em formato array
     */
    public function readCidade()
    {

        global $conexao;
        try {
            $sql = "SELECT * from cidade";
            $resultCidade = mysqli_query($conexao, $sql);
            return mysqli_fetch_all($resultCidade);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //DELETE

    /**
     * @return [type]
     * 
     * Exclui cidade/estado a partir do codigo - retorna true se funcionar / false se não funcionar
     */
    public function deleteCidade()
    {

        global $conexao;
        try {
            $sql = "DELETE from cidade WHERE cod = {$this->cod}";

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
    function validateCidade()
    {
        $arrMsgErro = [];
        if ($this->uf == '') {
            $arrMsgErro[] = 'Informe estado em que a cidade pertence';
        }
        if (strlen($this->uf) > 2) {
            $arrMsgErro[] = 'UF deve conter apenas 2 caracteres';
        }
        if ($this->cidade == '') {
            $arrMsgErro[] = 'Informe o nome da cidade que deseja adicionar';
        }


        return $arrMsgErro;
    }
}
