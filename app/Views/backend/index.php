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
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/backend/styles/app.css?v='. time());?>"/>
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/backend/styles/main.css?v='. time());?>"/>
	<?php foreach($styles as $value) :?>
		<link rel="stylesheet" type="text/css" href="<?=base_url($value . '?v='. time());?>"/>
	<?php endforeach; ?>
	</head>
	<body class="body">
	<!-- Our Website Content Goes Here -->
		<?php echo view('include/header'); ?>
		<?php echo view('include/aside'); ?>
		<main class="main">
			<div class="wrapper-content">
			<?php 
				foreach($views as $value){
					echo view($value);
				};
			?>
			</div>
		</main>
		<footer class="footer">
			<p class="copyright">© 2020 - Bản quyền thuộc về Việt Tương Tác</p>
		</footer>
	<!-- Website Javascripts -->
	<?php 
		if(!empty($ajaxUrl)){
			echo view('include/token');
		};
	?>
		<script type="text/javascript" src="<?=base_url('assets/backend/scripts/app.js?v='. time());?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/backend/scripts/main.js?v='. time());?>"></script>
	<?php foreach($scripts as $value) :?>
		<script type="text/javascript" src="<?=base_url($value . '?v='. time());?>"></script>
	<?php endforeach; ?>
	</body>
</html>

