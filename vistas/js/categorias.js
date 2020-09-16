//Gestión de categorías

$("#nuevaCategoria").change(function(){

    $(".alert").remove();

    var categoria = $(this).val();

    var datos = new FormData();

    console.log(categoria);

    datos.append("validarCategoria", categoria);
    
    $.ajax({
        async: true,
        url: 'ajax/categorias.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta){
            //console.log("respuesta", respuesta);
            if (respuesta) {
                $("#nuevaCategoria").parent().after('<div class="alert alert-warning">Esta categor&iacute;a ya existe.</div>');
                $("#nuevaCategoria").val("");
            }
        }
    })
})