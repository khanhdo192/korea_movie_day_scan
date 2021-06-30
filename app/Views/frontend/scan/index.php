<div class="main-screen">
    <div class="container-fuild">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="main-left">
                    <img class="main-wheel" src="<?= base_url('assets/frontend/images/wheel.jpg'); ?>" alt="">
                    <div class="main-logo-header">
                        <img class="main-logo1" src="<?= base_url('assets/frontend/images/logo1.png'); ?>" alt="">
                        <img class="main-logo2" src="<?= base_url('assets/frontend/images/logo2.png'); ?>" alt=""> 
                    </div>
                    <div class="main-logo-center">
                        <img class="main-logo3" src="<?= base_url('assets/frontend/images/movie_day.png'); ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="main-right">
                    <p class="main-title">Hãy quét QR để kiểm tra thông tin phiếu</p>
                    <div class="main-user">
                        <div class="main-user-info">
							<form class="form-scan" autocomplete="off" onsubmit="return false;">
								<p class="token-title">Mã Phiếu</p>
								<div class="form-group form-group-token">
									<input type="text" class="form-control token-input" id="token" name="token" maxlength="8">
									<button type="button" class="btn btn-clear" id="btnClear">
										<i class="fa fa-times"></i>
									</button>
								</div>
								<p class="token-status" id="status"></p>
								<div class="movie-info">
									<p class="movie-name" id="movieName">Thông Tin Vé</p>
									<div class="block-color">
										<p class="movie-time" id="movieTime"></p>
										<p class="movie-location" id="movieLocation"></p>
									</div>
								</div>
								<div class="guest-info">
									<p class="guest-title">Khách Mời</p>
                                    <div class="block-color">
                                        <p class="guest-text" id="guestName"></p>
                                        <p class="guest-text" id="guestPhone"></p>
                                        <p class="guest-text" id="guestMail"></p>
                                    </div>    
								</div>
								<button type="button" class="btn btn-submit disabled" id="btnSubmit" disabled>DÙNG</button>
							</form>
                        </div>
                    </div>
                    <div class="main-progress">
                        <div class="main-amount">
                            <p class="ticket">Vé Đã Phát</p>
                            <p class="amount"><span class="text" id="amount">?</span>/<span class="amount" id="total">?</span></p>
                        </div>
                        <div class="bar-container">
                            <div class="main-bar">
                                <div class="bar" id="bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(!empty($dataQRCode)): ?>
	<?php $dataQRCode = json_encode($dataQRCode); ?>
	<script type="text/javascript">const dataQRCode = <?= $dataQRCode; ?></script>
<?php endif; ?>