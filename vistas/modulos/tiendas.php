<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Tiendas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tiendas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTienda">
          
          Agregar tienda

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
          
           <th>ID</th>
           <th>Nombre</th>
           <th>Descripción</th>
           <th>Acciones</th>
         </tr> 

        </thead>

        <tbody>

          <?php

          $item = null;
          $valor = null;

          $tiendas = ControladorTiendas::ctrMostrarTiendas($item, $valor);

          ?>

          <?php foreach ($tiendas as $key => $value):?>
          
          
          <tr>
            <td><?php echo $value["tiendaID"]; ?></td>
            <td><?php echo $value["tNombre"]; ?></td>
            <td><?php echo $value["tDescripcion"]; ?></td>
            <td>

              <div class="btn-group">
            

                <button class="btn btn-warning btnEditarTienda" tiendaID=<?php echo '"'.$value["tiendaID"].'"'; ?> data-toggle="modal" data-target="#modalEditarTienda"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger btnEliminarTienda" tiendaID=<?php echo '"'.$value["tiendaID"].'"'; ?>><i class="fa fa-times"></i></button>

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
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarTienda" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Tienda</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoID" placeholder="Ingresar codigo (Ej. H1)" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

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

          <button type="submit" class="btn btn-primary">Guardar tienda</button>

        </div>

          <?php

          $crearTienda = new ControladorTiendas();
          $crearTienda -> ctrCrearTienda();

        ?>


      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarTienda" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Tienda</h4>

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

                <input type="text" class="form-control input-lg" id="editarID" name="editarID" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

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

          <button type="submit" class="btn btn-primary">Guardar tienda</button>

        </div>

          <?php

          $editarTienda = new ControladorTiendas();
          $editarTienda -> ctrEditarTienda();

        ?>


      </form>

    </div>

  </div>

</div>

<?php

  $eliminarTienda = new ControladorTiendas();
  $eliminarTienda -> ctrBorrarTienda();

?>  


