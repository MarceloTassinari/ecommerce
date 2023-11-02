<?php 

/** define que a classe a ser trabalhada à frente (Sql)
 * estará no diretório DB do namespace "Hcode" * 
 */
namespace Hcode\DB;

/** A classe Sql() define:
 *  $conn		o acesso ao banco de dados
 *  setParams	...
 *  bindParam	...
 *  runQuery	...
 *  select		...
 */
class Sql {

	const HOSTNAME = "127.0.0.1";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "db_ecommerce";

	private $conn;

	/** método construct()
	 *  executa uma ação toda vez que o método é chamado	 
	 */
	public function __construct()
	{

		/** $conn
		 *  executa o acesso ao bando de dados
		 *  PDO é uma classe nativa do php
		 */
		$this->conn = new \PDO(
			"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
			Sql::USERNAME,
			Sql::PASSWORD
		);

	}

	/** método setParams()
	*  executa uma ação que esteja em conformidade com $key/$value	 
	*/
	private function setParams($statement, $parameters = array())
	{

		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);

		}

	}

	/** método bindParam()
	*  executa uma ação de acordo com a declaração $statement
	*/
	private function bindParam($statement, $key, $value)
	{

		$statement->bindParam($key, $value);

	}

	/** método runQuery()
	*  executa uma ação no banco de dados sem retornar informação 
	*/
	public function runQuery($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

	}

	/** método select()
	*  executa uma ação no banco de dados e retorna uma resposta 
	*/
	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

}

 ?>