<?php 
/** este arquivo terá as rotas (caminhos) de acesso
 * às diversas ações a serem desenvolvidas.
 */

/**
 * a session colabora com a verificação se o usuário
 * está logado, se não, direciona-se para a página de login
 **/
session_start();

/** Verifica se o arquivo autoload.php já foi incluido.
 * Caso não tenha sido, será incluído.
 * Se existente, segue.
 * o autoloads trará sempre as dependências (é do composer)
 */
require_once("vendor/autoload.php");

/** informa quais diretórios serão utilizados
 * 	a classe slim do namespace Slim para utilização de um framework (=estrutura)
	criando as rotas POST/PUT/PATCH/DELETEM (publicar/colocar/correção/deletar)
 *	a classe Page do namespace Hcode, para a página inicial.
 *	a classe PageAdmin do namespace Hcode, para a página da Administração.
 *	a classe User do namespace Hcode/Model, para ...
 */
use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;

/**
 * instancia a classe slim()
 * que fornece as rotas
 */
$app = new Slim();

$app->config('debug', true);

/**
 * cria a rota principal com "/" para a página inicial
 * @rota	www.hcodecommerce.com.br/
 */
$app->get('/', function() {
    
	/** cria a página ($page)
	 * aqui irá chamar o construct e vai adicionar o "header" na tela
	 */
	$page = new Page();
	
	$page->setTpl("index");
	// aqui irá adicionar o arquivo que tem o conteúdo "h1" (Hello!)
	// aqui acaba a execução, o php vai limpar a memória do código e vai chamar o destruct que irá adicionar o footer.
});

/**
 * cria a rota principal com "/admin" para a Administração
 * @rota	www.hcodecommerce.com.br/admin
 */
$app->get('/admin', function() {
    
	/**
	 * verifyLogin	método que irá validar se o usuário está logado.
	 * xxx
	 **/
	User::verifyLogin();

	$page = new PageAdmin();
	// aqui irá chamar o construct e vai adicionar o "header" na tela

	/**
	 * o Template tem o nome de index
	 * aqui acaba a execução, o php vai limpar a memória do código
	 * e vai chamar o destruct que irá adicionar o footer.
	 **/
	$page->setTpl("index");
	
});

/**
 * cria a rota para a tela login
 */
$app->get('/admin/login', function() {

	/**Ao chamar a página do login
	 * será desabilitado o cabeçalho e o rodapé por não existir na tela login
	 */
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

});

/**
 * Rota para o post (postagem), as informações
 * de login e senha.
 **/
$app->post('/admin/login', function() {

	/**
	 * User		Classe
	 * login	Método estático para receber o post de login e o o post da senha, pois ainda não sabemos quem ele é.
	 * header	redireciona para a homepage da administração.
	 **/
	User::login($_POST["login"], $_POST["password"]);

	header("Location: /admin");

	exit;

});

/**
 * Rota para o logout.
 **/
$app->get('/admin/logout',function()
{

	User::logout();

	/**
	 * header direciona para a página de login
	 **/
	header("Location: /admin/login");

	exit;

});

/**
 * o comando run é quem carrega tudo então ("execute")
 **/
$app->run();

 ?>