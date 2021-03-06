<?php
    include "views/dashboard/modules/header.php";
?>

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
        <li><a href="">Usuarios</a></li>
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
              <button type="button" id="buttonNuevoCliente" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
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

                    <form method="post" id="nuevoClientForm">
                    
                        <div class="modal-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <label>Tipo</label>
                                            <select class="form-control select2" style="width: 100%;" id="registroCliente_tipoID">
                                                <option value="0" selected="selected">Seleccione una opción</option>
                                                <option value="1">Físca</option>
                                                <option value="2">Jurídica</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-9">
                                            <label>Identificacion</label>
                                            <input type="text" class="form-control" id="registroCliente_identificacion" placeholder="1-11 ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>Nombre completo</label>
                                            <input type="text" class="form-control" id="registroCliente_nombre" placeholder="Nombre ...">
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Nombre fantasia</label>
                                            <input type="text" class="form-control" id="registroCliente_nombrefantasia" placeholder="Fantasia ...">
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
                                                <input type="text" class="form-control" id="registroCliente_telefono" placeholder="#">
                                            </div>   
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Email</label>
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                                <input type="text" class="form-control" id="registroCliente_email" placeholder="Email ...">
                                            </div> 
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label>Provincia</label>
                                            <select class="form-control select2" style="width: 100%;" id="registroCliente_provincia" onChange="getCantones(this.value)">
                                                <option value="0" selected="selected">Seleccione una opción</option>      
                                            </select>
                                        </div>
                                        <div class="col-xs-4">
                                            <label>Canton</label>
                                            <select class="form-control select2" style="width: 100%;" id="registroCliente_canton" onChange="getDistritos(this.value)">
                                                <option value="0" selected="selected">Seleccione una opción</option>
                                                <section "mostrarCantones"></section>                                
                                            </select>
                                        </div>
                                        <div class="col-xs-4">
                                            <label>Distrito</label>
                                            <select class="form-control select2" style="width: 100%;" id="registroCliente_distrito">
                                                <option value="0" selected="selected">Seleccione una opción</option>      
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label>Barrio</label>
                                            <input type="text" class="form-control" id="registroCliente_barrio" placeholder="Barrio ...">
                                        </div>
                                        <div class="col-xs-8">
                                            <label>Otras señas</label>
                                            <textarea class="form-control" rows="1" id="registroCliente_direccion" placeholder="Direccion ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                            <button type="submit" id="buttonNewClientSaveChanges" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    
                    </form>
                
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            

            <div class="modal fade" id="modal-editarCliente">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Editar cliente</h4>
                    </div>

                    <form method="post" id="editarClienteForm">
                    
                        <div class="modal-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <label>Tipo</label>
                                            <select class="form-control select2" style="width: 100%;" id="editarCliente_tipoID">
                                                <option value="0" selected="selected">Seleccione una opción</option>
                                                <option value="1">Física</option>
                                                <option value="2">Jurídica</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-9">
                                            <label>Identificacion</label>
                                            <input type="text" class="form-control" id="editarCliente_identificacion" placeholder="1-11 ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>Nombre completo</label>
                                            <input type="text" class="form-control" id="editarCliente_nombre" placeholder="Nombre ...">
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Nombre fantasia</label>
                                            <input type="text" class="form-control" id="editarCliente_nombrefantasia" placeholder="Fantasia ...">
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
                                                <input type="text" class="form-control" id="editarCliente_telefono" placeholder="#">
                                            </div>   
                                        </div>
                                        <div class="col-xs-6">
                                            <label>Email</label>
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                                <input type="text" class="form-control" id="editarCliente_email" placeholder="Email ...">
                                            </div> 
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label>Provincia</label>
                                            <select class="form-control select2" style="width: 100%;" id="editarCliente_provincia" onChange="getCantonesEditar(this.value)">
                                                <option value="0" selected="selected">Seleccione una opción</option>      
                                            </select>
                                        </div>
                                        <div class="col-xs-4">
                                            <label>Canton</label>
                                            <select class="form-control select2" style="width: 100%;" id="editarCliente_canton" onChange="getDistritosEditar(this.value)">
                                                <option value="0" selected="selected">Seleccione una opción</option>
                                                <section "mostrarCantones"></section>                                
                                            </select>
                                        </div>
                                        <div class="col-xs-4">
                                            <label>Distrito</label>
                                            <select class="form-control select2" style="width: 100%;" id="editarCliente_distrito">
                                                <option value="0" selected="selected">Seleccione una opción</option>      
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label>Barrio</label>
                                            <input type="text" class="form-control" id="editarCliente_barrio" placeholder="Barrio ...">
                                        </div>
                                        <div class="col-xs-8">
                                            <label>Otras señas</label>
                                            <textarea class="form-control" rows="1" id="editarCliente_direccion" placeholder="Direccion ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                            <button type="submit" id="botonGuardarCambiosEditarCliente" class="btn btn-primary">Guardar cambios</button>
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
                  <th>Tipo</th>
                  <th>Nombre</th>
                  <th>Nombre Fantasia</th>
                  <th>Telefono</th>
                  <th>Email</th>
                  <th>Provincia</th>
                  <th>Canton</th>
                  <th>Distrito</th>
                  <th>Barrio</th>
                  <th>Otras señas</th>
                  <th>Acciones</th>
                </tr>
                </thead>

                <tbody id="clientsTableBody">

                    <?php 
                        $controller = new Controller;
                        $controller->getClientsController();
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
    include ("views/dashboard/modules/footer.php");
?>