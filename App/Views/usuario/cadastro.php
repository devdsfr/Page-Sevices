<!--
    <head>
    <link rel="stylesheet" href="../public/css/estilo_usuario.css">
</head>
-->


<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Pessoa <img src="https://image.flaticon.com/icons/png/512/1006/1006115.png" alt="" width = "45"></h3>

            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/usuario/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control"  name="nome" placeholder="Seu nome" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" name="cpf" placeholder="xxx.xxx.xxx-xx" value="<?php echo $Sessao::retornaValorFormulario('cpf'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" name="telefone" placeholder="" value="<?php echo $Sessao::retornaValorFormulario('telefone'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="exemplo@gmail.com" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>" required>
                </div>            
                <button type="submit" class="btn-cadastro-user">Salvar</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>