<?php

class empresaModel
{



    // NOTE: 
    // ESTA FUNÇÃO TEM A FINALIDADE DE UTILIZAR O MESMO SISTEMA PARA DIFERENTES EMPRESAS, PORÉM A PRINCIPIO ESTA EM DESUSO NESTE PROJETO.
    // TODOS OS CODIGOS ESTÃO COM A CONFIGURAÇÃO PADRÃO PARA UTILIZAR O CODIGO DE NUMERO 1 COMO EMPRESA, ADICIONADA AO BANCO DE DADOS COMO "GADRI IMOVEIS"
    // EM CASO DE FUTURO USO, OBSERVAR A CONFIGURAÇÃO DAS CLASSES: USUARIO E IMOVEIS.




    //atributos
    private $cod; //int(11) AI PK 
    private $nome; //varchar(80)


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
}
