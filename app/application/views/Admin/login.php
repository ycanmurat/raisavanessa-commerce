<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>
			Raisa Vanessa Yönetim Paneli
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<link href="<?=base_url('theme/')?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('theme/')?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('theme/')?>assets/css/custom.css" rel="stylesheet" type="text/css" />

		<link rel="apple-touch-icon" sizes="57x57" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('theme/')?>assets/app/media/img/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url('theme/')?>assets/app/media/img/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('theme/')?>assets/app/media/img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('theme/')?>assets/app/media/img/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('theme/')?>assets/app/media/img/favicon/favicon-16x16.png">
		<link rel="manifest" href="<?=base_url('theme/')?>assets/app/media/img/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?=base_url('theme/')?>assets/app/media/img/favicon/ms-icon-144x144.png">
	</head>
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-3" id="m_login" style="background-image: url(../theme/assets/app/media/img//bg/bg-3.jpg);">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="javascript:void(0);">
								<img width="200" src="<?=site_url('assets/Front/images/rv-logo.svg')?>" alt="Raisa Vanessa Logo" title="Raisa Vanessa Logo">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">
									Raisa Vanessa Yönetim Sistemi
								</h3>
							</div>
							<?php if($this->session->flashdata('giris_hatasi')=='1'){ ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom:-1%;">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
									Bilgiler Eksik Yada Yanlış, Tekrar Deneyin.
								</div>
							<?php } ?>
							<form class="m-login__form m-form" action="<?=site_url('Admin/Login')?>" method="POST">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Kullanıcı Adı" name="username" autocomplete="off">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Şifre" name="password">
								</div>
								<div class="m-login__form-action" style="margin-top:5px">
									<button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">
										Giriş Yapın
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end:: Page -->
		<!--begin::Base Scripts -->
		<script src="../theme/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="../theme/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->
		<!--begin::Page Snippets -->
		<script src="../theme/assets/snippets/pages/user/login.js" type="text/javascript"></script>
		<!--end::Page Snippets -->
	</body>
	<!-- end::Body -->
</html>
