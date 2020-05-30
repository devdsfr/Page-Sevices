<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;

class UsuarioDAO extends BaseDAO
{
    public  function getById($id)
    {
        $resultado = $this->select(
            "SELECT id, nome FROM usuario WHERE id = $id"
        );

        return $resultado->fetchObject(Marca::class);

    }
    public  function listar()
    {

        $resultado = $this->select(
            'SELECT id, nome FROM usuario'
        );
        return $resultado->fetchAll(\PDO::FETCH_CLASS, Usuario::class);

    }
    public  function getQuantidadeProdutos($id)
    {
        if($id) {
            $resultado = $this->select(
                "SELECT count(*) as total FROM servico WHERE usuario_id= $id"
            );

            return $resultado->fetch()['total'];
        }

        return false;
    }
    
    
    
    public function verificaEmail($email)
    {
        try {

            $query = $this->select(
                "SELECT * FROM usuario WHERE email = '$email' "
            );

            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public  function salvar(Usuario $usuario) {
        try {
            $nome      = $usuario->getNome();
            $email     = $usuario->getEmail();
            $cpf       = $usuario->getCpf();
            $telefone  = $usuario->getTelefone();
            return $this->insert(
                'usuario',
                ":nome,:email,:cpf,:telefone",
                [
                    ':nome'=>$nome,
                    ':email'=>$email,
                    ':cpf'=>$cpf,
                    ':telefone'=>$telefone
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }
}