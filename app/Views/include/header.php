<header class="header">
	<div class="row-fix">
		<div class="col-nav">
			<nav class="navbar">
				<div class="navbar-nav">
					<div class="nav-item dropdown">
						<figure class="avatar dropdown-toggle" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<a href="javascript:void(0);" title="<?= $user['name']; ?>">
								<img src="<?= $user['avatar']; ?>" alt="<?= $user['name']; ?>">
							</a>
						</figure>
						<div class="dropdown-menu">
							<ol class="widget-avatar">
								<li class="item">
									<figure class="avatar x50" id="dropdownUser">
										<img src="<?= $user['avatar']; ?>" alt="<?= $user['name']; ?>">
									</figure>
								</li>
								<li class="item">
									<p>Xin chào,</p>
									<h2 class="name"><?= $user['name']; ?></h2>
								</li>
							</ol>
							<ol class="widget-menu">
								<li class="item">
									<a class="link" href="<?= base_url('profile'); ?>">
										<i class="fa fa-user-circle-o" aria-hidden="true"></i>
										<span>Trang cá nhân</span>
									</a>
								</li>
								<li class="item">
									<a id="btnLogout" class="link" href="javascript:void(0);">
										<i class="fa fa-power-off" aria-hidden="true"></i>
										<span>Đăng xuất</span>
									</a>
								</li>
							</ol>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</div>
</header>