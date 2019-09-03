<?if(!defined('BASEPATH'))exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
		Raisa Vanessa MANAGEMENT PANEL
		</title>
		<meta name="description" content="General widget examples">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>
		<!--end::Web font -->
		<!--begin::Base Styles -->
		<link href="<?=base_url('theme/')?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('theme/')?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('theme/')?>assets/css/custom.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?=base_url('theme/')?>assets/app/media/img/favicon/hkicon.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('theme/')?>assets/app/media/img/favicon/hkicon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('theme/')?>assets/app/media/img/favicon/hkicon.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('theme/')?>assets/app/media/img/favicon/hkicon.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('theme/')?>assets/app/media/img/favicon/hkicon.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('theme/')?>assets/app/media/img/favicon/hkicon.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('theme/')?>assets/app/media/img/favicon/hkicon.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('theme/')?>assets/app/media/img/favicon/hkicon.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('theme/')?>assets/app/media/img/favicon/hkicon.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url('theme/')?>assets/app/media/img/favicon/hkicon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('theme/')?>assets/app/media/img/favicon/hkicon.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('theme/')?>assets/app/media/img/favicon/hkicon.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('theme/')?>assets/app/media/img/favicon/hkicon.png">
		<link rel="manifest" href="<?=base_url('theme/')?>assets/app/media/img/favicon/manifest.json">
		<script src="<?=base_url('theme/')?>/assets/demo/default/custom/components/forms/widgets/select2.js" type="text/javascript"></script>
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?=base_url('theme/')?>assets/app/media/img/favicon/hkicon.png">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<!-- end::Head -->
	<!-- end::Body -->
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->
			<header class="m-grid__item m-header"  data-minimize-mobile="hide" data-minimize-offset="200" data-minimize-mobile-offset="200" data-minimize="minimize" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-dark " style="background: #fff !important">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="<?=site_url('Admin')?>" class="m-brand__logo-wrapper">
										<img width="150" src="<?=site_url('assets/Front/images/rv-logo.svg')?>" alt="Raisa Vanessa Logo" title="Raisa Vanessa Logo">
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- BEGIN: Left Aside Minimize Toggle -->
									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
										<span></span>
									</a>
									<!-- END -->
									<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
									<!-- BEGIN: Responsive Header Menu Toggler -->
									<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
									<!-- BEGIN: Topbar Toggler -->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>
						<!-- END: Brand -->
						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<!-- BEGIN: Horizontal Menu -->
							<!-- END: Horizontal Menu -->
							<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										
										<li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"  data-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
												<span class="m-nav__link-icon">
													<i class="flaticon-cogwheel"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(<?=base_url('theme/')?>assets/app/media/img/misc/quick_actions_bg.jpg); background-size: cover;">
														<span class="m-dropdown__header-title">
															Ayarlar
														</span>
														<span class="m-dropdown__header-subtitle">
															Hızlı Adımlar
														</span>
													</div>
													<div class="m-dropdown__body m-dropdown__body--paddingless">
														<div class="m-dropdown__content">
															<div class="m-scrollable" data-scrollable="false" data-max-height="380" data-mobile-max-height="200">
																<div class="m-nav-grid m-nav-grid--skin-light">
																	<div class="m-nav-grid__row">
																		<!--<a href="<?=admin_url('Meta')?>" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-graphic-1"></i>
																			<span class="m-nav-grid__text">
																				Site Meta Tagları
																			</span>
																		</a>-->
																		<a href="<?=admin_url('Logout')?>" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-logout"></i>
																			<span class="m-nav-grid__text">
																				Sistemden Çıkış Yap
																			</span>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										
									</ul>
								</div>
							</div>
							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>
			<!-- END: Header -->
			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark " style="background: #fff !important">
					<!-- BEGIN: Aside Menu -->
					<div
						id="m_ver_menu"
						class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
						data-menu-vertical="true"
						data-menu-scrollable="false" data-menu-dropdown-timeout="500"
						>
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow">
							<li class="m-menu__item <?=$mainMenu=='Home'?'m-menu__item--active':''?>" aria-haspopup="true" >
								<a href="<?=admin_url()?>" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-line-graph"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Anasayfa
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?=$mainMenu=='Orders'?'m-menu__item--active':''?>" aria-haspopup="true" >
								<a href="<?=admin_url('Orders')?>" class="m-menu__link ">
									<i class="m-menu__link-icon  flaticon-interface-4"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Siparişler
											</span>
										</span>
									</span>
								</a>
							</li><!--
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Slider'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-tabs"></i>
									<span class="m-menu__link-text">
										Slider Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='SliderList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Slider')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Sliderları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='SliderAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Slider/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Slider Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='SliderMobil'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-tabs"></i>
									<span class="m-menu__link-text">
										Mobil Slider Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='SliderMobilList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/SliderMobil')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Sliderları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='SliderMobilAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/SliderMobil/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Slider Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Menu'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-tabs"></i>
									<span class="m-menu__link-text">
										Menü Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='MenuList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Menu')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Menüleri Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='MenuAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Menu/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Menü Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							-->
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Category'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-visible"></i>
									<span class="m-menu__link-text">
										Kategori Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='CategoryList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Category')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategorileri Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='CategoryAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Category/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategori Ekle
												</span>
											</a>
										</li>
										<!--
										<li class="m-menu__item <?=($subMenu=='CategoryGroup'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Category/group')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategori Grupla
												</span>
											</a>
										</li>
										-->
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Products'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-4"></i>
									<span class="m-menu__link-text">
										Ürün Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='ProductsList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Products')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Ürün Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='ProductsAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Products/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Ürün Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item <?=$mainMenu=='User'?'m-menu__item--active':''?>" aria-haspopup="true" >
								<a href="<?=admin_url('User')?>" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-users"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Üye Listeleme
											</span>
										</span>
									</span>
								</a>
							</li>
							
							<li class="m-menu__item <?=$mainMenu=='Kargo'?'m-menu__item--active':''?>" aria-haspopup="true" >
								<a href="<?=admin_url('Kargo')?>" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-speech-bubble-1"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Kargo Yönetimi
											</span>
										</span>
									</span>
								</a>
							</li>
							<!--
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Concept'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-4"></i>
									<span class="m-menu__link-text">
										Konsept Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='ConceptList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Concept')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Konsept Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='ConceptAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Concept/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Konsept Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Project'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-4"></i>
									<span class="m-menu__link-text">
										Anasayfa Proje Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='projectList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Project')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Projeleri Düzenle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>-->
							<!--<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='JobApp'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-technology-1"></i>
									<span class="m-menu__link-text">
										İş Başvuruları
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='JobAppList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/JobApp')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Başvuru Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='JobAppPositions'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/JobApp/positions')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Pozisyon Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>-->
							<!--<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='News'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-notes"></i>
									<span class="m-menu__link-text">
										Sayfa Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='NewsList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/News')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Sayfaları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='NewsAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/News/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Sayfa Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Information'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-notes"></i>
									<span class="m-menu__link-text">
										Blog Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='InformationList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Information')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Blogları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='InformationAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Information/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Yeni Blog
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Referances'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-notes"></i>
									<span class="m-menu__link-text">
										Referans Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='ReferancesList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Referances')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Referans Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='ReferancesAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Referances/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Referans Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>-->
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Statics'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-file"></i>
									<span class="m-menu__link-text">
										Sabit Sayfa Yönetimi (İngilizce)
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='StaticsList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Statics')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Sabit Sayfaları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='StaticsAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Statics/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Sabit Sayfa Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='StaticsTr'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-file"></i>
									<span class="m-menu__link-text">
										Sabit Sayfa Yönetimi (Türkçe)
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='StaticsListTr'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/StaticsTr')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Sabit Sayfaları Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='StaticsAddTr'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/StaticsTr/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Sabit Sayfa Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<!-- <li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Corporate'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-file"></i>
									<span class="m-menu__link-text">
										News
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='CorporateUpdate1'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a href="<?=site_url('Admin/Corporate/index/1')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													English
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='CorporateUpdate2'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a href="<?=site_url('Admin/Corporate/index/2')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Türkçe
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='CorporateUpdate3'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a href="<?=site_url('Admin/Corporate/edit/39')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Menü Fotoğrafları
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li --><!--
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='CorporateTr'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-file"></i>
									<span class="m-menu__link-text">
										Sabit Menü Alanları (Türkçe)
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='CorporateTrUpdate1'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a href="<?=site_url('Admin/CorporateTr/index/1')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Archive Menüsünü Düzenle
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='collectionsTr'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a href="<?=site_url('Admin/CorporateTr/collections')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Collections Menüsünü Düzenle
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='rendezvousTr'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a href="<?=site_url('Admin/CorporateTr/rendezvous')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Rezervasyon Menüsünü Düzenle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Faq'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-file-1"></i>
									<span class="m-menu__link-text">
										Legal Area Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='FaqAdd'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Faq/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Yeni Alan Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='FaqList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Faq')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Alanları Listele
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							-->
							<li class="m-menu__item <?=$mainMenu=='Language'?'m-menu__item--active':''?>" aria-haspopup="true" >
								<a href="<?=admin_url('Language/')?>" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-speech-bubble-1"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Statik Alan Yönetimi
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__item <?=$mainMenu=='About'?'m-menu__item--active':''?>" aria-haspopup="true" >
								<a href="<?=admin_url('About')?>" class="m-menu__link ">
									<i class="m-menu__link-icon fa fa-user-o"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Hakkımızda
											</span>
										</span>
									</span>
								</a>
							</li> 
							<!--<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Categorys'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-map"></i>
									<span class="m-menu__link-text">
										Kategori Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='CategorysList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Categorys')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategorileri Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='CategorysAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Categorys/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Kategori Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>-->
							<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Galery'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-visible"></i>
									<span class="m-menu__link-text">
										Koleksiyon Yönetimi
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='CategoryGaleryAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Galery/categoryAdd')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Koleksiyon Kategorisi Ekle
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='CategoryGaleryList'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Galery/category')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Koleksiyon Kategorisi Listele
												</span>
											</a>
										</li>
									</ul>
								</div>
										<!--
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?=($subMenu=='GaleryList'?'m-menu__item--active':'')?>" aria-haspopup="true">
											<a  href="<?=site_url('Admin/Galery')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Fotoğraf Listele
												</span>
											</a>
										</li>
										<li class="m-menu__item <?=($subMenu=='GaleryAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Galery/add')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Fotoğraf Ekle
												</span>
											</a>
										</li><li class="m-menu__item <?=($subMenu=='Category'?'m-menu__item--active':'')?>" aria-haspopup="true" >
											<a href="<?=site_url('Admin/Video/Category')?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
												</i>
												<span class="m-menu__link-text">
													Video Kategori Ekle
												</span>
											</a>
										</li>
									</ul>
								</div>-->
							</li>
							<!--<div class="m-menu__submenu">
										<span class="m-menu__arrow"></span>
										<ul class="m-menu__subnav">
									<li class="m-menu__item <?=($subMenu=='VideoList'?'m-menu__item--active':'')?>" aria-haspopup="true">
										<a  href="<?=site_url('Admin/Video')?>" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
											</i>
											<span class="m-menu__link-text">
												Videoları Listele
											</span>
										</a>
									</li>
									<li class="m-menu__item <?=($subMenu=='VideoAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
										<a href="<?=site_url('Admin/Video/add')?>" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
											</i>
											<span class="m-menu__link-text">
												Video Ekle
											</span>
										</a>
									</li>
								</ul>
							</div>-->
						</li>
						<!--<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Comment'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
							<a  href="#" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon flaticon-visible"></i>
								<span class="m-menu__link-text">
									Kalite Belgesi Yönetimi
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item <?=($subMenu=='CommentList'?'m-menu__item--active':'')?>" aria-haspopup="true">
										<a  href="<?=site_url('Admin/Comment')?>" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
											</i>
											<span class="m-menu__link-text">
												Belgeleri Listele
											</span>
										</a>
									</li>
									<li class="m-menu__item <?=($subMenu=='CommentAdd'?'m-menu__item--active':'')?>" aria-haspopup="true" >
										<a href="<?=site_url('Admin/Comment/add')?>" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
											</i>
											<span class="m-menu__link-text">
												Belge Ekle
											</span>
										</a>
									</li>
								</ul>
							</div>
						</li>-->
						<li class="m-menu__item  m-menu__item--submenu  <?=($mainMenu=='Contact'?'m-menu__item--open m-menu__item--expanded':'')?>" aria-haspopup="true" id="m_variant" data-menu-submenu-toggle="hover">
							<a  href="#" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon flaticon-notes"></i>
								<span class="m-menu__link-text">
									Form Listesi Yönetimi
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item <?=($subMenu=='ContactList'?'m-menu__item--active':'')?>" aria-haspopup="true">
										<a  href="<?=site_url('Admin/Contact')?>" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
											</i>
											<span class="m-menu__link-text">
												İletişim Formundan Gelenleri Listele
											</span>
										</a>
									</li><!--
									<li class="m-menu__item <?=($subMenu=='DateList'?'m-menu__item--active':'')?>" aria-haspopup="true">
										<a  href="<?=site_url('Admin/Contact/date')?>" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
											</i>
											<span class="m-menu__link-text">
												Randevu Talepleri
											</span>
										</a>
									</li>
									<li class="m-menu__item <?=($subMenu=='OfferList'?'m-menu__item--active':'')?>" aria-haspopup="true">
										<a  href="<?=site_url('Admin/Contact/date_offer')?>" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
											</i>
											<span class="m-menu__link-text">
												Teklif Talepleri
											</span>
										</a>
									</li>-->
									<!--<li class="m-menu__item <?=($subMenu=='Calllist'?'m-menu__item--active':'')?>" aria-haspopup="true">
										<a  href="<?=site_url('Admin/Calllist')?>" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
											</i>
											<span class="m-menu__link-text">
												Aranacakları Listele
											</span>
										</a>
									</li>-->
								</ul>
							</div>
							<div class="m-menu__submenu">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item <?=($subMenu=='BulletinList'?'m-menu__item--active':'')?>" aria-haspopup="true">
										<a  href="<?=site_url('Admin/Contact/bulletin')?>" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
											</i>
											<span class="m-menu__link-text">
												Email Bülteni Listesi
											</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="m-menu__item <?=$mainMenu=='Stokist'?'m-menu__item--active':''?>" aria-haspopup="true" >
							<a href="<?=admin_url('Stokist')?>" class="m-menu__link ">
								<i class="m-menu__link-icon  flaticon-interface-4"></i>
								<span class="m-menu__link-title">
									<span class="m-menu__link-wrap">
										<span class="m-menu__link-text">
											Stokist
										</span>
									</span>
								</span>
							</a>
						</li>
						<li class="m-menu__item <?=$mainMenu=='Admin'?'m-menu__item--active':''?>" aria-haspopup="true" >
							<a href="<?=admin_url('Home/adminEdit')?>" class="m-menu__link ">
								<i class="m-menu__link-icon  flaticon-interface-4"></i>
								<span class="m-menu__link-title">
									<span class="m-menu__link-wrap">
										<span class="m-menu__link-text">
											Admin Düzenleme
										</span>
									</span>
								</span>
							</a>
						</li>
						<li class="m-menu__item <?=$mainMenu=='Kur'?'m-menu__item--active':''?>" aria-haspopup="true" >
							<a href="<?=admin_url('Kur')?>" class="m-menu__link ">
								<i class="m-menu__link-icon fa fa-dollar"></i>
								<span class="m-menu__link-title">
									<span class="m-menu__link-wrap">
										<span class="m-menu__link-text">
											Kur
										</span>
									</span>
								</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- END: Aside Menu -->
			</div>
			<!-- END: Left Aside -->
			<div class="m-grid__item m-grid__item--fluid m-wrapper">
				<style>
					/*body.m-content--skin-light2{
						filter: grayscale(1) invert(1)!important;
					}
					*::selection {
						background: black!important;
					}
					* img{filter: invert(1) grayscale(0);}*/
				</style>