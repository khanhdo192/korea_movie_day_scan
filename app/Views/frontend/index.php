<?php 
	$styles = [];
	$scripts = [];
	$views = [];
	if(empty($assets)){ 
		return;
	}
	if(isset($assets['css']) && !empty(count($assets['css']))){
		$styles = $assets['css'];
	}
	if(isset($assets['js']) && !empty(count($assets['js']))){
		$scripts = $assets['js'];
	}
	if(isset($assets['html']) && !empty(count($assets['html']))){
		$views = $assets['html'];
	}
?>
<!DOCTYPE html>
<html lang="vi">
	<head>
	<!-- Meta -->
	<?php echo view('include/meta'); ?>
	<!-- Website Styles -->
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/frontend/styles/app.css?v='. time());?>"/>
	<?php foreach($styles as $value) :?>
		<link rel="stylesheet" type="text/css" href="<?=base_url($value . '?v='. time());?>"/>
	<?php endforeach; ?>
	</head>
	<body class="body">
		<!-- Our Website Content Goes Here -->
		<main class="main">
			<?php 
				foreach($views as $value){
					echo view($value);
				};
			?>
		</main>
	<!-- Website Javascripts -->
	<?php 
		if(!empty($ajaxUrl)){
			echo view('include/token');
		};
	?>
		<script type="text/javascript" src="<?=base_url('assets/frontend/scripts/app.js?v='.time());?>"></script>
	<?php foreach($scripts as $value) :?>
		<script type="text/javascript" src="<?=base_url($value . '?v='. time());?>"></script>
	<?php endforeach; ?>
	</body>
</html>

