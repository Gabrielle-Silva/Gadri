<?php

class favoritoModel
{

    //atributos
    private $cod; //int(11) AI PK 
    private $cod_imovel; //int(11) 
    private $cod_usuario; //int(11)


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

    //FUNÇÕES


    //=======================CRUD===================================================

    //CREATE

    /**
     * @return [type]
     * 
     * Adiciona aos favoritos a partir do codigo de usuario e imovel - retorna true se funcionar / false se não funcionar
     */
    function createFavorito()
    {
        global $conexao;

        try {

            $sql = "INSERT INTO favorito (
                cod_imovel,                
                cod_usuario
                )   
            VALUES (
               {$this->cod_imovel},                           
               {$this->cod_usuario}                         
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
     * Altera dados do favorito a partir do codigo - retorna true se funcionar / false se não funcionar
     */

    //REVIEW: FUNÇÃO DESATIVADA DEVIDO À INUTILIDADE NA PRATICA DESTE PROJETO - DESCOMENTAR LINHAS ABAIXO PARA UTILIZA-LA
    /*     
    function updateFavorito()
    {
        global $conexao;

        try {
            $sql = "UPDATE favorito SET cod_imovel = {$this->cod_imovel}, cod_usuario = {$this->cod_usuario} WHERE cod = {$this->cod}";

            if (mysqli_query($conexao, $sql)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
        }
    } 
    */

    //READ

    /**
     * @return Array
     * 
     * Retorna informações da view de favoritos de um usuario em formato array
     */
    public function readFavorito()
    {

        global $conexao;
        try {
            $sql = "SELECT * from view_favoritos WHERE cod_usuario = {$this->cod_usuario} and desativacao is null";

            $resultFavorito = mysqli_query($conexao, $sql);
            return mysqli_fetch_all($resultFavorito);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //DELETE
    // NOTE: Em caso de exclusão da conta de um usuario, os dados de favoritos serão deletados na própria classe 'usuarios'
    /**
     * @return [type]
     * 
     * Exclui imovel da lista de favoritos de determinado usuario - retorna true se funcionar / false se não funcionar     
     * 
     */
    public function deleteFavorito()
    {

        global $conexao;
        try {
            $sql = "DELETE from favorito WHERE cod_usuario = {$this->cod_usuario} and cod_imovel = {$this->cod_imovel}";

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
     * Valida há todos os dados necessários - retorna um array com erro ou array vazio caso esteja correto ($arrMsgErro)
     */
    function validateFavorito()
    {
        $arrMsgErro = [];

        if ($this->cod_usuario == '') {
            $arrMsgErro[] = 'Realize o login salvar imóvel aos seus favoritos!';
        }


        return $arrMsgErro;
    }
}
