<!-- /.content-wrapper -->
<footer class="main-footer <?= $panel == 'customers' ? "d-none" : "" ?>">
  <strong>Copyright &copy; <?= date('Y') . " - " . date('Y', strtotime('+1 year')); ?> <a href="<?= site_url('/'); ?>"><?= $_ENV['PROJECT_NAME']; ?></a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
  </div>
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('public'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('public'); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('public'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('public'); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('public'); ?>/dist/js/adminlte.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url('public'); ?>/plugins/toastr/toastr.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url('public'); ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url('public'); ?>/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('public'); ?>/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('public'); ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('public'); ?>/plugins/summernote/summernote-bs4.min.js"></script>

<script src="<?php echo base_url() ?>/public/assets/js/custom.js"></script>
<script type="text/javascript">
  <?php if ($toaster['code'] == 200) { ?>
    toastr.success('<?php echo $toaster['message'] ?>');
  <?php } else if ($toaster['code'] == 300) { ?>
    toastr.info('<?php echo $toaster['message'] ?>');
  <?php } else if ($toaster['code'] == 401 || $toaster['code'] == 404 || $toaster['code'] == 403) { ?>
    toastr.error('<?php echo $toaster['message'] ?>');
  <?php } ?>

  <?php if ($menu) { ?>
    $("#active_<?php echo $menu ?>").removeClass().addClass('nav-link active');
    $("#<?php echo $menu ?>").removeClass().addClass('nav-item menu-open');
    $("#<?php echo $submenu ?>").removeClass().addClass('nav-link active');
  <?php } ?>
</script>