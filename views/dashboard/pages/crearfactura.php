<?php
    include "views/dashboard/modules/header.php";
?>

<form method="POST" id="crearFacturaForm"></form>
<form method="post" id="addProductForm"></form>
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
        <label>Identificacion del cliente</label>
        <input type="text" id="nuevaFacturaCliente" class="form-control" placeholder="#">
      </div>
     
      <div class="form-group">
        <label>Codigo del producto</label>
        <input type="text" id="codProducto" class="form-control" placeholder="#">
      </div>
      <button type="submit" class="btn btn-primary" form="addProductForm">Anadir producto</button>

      <div class="box-body">
      <table id="nuevaFacturaTablaProductos" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Cantidad</th>
          <th>Descripcion</th>
          <th>Codigo</th>
          <th>Subtotal</th>
          <th>Acciones</th>
        </tr>
        </thead>

        <tbody id="nuevaFacturaCuerpoTablaProductos">

        </tbody>

      </table>
      </div>

      
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <!-- <form method="POST"> -->
          <button  class="btn btn-primary pull-right" onclick="guardarFactura()" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Guardar e imprimir
          </button>
        </div>
      </div>
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->

<?php
    include ("views/dashboard/modules/footer.php");
?>