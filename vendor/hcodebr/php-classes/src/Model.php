<?php

namespace Hcode;

class Model {

	/**
	 * $values vão ter todos valores dos campos do nosso objeto, p.ex.,
	 * se usuário (nº usuário, ID, login...)
	 **/
	private $values = [];

	/**
	 * para $values, temos que saber toda vez que um método for chamado,
	 * método mágico __call
	 **/
	public function __call($name, $args)
	{

		/**
		 * o trabalho com as strings é para identificar o método chamado
		 * $method	= SET ou GET.  
		 **/
		$method = substr($name, 0, 3);
		$fieldName = substr($name, 3, strlen($name));

		switch ($method)
		{
			case "get":

				return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;
				//Nota: despassword não pode ser null
				//return (isset($this->values[$fieldName]));
				//if $this->values[$fieldName] = 

			break;

			case "set":

				$this->values[$fieldName] = $args[0];

			break;

		}

	}

	/**
	 * a função setData irá trazer em um array (data) todos os registros
	 * que atendam ao SET (do comando select acima), dinamicamente, sem a necessidade de passar registro por registro. 
	 **/
	public function setData($data = array())
	{ 
		foreach ($data as $key => $value) {

			/**
			 * key é o nome do campo
			 * tudo que é dinâmico vem entre chaves para concatenar	 
			 **/
			$this->{"set".$key}($value);

		}


	}

	/**
	 * o getValues somente dá um return do atributo, pois ele é privado
	 * e não conseguiríamos acessar de uma outra forma.
	 **/
	public function getValues()
	{

		return $this->values;

	}

}

?>