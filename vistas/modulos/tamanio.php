<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Tamaños
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tamaños</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTamanio">
          
          Agregar tamaño

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>  
           <th>ID</th>
           <th>Nombre</th>
           <th>Acciones</th>
         </tr> 

        </thead>

        <tbody>

          <?php

          $item = null;
          $valor = null;

          $unidades = ControladorTamanio::ctrMostrarTamanios($item, $valor);

          ?>

          <?php foreach ($unidades as $key => $value):?>
          
          
          <tr>
            <td><?php echo $value["ID"]; ?></td>
            <td><?php echo $value["Nombre"]; ?></td>
            <td>

              <div class="btn-group">
            

                <button class="btn btn-warning btnEditarTamanio" tamanioID=<?php echo '"'.$value["ID"].'"'; ?> data-toggle="modal" data-target="#modalEditarTamanio"><i class="fa fa-pencil"></i></button>


                <button class="btn btn-danger btnEliminarTamanio" tamanioID=<?php echo '"'.$value["ID"].'"'; ?>><i class="fa fa-times"></i></button>

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
MODAL AGREGAR TAMAÑO
======================================-->

<div id="modalAgregarTamanio" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Tamaño</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoID" placeholder="Ingresar abreviación" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar tamaño</button>

        </div>

          <?php

          $crearTamanio = new ControladorTamanio();
          $crearTamanio -> ctrCrearTamanio();

        ?>


      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR TAMAÑO
======================================-->

<div id="modalEditarTamanio" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Tamaño</h4>

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

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar tamaño</button>

        </div>

          <?php

          $editarTamanio = new ControladorTamanio();
          $editarTamanio -> ctrEditarTamanio();

        ?>


      </form>

    </div>

  </div>

</div>

<?php

  $eliminarTamanio = new ControladorTamanio();
  $eliminarTamanio -> ctrBorrarTamanio();

?>  


