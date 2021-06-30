<main class="main">
	<section class="section-control">
		<div class="container">
			<div class="widget-control">
				<div class="login-logo">
					<a href="javascript:void(0);" title="<?php echo $siteName;?>">
						<img class="logo" src="<?= base_url('assets/backend/images/logo.png');?>" alt="<?php echo $siteName;?>">
					</a>
				</div>
				<div class="login-form">
					<h1 class="title">Quên mật khẩu</h1>
					<form class="form" autocomplete="off">
						<div class="form-group">
							<label class="label" for="userEmail">Tài khoản</label>
							<div class="form-symbol">
								<input type="email" class="form-control" id="userEmail" placeholder="Nhập tài khoản...">
								<i class="fa fa-user symbol" aria-hidden="true"></i>
							</div>
						</div>
						<div class="form-button">
							<button type="button" class="btn btn-submit">Lấy lại mật khẩu</button>
						</div>
					</form>
					<p class="forgot"><a href="<?= base_url('login');?>" title="Quay lại đăng nhập?">Quay lại đăng nhập?</a></p>
				</div>
			</div>
		</div>
	</section>
</main>
