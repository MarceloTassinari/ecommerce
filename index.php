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

/** 1. o comando "use" informa quais diretórios serão utilizados
 * 	2. a classe slim do namespace Slim para utilização de um framework (=estrutura)
	criando as rotas POST/PUT/PATCH/DELETE (publicar/colocar/correção/deletar)
 *	3. a classe Page do namespace Hcode, para a página inicial.
 *	4. a classe PageAdmin do namespace Hcode, para a página da Administração.
 *	5. a classe User do namespace Hcode/Model, para ...
 *  6. a classe Categories de Model para listar todas as categorias
 */
use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Category;

/**
 * instancia a classe slim() que fornece as rotas.
 * Poderia não utilizar o "use \Slim\Slim;" acima e chamar por
 * "$app = new \Slim\Slim();"
 * Portanto, $app é um objeto com cópia da classe slim().
 **/
$app = new Slim();

/**
 * 1. A variável $app é onde iremos configurar cada uma das rotas.
 * 2. "$app->método.." corresponde ao método do objeto $app que será usado.
 * 3. Abaixo, xxx
 */
$app->config('debug', true);

/**
 * 1. A variável $app é onde iremos configurar cada uma das rotas.
 * 2. No caso abaixo, a rota será acessada pelo método "get".
 * 3. '/' é a rota principal (no caso, a página inicial).
 * @rota	www.hcodecommerce.com.br/
 */
$app->get('/', function() {
    
	/** instancia a classe Page()
	 * que cria o objeto $page
	 * que criará a página principal
	 */
	$page = new Page();
	
	/** 
	 * 1. chama a function setTpl da classe $page
	 * 2. ao executar, irá chamar o construct e vai adicionar o "header" na tela
	 * 3. o Template tem o nome de index
	 * 4. o index.html é a parte principal da página
	 */
	$page->setTpl("index");
	/** 
	 * aqui acaba a execução, o php vai limpar a memória do código
	 * e vai chamar o destruct que irá adicionar o footer.
	 **/
});

/**
 * cria a rota principal com "/admin" para a Administração
 * @rota	www.hcodecommerce.com.br/admin
 */
$app->get('/admin', function() {
    
	/**
	 * verifyLogin	método que irá validar se o usuário está logado.
	 **/
	User::verifyLogin();

	$page = new PageAdmin();
	// aqui irá chamar o construct e vai adicionar o "header" na tela

	/**
	 * o Template tem o nome de index
	 * o index.html é a parte principal da página
	 **/
	$page->setTpl("index");

	 /**
	 * aqui acaba a execução, o php vai limpar a memória do código
	 * e vai chamar o destruct que irá adicionar o footer.
	 **/
	
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
 * Rota para tela que lista todos os usuários
 **/
$app->get("/admin/users", function() 
{
	/**
	 * verifyLogin	método que irá validar se o usuário está logado e se ele é do administrativo.
	 **/
	User::verifyLogin();

	$users = User::listAll();

	$page = new PageAdmin();

	$page->setTpl("users", array(
		"users"=>$users
	));

});

/**
 * Rota para criar usuário
 * Vide Nota3 ao final
 **/
$app->get("/admin/users/create", function() 
{
	/**
	 * verifyLogin	método que irá validar se o usuário está logado e se ele é do administrativo.
	 **/
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("users-create");

});

/**
 * Rota para deleção do registro
 **/
$app->get("/admin/users/:iduser/delete", function($iduser) {

	/**
	 * verifyLogin	método que irá validar se o usuário está logado e se ele é do administrativo.
	 **/
	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$user->delete();

	header("Location: /admin/users");

	exit;

});

/**
 * Rota para editar (update) registro
 * Vide Notas 2 e 3 ao final
 **/
$app->get("/admin/users/:iduser", function($iduser) 
{
	/**
	 * verifyLogin	método que irá validar se o usuário está logado e se ele é do administrativo.
	 **/
	User::verifyLogin();

	$user = new User();

	/**
	 * int -> coverte para numérico
	 **/
	$user->get((int)$iduser);

	$page = new PageAdmin();

	$page->setTpl("users-update", array(
		"user"=>$user->getValues()
	));

});

/**
 * Rota para salvar o registro
 * vide Nota1 no final
 **/
$app->post("/admin/users/create", function() {

	/**
	 * verifyLogin	método que irá validar se o usuário está logado e se ele é do administrativo.
	 * a ideia do save() é executar o insert dentro do banco
	 **/
	User::verifyLogin();

	$user = new User();

	/**
	 * se for definido, valor 1, se não, valor 0
	 **/
	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->setData($_POST);

	$user->save();

	header("Location: /admin/users");

	exit;

});

/**
 * Rota para salvar a edição do registro
 **/
$app->post("/admin/users/:iduser", function($iduser) {

	/**
	 * verifyLogin	método que irá validar se o usuário está logado e se ele é do administrativo.
	 **/
	User::verifyLogin();

	$user = new User();

	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

	$user->get((int)$iduser);

	$user->setData($_POST);

	$user->update();

	header("Location: /admin/users");

	exit;

});

/**
 * Rota para o esqueceu a senha (forgot)
 **/
$app->get("/admin/forgot", function()
{

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false

	]);

	$page->setTpl("forgot");

});

