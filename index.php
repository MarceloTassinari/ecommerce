<?php 

// verifica se o arquivo já foi incluido
require_once("vendor/autoload.php");

// definindo os caminhos (namespaces)
use \Slim\Slim;
use \Hcode\Page;

$app = new Slim();

$app->config('debug', true);

// foi criada a rota principal com / que está dando o OK
$app->get('/', function() {
    
	$page = new Page();
	// aqui irá chamar o construct e vai adicionar o "header" na tela

	$page->setTpl("index");
	// aqui irá adicionar o arquivo que tem o conteúdo "h1" (Hello!)
	// aqui acaba a execução, o php vai limpar a memória do código e vai chamar o destruct que irá adicionar o footer.
});

$app->run();
// essa linha que carrega tudo então

 ?>