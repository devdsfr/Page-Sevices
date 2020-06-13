<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Editar Produto <img src="https://image.flaticon.com/icons/png/512/2399/2399903.png" alt="" width = "45"></h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/produto/atualizar" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['produto']->getId(); ?>">

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text"  class="form-control" name="nome" id="nome" placeholder="" value="<?php echo $viewVar['produto']->getNome(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text"  class="form-control"  name="preco" id="preco" placeholder="" value="<?php echo $viewVar['produto']->getPreco(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number"  class="form-control"  name="quantidade" id="quantidade" placeholder="" value="<?php echo $viewVar['produto']->getQuantidade(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="quantidade">Descrição</label>
                    <textarea class="form-control" name="descricao" placeholder="Descrição do produto" required><?php echo $viewVar['produto']->getDescricao(); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="descricao">Marca</label>
                    <select class="form-control" name="marca_id"  required>
                        <?php foreach($viewVar['listaMarcas'] as $Marca): ?>
                            <option value="<?php echo $Marca->getId(); ?>" <?php echo ( $viewVar['produto']->getMarca()->getId() == $Marca->getId())? "selected" : ""; ?>><?php echo $Marca->getNome(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn-salvar-edi">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/produto" class="btn-voltar">Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
