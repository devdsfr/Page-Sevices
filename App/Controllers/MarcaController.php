<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\MarcaDAO;
use App\Models\Entidades\Marca;
use App\Models\Validacao\MarcaValidador;

class MarcaController extends Controller
{
    public function index()
    {
        $marcaDAO = new MarcaDAO();

        self::setViewParam('listaMarcas',$marcaDAO->listar());

        $this->render('/marca/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('/marca/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $Marca = new Marca();
        $Marca->setNome($_POST['nome']);

        Sessao::gravaFormulario($_POST);

        $marcaValidador = new MarcaValidador();
        $resultadoValidacao = $marcaValidador->validar($Marca);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/marca/cadastro');
        }

        $marcaDAO = new MarcaDAO();

        $marcaDAO->salvar($Marca);
        
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/marca');
      
    }
    
    public function edicao($params)
    {
        $id = $params[0];

        $marcaDAO = new MarcaDAO();

        $marca = $marcaDAO->getById($id);

        if(!$marca){
            Sessao::gravaMensagem("Marca inexistente");
            $this->redirect('/marca');
        }

        self::setViewParam('marca',$marca);

        $this->render('/marca/editar');

        Sessao::limpaMensagem();

    }

    public function atualizar()
    {

        $Marca = new Marca();
        $Marca->setId($_POST['id']);
        $Marca->setNome($_POST['nome']);

        Sessao::gravaFormulario($_POST);

        $produtoValidador = new MarcaValidador();
        $resultadoValidacao = $produtoValidador->validar($Marca);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/marca/edicao/'.$_POST['id']);
        }

        $marcaDAO = new MarcaDAO();

        $marcaDAO->atualizar($Marca);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/marca');

    }
    
    public function exclusao($params)
    {
        $id = $params[0];

        $marcaDAO = new MarcaDAO();

        $marca = $marcaDAO->getById($id);

        if(!$marca){
            Sessao::gravaMensagem("Marca inexistente");
            $this->redirect('/marca');
        }

        self::setViewParam('marca',$marca);

        $this->render('/marca/exclusao');

        Sessao::limpaMensagem();
    }

    public function excluir()
    {
        $Marca = new Marca();
        $Marca->setId($_POST['id']);

        $marcaDAO = new MarcaDAO();

        if($totalProdutos = $marcaDAO->getQuantidadeProdutos($_POST['id'])){
            Sessao::gravaMensagem("Esta marca não pode ser excluída pois existem ".$totalProdutos." produtos vinculados a ela.");
            $this->redirect('/marca/exclusao/'.$_POST['id']);
        }

        if(!$marcaDAO->excluir($Marca)){
            Sessao::gravaMensagem("Marca inexistente");
            $this->redirect('/marca');
        }

        Sessao::gravaMensagem("Marca excluida com sucesso!");

        $this->redirect('/marca');

    }
}