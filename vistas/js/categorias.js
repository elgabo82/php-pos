// Administración de las categorías

// Editar categoría
$(".btnEditarCategoria").click(function(){
    var idCategoria = $(this).attr("idCategoria");

    //console.log(`id - Categoría: ${idCategoria}`);

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

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
            //console.log(respuesta);
            $("#editarCategoria").val(respuesta["categoria"]);
            $("#idCategoria").val(respuesta["id"]);
            /*$("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);
            $("#fotoActual").val(respuesta["foto"]);
            $("#claveActual").val(respuesta["password"]);

            if (respuesta["foto"] != "") {
                //console.log(respuesta["foto"]);
                
                $("#previsualizarEditada").attr("src", respuesta["foto"]);
            }*/
        },
        error: function (respuesta){
            console.log(respuesta);
        }
    });
})

// Eliminar Categoría

$(".btnEliminarCategoria").click(function(){
    var idCategoria = $(this).attr("idCategoria");

    Swal.fire({
        icon: "warning",
        title: "Alerta",
        text: "¿Está seguro que desea eliminar la categoría?",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Borrar'        
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;
            }
    });
})