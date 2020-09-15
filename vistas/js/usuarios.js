// Gestión de usuarios
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

// Editar Usuario
$(document).on("click", ".btnEditarUsuario", function(){
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
            $("#editarPerfil").val(respuesta["perfil"]);
            $("#fotoActual").val(respuesta["foto"]);
            $("#claveActual").val(respuesta["password"]);

            if (respuesta["foto"] != "") {
                //console.log(respuesta["foto"]);
                
                $("#previsualizarEditada").attr("src", respuesta["foto"]);
            }
        },
        error: function (respuesta){
            console.log(respuesta);
        }
    });
})

// Activación del usuario
$(document).on("click", ".btnActivar", function(){
    var idUsuario = $(this).attr("idUsuarioEstado");
    
    var estadoUsuario = $(this).attr("estadoUsuario");
    

    var datos = new FormData();
    
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({
        async: true,
        url: 'ajax/usuarios.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,        
        success: function (respuesta){
            //console.log(respuesta);
            if(window.matchMedia("(max-width: 767px").matches){
                Swal.fire({
                    type: "success",
                    title: "Usuario actualizado",
                    text: "¡El usuario ha sido actualizado!",
                    icon: "success",
                    confirmButton: "Cerrar"
                }).then(function(result){
                    if (result.value) {
                        window.location = "usuarios";
                    }
                });

            }
        },
        error: function (respuesta){
            console.log(respuesta);
        }
    });

    if (estadoUsuario == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario', 1);        
    } 
    else {
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).html('Activado');
        $(this).attr('estadoUsuario', 0);        
    }

})

// Validación de usuarios (evitar duplicados)
$("#nuevoUsuario").change(function(){

    $(".alert").remove();

    var usuario = $(this).val();

    var datos = new FormData();

    datos.append("validarUsuario", usuario);

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
            //console.log("respuesta", respuesta);
            if (respuesta) {
                $("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario no est&aacute; disponible</div>');
                $("#nuevoUsuario").val("");
            }
        }
    })
})

// Eliminación de usuarios
$(document).on("click", ".btnEliminarUsuario",function(){

    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var usuario = $(this).attr("usuario");


    Swal.fire({
        type: "warning",
        title: "¡Cuidado!",
        text: "¿Está seguro de querer borrar el usuario?",
        icon: "error",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar usuario.'
    }).then((result)=>{
        if(result.value) {
            window.location = `index.php?ruta=usuarios&idUsuario=${idUsuario}&usuario=${usuario}&fotoUsuario=${fotoUsuario}`;
        }
    });
    
})
