<?php

namespace Hcode;

class PageAdmin extends Page {

	/** 
	 * $tpl_dir	informa onde se encontra o template do Admin
	 * **/
	public function __construct($opts = array(), $tpl_dir = "/views/admin/")
	{

		/** 
		 * Chama o construtor da classe pai
		 **/
		parent::__construct($opts, $tpl_dir);

	}

}

?>