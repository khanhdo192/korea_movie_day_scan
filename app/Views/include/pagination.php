<?php
	$pager->setSurroundCount(2);
	$links = $pager->links();
?>
<ul class="pagination">
	<li class="page-item">
		<a class="page-link" href="<?= $pager->getFirst() ?>">Trang đầu</a>
	</li>
<?php foreach ($links as $link) : ?>
	<?php 
		$class = 'class="page-item"';
		if($link['active']){
			$class='class="page-item active"';
		}
	?>
	<li <?=$class;?> >
		<a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
	</li>
<?php endforeach ?>
	<li class="page-item">
		<a class="page-link" href="<?= $pager->getLast() ?>">Trang cuối</a>
	</li>
</ul>