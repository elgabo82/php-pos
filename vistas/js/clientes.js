//Datemask dd/mm/yyyy
//$('#nuevaFechaNacimiento').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
$('#nuevaFechaNacimiento').inputmask();

//Datemask2 mm/dd/yyyy
$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
//Money Euro
$('[data-mask]').inputmask()

//Date range picker
$('#fechaNacimiento').datetimepicker({
    format: 'L'
});

// Mostrar Clientes
$('.tablaClientes').DataTable({
    "ajax": "ajax/datos-clientes.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados.",
        "sEmptyTable": "No hay datos disponibles.",
        "sInfo": "Mostrando registros del _START_ al _END_ de _TOTAL_.",
        "sInfoEmpty": "Sin registros.",
        "sInfoFiltered": "(Filtro de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": "",
        "sLoadingRecords": "Cargando registros...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "&Uacute;ltimo",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Ordenar de forma ascendente",
            "sSortDescending": ": Ordenar de forma descendente"
        }
    }
});

// Validar cédula
$(".btnValidarCedula").on("click", function(){    

    var valor = document.getElementById("nuevaCedula").value.trim();

    var resultado = validarCedula(valor);

    //console.log(resultado);

    if (resultado==1){
        $(this).attr('title', 'Cédula válida')                    
            .tooltip('show');

            Swal.fire({
                icon: "success",
                title: "Número de cédula correcto",
                text: "El número de cédula ingresado es correcto.",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                
            }).then((result) => {
                if (result) {
                    //window.location = "usuarios";
                    }
                });
    } else {
        $(this).val("")
        .attr('title', '')
        .tooltip('show');
    }

})

// Verificar cédula
$("#nuevaCedula").change(function(){

    var resultado = validarCedula($(this).val());

    if (resultado==1){
        $(this).attr('title', 'Cédula válida')                    
                    .tooltip('show');
    } else {
        $(this).val("")
        .attr('title', '')
        .tooltip('show');
    }
})

// Función para validar la cédula
function validarCedula(valor){
    //var cad = document.getElementById("nuevaCedula").value.trim();

var cad = valor;

var total = 0;
var longitud = cad.length;
var longcheck = longitud - 1;

    if (cad !== "" && longitud === 10){
        for(i = 0; i < longcheck; i++){
            if (i%2 === 0) {
                var aux = cad.charAt(i) * 2;
                if (aux > 9) aux -= 9;
                total += aux;
            } 
            else {
            total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
            }
        }

        total = total % 10 ? 10 - total % 10 : 0;

        if (cad.charAt(longitud-1) == total) {
            //document.getElementById("nuevaCedula").innerHTML = ("Cedula Válida");
            /*Swal.fire({
                icon: "success",
                title: "Número de cédula correcto",
                text: "El número de cédula ingresado es correcto.",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                
            }).then((result) => {
                if (result) {
                    window.location = "usuarios";
                    }
                });*/
                //console.log("Cédula válida");
                return 1;
                /*$(this).attr('title', 'Cédula válida')                    
                    .tooltip('show');*/
        }else{
            //document.getElementById("nuevaCedula").innerHTML = ("Cedula Inválida");
            //alert('Cédula inválida');/*

            Swal.fire({
                icon: "error",
                title: "¡Atención!",
                text: "El número de cédula ingresado es incorrecto.",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                
            }).then((result) => {
                if (result) {
                    //window.location = "usuarios#modalAgregarClientes";

                    //$(this).val("");
                    return 0;
                    /*.attr('title', 'Cédula inválida') 
                    .tooltip('show');*/
                    }
                });
        }
    }
    else{
        //document.getElementById("nuevaCedula").innerHTML = ("Cedula Inválida");
        //alert('Cédula inválida');/*
        Swal.fire({
            icon: "error",
            title: "¡Atención!",
            text: "El número de cédula ingresado es incorrecto.",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            
        }).then((result) => {
            if (result) {
                //window.location = "usuarios#modalAgregarClientes";

                //$(this).val("");
                return 0;
                }
            });
        }
}

// Editar Cliente
$(document).on("click", ".btnEditarCliente", function(){
    var idCliente = $(this).attr("idCliente");
    //console.log(`id - Cliente: ${idCliente}`);   
    

    var datos = new FormData();
    // Variable POST
    datos.append("idCliente", idCliente);

    //console.log(datos);
    $.ajax({
        async: true,
        url: 'ajax/clientes.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta){
            //console.log(respuesta);
            $("#idCliente").val(respuesta["id"]);
            $("#editarCliente").val(respuesta["nombre"]);
            $("#editarCedula").val(respuesta["documento"]);
            $("#editarCorreo").val(respuesta["email"]);
            $("#editarTelefono").val(respuesta["telefono"]);
            $("#editarDireccion").val(respuesta["direccion"]);
            $("#editarFechaNacimiento").val(respuesta["fecha_nacimiento"]);
            //$("#claveActual").val(respuesta["compras"]);

            /*if (respuesta["foto"] != "") {
                //console.log(respuesta["foto"]);
                
                $("#previsualizarEditada").attr("src", respuesta["foto"]);
            }*/
        },
        error: function (respuesta){
            console.log(respuesta);
        }
    });
})


// Eliminar Cliente
// Eliminar Producto
$(document).on("click", ".btnEliminarCliente", function(){
    
    var idCliente = $(this).attr("idCliente");
    var documento = $(this).attr("documento");
    //var imagen = $(this).attr("imagen");
    //console.log("idCliente", idCliente);
    
                    
    Swal.fire({        
        title: "¡Cuidado!",
        text: "¿Está seguro de querer borrar el cliente?",
        icon: "error",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar cliente.'
    }).then((result)=>{
        if(result.value) {
            window.location = `index.php?ruta=clientes&idCliente=${idCliente}&documento=${documento}`;
        }
    });   


})
