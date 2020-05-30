<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Editar Permissões</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/servico/atualizar" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['servico']->getId(); ?>">

                <div class="form-group">
                    <label for="descricao">Cliente</label>
                    <select class="form-control" name="usuario_id"  required>
                        <?php foreach($viewVar['listaUsuarios'] as $Usuario): ?>
                            <option value="<?php echo $Usuario->getId(); ?>" <?php echo ( $viewVar['servico']->getUsuario()->getId() == $Usuario->getId())? "selected" : ""; ?>><?php echo $Usuario->getNome(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>              
              
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" placeholder="Descrição do servico" required><?php echo $viewVar['servico']->getDescricao(); ?></textarea>
                </div>                

                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/servico" class="btn btn-info btn-sm">Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
