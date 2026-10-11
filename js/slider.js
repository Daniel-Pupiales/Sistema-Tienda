$(document).ready(function(){

  $("#slider").Thumbelina({
  $bwdBut:$("#slider .left"),
  $fwdBut:$("#slider .right")
  });


        $("#img1").click(function () {

         $("#niveles").show();
         $("#img-bajo").attr("src","img/verde.png");
         $("#img-medio").attr("src","img/amarillo.png");
         $("#img-alto").attr("src","img/rojo.png");
          $("#descripcion").text("Coca cola");
          $("#precio").text("0.25");
           $("#total").text("0.00");
         $("#cantidad").prop("disabled",false);
        $("#cantidad").val("");
         $("#img1").css("background-color","#A0EADE");
           $("#img5").css("background-color","");
               $("#img4").css("background-color","");
                $("#img3").css("background-color","");
                 $("#img2").css("background-color","");
                  $("#img6").css("background-color","");
        });
        $("#img2").click(function () {
 $("#niveles").show();
$("#cantidad").val("");
         $("#img-bajo").attr("src","img/amarillo.png");
         $("#img-medio").attr("src","img/amarillo.png");
         $("#img-alto").attr("src","img/rojo.png");

      $("#total").text("0.00");
          $("#descripcion").text("Fanta");
          $("#precio").text("0.30");
           $("#cantidad").prop("disabled",false);
            $("#img2").css("background-color","#A0EADE");
               $("#img5").css("background-color","");
               $("#img4").css("background-color","");
                $("#img3").css("background-color","");
                 $("#img6").css("background-color","");
                  $("#img1").css("background-color","");
        });
        $("#img3").click(function () {
        $("#cantidad").val("");
           $("#niveles").show();
         $("#img-bajo").attr("src","img/verde.png");
         $("#img-medio").attr("src","img/verde.png");
         $("#img-alto").attr("src","img/amarillo.png");
        $("#total").text("0.00");
          $("#descripcion").text("inka cola");
          $("#precio").text("0.35");
            $("#cantidad").prop("disabled",false);
             $("#img3").css("background-color","#A0EADE");
               $("#img5").css("background-color","");
               $("#img4").css("background-color","");
                $("#img6").css("background-color","");
                 $("#img2").css("background-color","");
                  $("#img1").css("background-color","");
        });
         $("#img4").click(function () {
        $("#cantidad").val("");
           $("#niveles").show();
         $("#img-bajo").attr("src","img/verde.png");
         $("#img-medio").attr("src","img/verde.png");
         $("#img-alto").attr("src","img/rojo.png");
          $("#total").text("0.00");
          $("#descripcion").text("Nestea");
          $("#precio").text("0.45");
            $("#cantidad").prop("disabled",false);
             $("#img4").css("background-color","#A0EADE");
               $("#img5").css("background-color","");
               $("#img6").css("background-color","");
                $("#img3").css("background-color","");
                 $("#img2").css("background-color","");
                  $("#img1").css("background-color","");
        });
        $("#img5").click(function () {
        $("#cantidad").val("");
           $("#niveles").show();
         $("#img-bajo").attr("src","img/verde.png");
         $("#img-medio").attr("src","img/amarillo.png");
         $("#img-alto").attr("src","img/rojo.png");
          $("#total").text("0.00");
          $("#descripcion").text("Pepsi");
          $("#precio").text("0.30");
            $("#cantidad").prop("disabled",false);
             $("#img5").css("background-color","#A0EADE");
               $("#img6").css("background-color","");
               $("#img4").css("background-color","");
                $("#img3").css("background-color","");
                 $("#img2").css("background-color","");
                  $("#img1").css("background-color","");
        });
        $("#img6").click(function () {
         $("#cantidad").val("");
           $("#niveles").show();
         $("#img-bajo").attr("src","img/verde.png");
         $("#img-medio").attr("src","img/rojo.png");
         $("#img-alto").attr("src","img/rojo.png");
          $("#total").text("0.00");
          $("#descripcion").text("Sprite");
          $("#precio").text("0.40");
            $("#cantidad").prop("disabled",false);
             $("#img6").css("background-color","#A0EADE");
              $("#img5").css("background-color","");
               $("#img4").css("background-color","");
                $("#img3").css("background-color","");
                 $("#img2").css("background-color","");
                  $("#img1").css("background-color","");
        });

$("#cantidad").on("input",function(){
 
    let precio = parseFloat($("#precio").text());
     let cantidad = parseInt($("#cantidad").val());
    if(cantidad<=0 ){
      alert("Ingrese una cantidad valida");
      $("#cantidad").val("");
    $("#total").text("");
    }else{
    $("#boton-enviar").prop("disabled",false);
 
        let total = cantidad*precio;
     $("#total").text(total.toFixed(2));
    }
});


$("#boton-guardar-datos").click(function(){
    let nombre = $("#nombre").val();
    let cedula = $("#cedula").val();
    let direccion = $("#direccion").val();

    $("#nombreCliente").text(nombre);
    $("#cedulaCliente").text(cedula);
    $("#direccionCliente").text(direccion);


    $("#input-nombre-envio").val(nombre);
    $("#input-cedula-envio").val(cedula);
    $("#input-direccion-envio").val(direccion);
});


let subtotalGeneral = 0;
let contadorProductos = 0; 

$("#boton-enviar").click(function () {
    let descripcion = $("#descripcion").text();
    let precio = parseFloat($("#precio").text());
    let cantidad = parseInt($("#cantidad").val());
    $("#total").text("0.00");

    if (isNaN(cantidad) || isNaN(precio) || cantidad <= 0) {
        $("#total").text("Ingrese una cantidad válida");
        return;
    }

    let total = precio * cantidad;

    subtotalGeneral += total;
    contadorProductos += cantidad;

    let fila = `
        <tr>
            <td>${$("#cuerpo-tabla tr").length + 1}</td>
            <td>${descripcion}</td>
            <td>${cantidad}</td>
            <td>${total.toFixed(2)}</td>
        </tr>
    `;


    let iva = subtotalGeneral * 0.15;
    let totalConIva = subtotalGeneral + iva;

  $("#cuerpo-tabla").append(fila);
    $("#cantidad-productos").text(contadorProductos);
    $("#iva").text(iva.toFixed(2));
    $("#total-iva").text(totalConIva.toFixed(2));
    $("#input-total-envio").val(totalConIva.toFixed(2)); 
    $("#cantidad").val("");
});



let totalConIva = subtotalGeneral + iva;


$("#total-iva").text(totalConIva.toFixed(2));

$("#input-total-envio").val(totalConIva.toFixed(2));

});