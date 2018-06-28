<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar categorías
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar categorías</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
          
          Agregar categoría

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th>ID</th>
           <th>Nombre</th>
           <th>Tienda</th>
           <th>Uso</th>
           <th>Categoría Padre</th>
           <th>Descripción</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

        ?>

         <?php foreach ($categorias as $key => $value):?>
          
        <?php

        $item = "tiendaID";
        $valor = $value["tiendaID"];

        $tienda = ControladorTiendas::ctrMostrarTiendas($item, $valor);

        $item = "usoID";
        $valor = $value["usoID"];

        $uso = ControladorUso::ctrMostrarUsos($item, $valor);

        $item = "catID";
        $valor = $value["catPadreID"];

        $catPadre = ControladorCategorias::ctrMostrarCategorias($item, $valor);

         ?>
          
          <tr>
            <td><?php echo $value["catID"]; ?></td>
            <td><?php echo $value["catNombre"]; ?></td>
            <td><?php echo $tienda["tNombre"]; ?></td>
            <td><?php echo $uso["uNombre"]; ?></td>
            <td><?php echo $catPadre["catNombre"]; ?></td>
            <td><?php echo $value["catDescripcion"]; ?></td>

            <td>

              <div class="btn-group">
            

                <button class="btn btn-warning btnEditarCategoria" catID=<?php echo '"'.$value["catID"].'"'; ?> data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger btnEliminarCategoria" catID=<?php echo '"'.$value["catID"].'"'; ?>><i class="fa fa-times"></i></button>

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
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CODIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoID" placeholder="Ingresar código (Ej. 'BE')" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre de categoría" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA TIENDA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaTienda" name="nuevaTienda" required>
                  
                  <option value="">Selecionar Tienda</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $tiendas = ControladorTiendas::ctrMostrarTiendas($item, $valor);

                  ?>
                  <?php foreach ($tiendas as $key => $value): ?>
                    
                    <option value=<?php echo '"'.$value["tiendaID"].'"'; ?>><?php echo $value["tNombre"]; ?></option>'

                  <?php endforeach; ?>

                  </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL USO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevoUso" name="nuevoUso" required>
                  
                  <option value="">Selecionar Uso</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $uso = ControladorUso::ctrMostrarUsos($item, $valor);

                  ?>
                  <?php foreach ($uso as $key => $value): ?>
                    
                    <option value=<?php echo '"'.$value["usoID"].'"'; ?>><?php echo $value["uNombre"]; ?></option>'

                  <?php endforeach; ?>

                  </select>

              </div>

            </div>

            <!-- ENTRADA PARA CAT PADRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevoPadre" name="nuevoPadre">
                  
                  <option value="">Selecionar Cat. Padre (opcional)</option>
                  <option value="">Null</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $catPadre = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  ?>
                  <?php foreach ($catPadre as $key => $value): ?>
                    
                    <option value=<?php echo '"'.$value["catID"].'"'; ?>><?php echo $value["catNombre"]; ?></option>'

                  <?php endforeach; ?>

                  </select>

              </div>

            </div>



            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <textarea type="text" class="form-control input-lg" name="nuevaDescripcion"  id="nuevaDescripcion" placeholder="Ingresar descripción" required></textarea>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar categoría</button>

        </div>

        <?php

          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CODIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" name="editarID" id="editarID" placeholder="Ingresar código (Ej. 'BE')" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" placeholder="Ingresar nombre de categoría" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA TIENDA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" name="editarTienda" required>
                  
                  <option id="editarTienda"></option>
                  <?php

                  $item = null;
                  $valor = null;

                  $tiendas = ControladorTiendas::ctrMostrarTiendas($item, $valor);

                  ?>
                  <?php foreach ($tiendas as $key => $value): ?>
                    
                    <option value=<?php echo '"'.$value["tiendaID"].'"'; ?>><?php echo $value["tNombre"]; ?></option>'

                  <?php endforeach; ?>

                  </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL USO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg"  name="editarUso" required>
                  
                  <option id="editarUso"></option>

                  <?php

                  $item = null;
                  $valor = null;

                  $uso = ControladorUso::ctrMostrarUsos($item, $valor);

                  ?>
                  <?php foreach ($uso as $key => $value): ?>
                    
                    <option value=<?php echo '"'.$value["usoID"].'"'; ?>><?php echo $value["uNombre"]; ?></option>'

                  <?php endforeach; ?>

                  </select>

              </div>

            </div>

            <!-- ENTRADA PARA CAT PADRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg"  name="editarPadre">
                  
                  <option id="editarPadre"></option>
                  <option value="">Null</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $catPadre = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  ?>
                  <?php foreach ($catPadre as $key => $value): ?>
                    
                    <option value=<?php echo '"'.$value["catID"].'"'; ?>><?php echo $value["catNombre"]; ?></option>'

                  <?php endforeach; ?>

                  </select>

              </div>

            </div>



            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <textarea type="text" class="form-control input-lg" name="editarDescripcion"  id="editarDescripcion" placeholder="Ingresar descripción" required></textarea>

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

          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();

?>


