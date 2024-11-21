<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title><?= $_ENV['PROJECT_NAME']; ?> | Dashboard</title>

  	<!-- Google Font: Source Sans Pro -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/fontawesome-free/css/all.min.css">
  	<!-- iCheck -->
  	<link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="<?= base_url('public'); ?>/dist/css/adminlte.min.css">
  	<!-- overlayScrollbars -->
  	<link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  	<!-- Daterange picker -->
  	<link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/daterangepicker/daterangepicker.css">
  	<!-- Toastr -->
  	<link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/toastr/toastr.min.css">
  	<!-- Select2 -->
  	<link rel="stylesheet" href="<?= base_url('public'); ?>/plugins/select2/css/select2.min.css">
  	<style type="text/css">
	  	#toolbarContainer{
	  		display: none;
	  	}
	  	ul.pagination > li > a{
	      	padding: 0.25rem 0.5rem;
	        font-size: .875rem;
	        line-height: 1.5;
	        position: relative;
	        display: block;
	        margin-left: -1px;
	        color: #000000;
	        border: 1px solid #6a6c6e;
	        font-style: bold;
	    }
	    ul.pagination > li.active > a{
	        color: #ffffff;
	        background: #893E2D;
	    }
	    ul.pagination > li > a:not(.btn):hover {
	        color: #893E2D;
	    }
	    ul.pagination > li.active > a:not(.btn):hover {
	        color: #ffffff;
	    }
	    .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--single .select2-selection__arrow{
	    	height: 38px !important;
	    }
	    .select2-container--default .select2-selection--single .select2-selection__rendered{
	    	line-height: 26px !important;
	    }
	</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">