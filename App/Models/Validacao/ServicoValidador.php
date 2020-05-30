<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Servico;

class ServicoValidador{

    public function validar(Servico $servico)
    {
        $resultadoValidacao = new ResultadoValidacao();
        
        if(empty($servico->getUsuario()->getId()))
        {
            $resultadoValidacao->addErro('usuario_id',"Usuário: Este campo não pode ser vazio");
        }        
        
        if(empty($servico->getDescricao()))
        {
            $resultadoValidacao->addErro('descricao',"Descrição: Este campo não pode ser vazio");
        }

        if(empty($servico->getDataServico()))
        {
            $resultadoValidacao->addErro('dataServico',"DataServico: Este campo não pode ser vazio");
        }

        return $resultadoValidacao;
    }
}