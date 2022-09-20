<!-- Modal -->
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
                      <input class="form-control" id="txtNomb" name="txtNomb" type="text" placeholder="Nombre Completo del empleado" required="">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Correo Electrónico <span class="required">*</span></label>
                      <input class="form-control" id="txtNomb" name="txtNomb" type="text" placeholder="Correo Electrónico" required="">
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <label class="control-label">Sexo <span class="required">*</span></label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                          <label class="form-check-label" for="flexRadioDefault1">
                          Masculino
                        </label>
                     </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                          <label class="form-check-label" for="flexRadioDefault2">
                          Femenino
                        </label>
                      </div>
                 </div>
                    <div class="form-group">
                            <label for="listCategoria">Área<span class="required">*</span></label>
                            <select class="form-control"  id="listCategoria" name="listCategoria"></select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Descripción<span class="required">*</span></label>
                      <textarea class="form-control" id="txtDesc" name="txtDesc" rows="2" placeholder="Descripción de la experiencia del empleado" required=""></textarea>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Roles<span class="required">*</span></label>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminateDisabled" disabled>
                            <label class="form-check-label" for="flexCheckIndeterminateDisabled">
                              Deseo recibir boletín informativo
                            </label>
                        </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" disabled>
                          <label class="form-check-label" for="flexCheckDisabled">
                            Profesional de proyectos-Desarrollador
                          </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                            <label class="form-check-label" for="flexCheckCheckedDisabled">
                              Gerente extratégico
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                            <label class="form-check-label" for="flexCheckCheckedDisabled">
                              Auxiliar administrativo
                            </label>
                        </div>
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


