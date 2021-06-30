<div class="row">
	<div class="col-12">
		<div class="widget-page">
			<h1 class="title">Quản lý thành viên</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url(); ?>">Trang chủ</a>
				</li>
				<li class="breadcrumb-item active">
					<a href="#">Danh sách thành viên</a>
				</li>
			</ol>
		</div>
	</div>
	<div class="col-12">
		<div class="widget-index">
			<div class="index-header">
				<div class="row">
					<div class="col-md-6 col-12">
						<a class="btn btn-create" href="<?= base_url('user/create'); ?>">
							<i class="fa fa-plus"></i>
							<span>Thêm mới thành viên</span>
						</a>
					</div>
					<div class="col-md-6 col-12">
						<form class="search-form" action="<?= base_url('user/search') ?>" method="GET" autocomplete="off" >
							<div class="input-group">
								<input type="text" class="form-control search-input" name="s" value="" maxlength="70" placeholder="Nhập email hoặc tên tài khoản...">
								<div class="input-group-append">
									<button type="submit" class="btn search-btn"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="index-body">
				<div class="table-fake table-users">
					<div class="t-thead">
						<dl class="t-tr">
							<dt class="t-th t-th-id">#</dt>
							<dt class="t-th">Tên thành viên</dt>
                            <dt class="t-th">Ảnh đại diện</dt>
                            <dt class="t-th">Email</dt>
							<dt class="t-th">Ngày tạo</dt>
							<dt class="t-th t-th-action">Thao tác</dt>
						</dl>
					</div>
					<div class="t-tbody">
					<?php foreach($dataUsers as $key => $value):?>
						<?php 
							$Id = $rowId+$key+1;
							$uId = $value['id'];
							$uName = $value['name'];
							$uAvatar = $helper->doAvatar($value['avatar']);
							$uEmail = $value['email'];
							$createDate = $value['created_at'];
							$urlEdit = base_url('user/edit/'.$uId);
						?>
						<dl class="t-tr">
							<dd class="t-td"><?= $Id; ?></dd>
							<dd class="t-td"><?= $uName; ?></dd>
                            <dd class="t-td reset">
								<figure class="avatar">
									<img src="<?= $uAvatar; ?>" alt="<?= $uName; ?>">
								</figure>
							</dd>
                            <dd class="t-td"><?= $uEmail; ?></dd>
                            <dd class="t-td"><?= $createDate; ?></dd>
							<dd class="t-td reset">
								<a href="<?= $urlEdit; ?>" class="btn btn-action action-edit">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="javascript:void(0);" class="btn btn-action action-delete btnDelete">
									<i class="fa fa-trash"></i>
								</a>
							</dd>
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