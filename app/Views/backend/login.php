<main class="main-screen">
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
                <div class="main-right container">
                    <div class="main-user">
                        <div class="main-user-login">
                            <p class="login-title">DÀNH RIÊNG CHO QUẢN TRỊ SỰ KIỆN</p>
                            <div class="main-login-form">
                                <form id="formLogin" class="form" autocomplete="off" onsubmit="return false;">
                                    <div class="form-group">
                                        <label class="form-label label-user" for="userAccount">Tài khoản</label>
                                        <div class="form-symbol">
                                            <input type="email" class="form-control ip-name" id="userAccount" name="account" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label label-pass" for="userPassword">Mật khẩu</label>
                                        <div class="form-symbol">
                                            <input type="password" class="form-control ip-pass" id="userPassword" name="password" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-button">
                                        <button type="button" class="btn btn-main-login" id="btnLogin">ĐĂNG NHẬP</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>