<?php
    include "views/dashboard/modules/header.php";
?>

<form id="sendEmailForm" method="post" enctype="multipart/form-data">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Email SMTP
        <!-- <small>Algo aqui</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="">Email</a></li>
        <li class="active"> SMTP</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Productos</h3> -->
              <button type="button" id="buttonConfigurarEmail" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Configurar
              </button>
            </div>


            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Configurar</h4>
                    </div>

                    <!-- <form class="form-horizontal" method="post" id="configurarSMTPForm"> -->
                    <div class="form-horizontal">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre de la cuenta</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="" name="SMTPname" value="Frederick Calderon">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="" name="SMTPemail" value="fekj97@gmail.com">
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-sm-2 control-label">Servidor SMTP</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="" name="SMTPserver" value="smtp.gmail.com">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Puerto SMTP</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="" name="SMTPport" value="587">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="" name="SMTPpassword">
                            </div>
                        </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                            <button type="submit" id="buttonConfigEmailSaveChanges" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    
                    <!-- </form> --></div>
                
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            
            <!-- /.box-header -->
            <div class="box-body">
            
            <div class="col-md-6">
            <!-- <form class="form-horizontal"> -->
                <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="engel199702@hotmail.com">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Asunto</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="asunto" placeholder="Asunto" value="Test">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Mensaje</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="mensaje" placeholder="Mensaje ...">Test</textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Archivos Adjuntos</label>

                  <div class="col-sm-10">
                    <input type="file" id="files" name="files[]" multiple='multiple'>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="sendEmail" form="sendEmailForm" class="btn btn-info pull-right">Enviar</button>
              </div>
              <!-- /.box-footer -->
            <!-- </form> -->
</div>
            </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </form>

<?php
    include ("views/dashboard/modules/footer.php");

    $emailController = new EmailController();
    $emailController->sendEmailSMTP();
?>