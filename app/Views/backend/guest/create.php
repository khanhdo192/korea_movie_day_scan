<?php
	$urlHome = base_url();
	$urlGuest = base_url('guest');
?>
<div class="row">
	<div class="col-12">
		<div class="widget-page">
			<h1 class="title">Quản lý khách mời</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= $urlHome; ?>">Trang chủ</a>
				</li>
				<li class="breadcrumb-item">
					<a href="<?= $urlGuest; ?>">Danh sách</a>
				</li>
				<li class="breadcrumb-item active">
					<a href="javascript:void(0);">Thêm</a>
				</li>
			</ol>
		</div>
	</div>
	<div class="col-12">
		<form class="form form-medium form-user" autocomplete="off">
			<div class="form-title">
				<h2 class="title">Thêm khách mời</h2>
			</div>
			<div class="form-title">
				<h2 class="title">Suất chiếu</h2>
			</div>
			<div class="form-group">
				<?php foreach($movies as $key => $value): ?>
				<?php 
					$id = sprintf('rbMovie%s', $key);
					$name = sprintf('%s - %s (%s - %s)', $value['name_vi'], $value['name_en'], $value['location'], $value['started_at']);
				?>
				<div class="custom-radiobox">
					<input type="radio" class="radiobox-input" id="<?= $id; ?>" name="movieId" value="<?= $value['id']; ?>">
					<label class="radiobox-label" for="<?= $id; ?>"></label>
					<p class="radiobox-text"><?= $name; ?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="form-group">
				<label class="form-label" for="ipExcel">Tải file excel (.xlsx)</label>
				<input type="file" class="form-control-file" id="ipExcel" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
			</div>
			<div class="form-button">
				<a href="<?= $urlGuest; ?>" class="btn btn-action btn-back">Quay lại</a>
				<button type="button" class="btn btn-action btn-submit" id="btnCreate">Hoàn thành</button>
			</div>
		</form>
	</div>
</div>