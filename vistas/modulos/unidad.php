<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Unidades
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Unidades</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUnidad">
          
          Agregar unidad

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>  
           <th>Abreviación</th>
           <th>Nombre</th>
           <th>Acciones</th>
         </tr> 

        </thead>

        <tbody>

          <?php

          $item = null;
          $valor = null;

          $unidades = ControladorUnidad::ctrMostrarUnidades($item, $valor);

          ?>

          <?php foreach ($unidades as $key => $value):?>
          
          
          <tr>
            <td><?php echo $value["ID"]; ?></td>
            <td><?php echo $value["Nombre"]; ?></td>
            <td>

              <div class="btn-group">
            

                <button class="btn btn-warning btnEditarUnidad" unidadID=<?php echo '"'.$value["ID"].'"'; ?> data-toggle="modal" data-target="#modalEditarUnidad"><i class="fa fa-pencil"></i></button>


                <button class="btn btn-danger btnEliminarUnidad" unidadID=<?php echo '"'.$value["ID"].'"'; ?>><i class="fa fa-times"></i></button>

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
MODAL AGREGAR UNIDAD
======================================-->

<div id="modalAgregarUnidad" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Unidad</h4>

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

          <button type="submit" class="btn btn-primary">Guardar unidad</button>

        </div>

          <?php

          $crearUnidad = new ControladorUnidad();
          $crearUnidad -> ctrCrearUnidad();

        ?>


      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR UNIDAD
======================================-->

<div id="modalEditarUnidad" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Unidad</h4>

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

          <button type="submit" class="btn btn-primary">Guardar unidad</button>

        </div>

          <?php

          $editarUnidad = new ControladorUnidad();
          $editarUnidad -> ctrEditarUnidad();

        ?>


      </form>

    </div>

  </div>

</div>

<?php

  $eliminarUnidad = new ControladorUnidad();
  $eliminarUnidad -> ctrBorrarUnidad();

?>  


