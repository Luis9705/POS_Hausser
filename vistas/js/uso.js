/*=============================================
EDITAR USO
=============================================*/
$(".tablas").on("click", ".btnEditarUso", function(){

  var usoID = $(this).attr("usoID");
  var datos = new FormData();
  datos.append("usoID", usoID);

  $.ajax({
      url: "ajax/uso.ajax.php",
      method: "POST",
        data: datos,
        cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(respuesta){

        $("#editarID").val(respuesta["usoID"]);
        $("#editarNombre").val(respuesta["uNombre"]);
        $("#editarDescripcion").html(respuesta["uDescripcion"]);

      }

  })


})

/*=============================================
ELIMINAR USO
=============================================*/

$(".tablas").on("click", ".btnEliminarUso", function(){

   var usoID = $(this).attr("usoID");

   swal({
    title: '¿Está seguro de borrar el uso?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar el uso!'
   }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=uso&usoID="+usoID;

    }

   })

})