<?php

namespace App\Models\DAO;

use App\Models\Entidades\Produto;

class ProdutoDAO extends BaseDAO
{
    public  function getById($id)
    {
        $resultado = $this->select(
            "SELECT p.id as idProduto,
                    m.id as idMarca,
                    p.nome as nomeProduto, 
                    p.preco, 
                    p.quantidade, 
                    p.descricao, 
                    m.nome as nomeMarca 
             FROM produto as p
             INNER JOIN marca as m ON p.marca_id = m.id
             WHERE p.id = $id"
        );

        $dataSetProdutos = $resultado->fetch();

        if($dataSetProdutos) {
            $Produto = new Produto();
            $Produto->setId($dataSetProdutos['idProduto']);
            $Produto->setNome($dataSetProdutos['nomeProduto']);
            $Produto->setPreco($dataSetProdutos['preco']);
            $Produto->setQuantidade($dataSetProdutos['quantidade']);
            $Produto->setDescricao($dataSetProdutos['descricao']);
            $Produto->getMarca()->setNome($dataSetProdutos['nomeMarca']);
            $Produto->getMarca()->setId($dataSetProdutos['idMarca']);

            return $Produto;
        }

        return false;
    }

    public  function listar()
    {

            $resultado = $this->select(
                'SELECT  p.id as idProduto, 
                              p.nome as nomeProduto, 
                              p.preco, 
                              m.nome as nomeMarca 
                              FROM produto as p
                      INNER JOIN marca as m ON p.marca_id = m.id 
                      '
            );
            $dataSetProdutos = $resultado->fetchAll();

            if($dataSetProdutos) {

                $listaProdutos = [];

                foreach($dataSetProdutos as $dataSetProduto) {
                    $Produto = new Produto();
                    $Produto->setId($dataSetProduto['idProduto']);
                    $Produto->setNome($dataSetProduto['nomeProduto']);
                    $Produto->setPreco($dataSetProduto['preco']);
                    $Produto->getMarca()->setNome($dataSetProduto['nomeMarca']);

                    $listaProdutos[] = $Produto;
                }

                return $listaProdutos;
            }

        return false;
    }

    public  function salvar(Produto $produto) 
    {
        try {

            $nome           = $produto->getNome();
            $preco          = $produto->getPreco();
            $quantidade     = $produto->getQuantidade();
            $descricao      = $produto->getDescricao();
            $marca_id       = $produto->getMarca()->getId();

            return $this->insert(
                'produto',
                ":nome,:preco,:quantidade,:descricao,:marca_id",
                [
                    ':nome'=>$nome,
                    ':preco'=>$preco,
                    ':quantidade'=>$quantidade,
                    ':descricao'=>$descricao,
                    ':marca_id'=>$marca_id,
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public  function atualizar(Produto $produto) 
    {
        try {

            $id             = $produto->getId();
            $nome           = $produto->getNome();
            $preco          = $produto->getPreco();
            $quantidade     = $produto->getQuantidade();
            $descricao      = $produto->getDescricao();
            $marca_id       = $produto->getMarca()->getId();

            return $this->update(
                'produto',
                "nome = :nome, preco = :preco, quantidade = :quantidade, descricao = :descricao, marca_id = :marca_id",
                [
                    ':id'=>$id,
                    ':nome'=>$nome,
                    ':preco'=>$preco,
                    ':quantidade'=>$quantidade,
                    ':descricao'=>$descricao,
                    ':marca_id'=> $marca_id,
                ],
                "id = :id"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluir(Produto $produto)
    {
        try {
            $id = $produto->getId();

            return $this->delete('produto',"id = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao excluir", 500);
        }
    }
}