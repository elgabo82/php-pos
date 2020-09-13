
$("#nuevaFoto").change(function(){
    
    var imagen = this.files[0];    

    if (imagen["type"] != "image/jpeg" &&
        imagen["type"] != "image/jpg" &&
        imagen["type"] != "image/png") {

            $("#nuevaFoto").val("");
            Swal.fire({                
                title: "Error al subir la imagen",
                text: "¡La imagen debe estar en formato JPG o PNG!",
                icon: "error",
                confirmButtonText: "Cerrar"
            });

    } else if (imagen["size"] > 3000000) {
                $("#nuevaFoto").val("");
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


// Editar Usuario

$(".btnEditarUsuario").click(function(){
    var idUsuario = $(this).attr("idUsuario");
    //console.log(`id - Usuario: ${idUsuario}`);
    
    // Se va a hacer uso de AJAX

    var datos = new FormData();
    // Variable POST
    datos.append("idUsuario", idUsuario);

    //console.log(datos);
    $.ajax({
        async: true,
        url: 'ajax/usuarios.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta){
            //console.log(respuesta);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);
        },
        error: function (respuesta){
            console.log(respuesta);
        }
    });
})