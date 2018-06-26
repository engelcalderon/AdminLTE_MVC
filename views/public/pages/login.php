<?php
    include "views/public/modules/header.php";
?>

<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo URL; ?>authentication/login"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <!-- <?php
      if (!empty($this->data["error"])) {
        echo $this->data["error"];
      }
    ?> -->

    <div id="loginErrorBox" class="callout callout-danger" style="display:none;">
      <h4>Error!</h4>
      <p id="loginErrorMessage">User or password does not match</p>
    </div>

    <form method="post" id="loginForm">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" id="loginEmail">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" id="loginPassword"> 
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="#">I forgot my password</a><br>
    <a href="<?php echo URL; ?>register" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php
    include "views/public/modules/footer.php";
?>