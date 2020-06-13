<?php

namespace App\Models\Entidades;

use DateTime;

class Servico
{
    private $id;
    private $usuario;    
    private $descricao;
    private $preco;
    private $dataServico;    

    
    public function __construct()
    {
        $this->usuario = new Usuario();
    }  

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }  

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }      

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function getDataServico()
    {
        return $this->dataServico;
    }

    public function setDataServico($dataServico)
    {
        $this->dataServico = $dataServico;
    }    

    public function getUsuario()
    {
        return $this->usuario;
    }

}