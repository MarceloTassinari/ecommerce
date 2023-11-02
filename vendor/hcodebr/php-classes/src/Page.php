<?php 

/* C:\ecommerce\vendor\hcodebr\php-classes\src\page.php
classe page irá gerenciar praticamente todas as nossa telas, onde termos:
- headers (cabecalho)
- data (dados) - será passada para o template
- footer (rodape) */

// declarando o namespace: portanto, a classe Page estará relacionada ao namespace Hcode
namespace Hcode;

// define que a classe Tpl está no namespace Rain/Tpl (diferente de Hcode)
// quando chamar a classe Tpl saberá o path correto
// nota; TPL está em c:\ecommerce\vendor\rain\raintpl\library\Rain
use Rain\Tpl;

class Page {

	// atributo somente declarado
	private $tpl;
	
	// array vazio
	private $options = [];
	
	/** variaveis defaults
	* headers (cabecalho) - por padrão, ativo
	* footer (rodape) - por padrão, ativo
	* data (dados) - array vazio - será passada para o template
	* Nota: nas página onde não couber o cabelhaço e rodapé (p.ex. login), será mandado false para ambos */
	private $defaults = [
		"header"=>true,
		"footer"=>true,
		"data"=>[]
	];

	// método construtor
	public function __construct($opts = array(), $tpl_dir = "/views/")
	{

		//$this->defaults["data"]["session"] = $_SESSION;

		/* será feito um merge [mesclar] dos dois arrays
		na sequencia, o posterior sempre sobrescreve o anterior e guarda em $this->options */
		$this->options = array_merge($this->defaults, $opts);

		/* $_SERVER é uma variável de ambiente
		que trará [DOCUMENT_ROOT], que é onde nosso root está configurado
		- indica-se o caminho das pastas (template e cache), pois senão a busca é a partir do ambiente que estamos
		- /views/ é a pasta em que está meu template
		- /views-cache/ é onde está nosso cache
		- cache será onde uma página modelo (merge html/comandos) 
		- false no debug para não colocar os comentários */
		$config = array(
		    //"base_url"      => null,
		 	/*"tpl_dir"       => $_SERVER['DOCUMENT_ROOT']."/views/",*/
		 	"tpl_dir"       => $_SERVER['DOCUMENT_ROOT'].$tpl_dir,
		    "cache_dir"     => $_SERVER['DOCUMENT_ROOT']."/views-cache/",
		    "debug"         => false
		    );

			// a pasta (path) do tpl está no "use" acima
			Tpl::configure($config);

		/* o tpl será um atributo [$this=>] de nossa classe
		para que possamos ter acessado por outros métodos */
		$this->tpl = new Tpl();

		/* chama o método para acrescentar os dados */
		$this->setData($this->options["data"]);
	
		/**
		 * questionamento se existe cabeçalho.
		 * se sim, carrega o template,
		 * se não, não carrega.
		 **/
		if ($this->options["header"] === true)
		{ $this->tpl->draw("header");
		}

		/*if ($this->options['data']) $this->setData($this->options['data']);

		if ($this->options['header'] === true) $this->tpl->draw("header", false); */

	}

	// juntará no array cada variável (data) que for passada pelo template
	private function setData($data = array())
	{

		foreach ($data as $key => $value) {
			// assign atribui um valor ao elemento da coleção
			// para variáveis que vão aparecer para o template
			$this->tpl->assign($key, $value);
		}
	}

	// abaixo temos o corpo da tela (excluindo o cabeçalho e rodapé)
	// $name = nome do template
	// $data = dados que queremos passar
	// $returnHTML = retorne o html ou se já joga na tela
	public function setTpl($name, $data = array(), $returnHTML = false)
	{
		
		$this->setData($data);

		/* desenhar o template na tela
		->tpl (onde está instanciado o elemento do template)->
		e o draw (executar) e o nome do template ($name)
		return 	para armazenar se precisar */
		return $this->tpl->draw($name, $returnHTML);

	}

	// método destrutor
	public function __destruct()
	{
	
	/** o draw junta tudo e roda
	 * se há cabeçalho na página enviada, ele destrói
	 **/
	if ($this->options["footer"] === true) $this->tpl->draw("footer");
	//	if ($this->options['footer'] === true) $this->tpl->draw("footer", false);

	}

}
/* OBSERVAÇÕES:
1. os arquivos de html ficam na pasta cache [esconderijo]
*/

 ?>