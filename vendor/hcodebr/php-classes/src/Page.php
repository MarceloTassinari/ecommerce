<?php 

/* C:\xampp\htdocs\ecommerce\vendor\hcodebr\php-classes\src\page.php
classe page servira de base para praticamente todas
as telas que serão exibidas, onde termos:
- headers (cabecalho)
- data (dados) - será passada para o template
- footer (rodape) */

// namespace de onde esta classe Page está
namespace Hcode;

// define que a classe Tpl está no namespace Rain/Tpl (diferente de Hcode)
// quando chamar a classe Tpl saberá o path correto
use Rain\Tpl;

class Page {

	// atributo somente declarado
	private $tpl;
	
	// array vazio
	private $options = [];
	
	/* variaveis defaults
	headers (cabecalho)
	footer (rodape)
	data (dados) - array vazio - será passada para o template */
	private $defaults = [
		"header"=>true,
		"footer"=>true,
		"data"=>[]
	];

	// método construtor
	public function __construct($opts = array())
	{

		/* será feito um merge [mesclar] dos dois arrays
		na sequencia, o posterior sempre sobrescreve o anterior e guarda em $this->options */
		$this->options = array_merge($this->defaults, $opts);

		/* $_SERVER é uma variável de ambiente
		que trará [DOCUMENT_ROOT], que é onde nosso root está configurado
		- indica-se o caminho das pastas (template e cache), pois senão a busca é a partir do ambiente que estamos
		- /views/ é a pasta em que está meu template
		- /views-cache/ é onde está nosso cache
		- false no debug para não colocar os comentários */
		$config = array(
		    "base_url"      => null,
		    "tpl_dir"       => $_SERVER['DOCUMENT_ROOT']."/views/",
		    "cache_dir"     => $_SERVER['DOCUMENT_ROOT']."/views-cache/",
		    "debug"         => false
		);

		// a pasta (path) do tpl está no "use" acima
		Tpl::configure($config);

		/* o tpl será um atributo [$this=>] de nossa classe
		para que possamos ter acessado por outros métodos */
		$this->tpl = new Tpl();

		$this->setData($this->options["data"]);
	
		$this->tpl->draw("header");

		/*if ($this->options['data']) $this->setData($this->options['data']);

		if ($this->options['header'] === true) $this->tpl->draw("header", false); */

	}

	// juntará no array cada variável que for passada pelo template
	private function setData($data = array())
	{

		foreach ($data as $key => $value) {
			$this->tpl->assign($key, $value);
		}
	}

	public function setTpl($name, $data = array(), $returnHTML = false)
	{
		
		$this->setData($data);

		return $this->tpl->draw($name, $returnHTML);

	}

	// método destrutor
	public function __destruct()
	{
	
	$this->tpl->draw("footer");
	//	if ($this->options['footer'] === true) $this->tpl->draw("footer", false);

	}

}
/* OBSERVAÇÕES:
1. os arquivos de html ficam na pasta cache [esconderijo]
*/

 ?>