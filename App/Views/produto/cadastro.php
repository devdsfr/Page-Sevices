<!--
    <head>
    <link rel="stylesheet" href="../public/css/estilo_lista.css">
</head>
-->


<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Produto <img src="https://image.flaticon.com/icons/svg/2825/2825867.svg" alt="" width = "45"></h3>
            
            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/produto/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control"  name="nome" placeholder="Nome do Produto" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    R$ <input type="text" class="form-control" name="preco" placeholder="100R$" value="<?php echo $Sessao::retornaValorFormulario('preco'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" class="form-control" name="quantidade" placeholder="0" value="<?php echo $Sessao::retornaValorFormulario('quantidade'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" placeholder="Descrição do produto" required><?php echo $Sessao::retornaValorFormulario('descricao'); ?></textarea>

                </div>

                <div class="form-group">
                    <label for="descricao">Marca</label>
                <select class="form-control" name="marca_id"  required>
                    <?php foreach($viewVar['listaMarcas'] as $Marca): ?>
                    <option value="<?php echo $Marca->getId(); ?>" <?php echo ($Sessao::retornaValorFormulario('marca_id') == $Marca->getId())? "selected" : ""; ?>><?php echo $Marca->getNome(); ?></option>
                    <?php endforeach; ?>
                </select>
                </div>

                <button type="submit" class="btn-cadastro-prod">Salvar</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>