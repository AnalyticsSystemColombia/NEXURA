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
            $data['listRoles'] = $this->getRoles();
			$data['page_functions_js'] = "functions_empleados.js";
			$this->views->getView($this,"empleados", $data);
		}
        public function getEmpleados(){
            $arrData = $this->model->selectEmpleados();
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
           die();
    }

    public function getSelectAreas(){
        $htmlOptions = "";
        $arrData = $this->model->selectAreas();
        if(count($arrData) > 0 ){
            for ($i=0; $i < count($arrData); $i++) { 
                $htmlOptions .= '<option value="'.$arrData[$i]['id'].'">'.$arrData[$i]['nombre'].'</option>';
            }
        }
        echo $htmlOptions;
        die();  
    }
      public function getRoles(){
         $arrData = $this->model->selectRoles();
         if(count($arrData) > 0 ){
            return $arrData;
         }
         die();
      }


	}
?>