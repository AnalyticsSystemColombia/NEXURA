let tableEmpleados;
document.addEventListener('DOMContentLoaded', function(){

    tableEmpleados = $('#tableEmpleados').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Empleados/getEmpleados",
            "dataSrc":""
        },
        "columns":[
            {"data":"nombre"},
            {"data":"email"},
            {"data":"sexo"},
            {"data":"area_id"},
            {"data":"boletin"},
            {"data": "options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  

    });
});
    window.addEventListener('load', function() {
        if(document.querySelector("#formEmpleados")){
            let formEmpleados = document.querySelector("#formEmpleados");
            formEmpleados.onsubmit = function(e) {
                e.preventDefault();
                let strNombre = document.querySelector('#txtNombre').value;
                let strCorreo = document.querySelector('#txtCorreo').value;
                let intSexo = document.querySelector('#radSexo').value;
                let intArea = document.querySelector('#listAreas').value;
                let strDescripcion = document.querySelector('#txtDesc').value;
                let intlistRoles = document.querySelector('#listRoles').value;
                
                if(strNombre == '' || strCorreo == '' || intSexo == '' || listAreas == '' 
                || intArea == '' || strDescripcion=='' || intlistRoles == '' )
                {
                    swal("Atención", "Todos los campos son obligatorios." , "error");
                    return false;
                }
                let request = (window.XMLHttpRequest) ? 
                                new XMLHttpRequest() : 
                                new ActiveXObject('Microsoft.XMLHTTP');
                let ajaxUrl = base_url+'/empleados/setEmpleados'; 
                let formData = new FormData(formEmpleados);
                request.open("POST",ajaxUrl,true);
                request.send(formData);
                request.onreadystatechange = function(){
                    if(request.readyState == 4 && request.status == 200){
                        let objData = JSON.parse(request.responseText);
                        if(objData.status)
                    {
                       tableEmmpleados.api().ajax.reload();
                        $('#modalEmpleados').modal("hide");
                        formEmpleados.reset();
                        swal("Empleados", objData.msg ,"success");
                    }else{
                        swal("Error", objData.msg , "error");
                    } 
                    }
                    return false;
                }
            }
        }
        fntAreas();
        fntRoles();
    }, false);

    function fntDelInfo(id){
        swal({
            title: "Eliminar Empleado",
            text: "¿Realmente quiere eliminar la empleado?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, eliminar!",
            cancelButtonText: "No, cancelar!",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function(isConfirm) {    
            if (isConfirm) 
            {
                let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                let ajaxUrl = base_url+'/empleados/delEmpleado';
                let strData = "id="+id;
                request.open("POST",ajaxUrl,true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(strData);
                request.onreadystatechange = function(){
                    if(request.readyState == 4 && request.status == 200){
                        let objData = JSON.parse(request.responseText);
                        if(objData.status)
                        {
                            swal("Eliminar!", objData.msg , "success");
                            tableSitios.api().ajax.reload();
                        }else{
                            swal("Atención!", objData.msg , "error");
                        }
                    }
                }
            }
    
        });
    }

    function fntEditInfo(element,id){
        rowTable = element.parentNode.parentNode.parentNode;
        document.querySelector('#titleModal').innerHTML ="Actualizar Empleado";
        document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
        document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
        document.querySelector('#btnText').innerHTML ="Actualizar";
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/empleados/getEmpleado/'+id;
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                let objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    document.querySelector("#id").value = objData.data.id;
                    document.querySelector("#txtNombre").value = objData.data.nombre;
                    document.querySelector("#txtCorreo").value = objData.data.email;
                    document.querySelector("#radSexo").value = objData.data.sexo; 
                    document.querySelector("#listAreas").value = objData.data.area_id; 
                    document.querySelector("#txtDesc").value = objData.data.descripcion; 
                    document.querySelector("#listRoles").value = objData.data.boletin;  
                    $('#modalEmpleados').modal('show');
    
                }else{
                    swal("Error", objData.msg , "error");
                }
            }
        }
    }

function fntAreas(){
    if(document.querySelector('#listAreas')){
        let ajaxUrl = base_url+'/empleados/getSelectAreas';
        let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listAreas').innerHTML = request.responseText;
            }
        }
    }
}

function fntRoles(){
    if(document.querySelector('#listRoles')){
        let ajaxUrl = base_url+'/empleados/getRoles';
        let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listRoles').innerHTML = request.responseText;
            }
        }
    }
}




function openModal(){
    rowTable = "";
    document.querySelector('#id').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Empleado";
    document.querySelector("#formEmpleados").reset();
    $('#modalEmpleados').modal('show');
}
