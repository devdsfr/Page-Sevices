<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://<?php echo APP_HOST; ?>">Service</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php if($viewVar['nameController'] == "HomeController") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>" >Home</a>
                </li>
                <li <?php if($viewVar['nameController'] == "CadastroController" && $viewVar['nameAction'] == "") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/usuario" >Cadastro de Clientes</a>
                </li>
                <li <?php if($viewVar['nameController'] == "ProdutoController" && ($viewVar['nameAction'] == "" || $viewVar['nameAction'] == "index")) { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/produto" >Produtos</a>
                </li>
                <li <?php if($viewVar['nameController'] == "MarcaController" && $viewVar['nameAction'] == "") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/marca" >Marcas</a>
                </li>  
                <li <?php if($viewVar['nameController'] == "ServicoController" && $viewVar['nameAction'] == "") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/servico" >Ordem de Serviços</a>
                </li>       
                <li <?php if($viewVar['nameController'] == "LoginController" && $viewVar['nameAction'] =="") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/login" >Permissões de acesso</a>
                </li>   
                <li <?php if($viewVar['nameController'] == "ProdutosController" && ($viewVar['nameAction'] == "lista" || $viewVar['nameAction'] == "index")) { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>/produtos" >Relatório de Servicos</a>
                </li>       
            </ul>
        </div>
    </div>
</nav>


