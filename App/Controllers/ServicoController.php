<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\MarcaDAO;
use App\Models\DAO\ProdutoDAO;
use App\Models\DAO\UsuarioDAO;
use App\Models\DAO\ServicoDAO;
use App\Models\Entidades\Servico;
use App\Models\Validacao\ServicoValidador;

class ServicoController extends Controller
{
    public function index()
    {
        $servicoDAO = new ServicoDAO();

        self::setViewParam('listaServicos',$servicoDAO->listar());

        $this->render('/servico/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $usuarioDAO = new UsuarioDAO();
        self::setViewParam('listaUsuarios',$usuarioDAO->listar());
        $this->render('/servico/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $Servico = new Servico();
        
        $Servico->setDescricao($_POST['descricao']);
        $Servico->setPreco($_POST['preco']);
        $Servico->setDataServico($_POST['dataServico']);
        $Servico->getUsuario()->setId($_POST['usuario_id']);        

        Sessao::gravaFormulario($_POST);

        $servicoValidador = new ServicoValidador();
        $resultadoValidacao = $servicoValidador->validar($Servico);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/servico/cadastro');
        }

        $servicoDAO = new ServicoDAO();

        $servicoDAO->salvar($Servico);
        
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/servico');
      
    }
    
    public function edicao($params)
    {
        $id = $params[0];

        $servicoDAO = new ServicoDAO();

        $servico = $servicoDAO->getById($id);

        if(!$servico){
            Sessao::gravaMensagem("Produto inexistente");
            $this->redirect('/servico');
        }

        $usuarioDAO = new UsuarioDAO();
        self::setViewParam('listaUsuarios',$usuarioDAO->listar());
        self::setViewParam('servico',$servico);
        $this->render('/servico/editar');

        Sessao::limpaMensagem();

    }

    public function atualizar()
    {

        $Servico = new Servico();
        $Servico->setId($_POST['id']);        
        $Servico->setDescricao($_POST['descricao']);
        $Servico->setPreco($_POST['preco']);
        $Servico->getUsuario()->setId($_POST['usuario_id']);        

        Sessao::gravaFormulario($_POST);

        $servicoValidador = new ServicoValidador();
        $resultadoValidacao = $servicoValidador->validar($Servico);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/servico/edicao/'.$_POST['id']);
        }

        $servicoDAO = new ServicoDAO();

        $servicoDAO->atualizar($Servico);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/servico');

    }
    
    public function exclusao($params)
    {
        $id = $params[0];

        $servicoDAO = new ServicoDAO();

        $servico = $servicoDAO->getById($id);

        if(!$servico){
            Sessao::gravaMensagem("Servico inexistente");
            $this->redirect('/servico');
        }

        self::setViewParam('servico',$servico);

        $this->render('/servico/exclusao');

        Sessao::limpaMensagem();

    }

    public function excluir()
    {
        $Servico = new Servico();
        $Servico->setId($_POST['id']);

        $servicoDAO = new ServicoDAO();

        if(!$servicoDAO->excluir($Servico)){
            Sessao::gravaMensagem("Servico inexistente");
            $this->redirect('/servico');
        }

        Sessao::gravaMensagem("Servico excluido com sucesso!");

        $this->redirect('/servico');

    }
}