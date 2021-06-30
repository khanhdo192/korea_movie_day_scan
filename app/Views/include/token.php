<?php
	$ajaxToken = [
		'header' => csrf_header(),
		'hash' => csrf_hash()
	];
	$ajaxToken = json_encode($ajaxToken);
	$ajaxUrl = json_encode($ajaxUrl);
?>
<script type="text/javascript">const ajaxUrl = <?= $ajaxUrl; ?></script>
<script type="text/javascript">const ajaxToken = <?= $ajaxToken; ?></script>