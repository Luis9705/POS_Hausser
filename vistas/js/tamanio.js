/*=============================================
EDITAR TAMAÑO
=============================================*/
$(".tablas").on("click", ".btnEditarTamanio", function(){

  var tamanioID = $(this).attr("tamanioID");
  var datos = new FormData();
  datos.append("tamanioID", tamanioID);

  $.ajax({
      url: "ajax/tamanio.ajax.php",
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
ELIMINAR TAMAÑO
=============================================*/

$(".tablas").on("click", ".btnEliminarTamanio", function(){

   var tamanioID = $(this).attr("tamanioID");

   swal({
    title: '¿Está seguro de borrar el tamaño?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar el tamaño!'
   }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=tamanio&tamanioID="+tamanioID;

    }

   })

})