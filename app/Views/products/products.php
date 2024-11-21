<?= $this->extend('layouts/board/index') ?>
<?= $this->section('content') ?>
<div class="card card-default color-palette-box">
	<div class="card-header">
		<h2 class="card-title">
			<?= ucfirst($action) ?> Product
		</h2>
	</div>
	<form id="fAddProducts" method="post" action="<?= site_url($panel.'/products/'.$action); ?>">
		<div class="card-body">
			<div class="row">
				<?= csrf_field() ?>
				<input type="hidden" name="product_id" class="form-control" id="product_id" placeholder="Enter product name" value="<?= isset($aProductData) && !empty($aProductData) ? $aProductData['id'] : ''; ?>">
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4">
					<div class="form-group">
						<label for="product_category">Product Category <span style="color: red;">*</span></label>
						<select id="product_category" name="product_category" class="form-control" style="width: 100%;" onchange="getSubCategoriesByCategory(this.value)">
				            <option value=""> -- select an or enter name -- </option>
				            <?php foreach ($aProductCategories as $category) {?>
				            	<option value="<?= $category['product_category'] ?>" <?= isset($aProductData) && $aProductData['product_category'] == $category['product_category'] ? 'selected' : ''; ?>><?= $category['product_category'] ?></option>
				        	<?php } ?>
				        </select>
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4">
					<div class="form-group">
						<label for="product_subcategory">Product Sub Category </label>
						<select id="product_subcategory" name="product_subcategory" class="form-control" style="width: 100%;" onchange="getBrandsBySubCategory(this.value)">
				            <option value=""> -- select an or enter name -- </option>
				            <?php if (isset($aProductSubCategories)) {
	                            foreach ($aProductSubCategories as $subCategory) {?>
	                                <option value="<?= $subCategory['product_subcategory'] ?>" <?= isset($aProductData) && $aProductData['product_subcategory'] == $subCategory['product_subcategory'] ? 'selected' : ''; ?>>
	                                    <?= $subCategory['product_subcategory'] ?>
	                                </option>
	                            <?php }
	                        } ?>
				        </select>
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4">
					<div class="form-group">
						<label for="product_brand">Product Brand <span style="color: red;">*</span></label>
						<select id="product_brand" name="product_brand" class="form-control" style="width: 100%;">
				            <option value=""> -- select an or enter name -- </option>
				            <?php if (isset($aProductBrands)) {
	                            foreach ($aProductBrands as $brand) {?>
	                                <option value="<?= $brand['product_brand'] ?>" <?= isset($aProductData) && $aProductData['product_brand'] == $brand['product_brand'] ? 'selected' : ''; ?>>
	                                    <?= $brand['product_brand'] ?>
	                                </option>
	                            <?php }
	                        } ?>
				        </select>
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4">
					<div class="form-group">
						<label for="product_name">Product Name <span style="color: red;">*</span></label>
						<input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter product name" value="<?= isset($aProductData) && !empty($aProductData) ? $aProductData['product_name'] : ''; ?>">
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4 d-none">
					<div class="form-group">
						<label for="product_starting_price">Starting Price ( In $ ) <span style="color: red;">*</span></label>
						<input type="number" name="product_starting_price" class="form-control" id="product_starting_price" placeholder="Enter starting price" value="<?= isset($aProductData) && !empty($aProductData) ? $aProductData['starting_price'] : ''; ?>">
					</div>
				</div>
			</div>
		</div>
		<!-- /.card-body -->
		<div class="card-footer">
			<button type="submit" class="btn btn-primary"><?= ucfirst($action) ?></button>
		</div>
	</form>
</div>
<?= $this->endSection() ?>
<?= $this->section('extra_script') ?>
	<script type="text/javascript">
		$(document).ready(function() {
            $('#product_category, #product_subcategory, #product_brand').select2({
                tags: true,
                placeholder: "-- select an or enter name --",
                allowClear: true,
                createTag: function (params) {
                    return {
                        id: params.term,
                        text: params.term,
                        newOption: true
                    };
                }
            }).on('select2:select', function (e) {
                if (e.params.data.newOption) {
                    console.log("New custom option selected: " + e.params.data.text);
                }
            });
	    });
	</script>
	<?= view('products/filter_categories'); ?>
	<?= view('products/validation'); ?>
<?= $this->endSection() ?>