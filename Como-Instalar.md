# Page-Sevices
Efetuar o clone do projeto

A pasta do projeto nescessita ser com o nome "services", pois o caminho da aplicação esta direcionada a esse nome

Deve instalar o xampp e iniciar o serviço apache e dentro da para htdocs colocar a pasta "services"

dentro do arquivo dump.sql tem os scripts do banco de dados, criar o banco com o nome "services" e executar o scripts do mesmo

No caminho "C:\xampp\htdocs\Services\App" tem o arquivo App.php onde está a configuração do banco de dados, segue o exemplo abaixo.

 public function __construct()
    {
        /*
         * Constantes do sistema
         */
        define('APP_HOST'       , $_SERVER['HTTP_HOST'] . "/services");
        define('PATH'           , realpath('./'));
        define('TITLE'          , "Serviços Mobile EPJ Celulares");
        define('DB_HOST'        , "localhost");
        define('DB_USER'        , "root");
        define('DB_PASSWORD'    , "dsfr1310"); //senha do mysql
        define('DB_NAME'        , "services"); //nome do banco de dados
        define('DB_DRIVER'      , "mysql");

        $this->url();
    }
    
    Depois desses passos colocar "http://localhost/services/" no url do navegador e pronto
    