$app->post("/admin/forgot", function(){

	$user = User::getForgot($_POST["email"]);

	header("Location: /admin/forgot/sent");
	exit;

});

$app->get("/admin/forgot/sent", function(){

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-sent");
});

$app->get("/admin/forgot/reset", function(){

	$user = User::validForgotDecrypt($_GET["code"]);

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-reset", array(
		"name"=>$user["desperson"],
		"code"=>$GET["code"]
	));

});

$app->post("/admin/forgot/reset", function(){

	$forgot = User::validForgotDecrypt($_POST["code"]);

	User::setForgotUsed($forgot["idrecovery"]);

	$user = new User();

	$user->get((int)$forgot["iduser"]);

	$password = password_hash($_POST["password"], PASSWORD_DEFAULT, [
		"cost"=>12
	]);

	$user->setPassword($password);

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-reset-sucess");

});
/**
 * Rota para acessar o template de categorias
 **/
$app->get("/admin/categories", function(){

	User::verifyLogin();

	/**
	 * Classe category() chamando listAll
	 **/
	$categories = Category::listAll();

	$page = new PageAdmin();

	/**
	 * O arquivo categories.html espera receber $categories
	 **/
	$page->setTpl("categories", [
		'categories'=>$categories
	]);

});

/**
 * Rota para criar a categoria
 **/
$app->get("/admin/categories/create", function(){

	User::verifyLogin();

	$page = new PageAdmin();

	/**
	 * O arquivo categories.html espera receber $categories
	 **/
	$page->setTpl("categories-create");

});

/**
 * Rota para criar a página da categoria
 **/
$app->post("/admin/categories/create", function(){

	User::verifyLogin();

	$category = new Category();

	$category->setData($_POST);

	$category->save();

	header('Location: /admin/categories');	
	exit;	

});

/**
 * Rota para deletar uma categoria
 **/
$app->get("/admin/categories/:idcategory/delete", function($idcategory)
{

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->delete();

	header('Location: /admin/categories');	
	exit;	

});

/**
 * Rota para alterar uma categoria
 **/
$app->get("/admin/categories/:idcategory", function($idcategory)
{

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new PageAdmin();

	/**
	 * O arquivo categories.html espera receber $categories
	 **/
	$page->setTpl("categories-update", [
		'category'=>$category->getValues()
	]);

});

$app->post("/admin/categories/:idcategory", function($idcategory)
{

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	// carrego com o que receber do post (formulário)
	$category->setData($_POST);

	$category->save();

	header('Location: /admin/categories');	
	exit;	

});

/**
 * o método run() (=execute) do objeto @app é quem carrega tudo,
 * após a declaração de todas as rotas acima.
 **/
$app->run();

/**
 * Nota 1:	não existe a alteração de um único campo no banco de dados, o banco de dados deleta o item e cria um novo item com as alterações sugeridas.
 * Nota 2:	$app->get("admin/users/:iduser", function($iduser). o :iduser é somente um padrão e você vai recebê-lo na função como uma variável ($iduser).  Só o fato de colocar como um parâmetro obrigatório de rota, ele já entende que a função consegue enxergar este parâmetro que está passando.
 * Nota 3: Quando estamos fazendo as rotas (slim framework), se temos uma rota que tem parâmetros mais completos (detalhados) que uma outra rota que tem parâmetros parciais daquela rota, temos que colocar primeiro a mais completa, pois, senão ela fica na parcial e nunca será executada a mais detalhada. P.ex.:
 * $app->get(“admin/users/:iduser/delete”, function…
 * $app->get(“admin/users/:iduser”, function…
 **/

 ?>