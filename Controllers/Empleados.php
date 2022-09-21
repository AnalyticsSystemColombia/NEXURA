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
            for ($i=0; $i < count($arrData); $i++) {
                if($arrData[$i]['sexo'] == 'M'){
                    $arrData[$i]['sexo'] = '<span>Masculino</span>';
                }else{
                    $arrData[$i]['sexo'] = '<span>Femenino</span>';
                }
                if($arrData[$i]['area_id'] == 1){
                    $arrData[$i]['area_id'] = '<span>Administrativa y Financiera</span>';
                }else if($arrData[$i]['area_id'] == 2){
                    $arrData[$i]['area_id'] = '<span>Ingeniería</span>';
                }elseif ($arrData[$i]['area_id'] == 5) {
                    $arrData[$i]['area_id'] = '<span>Desarrollo de Negocio</span>';
                }elseif ($arrData[$i]['area_id'] == 6) {
                    $arrData[$i]['area_id'] = '<span>Proyectos</span>';
                }elseif ($arrData[$i]['area_id'] == 7) {
                    $arrData[$i]['area_id'] = '<span>Servicios</span>';
                }elseif ($arrData[$i]['area_id'] == 8) {
                    $arrData[$i]['area_id'] = '<span>Calidad</span>';
                }
                $btnEdit = '';
                $btnDelete = '';
                $btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['id'].')" title="Editar Empleado"><i class="fas fa-pencil-alt"></i></button>';
                $btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['id'].')" title="Eliminar Empleado"><i class="far fa-trash-alt"></i></button>';
                $arrData[$i]['options'] = '<div class="text-center">'.$btnEdit.' '.$btnDelete.'</div>';
            }
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
                    $request_empleados = $this->model->updateEmpleados($intId,
                    $strNombre,
                    $strCorreo,
                    $strSexo,
                    $intArea,
                    $strDescripcion,
                    $intlistRoles);
                    $option = 2;
                }
                if($request_empleados > 0){
                    if($option == 1){
                        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                    }else{
                        $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');  
                    }
                }else if($request_empleados == 'exist'){
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! El empleado ya existe.');
                }else{
                    $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
        public function getEmpleado($id){
            $intId = intval($id);
                if($intId > 0)
                {
                    $arrData = $this->model->selectEmpleado($intId);
                    if(empty($arrData))
                    {
                        $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                    }else{
                        $arrResponse = array('status' => true, 'data' => $arrData);
                    }
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                    die();
                }
         }
         public function delEmpleado(){
            if($_POST){
                    $intId = intval($_POST['id']);
                    $requestDelete = $this->model->deleteEmpleado($intId);
                    if($requestDelete)
                    {
                        $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el producto');
                    }else{
                        $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el producto.');
                    }
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    
}
?>