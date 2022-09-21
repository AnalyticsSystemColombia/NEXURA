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

        public function setEmpleados(){
          if($_POST){
            if(empty($_POST['txtNombre']) || empty($_POST['txtCorreo']) || empty($_POST['radSexo']) || empty($_POST['listAreas']) || empty($_POST['txtDesc']) || empty($_POST['listRoles'])){
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            }else{
                $intId = $_POST['id'];
                $strNombre = $_POST['txtNombre'];
                $strCorreo = $_POST['txtCorreo'];
                $strSexo = $_POST['radSexo'];
                $intArea = $_POST['listAreas'];
                $strDescripcion = $_POST['txtDesc'];
                $intlistRoles = $_POST['listRoles'];
                if($intId == 0){
                    $request_empleados = $this->model->insertEmpleado(
                    $strNombre,
                    $strCorreo,
                    $strSexo,
                    $intArea,
                    $strDescripcion,
                    $intlistRoles,
                    );
                    $option = 1;
                }else{

                }
                if($request_empleados > 0){
                    if($option == 1){
                        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                    }else{
                        $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');  
                    }

                }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
          }
        }


	}
?>