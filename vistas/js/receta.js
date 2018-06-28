$(".btnAgregarIngrediente").click(function(){


	$(".nuevoIngrediente").append(

            //FILA DEL INGREDIENTE

            '<tr>'+
                //BOTÓN ELIMINAR


                '<td style="width: 5%; padding: 0px 0px 5px 0px;">'+

                '<div class="input-group" >'+

                '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarIngrediente"><i class="fa fa-times"></i></button></span>'+

                '</div>'+

                '</td>'+


                //ENTRADA PARA CANTIDAD


                '<td style="width: 15%; padding: 0px 0px 5px 0px;">'+

                '<div class="input-group">'+

                '<input type="number" min="1" pattern="[0-9]*" inputmode="numeric" class="form-control" id="nuevaCantidadReceta" name="nuevaCantidadReceta" placeholder="0000"  required>'+


                '</div>'+

                '</td>'+

                //ENTRADA PARA UNIDAD


                '<td style="width: 15%; padding: 0px 0px 5px 0px;;" >'+

                '<div class="input-group" style="width: 100%">'+ 


                '<select class="form-control" id="selectUnidad" name="selectUnidad" >'+

                '<option value="">kg </option>'+
                '<option value="">gr</option>'+
                '<option value="">lt</option>'+
                '<option value="">pz.</option>'+
                '</select>'+

                '</div>'+

                '</td>'+


                //ENTRADA PARA NOMBRE


                '<td style="width: 65%; padding: 0px 0px 5px 0px;">'+

                '<div class="input-group" style="width: 100%;">'+

                '<input type="text" class="form-control" id="nuevoNombreReceta" name="nuevoNombreReceta" placeholder="Descripción del producto"  required>'+

                '</div>'+

                '</td>'+

                '</tr>'
                );




})

/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
=============================================*/

$(".tablaIngredientes tbody").on("click", "button.agregarIngrediente", function(){

	var idIngrediente = $(this).attr("idIngrediente");

	$(this).removeClass("btn-primary agregarIngrediente");

	$(this).addClass("btn-default");

	var datos = new FormData();
	datos.append("ID", idIngrediente);

	$.ajax({

		url:"ajax/materia_prima.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){

			var idIngrediente = respuesta["ID"];
			var unidad = respuesta["unidadID"];
			var nombre = respuesta["Nombre"];

			$(".nuevoIngrediente").append(

            //FILA DEL INGREDIENTE

            '<tr>'+
                //BOTÓN ELIMINAR


                '<td style="width: 5%; padding: 0px 0px 5px 0px;">'+

                '<div class="input-group" >'+

                '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarIngrediente" idIngrediente="'+idIngrediente+'"><i class="fa fa-times"></i></button></span>'+

                '</div>'+

                '</td>'+


                //ENTRADA PARA CANTIDAD


                '<td style="width: 15%; padding: 0px 0px 5px 0px;">'+

                '<div class="input-group">'+

                '<input type="number" min="1" pattern="[0-9]*" inputmode="numeric" class="form-control" id="nuevaCantidadReceta" name="nuevaCantidadReceta" placeholder="0000" value="1"  required>'+


                '</div>'+

                '</td>'+

                //ENTRADA PARA UNIDAD


                '<td style="width: 15%; padding: 0px 0px 5px 0px;;" >'+

                '<div class="input-group" style="width: 100%">'+ 


                '<select class="form-control selectUnidad" id="selectUnidad" name="selectUnidad" >'+

                '<option value="'+unidad+'">'+unidad+'</option>'+

                '</select>'+

                '</div>'+

                '</td>'+


                //ENTRADA PARA NOMBRE


                '<td style="width: 65%; padding: 0px 0px 5px 0px;">'+

                '<div class="input-group" style="width: 100%;">'+

                '<input type="text" class="form-control" id="nuevoNombreReceta" name="nuevoNombreReceta" placeholder="Descripción del producto"  value ="'+nombre+'"required>'+

                '</div>'+

                '</td>'+

                '</tr>'); 

			var datosUnidad = new FormData();
			datosUnidad.append("traerUnidades", "Ok");

			$.ajax({

				url:"ajax/unidad.ajax.php",
				method: "POST",
				data: datosUnidad,
				cache: false,
				contentType: false,
				processData: false,
				dataType:"json",
				success:function(respuesta2){


						        // AGREGAR LOS PRODUCTOS AL SELECT 

						        respuesta2.forEach(funcionForEachIngredientes);

						        function funcionForEachIngredientes(item, index){
				

						        	$(".selectUnidad").append(

						        		'<option value="'+item.ID+'">'+item.ID+'</option>'
						        		)

						        }
						    }

						})

		}
	});

});


/*=============================================
QUITAR INGREDIENTES
=============================================*/

$(".formularioIngredientes").on("click", "button.quitarIngrediente", function(){

	$(this).parent().parent().parent().parent().remove();

	var idIngrediente = $(this).attr("idIngrediente");

	$("button.recuperarBotonIngrediente[idIngrediente='"+idIngrediente+"']").removeClass('btn-default');

	$("button.recuperarBotonIngrediente[idIngrediente='"+idIngrediente+"']").addClass('btn-primary agregarIngrediente');

})