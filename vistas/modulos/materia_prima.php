<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Materias Primas

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Materias Primas</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMateriaPrima">

          Agregar Materia Prima

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

        <thead>

         <tr>

           <th>ID</th>
           <th>Nombre</th>
           <th>Descripción</th>
           <th>Categoría</th>
           <th>Cantidad Lote</th>
           <th>Unidad</th>
           <th>Precio Lote ($)</th>
           <th>Precio Unitario ($)</th>
           <th>Cantidad Mínima</th>
           <th>Control de Calidad</th>
           <th>Acciones</th>

         </tr> 

       </thead>

       <tbody>

        <?php

        $item = null;
        $valor = null;

        $MateriaPrima = ControladorMateriaPrima::ctrMostrarMateriaPrima($item, $valor);

        ?>

        <?php foreach ($MateriaPrima as $key => $value):?>

          <?php

          $item = "catID";
          $valor = $value["catID"];

          $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);


          ?>
          
          <tr>
            <td><?php echo $value["ID"]; ?></td>
            <td><?php echo $value["Nombre"]; ?></td>
            <td><?php echo $value["Descripcion"]; ?></td>
            <td><?php echo $categoria["catNombre"]; ?></td>
            <td><?php echo $value["cantidadLote"]; ?></td>
            <td><?php echo $value["unidadID"]; ?></td>
            <td><?php echo $value["precioLote"]; ?></td>
            <td><?php echo $value["precioUnitario"]; ?></td>
            <td><?php echo $value["cantidadMIN"]; ?></td>
            <td><?php echo $value["controlCalidad"]; ?></td>

            <td>

              <div class="btn-group">


                <button class="btn btn-warning btnEditarMateriaPrima" ID=<?php echo '"'.$value["ID"].'"'; ?> data-toggle="modal" data-target="#modalEditarMateriaPrima"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger btnEliminarMateriaPrima" ID=<?php echo '"'.$value["ID"].'"'; ?>><i class="fa fa-times"></i></button>

              </div>  

            </td>

          </tr>

        <?php endforeach; ?>

      </tbody>

    </table>

  </div>

</div>

</section>

</div>

<!--=====================================
MODAL AGREGAR MATERIA PRIMA
======================================-->

