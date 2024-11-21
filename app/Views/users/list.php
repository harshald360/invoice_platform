<table class="table table-bordered table-striped">
	<thead>
		<tr class="border-top">
			<th style="width: 10px">#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php if(empty($aUserData)){ ?>
		<?php }else{ $i = 1;
			foreach ($aUserData as $users) {
			?>
			<tr>
				<td><?= $i++; ?></td>
				<td><?= $users['user_name']; ?></td>
				<td><?= $users['user_email']; ?></td>
				<td><?= $users['user_mobile']; ?></td>
				<td class="text-center">
					<a href="<?= site_url($panel.'/users/edit/'.$users['id']) ?>">
						<span class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></span>
					</a>
					<?php if ($users['is_active'] == 0): ?>
						<a href="#" onclick="confirmStatusChange(1, <?= $users['id'] ?>)" title="Deactivate User" class="btn btn-warning btn-sm"><i class="fas fa-times-circle fa-md"></i></a>
					<?php else: ?>
						<a href="#" onclick="confirmStatusChange(0, <?= $users['id'] ?>)" title="Activate User" class="btn btn-success btn-sm"><i class="fas fa-check-circle fa-md"></i></a>
					<?php endif; ?>
					<a href="#" onclick="confirmStatusChange(2, <?= $users['id'] ?>)" title="Delete User" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-md"></i></a>
				</td>
			</tr>
		<?php } }?>
	</tbody>
</table>

<script>
    function confirmStatusChange(status, id) {
        let message = '';
        switch (status) {
            case 1:
                message = 'Are you sure you want to deactivate this user?';
                break;
            case 0:
                message = 'Are you sure you want to activate this user?';
                break;
            case 2:
                message = 'Are you sure you want to archive this user?';
                break;
            default:
                return;
        }

        if (confirm(message)) {
            window.location.href = `<?= base_url($panel.'/users/status') ?>/${status}/${id}`;
        }
    }
</script>
