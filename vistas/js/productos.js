// Carga de datos de forma dinámica

/*$.ajax({

    url: "ajax/datos-productos.ajax.php",
    success:function(respuesta) {
        //console.log("Respuesta: ", respuesta);
    }
})*/

$('.tablaProductos').DataTable({
    "ajax": "ajax/datos-productos.ajax.php",
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

/*$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});*/


// Obtener nuevo código según categoría

$(".nuevaCategoria").change(function(){
    var idCategoria = $(this).val();

    //console.log(idCategoria);

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);    

    $.ajax({
        async: true,
        url: 'ajax/productos.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,        
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            //console.log ("Respuesta: ",respuesta);

            if (!respuesta) {
                var nuevoCodigo = idCategoria+"01";
                $("#nuevoCodigo").val(nuevoCodigo);
            }
            else {
                var nuevoCodigo = Number(respuesta["codigo"]) + 1;
                $("#nuevoCodigo").val(nuevoCodigo);
            }


            //console.log(nuevoCodigo);
        },
        error: function (respuesta){
            console.log(respuesta);
        }


    })
})

// Cálculo del precio de venta

$("#nuevoPrecioCompra").change(function(){


    if ($(".porcentaje").prop("checked")){
        var valorPorcentaje = $("#nuevoPorcentaje").val();
        //console.log(valorPorcentaje);

        var porcentaje = Number((Number($("#nuevoPrecioCompra").val())*valorPorcentaje/100)+Number($("#nuevoPrecioCompra").val()));
        //console.log(porcentaje);
        $("#nuevoPrecioVenta").val(porcentaje);
        $("#nuevoPrecioVenta").prop("readonly",true);
    }
    

})

//Cambio de porcentaje
$(".nuevoPorcentaje").change(function(){
    if ($(".porcentaje").prop("checked")){
        var valorPorcentaje = $("#nuevoPorcentaje").val();
        //console.log(valorPorcentaje);

        var porcentaje = Number((Number($("#nuevoPrecioCompra").val())*valorPorcentaje/100)+Number($("#nuevoPrecioCompra").val()));
        //console.log(porcentaje);
        $("#nuevoPrecioVenta").val(porcentaje);
        $("#nuevoPrecioVenta").prop("readonly",true);
    }
})

/*$(document).ready(function(){
    $(document).on('click', '.porcentaje', function(){
        //alert('Checked');
        $('.porcentaje').not(this).prop('checked',false);
        $("#nuevoPrecioVenta").prop("readonly",false);
    });
})*/

$(".porcentaje").click(function(){
    //alert('Click');
    if($(this).is(":checked")){
        $("#nuevoPrecioVenta").prop("readonly",true);
    }
    else {
        $("#nuevoPrecioVenta").prop("readonly",false);
    }
})


/*if($(".porcentaje").prop("checked",false)){
    $("#nuevoPrecioVenta").prop("readonly",false);
}*/

/*
$(".porcentaje").on("ifChanged", function(){
    console.log("porcentaje")
    $("#nuevoPrecioVenta").prop("readonly",false);
})*/

// Verificar la Descripción
/*$(".nuevaDescripcion").change(function(){
    console.log($(".nuevaDescripcion").val());
    $(".nuevaDescripcion").val($(".nuevaDescripcion"));
})*/


// Subiendo imagen del producto
$("#nuevaImagen").change(function(){
    
    var imagen = this.files[0];    

    if (imagen["type"] != "image/jpeg" &&
        imagen["type"] != "image/jpg" &&
        imagen["type"] != "image/png") {

            $("#nuevaImagen").val("");
            Swal.fire({                
                title: "Error al subir la imagen",
                text: "¡La imagen debe estar en formato JPG o PNG!",
                icon: "error",
                confirmButtonText: "Cerrar"
            });

    } else if (imagen["size"] > 3000000) {
                $("#nuevaImagen").val("");
                Swal.fire({
                    type: "error",
                    title: "Error al subir la imagen",
                    text: "¡La imagen debe ser máximo de 3MB!",
                    icon: "error",
                    confirmButton: "Cerrar"
                });
            }
            else {
                var datosImagen = new FileReader;
                datosImagen.readAsDataURL(imagen);                
                
                $(datosImagen).on("load", function(event){                    
                    var rutaImagen = event.target.result;                    
                    $("#previsualizar").attr("src", rutaImagen);
                })
            }
})

// Editar foto
$("#editarFoto").change(function(){
    
    var imagen = this.files[0];    

    if (imagen["type"] != "image/jpeg" &&
        imagen["type"] != "image/jpg" &&
        imagen["type"] != "image/png") {

            $("#editarFoto").val("");
            Swal.fire({                
                title: "Error al subir la imagen",
                text: "¡La imagen debe estar en formato JPG o PNG!",
                icon: "error",
                confirmButtonText: "Cerrar"
            });

    } else if (imagen["size"] > 3000000) {
                $("#editarFoto").val("");
                Swal.fire({
                    type: "error",
                    title: "Error al subir la imagen",
                    text: "¡La imagen debe ser máximo de 3MB!",
                    icon: "error",
                    confirmButton: "Cerrar"
                });
            }
            else {
                var datosImagen = new FileReader;
                datosImagen.readAsDataURL(imagen);                
                
                $(datosImagen).on("load", function(event){                    
                    var rutaImagen = event.target.result;                    
                    $("#previsualizarEditada").attr("src", rutaImagen);
                })
            }
})
