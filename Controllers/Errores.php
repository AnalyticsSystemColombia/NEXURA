<?php 

	class Errores extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}
		public function Errores(){

			$data['page_tag'] = "Errores";
			$data['page_title'] ="Errores";
			$data['page_name'] = "Errores";
			$this->views->getView($this,"Errores", $data);
		}
	}
 ?>