<?php
	$urlHome = base_url();
	$urlUser = base_url('user');
?>
<div class="row">
	<div class="col-12">
		<div class="widget-page">
			<h1 class="title">Quản lý thành viên</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= $urlHome; ?>">Trang chủ</a>
				</li>
				<li class="breadcrumb-item">
					<a href="<?= $urlUser; ?>">Thành viên</a>
				</li>
				<li class="breadcrumb-item active">
					<a href="javascript:void(0);">Tạo thành viên</a>
				</li>
			</ol>
		</div>
	</div>
	<div class="col-12">
		<form class="form form-medium form-user" autocomplete="off">
			<div class="form-title">
				<h2 class="title">Thông tin thành viên</h2>
			</div>
			<div class="form-group">
				<label class="form-label" for="inputName">Tên thành viên</label>
				<input type="email" class="form-control" id="inputName" name="name" placeholder="Nhập tên thành viên...">
			</div>
			<div class="form-group">
				<label class="form-label" for="inputFullName">Tài khoản</label>
				<input type="email" class="form-control" id="inputFullName" name="account" placeholder="Nhập tài khoản...">
			</div>
			<div class="form-group">
				<label class="form-label"for="inputEmail">Email</label>
				<input type="email" class="form-control" id="inputEmail" name="email" placeholder="Nhập email...">
			</div>
			<div class="form-group">
				<label class="form-label" for="inputPassword">Mật khẩu</label>
				<input type="email" class="form-control" id="inputPassword" name="password" placeholder="Nhập mật khẩu...">
			</div>
			<div class="form-title">
				<h2 class="title">Cấp tài khoản</h2>
			</div>
			<div class="form-group">
				<div class="custom-radiobox">
					<input type="radio" class="radiobox-input" id="rbManage" name="role" value="manage">
					<label class="radiobox-label" for="rbManage"></label>
					<p class="radiobox-text">Quản lý</p>
				</div>
				<div class="custom-radiobox">
					<input type="radio" class="radiobox-input" id="rbUser" name="role" value="user">
					<label class="radiobox-label" for="rbUser"></label>
					<p class="radiobox-text">Thành viên</p>
				</div>			
			</div>
			<div class="form-title">
				<h2 class="title">Phân quyền tài khoản</h2>
			</div>
			<div class="form-group">
				<strong class="form-page">Quản lý KOL</strong>
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbKolView" name="permission[]" value="PAGE_KOL::VIEW">
					<label class="checkbox-label" for="cbKolView"></label>
					<p class="checkbox-text">Xem</p>
				</div>
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbKolCreate" name="permission[]" value="PAGE_KOL::CREATE">
					<label class="checkbox-label" for="cbKolCreate"></label>
					<p class="checkbox-text">Thêm</p>
				</div>
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbKolEdit" name="permission[]" value="PAGE_KOL::EDIT">
					<label class="checkbox-label" for="cbKolEdit"></label>
					<p class="checkbox-text">Sửa</p>
				</div>	
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbKolDelete" name="permission[]" value="PAGE_KOL::DELETE">
					<label class="checkbox-label" for="cbKolDelete"></label>
					<p class="checkbox-text">Xóa</p>
				</div>			
			</div>
			<div class="form-group">
				<strong class="form-page">Quản lý công ty</strong>
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbCompanyView" name="permission[]" value="PAGE_COMPANY::VIEW">
					<label class="checkbox-label" for="cbCompanyView"></label>
					<p class="checkbox-text">Xem</p>
				</div>
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbCompanyCreate" name="permission[]" value="PAGE_COMPANY::CREATE">
					<label class="checkbox-label" for="cbCompanyCreate"></label>
					<p class="checkbox-text">Thêm</p>
				</div>
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbCompanyEdit" name="permission[]" value="PAGE_COMPANY::EDIT">
					<label class="checkbox-label" for="cbCompanyEdit"></label>
					<p class="checkbox-text">Sửa</p>
				</div>	
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbCompanyDelete" name="permission[]" value="PAGE_COMPANY::DELETE">
					<label class="checkbox-label" for="cbCompanyDelete"></label>
					<p class="checkbox-text">Xóa</p>
				</div>			
			</div>
			<div class="form-group">
				<strong class="form-page">Quản lý lĩnh vực</strong>
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbFieldView" name="permission[]" value="PAGE_FIELD::VIEW">
					<label class="checkbox-label" for="cbFieldView"></label>
					<p class="checkbox-text">Xem</p>
				</div>
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbFieldCreate" name="permission[]" value="PAGE_FIELD::CREATE">
					<label class="checkbox-label" for="cbFieldCreate"></label>
					<p class="checkbox-text">Thêm</p>
				</div>
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbFieldEdit" name="permission[]" value="PAGE_FIELD::EDIT">
					<label class="checkbox-label" for="cbFieldEdit"></label>
					<p class="checkbox-text">Sửa</p>
				</div>	
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbFieldDelete" name="permission[]" value="PAGE_FIELD::DELETE">
					<label class="checkbox-label" for="cbFieldDelete"></label>
					<p class="checkbox-text">Xóa</p>
				</div>			
			</div>
			<div class="form-group">
				<strong class="form-page">Quản lý SOW</strong>
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbSowView" name="permission[]" value="PAGE_SOW::VIEW">
					<label class="checkbox-label" for="cbSowView"></label>
					<p class="checkbox-text">Xem</p>
				</div>
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbSowCreate" name="permission[]" value="PAGE_SOW::CREATE">
					<label class="checkbox-label" for="cbSowCreate"></label>
					<p class="checkbox-text">Thêm</p>
				</div>
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbSowEdit" name="permission[]" value="PAGE_SOW::EDIT">
					<label class="checkbox-label" for="cbSowEdit"></label>
					<p class="checkbox-text">Sửa</p>
				</div>	
				<div class="custom-checkbox">
					<input type="checkbox" class="checkbox-input" id="cbSowDelete" name="permission[]" value="PAGE_SOW::DELETE">
					<label class="checkbox-label" for="cbSowDelete"></label>
					<p class="checkbox-text">Xóa</p>
				</div>			
			</div>
			<div class="form-button">
				<a href="<?= $urlUser; ?>" class="btn btn-action btn-back">Quay lại</a>
				<button type="button" class="btn btn-action btn-submit" id="btnCreate">Hoàn thành</button>
			</div>
		</form>
	</div>
</div>