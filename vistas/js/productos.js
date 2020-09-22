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