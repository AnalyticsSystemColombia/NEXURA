<?php
$arrRoles = $data['listRoles'];
?>
<div class="modal fade" id="modalEmpleados" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formEmpleados" name="formEmpleados" class="form-horizontal">
              <input type="hidden" id="id" name="id" value="">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Nombre completo <span class="required">*</span></label>
                      <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre Completo del empleado" required="">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Correo Electrónico <span class="required">*</span></label>
                      <input class="form-control" id="txtCorreo" name="txtCorreo" type="text" placeholder="Correo Electrónico" required="">
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <label class="control-label">Sexo <span class="required">*</span></label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="M" name="radSexo" id="radSexo">
                          <label class="form-check-label" for="radSexo">
                          Masculino
                        </label>
                     </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" value="F" name="radSexo" id="radSexo">
                          <label class="form-check-label" for="radSexo">
                          Femenino
                        </label>
                      </div>
                 </div>
                    <div class="form-group">
                            <label for="listAreas">Área<span class="required">*</span></label>
                            <select class="form-control"  id="listAreas" name="listAreas"></select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Descripción<span class="required">*</span></label>
                      <textarea class="form-control" id="txtDesc" name="txtDesc" rows="2" placeholder="Descripción de la experiencia del empleado" required=""></textarea>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <label class="control-label" for="listRoles">Roles<span class="required">*</span></label>
                      <br>
                       <?php 
                       foreach ($arrRoles as  $roles) { ?>
                       <div class="form-check">
                          
                          <input class="form-check-input" type="checkbox" value="<?= $roles['id'] ?>" id="listRoles" name="listRoles">
                          <label class="control-label" for="listRoles"><?= $roles['nombre'] ?></label>
                       </div>
                       <?php } ?>
                     </div>
                </div>
                </div>
              <div class="tile-footer">
              <div class="col-md-6">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
              </div>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>


