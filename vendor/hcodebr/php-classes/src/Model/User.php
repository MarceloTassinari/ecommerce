<?php 

namespace Hcode\Model;

use \Hcode\Model;
use \Hcode\DB\Sql;

class User extends Model {

	const SESSION = "User";

	/**protected $fields = [
		"iduser", "idperson", "deslogin", "despassword", "inadmin", "dtergister"
	];
	* classe estática login que recebe o login e a senha
	*
	* buscará no banco de dados se o login e senha existem e estão corretos*/
	public static function login($login, $password)
	{

		/**
		 * acesso ao banco de dados
		 * onde serão verificados o usuário e a senha
		 **/
		$sql = new Sql();

		/**
		 * verificando o usuário
		 * nossa query será todas as colunas da tabela user for igual ao login
		 **/
		$results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
			":LOGIN"=>$login
		));

		/** 		
		 * o if é no caso de não encontrar o usuário.
		 * a contra-barra no início de Exception significa
		 * que deverá encontra a exception no escopo principal
		 **/
		if (count($results) === 0)
		{
			throw new \Exception("Usuário inexistente ou senha inválida.");
		}

		/**
		 * posição [0], pois é o primeiro registro encontrado
		 **/
		$data = $results[0];

		/**
		 * verificando a senha do usuário
		 * recebe os parametros da senha e os dados, que na verdade é o hash da senha
		 **/
		if (password_verify($password, $data["despassword"]) === true)
		{

			/**
			 * se verdadeiro, cria uma variável (user), criando um novo objeto, onde passaremos todos os dados desse objeto
			 **/
			$user = new User();

			/** 
			 * vide nota1 abaixo
			 **/
			$user->setData($data);

		 	/** 
			 * vide nota2 abaixo
			 **/
			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else {

			/**
			 * estourará uma exceção se não for o usuário e senha
			 **/
			throw new \Exception("Usuário inexistente ou senha inválida.");

		}

	}

		/**
		 * verifyLogin:	método que irá validar se o usuário está logado.
		 * inadmin:		verifica se o usuário é da administração (não somente da loja)
		 **/
	 	public static function verifyLogin($inadmin = true)
	{

		/**
		 * o if irá verificar:
		 * a) se existe a sessão;
		 * b) se a sessão é falsa ou não existe;
		 * c) se o ID do usuário existe;
		 * d) se o usuário pode acessar a admin.
		 **/
		if (
			!isset($_SESSION[User::SESSION])
			|| 
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0
			||
			(bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin
		) {
			
			/**
			 * se passado pelos critério acima, executa...
			 * o direcionamento para a página de login
			 **/
			header("Location: /admin/login");

			exit;

		}

	}

	/**
	 * a função logout irá encerrar a sessão, quando o usuário
	 * se desconectar e, a partir, dai, novo acesso obriga o direcionamento à página de login.
	 * No caso, está sendo encerrada apenas a session atual, sem alterar outras sessões concomitantes.
	 **/
	public static function logout()
	{

		$_SESSION[User::SESSION] = NULL;

	}

}

/**
 * NOTA:
 * 1. Consideramos que a classe User é um model. E toda classe modelo vai ter GETs and SETTer - G&S, portanto, é mais inteligente criar uma classe model que saiba fazer os G&S e cada classe, cada daw, user, categorias, produtos, etc, ela irá extender de um model que já vai saber fazer esses ¨G&S.
 * 2. para funcionar um login, tem que se criar uma sessão, pois se a pessoa não estiver logada (com sessão), faremos o direcionamento para a página de login.
 **/

 ?>