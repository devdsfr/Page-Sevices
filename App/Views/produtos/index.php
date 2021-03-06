<div class="container">
    <div class="row">
        <form action="http://<?php echo APP_HOST; ?>/produtos/" method="get" class="form-inline ">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Total por pagina:</label>
                    <select name="totalPorPagina" id="totalPorPagina" class="form-control input-sm" onchange="this.form.submit()">
                        <option value="5" <?php echo ($viewVar['totalPorPagina'] == "5")? "selected" : ""; ?>>5</option>
                        <option value="15" <?php echo ($viewVar['totalPorPagina'] == "15")? "selected" : ""; ?>>15</option>
                        <option value="30" <?php echo ($viewVar['totalPorPagina'] == "30")? "selected" : ""; ?>>30</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group pull-right">
                        <div class="input-group">
                            <span class="input-group-addon input-sm" id="basic-addon1">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            </span>
                            <input type="text" placeholder="Buscar conteudo" required value="<?php echo $viewVar['buscaProduto']; ?>"
                             class="form-control input-sm" name="buscaProduto" />
 
                            <div class="input-group-btn">
                            <button class="btn btn-success btn-sm" type="submit">Buscar</button>
                        </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>
    <div class="row">    
        <div class="col-md-12 col-lg-12">
            <hr> 
            <?php
                if(!count($viewVar['listaProdutos'])){
            ?>
                <div class="alert alert-info" role="alert">Efetue uma busca para exibir o seu serviço.</div>
            <?php
                } else {
            ?>
                <?php if($Sessao::retornaMensagem()){ ?>
                    <div class="alert alert-warning" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $Sessao::retornaMensagem(); ?>
                    </div>
                <?php } ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td class="info">Nome</td>
                            <td class="info hidden-sm hidden-xs">Descrição</td>
                            <td class="info hidden-sm hidden-xs">Email</td>
                            <td class="info hidden-sm hidden-xs">Data do Servico</td>
                        </tr>
                        <?php
                            foreach($viewVar['listaProdutos'] as $produtos) {
                        ?>
                            <tr class="<?php echo ($produtos->getStatus() == "N") ? "linhaDesativado" : ""; ?>">
                                <td><?php echo $produtos->getNome(); ?></td>
                                <td class=" hidden-sm hidden-xs"><?php echo $produtos->getDescricao(); ?></td>       
                                <td class=" hidden-sm hidden-xs"><?php echo $produtos->getEmail(); ?></td>    
                                <td class=" hidden-sm hidden-xs"><?php echo $produtos->getDataServico(); ?></td>                  
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
                <?php echo $viewVar['paginacao']; ?>
                <?php
                    }
                ?>
        </div>
    </div>
</div>