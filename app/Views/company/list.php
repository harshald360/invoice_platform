<table class="table table-bordered table-striped">
	<thead>
		<tr class="border-top">
			<th style="width: 10px">#</th>
			<th>Company Name</th>
			<th>GSTIN</th>
			<th>City</th>
			<th>State</th>
			<th>Zipcode</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php if (empty($aCompanyData)) { ?>
			<tr>
				<td colspan="7" class="text-center">No Records Found</td>
			</tr>
			<?php } else {
			$i = 1;
			foreach ($aCompanyData as $company) {
			?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= $company['company_name']; ?></td>
					<td><?= $company['company_gstin']; ?></td>
					<td><?= $company['city']; ?></td>
					<td><?= $company['state']; ?></td>
					<td><?= $company['zipcode']; ?></td>
					<td class="text-center">
						<a href="<?= site_url($panel . '/companies/edit/' . $company['id']) ?>"><span class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></span>
						</a>
						<!-- <a href="#" onclick="confirmStatusChange(2, <?= $company['id'] ?>)" title="Delete company" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-md"></i></a> -->
					</td>
				</tr>
		<?php }
		} ?>
	</tbody>
</table>
<script>
	function confirmStatusChange(status, id) {
		let message = '';
		switch (status) {
			case 1:
				message = 'Are you sure you want to deactivate this user?';
				break;
			case 2:
				message = 'Are you sure you want to delete this company?';
				break;
			case 3:
				message = 'Are you sure you want to archive this user?';
				break;
			default:
				return;
		}
		if (confirm(message)) {
			window.location.href = `<?= base_url($panel . '/companies/status') ?>/${status}/${id}`;
		}
	}
</script>