<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="" type="image/x-icon">
  <title><?= $_ENV['PROJECT_NAME']; ?> | Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('public'); ?>/dist/css/adminlte.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/toastr/toastr.min.css">
  <style type="text/css">
    #toolbarContainer {
      display: none;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="<?= site_url('/'); ?>" target="_blank" class="h1">
          <!-- <img src="" class="l-light" alt="Invoice Generation" style="width:100%;"> -->
          <h3>Invoice Generation</h3>
        </a>
      </div>
      <div class="card-body">
        <form id="loginForm" action="<?= site_url($panel . '/authenticate-user'); ?>" method="post">
          <?= csrf_field() ?>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="user_email" value="<?= session()->getFlashdata('email_id'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" id="password" name="user_password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <br>
        <p class="mb-1">
          <a href="#">I forgot my password</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url('public'); ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('public'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('public'); ?>/dist/js/adminlte.min.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url('public'); ?>/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
    async function hashPassword(password) {
      const encoder = new TextEncoder();
      const data = encoder.encode(password);
      const hash = await crypto.subtle.digest('SHA-256', data);
      return Array.from(new Uint8Array(hash)).map(b => b.toString(16).padStart(2, '0')).join('');
    }

    $(document).ready(function() {

      <?php if ($toaster['code'] == 200) { ?>
        toastr.success('<?php echo $toaster['message'] ?>');
      <?php } else if ($toaster['code'] == 300) { ?>
        toastr.info('<?php echo $toaster['message'] ?>');
      <?php } else if ($toaster['code'] == 401 || $toaster['code'] == 404 || $toaster['code'] == 403) { ?>
        toastr.error('<?php echo $toaster['message'] ?>');
      <?php } ?>
    });
  </script>
</body>

</html>