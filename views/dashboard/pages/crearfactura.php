<?php
    include "views/dashboard/modules/header.php";
    require "controllers/pdfController.php";
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <h1>
        Facturar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Facturacion</a></li>
        <li class="active">Crear nueva factura</li>
      </ol>
    </div>

    <!-- Main content -->
    <div class="invoice">

      <div class="form-group">
        <label>Codigo del producto</label>
        <input type="text" class="form-control" placeholder="123 ...">
      </div>
      <form method="post">
      <button type="submit" name="addProduct" class="btn btn-primary">Anadir producto</button>
      </form>

      <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Cantidad</th>
          <th>Descripcion</th>
          <th>Codigo</th>
          <th>Subtotal</th>
        </tr>
        </thead>

        <tbody id="productosTableBody">

            <?php
                $arrayProductos = [];
                array_push($arrayProductos, 123, 345);
                foreach($arrayProductos as $producto) {
                  echo "
                  <tr>
                    <td>".$producto."</td>
                  </tr>
                    ";
                }
                 
                // $controller = new Controller;
                // $controller->getProductsController();
            ?>

        </tbody>

      </table>
      </div>

      
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <form method="POST">
          <button type="submit" name="generar" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Guardar e imprimir
          </button>
          </form>
        </div>
      </div>
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->

<?php
    include ("views/dashboard/modules/footer.php");

    // $pdfController = new PDFController;
    // $pdfController->convertHTMLToPDF();
?>