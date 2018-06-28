/*=============================================
EDITAR UNIDAD
=============================================*/
$(".tablas").on("click", ".btnEditarUnidad", function(){

  var unidadID = $(this).attr("unidadID");
  var datos = new FormData();
  datos.append("unidadID", unidadID);

  $.ajax({
      url: "ajax/unidad.ajax.php",
      method: "POST",
        data: datos,
        cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(respuesta){

        $("#editarID").val(respuesta["ID"]);
        $("#editarNombre").val(respuesta["Nombre"]);

      }

  })


})

/*=============================================
ELIMINAR UNIDAD
=============================================*/

$(".tablas").on("click", ".btnEliminarUnidad", function(){

   var unidadID = $(this).attr("unidadID");

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

      window.location = "index.php?ruta=unidad&unidadID="+unidadID;

    }

   })

})