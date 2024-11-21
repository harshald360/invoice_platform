<?= $this->extend('layouts/board/index') ?>
<?= $this->section('content'); ?>
<div class="row">
	<div class="col-sm-8">
		<div class="card card-default color-palette-box">
			<div class="card-header">
				<h2 class="card-title">
					User Profile
				</h2>
			</div>
			<form id="fUpdateUserProfile" method="post" action="<?= site_url($panel.'/users/update') ?>">
				<div class="card-body">
					<div class="row">
						<?= csrf_field() ?>
						<div class="col-sm-6 <?= session()->get('role_id') != 1 ? 'd-none' : ''; ?>">
							<div class="form-group">
								<label for="user_role">Role <span style="color: red;">*</span></label>
								<select name="user_role" class="form-control" id="user_role">
									<option value="">Please select role</option>
									<?php foreach ($aUserRoles as $role) { ?>
										<option value="<?= $role['id']; ?>" <?= isset($aUserData['user_role']) && $aUserData['user_role'] == $role['id'] ? 'selected' : '' ?>><?= $role['user_role']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="user_name">Name <span style="color: red;">*</span></label>
								<input type="hidden" name="user_id" class="form-control" id="user_id" value="<?= $aUserData['id']; ?>">
								<input type="text" name="user_name" class="form-control" id="user_name" placeholder="Enter Name" value="<?= $aUserData['user_name']; ?>">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="user_email">Email <span style="color: red;">*</span></label>
								<input type="email" name="user_email" class="form-control" id="user_email" placeholder="Enter email" value="<?= $aUserData['user_email']; ?>" <?= session()->get('role_id') != 1 ? "disabled" : ""; ?>>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="user_mobile">Mobile</label>
								<input type="number" name="user_mobile" class="form-control" id="user_mobile" placeholder="Enter Mobile No." value="<?= $aUserData['user_mobile']; ?>">
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
	<div class="col-sm-4">
		<div class="card card-default color-palette-box">
			<div class="card-header">
				<h2 class="card-title">
					Password
				</h2>
			</div>
			<form id="fUpdateUserPassword" method="post" action="<?= site_url($panel.'/users/change-password') ?>">
				<div class="card-body">
					<div class="form-group">
						<label for="change_user_id">New Password</label>
						<input type="hidden" name="user_id" class="form-control" id="change_user_id" value="<?= $aUserData['id']; ?>">
						<input type="password" name="user_password" class="form-control" id="user_password" placeholder="Enter password">
					</div>
					<div class="form-group">
						<label for="user_confirm_password"> Confirm Password</label>
						<input type="password" name="user_confirm_password" class="form-control" id="user_confirm_password" placeholder="Retype Password">
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Update Password</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('extra_script'); ?>
	<?= view('users/validation');  ?>
<?= $this->endSection(); ?>