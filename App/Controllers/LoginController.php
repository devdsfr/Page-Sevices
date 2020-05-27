<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\LoginDAO;
use App\Models\Entidades\Login;

class LoginController extends Controller
{
    public function cadastro()
    {
        $this->render('/login/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
    }

    public function salvar()
    {
        $Login = new Login();
        $Login->setNome($_POST['nome']);
        $Login->setSenha($_POST['senha']);
        

        Sessao::gravaFormulario($_POST);

        $loginDAO = new LoginDAO();

        if($loginDAO->verificaEmail($_POST['nome'])){
            Sessao::gravaMensagem("Usuário existente");
            $this->redirect('/login/cadastro');
        }

        if($loginDAO->salvar($Login)){
            $this->redirect('/login/sucesso');
        }else{
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }
    
    public function sucesso()
    {
        if(Sessao::retornaValorFormulario('nome')) {
            $this->render('/login/sucesso');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        }else{
            $this->redirect('/');
        }
    }

    public function index()
    {
        $this->redirect('/login/cadastro');
    }

}
