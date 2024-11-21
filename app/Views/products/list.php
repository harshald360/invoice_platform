<table class="table table-bordered text-nowrap">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>Brand</th>
            <!-- <th>Plans</th> -->
            <!-- <th>Name</th> -->
            <!-- <th class="text-center">Starting Price</th> -->
            <th>Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($products)) { ?>
            <tr>
                <td class="text-center" colspan="7"><b>No Records Found..!!</b></td>
            </tr>
        <?php } else { $i = $currentId; foreach ($products as $item): ?>
        <tr>
            <td class="text-center align-middle"><?= $i; ?></td>
            <td class="align-middle"><?= $item['product_category']; ?></td>
            <td class="align-middle"><?= $item['product_subcategory']; ?></td>
            <td class="align-middle"><?= $item['product_brand']; ?></td>
            <!-- <td class="align-middle"><?= $item['product_name']; ?></td> -->
            <td class="align-middle"><?= $item['is_active'] == 0 ? 'Active' : 'Inactive' ?></td>
            <td class="text-center align-middle">
                <a href="<?= base_url($panel.'/products/edit/'.$item['id']) ?>" title="Edit Plans" class="btn btn-primary btn-sm"><i class="fas fa-edit fa-md"></i></a>
                <?php if ($item['is_active'] == 0): ?>
                    <a href="#" onclick="confirmStatusChange(1, <?= $item['id'] ?>)" title="Deactivate Plans" class="btn btn-warning btn-sm"><i class="fas fa-times-circle fa-md"></i></a>
                <?php else: ?>
                    <a href="#" onclick="confirmStatusChange(2, <?= $item['id'] ?>)" title="Activate Plans" class="btn btn-success btn-sm"><i class="fas fa-check-circle fa-md"></i></a>
                <?php endif; ?>
                <a href="#" onclick="confirmStatusChange(3, <?= $item['id'] ?>)" title="Delete Plans" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-md"></i></a>
            </td>
        </tr>
        <?php $i++; endforeach; } ?>
    </tbody>
</table>


<script>
    function confirmStatusChange(status, id) {
        let message = '';
        switch (status) {
            case 1:
                message = 'Are you sure you want to deactivate this plan?';
                break;
            case 2:
                message = 'Are you sure you want to activate this plan?';
                break;
            case 3:
                message = 'Are you sure you want to archive this plan?';
                break;
            default:
                return;
        }

        if (confirm(message)) {
            window.location.href = `<?= base_url($panel.'/products/status') ?>/${status}/${id}`;
        }
    }
</script>
