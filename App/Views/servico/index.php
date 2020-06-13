<div class="container">
    <div class="row">
    <br>
    <div class="col-md-12">
        <a href="http://<?php echo APP_HOST; ?>/servico/cadastro" class="btn-adicionar">Adicionar</a>
        <hr>
    </div>
    <div class="col-md-12">
        <?php if($Sessao::retornaMensagem()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $Sessao::retornaMensagem(); ?>
            </div>
        <?php } ?>

        <?php
            if(!count($viewVar['listaServicos'])){
        ?>
            <div class="alert alert-info" role="alert">Nenhum produto encontrado</div>
        <?php
            } else {
        ?>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td class="info">Cliente</td>                        
                        <td class="info">Descrição</td>
                        <td class="info">Data de Início do Serviço</td>
                        <td class="info"></td>
                    </tr>
                    <?php
                        foreach($viewVar['listaServicos'] as $servico) {
                    ?>
                        <tr>
                            <td><?php echo $servico->getUsuario()->getNome(); ?></td>                            
                            <td><?php echo $servico->getDescricao(); ?></td>
                            <td><?php echo $servico->getDataServico(); ?></td>
                            <td>
                                <a href="http://<?php echo APP_HOST; ?>/servico/edicao/<?php echo $servico->getId(); ?>" class="btn btn-info btn-sm">Editar</a>
                                <a href="http://<?php echo APP_HOST; ?>/servico/exclusao/<?php echo $servico->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        <?php
            }
        ?>
    </div>
</div>
</div>