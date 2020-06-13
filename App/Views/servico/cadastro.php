<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Serviços</h3>
            
            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/servico/salvar" method="post" id="form_cadastro">

                <div class="form-group">
                    <label for="descricao">Cliente</label>
                <select class="form-control" name="usuario_id"  required>
                    <?php foreach($viewVar['listaUsuarios'] as $Usuario): ?>
                    <option value="<?php echo $Usuario->getId(); ?>" <?php echo ($Sessao::retornaValorFormulario('usuario_id') == $Usuario->getId())? "selected" : ""; ?>><?php echo $Usuario->getNome(); ?></option>
                    <?php endforeach; ?>
                </select>
                </div>   
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" placeholder="Descrição do produto" required><?php echo $Sessao::retornaValorFormulario('descricao'); ?></textarea>
                </div>  
                <div class="form-group">
                    <label for="preco">Preço</label>
                    R$ <input type="text" class="form-control" name="preco" placeholder="100R$" value="<?php echo $Sessao::retornaValorFormulario('preco'); ?>" required>

                </div>                               
                <div class="form-group">
                    <label for="dataServico">Data do Serviço</label>
                    <input type="date" class="form-control" name="dataServico" placeholder="Informe a data do início do serviço" value="<?php echo $Sessao::retornaValorFormulario('dataServico'); ?>" required>
                </div> 

                <button type="submit" class="btn-cadastro-user">Salvar</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>