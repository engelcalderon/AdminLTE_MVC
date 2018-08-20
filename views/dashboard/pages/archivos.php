<?php
    include "views/dashboard/modules/header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Archivos
        <!-- <small>Algo aqui</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <!-- <li><a href="">Email</a></li> -->
        <li class="active"> Archivos</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <button type="button" id="botonSubirArchivoModal" class="btn btn-default" data-toggle="modal" data-target="#modal-subirArchivo">
                Subir archivo
              </button>
            </div>

            <div class="modal fade" id="modal-subirArchivo">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Subir archivo</h4>
                    </div>
                    
                        <div class="modal-body">

                        <div class="picture-container fileinput fileinput-new" data-provides="fileinput" title="Subir archivo">
                        <span class="material-input" id="loader_photo"></span>
                        <!-- <div class="btn-file">
                          <div class="fileinput-new thumbnail">
                            <img src="img/placeholder.jpg" class="picture-src" id="photoPreview" />
                          </div>
                        </div> -->
                        <div class="fileinput-preview fileinput-exists thumbnail">
                          <img class="picture-src" id="photoPreview2" name="photoPreview2"/>
                        </div>
                        <input type="file" id="file" name="file" accept="image/*"/>
                        <!-- <input type="hidden" id="file2" name="file2" value=""/> -->
                        </div>

                        </div>

                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button> -->
                            <button class="btn btn-primary" id="botonSubirArchivoGuardar">Subir archivo</button>
                        </div>
                
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th># Arhivo</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
                </thead>

                <tbody>

                    <?php 
                        $controller = new Controller;
                        $controller->getArchivosController();
                    ?>

                </tbody>

              </table>

            </div>
            <!-- /.box-body -->
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
    include ("views/dashboard/modules/footer.php");
?>