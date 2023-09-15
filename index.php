<?php 

// verifica se o arquivo já foi incluido
require_once("vendor/autoload.php");

// o modo slim ficou configurado o debug, onde
// todo erro vai ficar explicado o que aconteceu no erro
$app = new \Slim\Slim();

$app->config('debug', true);

// foi criada a rota principal com / que está dando o OK
$app->get('/', function() {
    
//	echo "OK"; (foi substituído por...)	
	$sql = new Hcode\DB\Sql();
	$results = $sql->select("SELECT * FROM tb_users");
	echo json_encode($results);

});

$app->run();

 ?>