<?php
 
namespace App\Models\Entidades;
 
use DateTime;
 
class Produtos
{
    private $id;
    private $nome;
    private $preco;    
    private $descricao;
    private $dataCadastro;
 
    public function getId()
    {
        return $this->id;
    }
 
    public function setId($id)
    {
        $this->id = $id;
    }
 
    public function getNome()
    {
        return $this->nome;
    }
 
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
 
    public function getPreco()
    {
        return $this->preco;
    }
 
    public function setPreco($preco)
    {
        $this->preco = $preco;
    } 
    
 
    public function getDescricao()
    {
        return $this->descricao;
    }
 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
 
    public function getDataCadastro()
    {
        return new DateTime($this->dataCadastro);
    }
 
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDataServico()
    {
        return $this->dataServico;
    }

    public function setDataServico($dataServico)
    {
        $this->dataServico = $dataServico;
    } 
}