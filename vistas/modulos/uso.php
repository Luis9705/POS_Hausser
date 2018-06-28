<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Uso
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tiendas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUso">
          
          Agregar uso

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

          $uso = ControladorUso::ctrMostrarUsos($item, $valor);

          ?>

          <?php foreach ($uso as $key => $value):?>
          
          
          <tr>
            <td><?php echo $value["usoID"]; ?></td>
            <td><?php echo $value["uNombre"]; ?></td>
            <td><?php echo $value["uDescripcion"]; ?></td>
            <td>

              <div class="btn-group">
            

                <button class="btn btn-warning btnEditarUso" usoID=<?php echo '"'.$value["usoID"].'"'; ?> data-toggle="modal" data-target="#modalEditarUso"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger btnEliminarUso" usoID=<?php echo '"'.$value["usoID"].'"'; ?>><i class="fa fa-times"></i></button>

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
MODAL AGREGAR USO
======================================-->

<div id="modalAgregarUso" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Uso</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoID" placeholder="Ingresar codigo (Ej. IN)" required>

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

          <button type="submit" class="btn btn-primary">Guardar uso</button>

        </div>

          <?php

          $crearTienda = new ControladorUso();
          $crearTienda -> ctrCrearUso();

        ?>


      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR USO
======================================-->

<div id="modalEditarUso" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Uso</h4>

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

          <button type="submit" class="btn btn-primary">Guardar uso</button>

        </div>

          <?php

          $editarUso = new ControladorUso();
          $editarUso -> ctrEditarUso();

        ?>


      </form>

    </div>

  </div>

</div>

<?php

  $eliminarUso = new ControladorUso();
  $eliminarUso -> ctrBorrarUso();

?>  


