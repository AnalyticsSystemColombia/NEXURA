<?php
class Empleados extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}
		public function Empleados(){

			$data['page_tag'] = "Empleados";
			$data['page_title'] ="Empleados";
			$data['page_name'] = "Empleados";
			$data['page_functions_js'] = "functions_empleados.js";
			$this->views->getView($this,"empleados", $data);
		}
        public function getEmpleados(){
            $arrData = $this->model->selectEmpleados();
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
           die();
    }

	}
?>