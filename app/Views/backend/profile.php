<div class="row">
	<div class="col-12">
		<div class="widget-page">
			<h1 class="title">Trang cá nhân</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url(); ?>">Trang chủ</a>
				</li>
				<li class="breadcrumb-item active">
					<a href="#">Trang cá nhân</a>
				</li>
			</ol>
		</div>
	</div>
	<div class="col-12">
		<div class="widget-profile">
			<div class="profile-cover"></div>
			<div class="profile-info">
				<div class="row">
					<div class="col-12 col-md-6">
						<ol class="info-avatar">
							<li class="item item-avatar">
								<figure class="avatar" id="dropdownUser">
									<img src="<?= $user['avatar']; ?>" alt="<?= $user['name']; ?>">
								</figure>
								<button class="btn btn-change" id="btnChange"><i class="fa fa-camera"></i></button>
							</li>
							<li class="item">
								<h2 class="name"><?= $user['name']; ?></h2>
								<p class="level capitalize"><?= $user['role']; ?></p>
							</li>
						</ol>
					</div>
					<div class="col-12 col-md-6">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>