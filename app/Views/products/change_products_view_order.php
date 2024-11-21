<?= $this->extend('layouts/board/index') ?>
<?= $this->section('content') ?>

<div class="card card-default color-palette-box">
	<div class="card-header">
		<h2 class="card-title">Products View Sequence No</h2>
		<div class="card-tools">
			
		</div>
	</div>
	<form id="productForm" method="post" action="<?= site_url($panel.'/products/sequence/update'); ?>" onsubmit="return validateForm();">
	<div class="card-body table-responsive p-0" id="fProductDetails">
		<table class="table table-bordered text-nowrap">
		    <thead>
		        <tr>
		            <th class="text-center">ID</th>
		            <th>Category</th>
		            <th>Product Sequence No</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php $i=1; foreach ($aProductCategories as $category): ?>
			    	<tr>
			    		<td class="align-middle text-center"><?= $i++ ?></td>
			    		<td class="align-middle"><?= $category['product_category']; ?></td>
			    		<td class="align-middle" style="padding: 0 !important;">
			    			<input type="number" name="category_sequence_no[]" min="1" max="<?= count($aProductCategories) ?>" class="form-control" placeholder="please enter product sequence view no." style="border: none !important;" value="<?= $category['sequence_no']; ?>">
			    			<input type="hidden" name="category_name[]" class="form-control" placeholder="please enter sequence order no." value="<?= $category['product_category']; ?>">
			    		</td>
			    	</tr>
		    	<?php endforeach ?>
		    </tbody>
		</table>
	</div>
	<div class="card-footer  clearfix">
		<button type="submit" class="btn btn-primary">Sequence No.</button>		
	</div>	
	</form>
	<!-- /.card-body -->
</div>
<?= $this->endSection() ?>
<?= $this->section('extra_script') ?>	
	<script type="text/javascript">
		function validateForm() {
		    var inputs = document.getElementsByName('category_sequence_no[]');
		    var values = [];
		    var isValid = true;
		    var duplicate = false;
		    
		    for (var i = 0; i < inputs.length; i++) {
		        var value = inputs[i].value.trim();
		        if (value === '') {
		            toastr.error('Product Sequence No must not be empty.');
		            isValid = false;
		            break;
		        }
		        if (values.includes(value)) {
		            duplicate = true;
		            isValid = false;
		            break;
		        }
		        values.push(value);
		    }

		    if (duplicate) {
		        toastr.error('Product Sequence No must not have duplicate values.');
		    }

		    return isValid;
		}
	</script>
<?= $this->endSection() ?>