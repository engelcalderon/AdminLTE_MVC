<?php
    include "views/dashboard/modules/header.php";
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <h1>
        Facturas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Facturacion</a></li>
        <li class="active">Mostrar Facturas</li>
      </ol>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Clientes</h3> -->
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th># Factura</th>
                  <th>Cliente</th>
                  <th>Acciones</th>
                </tr>
                </thead>

                <tbody id="clientsTableBody">

                    <?php 
                        $controller = new Controller;
                        $controller->getFacturasController();
                    ?>

                </tbody>

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