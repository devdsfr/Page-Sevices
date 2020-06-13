<?php
 
namespace App\Models\DAO;
 
use App\Models\Entidades\Produtos;
use App\Models\Entidades\Usuario;
use App\Models\Paginacao;
 
class ProdutosDAO extends BaseDAO
{
    public  function buscaComPaginacao($buscaProduto, $totalPorPagina, $paginaSelecionada)
    {
 
        $paginaSelecionada = (!$paginaSelecionada) ? 1 : $paginaSelecionada;
 
        $inicio = (($paginaSelecionada - 1) * $totalPorPagina);
 
        $whereBusca = " WHERE u.nome 
                                LIKE '$buscaProduto%'                                
                         ";
 
        $resultadoTotal = $this->select(
            "SELECT count(*) as total FROM servico 
                                    inner join usuario as u on servico.usuario_id = u.id $whereBusca "
        );
 
        $resultado = $this->select(
            "SELECT servico.descricao, servico.dataServico, u.email, u.nome FROM servico as servico
                      inner join usuario as u on servico.usuario_id = u.id  $whereBusca LIMIT $inicio,$totalPorPagina"
        );
         
        $totalLinhas      = $resultadoTotal->fetch()['total'];
 
        return ['paginaSelecionada' => $paginaSelecionada,
                'totalPorPagina'    => $totalPorPagina,
                'totalLinhas'       => $totalLinhas,
                'resultado'         => $resultado->fetchAll(\PDO::FETCH_CLASS, Produtos::class)];
 
    }
}