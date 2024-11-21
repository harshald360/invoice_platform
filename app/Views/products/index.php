<?= $this->extend('layouts/board/index') ?>
<?= $this->section('content') ?>
<div class="card card-default color-palette-box">
	<div class="card-header">
		<h2 class="card-title">Products</h2>
		<div class="card-tools">
			<a href="<?= site_url($panel . '/products/new'); ?>">
				<button type="button" class="btn btn-default btn-sm">
					<i class="fas fa-plus"> </i> &nbsp New Product
				</button>
			</a>
		</div>
	</div>
	<div class="card-header">
		<br>
		<div class="card-tools">
			<div class="input-group input-group-sm" style="width: 250px;">
				<input type="text" name="table_search" class="form-control float-right" placeholder="search product" id="searchInput">
				<div class="input-group-append">
					<button type="submit" class="btn btn-default" id="searchButton">
						<i class="fas fa-search"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body table-responsive p-0" id="fProductDetails">

	</div>
	<!-- /.card-body -->
	<div class="card-footer clearfix" id="fProductPagination">

	</div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extra_script') ?>
<?= view('products/filter_categories'); ?>
<?= view('products/filter_product_list'); ?>
<?= $this->endSection() ?>