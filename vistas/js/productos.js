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