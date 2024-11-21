<ul class="pagination pagination-sm m-0 float-right">
	<?php if ($pager->getCurrentPage() > 1) : ?>
		<li class="page-item"><a class="page-link" href="<?= base_url($url."?page=" . ($pager->getCurrentPage() - 1)) ?>" style="font-weight: 900;">&laquo;</a></li>
	<?php endif ?>
	<?= $pager->links(); ?>
	<?php if ($pager->getCurrentPage() < $pager->getPageCount()) : ?>
		<li class="page-item"><a class="page-link" href="<?= base_url($url."?page=" . ($pager->getCurrentPage() + 1)) ?>" style="font-weight: 900;"> &raquo;</a></li>
	<?php endif ?>
</ul>