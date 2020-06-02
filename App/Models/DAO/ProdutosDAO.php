<?php
 
namespace App\Models\DAO;
 
use App\Models\Entidades\Produtos;
use App\Models\Paginacao;
 
class ProdutosDAO extends BaseDAO
{
    public  function buscaComPaginacao($buscaProduto, $totalPorPagina, $paginaSelecionada)
    {
 
        $paginaSelecionada = (!$paginaSelecionada) ? 1 : $paginaSelecionada;
 
        $inicio = (($paginaSelecionada - 1) * $totalPorPagina);
 
        $whereBusca = " WHERE nome 
                                LIKE '$buscaProduto%'                                
                         ";
 
        $resultadoTotal = $this->select(
            "SELECT count(*) as total FROM produtos $whereBusca "
        );
 
        $resultado = $this->select(
            "SELECT * FROM usuario as usuario $whereBusca LIMIT $inicio,$totalPorPagina"
        );
         
        $totalLinhas      = $resultadoTotal->fetch()['total'];
 
        return ['paginaSelecionada' => $paginaSelecionada,
                'totalPorPagina'    => $totalPorPagina,
                'totalLinhas'       => $totalLinhas,
                'resultado'         => $resultado->fetchAll(\PDO::FETCH_CLASS, Produtos::class)];
 
    }
}