
$(function () {
    $("#tabla").DataTable({
        "responsive": true,
        "autoWidth": false,
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
});