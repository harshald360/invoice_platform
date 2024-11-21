<?= $this->extend('layouts/board/index') ?>
<?= $this->section('content') ?>
<div class="card card-default color-palette-box">
	<div class="card-header">
		<h2 class="card-title">
			Configuration Details
		</h2>
	</div>
	<form id="fAddConfiguration" method="post" action="<?= site_url($panel.'/masters/config/update'); ?>">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4">
					<div class="form-group">
						<?= csrf_field() ?>
						<label for="max_accetpted_month">Purchase Dates: Past X Days <span style="color: red;">*</span></label>
						<input type="number" name="max_accetpted_month" min="1" class="form-control" id="max_accetpted_month" placeholder="Please enter the days where we can accept" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['max_accetpted_month'] : '90'; ?>">
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4 ">
					<div class="form-group">
						<label for="min_acceepted_msrp">Min MSRP ( In $ ) <span style="color: red;">*</span></label>
						<input type="text" name="min_acceepted_msrp" class="form-control" id="min_acceepted_msrp" placeholder="Please enter the min MSRP" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['min_acceepted_msrp'] : '300'; ?>">
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4 ">
					<div class="form-group">
						<label for="file_upload_limit">Upload Limits ( In MB ) <span style="color: red;">*</span></label>
						<input type="number" name="file_upload_limit" class="form-control" id="file_upload_limit" min="1" placeholder="Please enter the file upload limit" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['file_upload_limit'] : '2'; ?>">
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4 ">
                    <div class="form-group">
                        <label for="expiry_reminder">Warranty Expiry Reminder ( Days )<span style="color: red;">*</span></label>
                        <input type="number" name="expiry_reminder" class="form-control" id="expiry_reminder" min="1" max="60" placeholder="Enter the number of days until warranty expiration." value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['warranty_exp_reminder'] : '60'; ?>">
                    </div>
                </div>
			</div>
			<?php if(session()->get('role_id') == 1){ ?>
			<h5 class="mt-4 mb-2">Email Configuration</h5>
			<hr>
			<div class="row">
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4">
					<div class="form-group">
						<label for="smtp_host">SMTP Host <span style="color: red;">*</span></label>
						<input type="text" name="smtp_host" class="form-control" id="smtp_host" placeholder="Please enter the host name" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['smtp_host'] : ''; ?>">
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4 ">
					<div class="form-group">
						<label for="smtp_user">SMTP User <span style="color: red;">*</span></label>
						<input type="text" name="smtp_user" class="form-control" id="smtp_user" placeholder="Please enter the user name" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['smtp_user'] : ''; ?>">
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4 ">
					<div class="form-group">
						<label for="smtp_password">SMTP Password <span style="color: red;">*</span></label>
						<input type="text" name="smtp_password" class="form-control" id="smtp_password" placeholder="Please enter the user password" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['smtp_password'] : ''; ?>">
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4 ">
					<div class="form-group">
						<label for="email_protocol">Email Protocol <span style="color: red;">*</span></label>
						<input type="text" name="email_protocol" class="form-control" id="email_protocol" placeholder="Please enter the email protocol" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['email_protocol'] : ''; ?>">
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4 ">
					<div class="form-group">
						<label for="smtp_port">SMTP Port <span style="color: red;">*</span></label>
						<input type="number" name="smtp_port" class="form-control" id="smtp_port" min="1" placeholder="Please enter the smtp port number" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['smtp_port'] : ''; ?>">
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4 ">
					<div class="form-group">
						<label for="smtp_crypto_type">SMTP Crpto Type <span style="color: red;">*</span></label>
						<input type="text" name="smtp_crypto_type" class="form-control" id="smtp_crypto_type" placeholder="Please enter the crypto type" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['smtp_crypto_type'] : ''; ?>">
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4 ">
					<div class="form-group">
						<label for="mail_from">Mail From <span style="color: red;">*</span></label>
						<input type="email" name="mail_from" class="form-control" id="mail_from" placeholder="Please enter the mail send from" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['mail_from'] : ''; ?>">
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4 ">
					<div class="form-group">
						<label for="mail_to">Mail To <span style="color: red;">*</span></label>
						<input type="email" name="mail_to" class="form-control" id="mail_to" placeholder="Please enter the mail send to" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['mail_to'] : ''; ?>">
					</div>
				</div>
			</div>
			<h5 class="mt-4 mb-2">Stripe Payment Gateway Configuration</h5>
			<hr>
			<div class="row">
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4">
					<div class="form-group">
						<label for="stripe_secret_key">Secret Key </label>
						<input type="text" name="stripe_secret_key" class="form-control" id="stripe_secret_key" placeholder="Please enter the stripe secret key" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['stripe_secret_key'] : ''; ?>">
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4 ">
					<div class="form-group">
						<label for="stripe_publishable_key">Publish Key </label>
						<input type="text" name="stripe_publishable_key" class="form-control" id="stripe_publishable_key" placeholder="Please enter the stripe publish key" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['stripe_publishable_key'] : ''; ?>">
					</div>
				</div>
			</div>
			<h5 class="mt-4 mb-2">Captcha Configuration</h5>
			<hr>
			<div class="row">
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4">
					<div class="form-group">
						<label for="captcha_site_key">Site Key </label>
						<input type="text" name="captcha_site_key" class="form-control" id="captcha_site_key" placeholder="Please enter the captcha site key" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['captcha_site_key'] : ''; ?>">
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4 ">
					<div class="form-group">
						<label for="captcha_secrete_key">Secret Key </label>
						<input type="text" name="captcha_secrete_key" class="form-control" id="captcha_secrete_key" placeholder="Please enter the captcha secret key" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['captcha_secrete_key'] : ''; ?>">
					</div>
				</div>
			</div>
			<h5 class="mt-4 mb-2">Other Configuration</h5>
			<hr>
			<div class="row">
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4">
					<div class="form-group">
						<label for="sms_key">SMS Key </label>
						<input type="text" name="sms_key" class="form-control" id="sms_key" placeholder="Please enter the SMS key" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['sms_key'] : ''; ?>">
					</div>
				</div>
				<div class="col-sm-12 col-sm-12 col-md-6 col-lg-4 ">
					<div class="form-group">
						<label for="chat_gpt_key">CHAT GPT Key </label>
						<input type="text" name="chat_gpt_key" class="form-control" id="chat_gpt_key" placeholder="Please enter the chat gpt key" value="<?= isset($aConfiguration) && !empty($aConfiguration) ? $aConfiguration[0]['chat_gpt_key'] : ''; ?>">
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<!-- /.card-body -->
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Update Config</button>
		</div>
	</form>
</div>
<?= $this->endSection() ?>
<?= $this->section('extra_script') ?>
<?= view('master/configuration/validation'); ?>
<?= $this->endSection() ?>