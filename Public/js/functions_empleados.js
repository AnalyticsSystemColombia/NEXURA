let tableCategorias;
document.addEventListener('DOMContentLoaded', function(){

    tableCategorias = $('#tableCategorias').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Categorias/getCategorias",
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"nombre"},
            {"data":"descripcion"},
            {"data":"status"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

  //NUEVA CATEGORIA
    let formCategoria = document.querySelector("#formCategoria");
    formCategoria.onsubmit = function(e) {
        e.preventDefault();
        let strNombre = document.querySelector('#txtNomb').value;
        let strDesc = document.querySelector('#txtDesc').value;
        let intStatus = document.querySelector('#listStatus').value;        
        if(strNombre == '' || strDesc == '' || intStatus == '')
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Categorias/setCategoria'; 
        let formData = new FormData(formCategoria);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){  
                let objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                   tableCategorias.api().ajax.reload();
                        htmlStatus = intStatus == 1 ? 
                            '<span class="badge badge-success">Activo</span>' : 
                            '<span class="badge badge-danger">Inactivo</span>';
                    $('#modalCategorias').modal("hide");
                    formCategoria.reset();
                    swal("Categoria", objData.msg ,"success");
                }else{
                    swal("Error", objData.msg , "error");
                }              
            } 
            return false;
        }
    }
}, false);

function fntEditInfo(element,id){
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar Categoría";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Categorias/getCategoria/'+id;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#id").value = objData.data.id;
                document.querySelector("#txtNomb").value = objData.data.nombre;
                document.querySelector("#txtDesc").value = objData.data.descripcion;
                document.querySelector("#listStatus").value = objData.data.status;  
            
                if(objData.data.status == 1){
                    document.querySelector("#listStatus").value = 1;
                }else{
                    document.querySelector("#listStatus").value = 2;
                }
                
                $('#modalCategorias').modal('show');

            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function fntDelInfo(id){
    swal({
        title: "Eliminar categoría",
        text: "¿Realmente quiere eliminar la categoría?",
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
            let ajaxUrl = base_url+'/categorias/delcategoria';
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



function openModal(){
    rowTable = "";
    document.querySelector('#id').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Categoría";
    document.querySelector("#formCategoria").reset();
    $('#modalCategorias').modal('show');
}

function mensaje(){
    $('#modalMensaje').modal('show');
}

let formMensaje = document.querySelector("#formMensaje");
    formMensaje.onsubmit = function(e) {
        e.preventDefault();
        let strNombres = document.querySelector('#txtNombres').value;
        let strComentarios = document.querySelector('#txtComentarios').value;
        if(strNombres == '' || strComentarios == '')
        {
            swal("Atención", "Todos los campos son obligatorios." , "error");
            return false;
        }
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        let ajaxUrl = base_url+'/Categorias/setUsuario'; 
        let formData = new FormData(formMensaje);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){  
                let objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalMensaje').modal("hide");
                    formMensaje.reset();
                    swal("Comentario", objData.msg ,"success");
                }else{
                    swal("Error", objData.msg , "error");
                }              
            } 
            return false;
        }
    }

    function fntViewInfo(id){    
        $('#modalViewCategoria').modal('show');
    }

    tableComentarios = $('#tableComentarios').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Categorias/getUsuarios",
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"nombres"},
            {"data":"comentario"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });