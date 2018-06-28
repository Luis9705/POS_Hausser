/*=============================================
EDITAR TIENDA
=============================================*/
$(".tablas").on("click", ".btnEditarTienda", function(){

  var tiendaID = $(this).attr("tiendaID");
  var datos = new FormData();
  datos.append("tiendaID", tiendaID);

  $.ajax({
      url: "ajax/tiendas.ajax.php",
      method: "POST",
        data: datos,
        cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(respuesta){

        $("#editarID").val(respuesta["tiendaID"]);
        $("#editarNombre").val(respuesta["tNombre"]);
        $("#editarDescripcion").html(respuesta["tDescripcion"]);

      }

  })


})

/*=============================================
ELIMINAR TIENDA
=============================================*/

$(".tablas").on("click", ".btnEliminarTienda", function(){

   var tiendaID = $(this).attr("tiendaID");

   swal({
    title: '¿Está seguro de borrar la tienda?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar la tienda!'
   }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=tiendas&tiendaID="+tiendaID;

    }

   })

})