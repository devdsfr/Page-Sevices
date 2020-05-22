<?php

namespace App\Models\DAO;

use App\Models\Entidades\Marca;

class MarcaDAO extends BaseDAO
{
    public  function getById($id)
    {
        $resultado = $this->select(
            "SELECT id, nome FROM marca WHERE id = $id"
        );

        return $resultado->fetchObject(Marca::class);

    }
    public  function listar()
    {

        $resultado = $this->select(
            'SELECT id, nome FROM marca'
        );
        return $resultado->fetchAll(\PDO::FETCH_CLASS, Marca::class);

    }
    public  function getQuantidadeProdutos($id)
    {
        if($id) {
            $resultado = $this->select(
                "SELECT count(*) as total FROM produto WHERE marca_id= $id"
            );

            return $resultado->fetch()['total'];
        }

        return false;
    }

    public  function salvar(Marca $marca)
    {
        try {

            $nome           = $marca->getNome();

            return $this->insert(
                'marca',
                ":nome",
                [
                    ':nome'=>$nome
                ]
            );
        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public  function atualizar(Marca $marca)
    {
        try {

            $id             = $marca->getId();
            $nome           = $marca->getNome();

            return $this->update(
                'marca',
                "nome = :nome",
                [
                    ':id'=>$id,
                    ':nome'=>$nome
                ],
                "id = :id"
            );

        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluir(Marca $marca)
    {
        try {
            $id = $marca->getId();

            return $this->delete('marca',"id = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao excluir", 500);
        }
    }
}