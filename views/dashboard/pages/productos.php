<?php
    include "views/dashboard/modules/header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Productos
        <!-- <small>Algo aqui</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="">Articulos</a></li>
        <li class="active"> Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Productos</h3> -->
              <button type="button" id="buttonAgregarProducto" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Agregar nuevo producto
              </button>
            </div>


            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Nuevo producto</h4>
                    </div>

                    <form class="form-horizontal" method="post" id="nuevoProductoForm">
                    
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Codigo</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Codigo de Producto" id="nuevoProducto_codigo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" rows="2" id="nuevoProducto_nombre" placeholder="Nombre del Producto"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Impuesto</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="%" id="nuevoProducto_impuesto">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Precio Compra</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="₡" id="nuevoProducto_precioCompra">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Precio Venta</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="₡" id="nuevoProducto_precioVenta">
                            </div>
                        </div>

   
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                            <button type="submit" id="buttonAgregarProductoSaveChanges" class="btn btn-primary">Guardar cambios</button>
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
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Impuesto</th>
                  <th>Precio Compra</th>
                  <th>Precio Venta</th>
                </tr>
                </thead>

                <tbody id="productosTableBody">

                    <?php 
                        $controller = new Controller;
                        // $controller->getClientsController();
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