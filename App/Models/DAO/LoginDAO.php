
<?php

namespace App\Models\DAO;

use App\Models\Entidades\Login;

class LoginDAO extends BaseDAO
{
    public function verificaEmail($nome)
    {
        try {

            $query = $this->select(
                "SELECT * FROM login WHERE nome = '$nome' "
            );

            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public  function salvar(Login $login) {
        try {
            $nome      = $login->getNome();
            $senha     = $login->getSenha();            
            return $this->insert(
                'login',
                ":nome,:senha",
                [
                    ':nome'=>$nome,
                    ':senha'=>$senha                    
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }
}
