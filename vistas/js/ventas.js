$('.tablaProductosVentas').DataTable({
    "ajax": "ajax/datos-ventas.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados.",
        "sEmptyTable": "No hay datos disponibles.",
        "sInfo": "Registros del _START_ al _END_ de _TOTAL_.",
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

$(document).on("click", "button.agregarProducto", function(){
    var idProducto = $(this).attr("idProducto");

    //console.log("idProducto", idProducto);

    $(this).removeClass("btn-primary agregarProducto");
    $(this).addClass("btn-default");


    var datos = new FormData();

    datos.append("idProducto", idProducto);

    $.ajax({
        async: true,
        url: 'ajax/productos.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            // console.log("respuesta", respuesta);
            var descripcion = respuesta["descripcion"];
            var stock = respuesta["stock"];      
            var precio = respuesta["precio_venta"];

            if (respuesta["stock"] == 0) {
              Swal.fire({
                type: "error",
                title: "¡Atención!",
                text: "¡No hay disponibilidad del producto!",
                icon: "error",
                confirmButtonText: "Cerrar"
              });
              
              $("button[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");
              return;             
              
            }

            $(".nuevoProducto").append('<div class="row" style="padding:5px 15px">'+
            '<!-- Descripción del producto-->'+
            '<div class="col-sm-6" style="padding-right: 0px">'+
              '<div class="form-group">'+
                '<div class="input-group">'+
                  '<div class="input-group-prepend">'+
                    '<span class="input-group-text">'+
                      '<button class="btn btn-danger btn-xs quitarProducto" name="quitarProducto" id="quitarProducto" idProducto="'+idProducto+'"><i class="fas fa-times-circle"></i></button>'+
                    '</span>'+
                  '</div>'+
                  '<input type="text" class="form-control" id="agregarProducto" name="agregarProducto" value="'+descripcion+'" readonly required>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<!-- Cantidad del producto -->'+
            '<div class="col-sm-2">'+
              '<input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" required>'+
            '</div>'+
            '<!-- Precio del producto -->'+
            '<div class="col-sm-4" style="padding-left: 0px">'+
              '<div class="form-group">'+
                '<div class="input-group">'+
                  '<div class="input-group-prepend">'+
                    '<span class="input-group-text">'+
                      '<i class="ion ion-social-usd"></i>'+
                    '</span>'+
                  '</div>'+
                  '<input type="number" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" min="1" value="'+precio+'" readonly required>'+
                '</div>'+
              '</div>'+
            '</div>'+          
          '<!-- Botón agregar producto -->'+
          /*'<button type="button" class="btn btn-default hidden-lg">Agregar Producto</button>'+*/
          '</div>');
        },
        error: function (respuesta){
            console.log(respuesta);
        }

    });    
});

/*$(document).on("click", "button.agregarProducto", function(){
  Swal.fire({
    type: "error",
    title: "¡Atención!",
    text: "¡No hay disponibilidad del producto!",
    icon: "error",
    confirmButton: "Cerrar"
  });
});*/

/*$(".tablaProductosVentas").on("draw.dt", function(){
  console.log("Tabla cargada");

  if (localStorage.getItem("quitarProducto") != null) {
    var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

    for (var i = 0; i < listaIdProductos.length; i++) {
      $("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").removeClass('btn-default');
      $("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").addClass('btn-primary agregarProducto');      
    }
  }

})*/

// Quitar productos y reactivar el botón agregar del botón
$(document).on("click", "button.quitarProducto", function(){

    $(this).parent().parent().parent().parent().parent().parent().remove();
    var idProducto = $(this).attr("idProducto");

    /*if (localStorage.getItem("quitarProducto") == null){
      idQuitarProducto = [];
    }
    else {
      idQuitarProducto.concat(localStorage.getItem("quitarProducto"));
    }

    idQuitarProducto.push({"idProducto": idProducto});

    localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));*/

    $("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');
    $("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');
});


// Agregar productos, desde el botón Agregar Producto
$(".btnAgregarProducto").on("click", function(){
  var datos = new FormData();

  //alert("Hola");
  datos.append("traerProductos", "ok");

  $.ajax({
    async: true,
    url: 'ajax/productos.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      //console.log(respuesta);
      $(".nuevoProducto").append('<div class="row" style="padding:5px 15px">'+
            '<!-- Descripción del producto-->'+
            '<div class="col-sm-6" style="padding-right: 0px">'+
              '<div class="form-group">'+
                '<div class="input-group">'+
                  '<div class="input-group-prepend">'+
                    '<span class="input-group-text">'+
                      '<button class="btn btn-danger btn-xs quitarProducto" name="quitarProducto" id="quitarProducto" idProducto><i class="fas fa-times-circle"></i></button>'+
                    '</span>'+
                  '</div>'+
                  '<select class="form-control nuevaDescripcionProducto" idProducto name="nuevaDescripcionProducto" required>'+
                  '<option>Seleccione el producto</option>'+
                  '</select>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<!-- Cantidad del producto -->'+
            '<div class="col-sm-2 ingresoCantidad">'+
              '<input type="number" class="form-control nuevaCantidadProducto" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock required>'+
            '</div>'+
            '<!-- Precio del producto -->'+
            '<div class="col-sm-4 ingresoPrecio" style="padding-left: 0px">'+
              '<div class="form-group">'+
                '<div class="input-group">'+
                  '<div class="input-group-prepend">'+
                    '<span class="input-group-text">'+
                      '<i class="ion ion-social-usd"></i>'+
                    '</span>'+
                  '</div>'+
                  '<input type="number" class="form-control nuevoPrecioProducto" id="nuevoPrecioProducto" name="nuevoPrecioProducto" min="1" value="" readonly required>'+
                '</div>'+
              '</div>'+
            '</div>'+          
          '<!-- Botón agregar producto -->'+
          /*'<button type="button" class="btn btn-default hidden-lg">Agregar Producto</button>'+*/
          '</div>');
          
          // Agregar productos al SELECT
          respuesta.forEach(funcionForEach);

          function funcionForEach(item, index){
            $(".nuevaDescripcionProducto").append(
              '<option idProducto="'+item.id+'" value="'+item.descripcion+'">'+item.descripcion+'</option>'
            )
          }
    },
    error: function (respuesta){
        console.log(respuesta);
    }

  });
  
});


// Seleccionar producto

$(document).on("change", "select.nuevaDescripcionProducto", function(){
  var nombreProducto = $(this).val();
  //console.log(nombreProducto);

  var nuevoPrecioProducto = $(this).parent().parent().parent().parent().children(".ingresoPrecio").children().children().children(".nuevoPrecioProducto");
  //console.log(nuevoPrecioProducto);

  var nuevaCantidadProducto = $(this).parent().parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");
  //console.log(nuevaCantidadProducto);

  var datos = new FormData();
  datos.append("nombreProducto", nombreProducto);

  $.ajax({
    async: true,
    url: 'ajax/productos.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      //console.log(respuesta);
      $(nuevaCantidadProducto).attr("stock", respuesta["stock"]);
      $(nuevoPrecioProducto).val(respuesta["precio_venta"]);      

    },
    error: function (respuesta){
        console.log(respuesta);
    }
  });

});