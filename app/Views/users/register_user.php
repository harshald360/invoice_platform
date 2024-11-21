<?= $this->extend('layouts/board/index') ?>
<?= $this->section('content'); ?>

<?php $aUserDetails = session()->getFlashdata('aUserDetails'); ?>
<div class="row">
	<div class="col-sm-12">
		<div class="card card-default color-palette-box">
			<div class="card-header">
				<h2 class="card-title">
					User Profile
				</h2>
			</div>
			<form id="fUpdateUserProfile" method="post" action="<?= site_url($panel.'/users/add') ?>">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<?= csrf_field() ?>
								<label for="user_role">Role <span style="color: red;">*</span></label>
								<select name="user_role" class="form-control" id="user_role">
									<option value="">Please select role</option>
									<?php foreach ($aUserRoles as $role) { ?>
										<option value="<?= $role['id']; ?>" <?= isset($aUserDetails['user_role']) && $aUserDetails['user_role'] == $role['id'] ? 'selected' : '' ?>><?= $role['user_role']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="user_name">Name <span style="color: red;">*</span></label>
								<input type="text" name="user_name" class="form-control" id="user_name" placeholder="Enter Name" value="<?= isset($aUserDetails['user_mobile']) ? $aUserDetails['user_name'] : '' ?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="user_email">Email <span style="color: red;">*</span></label>
								<input type="email" name="user_email" class="form-control" id="user_email" placeholder="Enter email" value="<?= isset($aUserDetails['user_mobile']) ? $aUserDetails['user_email'] : '' ?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="user_mobile">Mobile </label>
								<input type="number" name="user_mobile" class="form-control" id="user_mobile" placeholder="Enter Mobile No." value="<?= isset($aUserDetails['user_mobile']) ? $aUserDetails['user_mobile'] : '' ?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="change_user_id">Password <span style="color: red;">*</span></label>
								<input type="password" name="user_password" class="form-control" id="user_password" placeholder="Enter password">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="user_confirm_password"> Confirm Password <span style="color: red;">*</span></label>
								<input type="password" name="user_confirm_password" class="form-control" id="user_confirm_password" placeholder="Retype Password">
							</div>
						</div>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Update Profile</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('extra_script'); ?>
	<?= view('users/validation');  ?>
<?= $this->endSection(); ?>