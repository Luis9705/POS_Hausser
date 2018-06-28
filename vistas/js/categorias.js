/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarCategoria", function(){

	var catID = $(this).attr("catID");

	var datos = new FormData();
	datos.append("catID", catID);

	$.ajax({
		url: "ajax/categorias.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarID").val(respuesta["catID"]);
     		$("#editarNombre").val(respuesta["catNombre"]);

     		var datosTienda = new FormData();
          	datosTienda.append("tiendaID",respuesta["tiendaID"]);

           $.ajax({

              url:"ajax/tiendas.ajax.php",
              method: "POST",
              data: datosTienda,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                $("#editarTienda").val(respuesta["tiendaID"]);
                $("#editarTienda").html(respuesta["tNombre"]);

              }

          })

            var datosUso = new FormData();
          	datosUso.append("usoID",respuesta["usoID"]);

           $.ajax({

              url:"ajax/uso.ajax.php",
              method: "POST",
              data: datosUso,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                $("#editarUso").val(respuesta["usoID"]);
                $("#editarUso").html(respuesta["uNombre"]);
              }

          })


            var datosPadre = new FormData();
          	datosPadre.append("catID",respuesta["catPadreID"]);

           $.ajax({

              url:"ajax/categorias.ajax.php",
              method: "POST",
              data: datosPadre,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                $("#editarPadre").val(respuesta["catID"]);
                $("#editarPadre").html(respuesta["catNombre"]);
              }

          })
           
     		$("#editarDescripcion").html(respuesta["catDescripcion"]);

     	}

	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarCategoria", function(){

	 var catID = $(this).attr("catID");

	 swal({
	 	title: '¿Está seguro de borrar la categoría?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar categoría!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=categorias&catID="+catID;

	 	}

	 })

})