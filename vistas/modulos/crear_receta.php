<div class="content-wrapper">
  <section class="content-header">
    <h1>Crear Receta</h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="recetas">Recetas</a></li>
      <li class="active">Crear receta</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <!--=====================================
      EL FORMULARIO
      ======================================-->
      <div class="col-lg-7 col-md-6 col-xs-12">
        <div class="box box-success">

          <div class="box-header with-border"></div>

          <form role="form" metohd="get" class="formularioIngredientes">

            <div class="box-body">

              <div class="box form-group">

                    <!--=====================================
                    ENTRADA DEL NOMBRE
                    ======================================-->

                    <div class="form-group" style=" margin: 0px 0px 5px 0px;">
                      <label for="nombreReceta" style=" margin: 0px 0px 0px 0px;">Nombre</label>
                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                        <input type="text" class="form-control" id="nombreReceta" name="nombreReceta" placeholder="Ingresar nombre de la receta" required>

                      </div>
                    </div> 


                <!--=====================================
                ENTRADA DE LA DESCRIPCIÓN
                ======================================-->

                <div class="form-group" style=" margin: 0px 0px 15px 0px;">
                  <label for="descripcionReceta" style=" margin: 0px 0px 0px 0px;">Descripción</label>
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" id="descripcionReceta" name="descripcionReceta" placeholder="Ingresar una descripción" required>

                  </div>

                </div> 
              </div>

 <!--=====================================
 INGREDIENTES AÑADIDOS
 ======================================-->                

 <div class="box box-success form-group" style=" margin.bottom: 15px;">
  <div class="box-header"  style="padding: 10px 0px 0px 0px;">
    <h3 class="box-title"><b>Ingredientes</b>

    </h3>

    <button type="button" class="btn btn-default btnAgregarIngrediente">Agregar ingrediente</button>
  </div>
  <!-- /.box-header -->
  <div class="box-body" style="padding: 0px 0px 10px 0px;">

              <!--=====================================
                  ENCABEZADO DE LA TABLA
                  ======================================-->
                  
                  <div class="col-xs-12 col-lg-12 " style="padding: 0px 0px 0px 0px;;">

                    <table class="table" >

                      <thead>

                        <tr>
                          <th style="width: 5%;">Quitar </th>
                          <th  style="width: 15%;">Cantidad</th>
                          <th  style="width: 15%;">Unidad</th>
                          <th  style="width: 65%;">Nombre</th>      
                        </tr>

                      </thead>

                      <tbody class=" nuevoIngrediente" >

                <!--=====================================
                ENTRADA PARA AGREGAR INGREDIENTE
                ======================================--> 

              </tbody>

            </table>

          </div>




           <!--=====================================
  BOTON PARA AGREGAR INGREDIENTE
  ======================================-->

  <button type="button" class="btn btn-default hidden-lg hidden-md ">Agregar ingrediente</button>


</div>
</div>

           <!--=====================================
            PROCEDIMIENTO
            ======================================-->

            <div class="box box-success form-group">
              <div class="box-header">
                <h3 class="box-title"><b>Procedimiento</b>

                </h3>
                <!-- tools box -->
              </div>
              <!-- /.box-header -->
              <div class="box-body col-xs-12 col-lg-12">
                <div class="form-group" >
                  <textarea class="textare form-control" id="procedimientoReceta" name="procedimientoReceta" placeholder="Escribir procedimiento aquí"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                </div>
              </div>
            </div>



          </div>

          <div class="box-footer">

            <button type="submit" class="btn btn-primary pull-right">Guardar Receta</button>

          </div>

        </form>

      </div>
    </div>

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-5 col-md-6 hidden-sm hidden-xs">

        <div class="box box-warning">

          <div class="box-header with-border"> <b>Agregar ingrediente</b></div>

          <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablas tablaIngredientes">

             <thead>

               <tr>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Acciones</th>
              </tr>

            </thead>

            <tbody>


        <?php

          $item = null;
          $valor = null;

          $ingrediente = ControladorMateriaPrima::ctrMostrarMateriaPrima($item, $valor);

        ?>

         <?php foreach ($ingrediente as $key => $value):?>
          
        <?php

        $item = "catID";
        $valor = $value["catID"];

        $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

         ?>
          
          <tr>
            <td><?php echo "Ingrediente"; ?></td>
            <td><?php echo $value["Nombre"]; ?></td>
            <td><?php echo $categoria["catNombre"]; ?></td>

            <td>

              <div class="btn-group">
            
                <button class="btn btn-primary agregarIngrediente recuperarBotonIngrediente" idIngrediente = <?php echo '"'.$value["ID"].'"'; ?>>Agregar</button>

              </div>  

            </td>

          </tr>

          <?php endforeach; ?>

            </tbody>

          </table>

        </div>

      </div>


    </div>



  </div>

</section>

</div>


           <!-- FILA DEL INGREDIENTE 
            
            <tr>

                
                //BOTÓN ELIMINAR
                

                <td style="width: 5%; padding: 0px 0px 5px 0px;">

                  <div class="input-group" >

                    <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></span>

                  </div>

                </td>

                
                ENTRADA PARA CANTIDAD
                                          

                <td style="width: 15%; padding: 0px 0px 5px 0px;">

                  <div class="input-group">

                    <input type="number" min="1" pattern="[0-9]*" inputmode="numeric" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="0000"  required>


                  </div>

                </td>

                
                ENTRADA PARA UNIDAD
                

                <td style="width: 15%; padding: 0px 0px 5px 0px;;" >

                  <div class="input-group" style="width: 100%"> 


                    <select class="form-control" id="selecTienda" name="selecTienda" >

                      <option value="">kg </option>
                      <option value="">gr</option>
                      <option value="">lt</option>
                      <option value="">pz.</option>
                    </select>

                  </div>

                </td>

                
                ENTRADA PARA NOMBRE
                

                <td style="width: 65%; padding: 0px 0px 5px 0px;;">

                  <div class="input-group" style="width: 100%;">

                    <input type="text" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="Descripción del producto"  required>

                  </div>

                </td>

              </tr>
-->