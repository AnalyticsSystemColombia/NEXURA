<?php

 class EmpleadosModel extends Mysql{
		public $intId;
		public $strNombres;
		public $strEmail;
		public $strSexo;
		public $listArea;
		public $strDescripcion;
        public $listRoles;
		
	public function __construct(){
		parent::__construct();
	}
	

	public function selectEmpleados(){
		$sql = "SELECT * FROM empleado";
		$request = $this->select_all($sql);
		return $request;
	}
}

?>