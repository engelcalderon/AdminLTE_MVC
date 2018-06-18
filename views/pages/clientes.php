<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clientes
        <!-- <small>Algo aqui</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"> Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Clientes</h3> -->
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Añadir nuevo cliente
              </button>
            </div>


            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Nuevo cliente</h4>
                    </div>

                    <form method="post">
                    
                        <div class="modal-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>Tipo de identificacion</label>
                                            <select class="form-control select2" style="width: 100%;" name="registroCliente_tipoID">
                                                <option selected="selected">Física</option>
                                                <option>Jurídica</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Identificacion</label>
                                            <input type="text" class="form-control" name="registroCliente_identificacion" placeholder="000 ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>Nombre completo</label>
                                            <input type="text" class="form-control" name="registroCliente_nombre" placeholder="Nombre ...">
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Nombre fantasia</label>
                                            <input type="text" class="form-control" name="registroCliente_nombrefantasia" placeholder="Fantasia ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>Telefono</label>
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                                <input type="text" class="form-control" name="registroCliente_telefono" data-inputmask='"mask": "(999) 9999-9999"' data-mask>
                                            </div>   
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Email</label>
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                                <input type="text" class="form-control" name="registroCliente_email" placeholder="Email ...">
                                            </div> 
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>Provincia</label>
                                            <select class="form-control select2" style="width: 100%;" name="registroCliente_provincia">
                                                <option selected="selected">San Jose</option>
                                                <option>Alajuela</option>
                                                <option>Cartago</option>
                                                <option>Heredia</option>
                                                <option>Guanacaste</option>
                                                <option>Puntarenas</option>
                                                <option>Limon</option>                                            
                                            </select>
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Canton</label>
                                            <input type="text" class="form-control" name="registroCliente_canton" placeholder="Canton ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>Distrito</label>
                                            <input type="text" class="form-control" name="registroCliente_distrito" placeholder="Distrito ...">
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Barrio</label>
                                            <input type="text" class="form-control" name="registroCliente_barrio" placeholder="Barrio ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Otras señas</label>
                                    <textarea class="form-control" rows="3" name="registroCliente_direccion" placeholder="Direccion ..."></textarea>
                                </div>
                                
                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    
                    </form>
                
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Identificacion</th>
                  <th>Tipo de identificacion</th>
                  <th>Nombre completo</th>
                  <th>Nombre fantasia</th>
                  <th>Telefono</th>
                  <th>Email</th>
                  <th>Provincia</th>
                  <th>Canton</th>
                  <th>Distrito</th>
                  <th>Barrio</th>
                  <th>Otras señas</th>
                </tr>
                </thead>

                <tbody>

                <?php
                    $controller = new Controller();
                    $controller->mostrarClientesController();
                ?>

                </tbody>

                <!-- <tfoot>
                <tr>
                  <th>Identificacion</th>
                  <th>Tipo de identificacion</th>
                  <th>Nombre completo</th>
                  <th>Nombre fantasia</th>
                  <th>Telefono</th>
                  <th>Email</th>
                  <th>Provincia</th>
                  <th>Canton</th>
                  <th>Distrito</th>
                  <th>Barrio</th>
                  <th>Otras señas</th>
                </tr>
                </tfoot> -->

              </table>

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

<?php
    $controller = new Controller();
    $controller->crearNuevoClienteController();
?>