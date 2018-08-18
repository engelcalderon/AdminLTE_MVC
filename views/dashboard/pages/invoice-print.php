    <?php
      $idFactura = $_COOKIE["factura"];
      $controller = new Controller;

      $datosProductos =  $controller->getFacturaProductos($idFactura);
      $facturaDetalles = $controller->getFacturaDetalles($idFactura);
    ?>
    <!-- Main content -->
    <div class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i>Frederick Calderon.
            <!-- <small class="pull-right">Fecha: 2/10/2014</small> -->
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">

        <div class="col-sm-4 invoice-col">
          Cliente
          <address>
            <strong><?php echo $facturaDetalles["cliente"];?></strong><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Factura: #<?php echo $_COOKIE["factura"]?></b>
        </div>
        <br>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive" style="background: gray;">
          <table class="table table-striped" style="">
            <thead>
            <tr>
              <th>Cantidad</th>
              <th>Descripcion</th>
              <th>Codigo</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>

              <?php
                echo $datosProductos["tabla"];
              ?>

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <br>

        <div class="col-xs-6">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Total:</th>
                <td>CRC <?php echo $datosProductos["total"];?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->

    </div>