<div id="modalAgregarMateriaPrima" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Materia Prima</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CODIGO -->
            
            <div class="form-group">
              <label for="nuevoID">Código</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoID" placeholder="Ingresar código (Ej. 'BE')" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              <label for="nuevaDescripcion">Nombre</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" id="nuevoNombre" placeholder="Ingresar nombre de Materia Prima" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">
              <label for="nuevaDescripcion">Descripción</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <textarea type="text" class="form-control input-lg" name="nuevaDescripcion"  id="nuevaDescripcion" placeholder="Ingresar descripción" required></textarea>

              </div>

            </div>

            <!-- ENTRADA PARA CATEGORIA -->
            
            <div class="form-group">
              <label for="nuevaCat">Categoría</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaCat" name="nuevaCat" required>

                  <option value="">Selecionar Categoría</option>
                  

                  <?php

                  $item = null;
                  $valor = null;

                  $cat = ControladorCategorias::ctrMostrarCategoriasIngredientes($item, $valor);

                  ?>
                  <?php foreach ($cat as $key => $value): ?>

                    <option value=<?php echo '"'.$value["catID"].'"'; ?>><?php echo $value["catNombre"]; ?></option>'

                  <?php endforeach; ?>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA EL LOTE -->
            
            <div class="form-group">
              <label for="nuevaCantidad">Cantidad por lote</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 


                <div class="row">
                  <div class="col-lg-6">
                    <div class="input-group">
                      <input type="number" min="0.001" step="0.001" class="form-control input-lg" id="nuevaCantidad" name="nuevaCantidad" placeholder="Cantidad por lote" required>
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-lg-4">
                    <div class="input-group">
                      <select class="form-control input-lg" id="nuevaUnidad" name="nuevaUnidad" required>
                        <option value="">Unidad</option>

                        <?php

                        $item = null;
                        $valor = null;

                        $unidad = ControladorUnidad::ctrMostrarUnidades($item, $valor);

                        ?>
                        <?php foreach ($unidad as $key => $value): ?>

                          <option value=<?php echo '"'.$value["ID"].'"'; ?>><?php echo $value["ID"]; ?></option>'

                        <?php endforeach; ?>

                      </select>
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                </div>

              </div>

            </div>


            <!-- ENTRADA PARA EL PRECIO LOTE -->
            
            <div class="form-group">
              <label for="nuevoPrecio">Precio por lote</label>
              <div class="input-group">

                <span class="input-group-addon">$</span>
                
                <input type="number" min="0" step="0.001" class="form-control input-lg" id="nuevoPrecio" name="nuevoPrecio" placeholder="Ingresar precio por lote" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL UNITARIO -->
            
            <div class="form-group">
              <label for="precioUnitario">Precio unitario</label>
              <div class="input-group">

                <span class="input-group-addon">$</span>
                
                <input type="number" min="0" step="0.001" class="form-control input-lg" id="precioUnitario" name="precioUnitario" placeholder="Precio unitario" readonly required>

              </div>

            </div>


            <!-- ENTRADA PARA CANTIDAD MÍNIMA -->
            
            <div class="form-group">
              <label for="nuevaCantidadMin">Cantidad Mínima</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="number" min="1" class="form-control input-lg" name="nuevaCantidadMin" id="nuevaCantidadMin"idplaceholder="Cantidad Mínima" required>

              </div>

            </div>


            <!-- ENTRADA PARA CANTIDAD MÍNIMA -->
            
            <div class="form-group">
              <label for="nuevoControlCal">Control de Calidad (días)</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="number" min="1" class="form-control input-lg" name="nuevoControlCal" id="nuevoControlCal" placeholder="Ingresar control de calidad" required>

              </div>

            </div>





          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Materia Prima</button>

        </div>

        <?php

        $crearMateriaPrima = new ControladorMateriaPrima();
        $crearMateriaPrima -> ctrCrearMateriaPrima();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarMateriaPrima" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Materia Prima</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             <!-- ENTRADA PARA EL CODIGO -->
            
            <div class="form-group">
              <label for="editarID">Código</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" name="editarID" id="editarID" placeholder="Ingresar código (Ej. 'BE')" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              <label for="editarDescripcion">Nombre</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" placeholder="Ingresar nombre de Materia Prima" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">
              <label for="editarDescripcion">Descripción</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <textarea type="text" class="form-control input-lg" name="editarDescripcion"  id="editarDescripcion" placeholder="Ingresar descripción" required></textarea>

              </div>

            </div>

            <!-- ENTRADA PARA CATEGORIA -->
            
            <div class="form-group">
              <label for="editarCat">Categoría</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" name="editarCat" required>

                  <option id="editarCat"></option>
                  

                  <?php

                  $item = null;
                  $valor = null;

                  $cat = ControladorCategorias::ctrMostrarCategoriasIngredientes($item, $valor);

                  ?>
                  <?php foreach ($cat as $key => $value): ?>

                    <option value=<?php echo '"'.$value["catID"].'"'; ?>><?php echo $value["catNombre"]; ?></option>'

                  <?php endforeach; ?>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA EL LOTE -->
            
            <div class="form-group">
              <label for="editarCantidad">Cantidad por lote</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 


                <div class="row">
                  <div class="col-lg-6">
                    <div class="input-group">
                      <input type="number" min="0.001" step="0.001" class="form-control input-lg" id="editarCantidad" name="editarCantidad" placeholder="Cantidad por lote" required>
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-lg-4">
                    <div class="input-group">
                      <select class="form-control input-lg" name="editarUnidad" required>
                        <option id="editarUnidad"></option>

                        <?php

                        $item = null;
                        $valor = null;

                        $unidad = ControladorUnidad::ctrMostrarUnidades($item, $valor);

                        ?>
                        <?php foreach ($unidad as $key => $value): ?>

                          <option value=<?php echo '"'.$value["ID"].'"'; ?>><?php echo $value["ID"]; ?></option>'

                        <?php endforeach; ?>

                      </select>
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                </div>

              </div>

            </div>


            <!-- ENTRADA PARA EL PRECIO LOTE -->
            
            <div class="form-group">
              <label for="editarPrecio">Precio por lote</label>
              <div class="input-group">

                <span class="input-group-addon">$</span>
                
                <input type="number" min="0" step="0.001" class="form-control input-lg" id="editarPrecio" name="editarPrecio" placeholder="Ingresar precio por lote" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL UNITARIO -->
            
            <div class="form-group">
              <label for="editarPrecioUnitario">Precio unitario</label>
              <div class="input-group">

                <span class="input-group-addon">$</span>
                
                <input type="number" min="0" step="0.001" class="form-control input-lg" id="editarPrecioUnitario" name="editarPrecioUnitario" placeholder="Precio unitario" readonly required>

              </div>

            </div>


            <!-- ENTRADA PARA CANTIDAD MÍNIMA -->
            
            <div class="form-group">
              <label for="editarCantidadMin">Cantidad Mínima</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="number" min="1" class="form-control input-lg" name="editarCantidadMin" id="editarCantidadMin"idplaceholder="Cantidad Mínima" required>

              </div>

            </div>


            <!-- ENTRADA PARA CANTIDAD MÍNIMA -->
            
            <div class="form-group">
              <label for="editarControlCal">Control de Calidad (días)</label>
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="number" min="1" class="form-control input-lg" name="editarControlCal" id="editarControlCal" placeholder="Ingresar control de calidad" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

        <?php

        $editarMateriaPrima = new ControladorMateriaPrima();
        $editarMateriaPrima -> ctrEditarMateriaPrima();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

$borrarMateriaPrima = new ControladorMateriaPrima();
$borrarMateriaPrima -> ctrBorrarMateriaPrima();

?>


