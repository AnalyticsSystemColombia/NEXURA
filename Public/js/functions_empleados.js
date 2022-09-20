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
            {"data":"id"},
            {"data":"nombre"},
            {"data":"email"},
            {"data":"area_id"},
            {"data":"boletin"},
            {"data":"options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });
});

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
