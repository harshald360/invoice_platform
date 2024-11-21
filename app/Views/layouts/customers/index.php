<?php 
    helper('EncryptionHelper');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <title><?= $_ENV['PROJECT_NAME']; ?> | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('public'); ?>/dist/css/cust_adminlte.min.css?v=<?= time(); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/toastr/toastr.min.css?v=<?= time(); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/summernote/summernote-bs4.min.css">
    <style type="text/css">
        #toolbarContainer{
            display: none;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <?= view('common/customers/topbar'); ?>
    <?= view('common/customers/sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         <?= $this->renderSection('content') ?>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?= view('common/board/footer'); ?>
    <?= $this->renderSection('extra_script'); ?>
</body>
</html>
