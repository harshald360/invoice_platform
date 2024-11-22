<?= $this->extend('layouts/board/index') ?>
<?= $this->section('content') ?>
<div class="card card-default color-palette-box">
	<div class="card-header">
		<h2 class="card-title">
			<strong>Dashboard</strong>
		</h2>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-4">
				<div class="card diff-section-card action-active">
					<!-- action-active -->
					<div class="card-header border-0">
						<h1 class="card-title"><strong>Invoices</strong></h1><br><br>
						<p class="mb-0">Effortlessly create and share professional invoices to clients via Email and WhatsApp.</p>
					</div>
					<div class="card-body bg-none">
						<div class="invoice-action-section text-center">
							<img src="<?= base_url("public") ?>/images/dashboard/create-invoice.png" alt="">
						</div>
						<a href="<?= site_url($panel.'/invoice') ?>"><button class="btn  btn-block action-btn"><i class="nav-icon fas fa-plus"></i> Create New Invoice</button></a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card diff-section-card">
					<div class="card-header border-0">
						<h3 class="card-title"><strong>Quotation</strong></h3><br><br>
						<p class="mb-0">Seal the deal with customised quotations and win over potential clients.</p>
					</div>
					<div class="card-body bg-none">
						<div class="quotation-action-section text-center">
							<img src="<?= base_url("public") ?>/images/dashboard/create-invoice.png" alt="">
						</div>
						<a href="#"><button class="btn  btn-block action-btn"><i class="nav-icon fas fa-plus"></i> Create New Quotation</button></a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card diff-section-card">
					<div class="card-header border-0">
						<h3 class="card-title"><strong>Expenses</strong></h3><br><br>
						<p class="mb-0">Seal the deal with customised quotations and win over potential clients.</p>
					</div>
					<div class="card-body bg-none">
						<div class="expenses-action-section text-center">
							<img src="<?= base_url("public") ?>/images/dashboard/create-invoice.png" alt="">
						</div>
						<a href="#"><button class="btn  btn-block action-btn"><i class="nav-icon fas fa-plus"></i> Create New Expenses</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extra_script') ?>
<script>
	$(document).ready(function() {
		$('.diff-section-card').on('click', function() {
			$('.diff-section-card').removeClass('action-active');
			$(this).addClass('action-active');
		});
	});
</script>
<?= $this->endSection() ?>