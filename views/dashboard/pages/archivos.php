<?php
    include "views/dashboard/modules/header.php";
?>

<form method="post">
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

              <div class="picture-container fileinput fileinput-new" data-provides="fileinput" title="Subir archivo">
                <span class="material-input" id="loader_photo"></span>
                <div class="btn-file">
                  <div class="fileinput-new thumbnail">
                    <img src="img/placeholder.jpg" class="picture-src" id="photoPreview" />
                  </div>
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail">
                  <img src="img/placeholder.jpg" class="picture-src" id="photoPreview2" name="photoPreview2"/>
                </div>
                <input type="file" id="file" name="file" accept="image/*" onChange="upload_image();"/>
                <input type="hidden" id="file2" name="file2" value=""/>
              </div>

        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</form>

<?php
    include ("views/dashboard/modules/footer.php");
?>