<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Pessoa</h3>

            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/usuario/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control"  name="nome" placeholder="Seu nome" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Tipo Pessoa</label>
                    <input type="email" class="form-control" name="tippes" placeholder="Cliente ou Funcionário" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">CPF</label>
                    <input type="email" class="form-control" name="cpf" placeholder="xxx.xxx.xxx-xx" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Telefone</label>
                    <input type="email" class="form-control" name="telefone" placeholder="" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="exemplo@gmail.com" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>" required>
                </div>            
                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>