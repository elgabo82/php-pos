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