<?= $this->extend('layouts/board/index') ?>
<?= $this->section('content'); ?>

<div class="row">
	<div class="col-sm-12">
		<div class="card card-default color-palette-box">
			<div class="card-header">
				<h2 class="card-title">
					<?= isset($aCompanyData['id']) ? "Update" : "Add"; ?> Company
				</h2>
			</div>
			<form id="fCompanyDetails" method="post" action="<?= site_url($panel . '/companies/add') ?>">
				<div class="card-body">
					<div class="row">
						<input type="hidden" name="company_id" value="<?= isset($aCompanyData['id'])?$aCompanyData['id']:''?>" >
						<div class="col-sm-4"> 
							<div class="form-group">
								<label for="company_name">Company name <span style="color: red;">*</span></label>
								<input type="text" name="company_name" class="form-control" id="company_name" placeholder="Enter company name" value="<?= isset($aCompanyData['id']) ? $aCompanyData['company_name'] : '' ?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="address">Address <span style="color: red;">*</span></label>
								<input type="text" name="address" class="form-control" id="address" placeholder="Enter address" value="<?= isset($aCompanyData['id']) ? $aCompanyData['address'] : '' ?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="company_gstin">GSTIN <span style="color: red;">*</span></label>
								<input type="text" name="company_gstin" class="form-control" id="company_gstin" placeholder="Enter company GSTIN." value="<?= isset($aCompanyData['id']) ? $aCompanyData['company_gstin'] : '' ?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="city">City <span style="color: red;">*</span></label>
								<input type="text" name="city" class="form-control" id="city" placeholder="Enter city." value="<?= isset($aCompanyData['id']) ? $aCompanyData['city'] : '' ?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="state">State <span style="color: red;">*</span></label>
								<input type="text" name="state" class="form-control" id="state" placeholder="Enter state." value="<?= isset($aCompanyData['id']) ? $aCompanyData['state'] : '' ?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="zipcode">Zipcode <span style="color: red;">*</span></label>
								<input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="Enter zipcode." value="<?= isset($aCompanyData['id']) ? $aCompanyData['zipcode'] : '' ?>">
							</div>
						</div>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('extra_script'); ?>
<?= view('company/validation');  ?>
<?= $this->endSection(); ?>