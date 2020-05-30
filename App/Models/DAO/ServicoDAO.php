<?php

namespace App\Models\DAO;

use App\Models\Entidades\Servico;

class ServicoDAO extends BaseDAO
{
    public  function getById($id)
    {
        $resultado = $this->select(
            "SELECT s.id as idServico,                   
                    u.id as idUsuario,                                        
                    s.descricao,
                    s.dataServico,
                    u.nome as nomeUsuario                 
            FROM servico as s
            INNER JOIN usuario as u ON u.id = s.usuario_id            
            WHERE s.id = $id"
        );

        $dataSetServicos = $resultado->fetch();

        if($dataSetServicos) {
            $Servico = new Servico();
            $Servico->setId($dataSetServicos['idServico']);            
            $Servico->getUsuario()->setNome($dataSetServicos['nomeUsuario']);
            $Servico->getUsuario()->setId($dataSetServicos['idUsuario']);            
            $Servico->setDescricao($dataSetServicos['descricao']);

            return $Servico;
        }

        return false;
    }

    public  function listar()
    {

            $resultado = $this->select(
                'SELECT s.id as idServico,                         
                        u.nome as nomeUsuario,                        
                        s.descricao, 
                        s.dataServico
                FROM servico as s
                INNER JOIN usuario as u ON u.id = s.usuario_id 
                
                      '
            );
            $dataSetServicos = $resultado->fetchAll();

            if($dataSetServicos) {

                $listaServicos = [];

                foreach($dataSetServicos as $dataSetServico) {
                    $Servico = new Servico();
                    $Servico->setId($dataSetServico['idProduto']);                    
                    $Servico->getUsuario()->setNome($dataSetServico['nomeUsuario']);                    
                    $Servico->setDescricao($dataSetServico['descricao']); 
                    $listaServicos[] = $Servico;
                }

                return $listaServicos;
            }

        return false;
    }

    public  function salvar(Servico $servico) 
    {
        try {            
            
            $usuario_id     = $servico->getUsuario()->getId();            
            $descricao      = $servico->getDescricao();
            $dataServico    = $servico->getDataServico();

            return $this->insert(
                'servico',
                ":usuario_id,:descricao,:dataServico",
                [
                    ':usuario_id'=>$usuario_id,                    
                    ':descricao'=>$descricao,
                    ':dataServico'=>$dataServico,
                    
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public  function atualizar(Servico $servico) 
    {
        try {

            $id             = $servico->getId();
            $usuario_id     = $servico->getUsuario()->getId();            
            $descricao      = $servico->getDescricao();
            $dataServico    = $servico->getDataServico();

            return $this->update(
                'servico',
                "usuario_id = :usuario_id, descricao = :descricao, dataServico = :dataServico",
                [
                    ':id'=>$id,
                    ':usuario_id'=> $usuario_id,                    
                    ':descricao'=>$descricao,
                    ':dataServico'=>$dataServico,
                ],
                "id = :id"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluir(Servico $servico)
    {
        try {
            $id = $servico->getId();

            return $this->delete('servico',"id = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao excluir", 500);
        }
    }
}