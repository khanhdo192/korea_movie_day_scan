<div class="row">
	<div class="col-12">
		<div class="widget-page">
			<h1 class="title">Quản lý khách mời</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url(); ?>">Trang chủ</a>
				</li>
				<li class="breadcrumb-item active">
					<a href="#">Danh sách</a>
				</li>
			</ol>
		</div>
	</div>
	<div class="col-12">
		<div class="widget-index">
			<div class="index-header">
				<div class="row">
					<div class="col-md-6 col-12">
						<a class="btn btn-create" href="<?= base_url('guest/create'); ?>">
							<i class="fa fa-plus"></i>
							<span>Thêm</span>
						</a>
					</div>
					<div class="col-md-6 col-12">
					</div>
				</div>
			</div>
			<div class="index-body">
				<div class="table-fake table-guest">
					<div class="t-thead">
						<dl class="t-tr">
							<dt class="t-th t-th-id">#</dt>
							<dt class="t-th">Thông tin khách</dt>
                            <dt class="t-th">Thông tin phim</dt>
							<dt class="t-th">Gửi mail</dt>
						</dl>
					</div>
					<div class="t-tbody">
					<?php foreach($dataGuests as $key => $value):?>
						<?php 
							$Id = $rowId+$key+1;
							$gId = $value['id'];
							$gName = $value['name'];
							$gEmail = $value['email'];
							$gPhone = $value['phone'];
							$mName = sprintf('%s - %s', $value['name_vi'], $value['name_en']);
							$mlocation = $value['location'];
							$mStartedAt = $value['started_at'];
							$qrSendAt = $value['send_at'];
						?>
						<dl class="t-tr">
							<dd class="t-td"><?= $Id; ?></dd>
							<dd class="t-td">
								<p><span>Tên khách: </span><span><?= $gName; ?></span></p>
								<p><span>Email: </span><span><?= $gEmail; ?></span></p>
								<p><span>Số điện thoại: </span><span><?= $gPhone; ?></span></p>
							</dd>
                            <dd class="t-td">
								<p><span>Tên phim: </span><span><?= $mName; ?></span></p>
								<p><span>Rạp chiếu: </span><span><?= $mlocation; ?></span></p>
								<p><span>Giờ chiếu: </span><span><?= $mStartedAt; ?></span></p>
							</dd>
                            <dd class="t-td"><?= (strtotime($qrSendAt) > 0) ? $qrSendAt : 'Chưa gửi'; ?></dd>
						</dl>
					<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="index-footer">
				<?= $pagination; ?>
			</div>
		</div>
	</div>
</div>