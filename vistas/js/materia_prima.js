/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarMateriaPrima", function(){

	var ID = $(this).attr("ID");

	var datos = new FormData();
	datos.append("ID", ID);

	$.ajax({
		url: "ajax/materia_prima.ajax.php",
		method: "POST",
   data: datos,
   cache: false,
   contentType: false,
   processData: false,
   dataType:"json",
   success: function(respuesta){

     $("#editarID").val(respuesta["ID"]);
     $("#editarNombre").val(respuesta["Nombre"]);
     $("#editarDescripcion").html(respuesta["Descripcion"]);

     var datosCat= new FormData();
     datosCat.append("catID",respuesta["catID"]);

     $.ajax({

      url:"ajax/categorias.ajax.php",
      method: "POST",
      data: datosCat,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        $("#editarCat").val(respuesta["catID"]);
        $("#editarCat").html(respuesta["catNombre"]);
      }

    })

     $("#editarCantidad").val(respuesta["cantidadLote"]);
     $("#editarUnidad").val(respuesta["unidadID"]);
     $("#editarUnidad").html(respuesta["unidadID"]);
     $("#editarPrecio").val(respuesta["precioLote"]);
     $("#editarPrecioUnitario").val(respuesta["precioUnitario"]);
     $("#editarCantidadMin").val(respuesta["cantidadMIN"]);
     $("#editarControlCal").val(respuesta["controlCalidad"]);

   }

 })


})

/*=============================================
ELIMINAR MateriaPrima
=============================================*/
$(".tablas").on("click", ".btnEliminarMateriaPrima", function(){

  var ID = $(this).attr("ID");

  swal({
   title: '¿Está seguro de borrar la materia prima?',
   text: "¡Si no lo está puede cancelar la acción!",
   type: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   cancelButtonText: 'Cancelar',
   confirmButtonText: 'Si, borrar materia prima!'
 }).then(function(result){

   if(result.value){

    window.location = "index.php?ruta=materia_prima&ID="+ID;

  }

})

})



/*=============================================
AGREGANDO PRECIO UNITARIO
=============================================*/
$("#nuevoPrecio").change(function(){

  if($("#nuevaCantidad").val() != ""){
    var cantidadLote = $("#nuevaCantidad").val();
    var precioLote = $("#nuevoPrecio").val();
    var precioUnitario = Number(precioLote/cantidadLote);
    $("#precioUnitario").val(precioUnitario);
  }


})


$("#nuevaCantidad").change(function(){

  if($("#nuevoPrecio").val() != ""){
    var cantidadLote = $("#nuevaCantidad").val();
    var precioLote = $("#nuevoPrecio").val();
    var precioUnitario = Number(precioLote/cantidadLote);
    $("#precioUnitario").val(precioUnitario);
  }


})

$("#editarPrecio").change(function(){


  if($("#editarCantidad").val() != ""){
    var cantidadLote = $("#editarCantidad").val();
    var precioLote = $("#editarPrecio").val();
    var precioUnitario = Number(precioLote/cantidadLote);
    $("#editarPrecioUnitario").val(precioUnitario);
  }


})


$("#editarCantidad").change(function(){


  if($("#editarPrecio").val() != ""){
    var cantidadLote = $("#editarCantidad").val();
    var precioLote = $("#editarPrecio").val();
    var precioUnitario = Number(precioLote/cantidadLote);
    $("#editarPrecioUnitario").val(precioUnitario);
  }


})

