<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
	<!-- SEO-->
	<meta name="format-detection" content="telephone=no">
	<link rel="apple-touch-icon" href="<?=site_url('assets/Front/')?>images/favicon.png">
	<meta name="msapplication-TileColor" content="#E6E6E6">
	<meta name="theme-color" content="#E6E6E6">
	<?php if (isset($header)) {
		if (empty($header->title)) {
			$header->title = 'Raisa Vanessa | Fall, Winter, Spring, Summer Fashion Show Looks | RAISAVANESSA';
		}
		if (empty($header->description)) {
			$header->description = 'Official website of Raisa Vanessa, a high end Haute Couture and Ready to Wear brand based in Istanbul, Shop now RAISAVANESSA latest collections online.';
		}
		if (empty($header->image)) {
			$header->image = ('assets/Front/images/rv-logo.svg');
		}
	}else{
		$header = new StdClass;
		$header->description = 'Official website of Raisa Vanessa, a high end Haute Couture and Ready to Wear brand based in Istanbul, Shop now RAISAVANESSA latest collections online.';
		$header->title = 'Raisa Vanessa | Fall, Winter, Spring, Summer Fashion Show Looks | RAISAVANESSA';
		$header->image = ('assets/Front/images/rv-logo.svg');
	} ?>
	<meta property="og:title" content="<?=$header->title?>">
	<meta name="twitter:title" content="<?=$header->title?>" />
	<meta name="description" content="<?=$header->title?>">
	<meta property="og:description" content="<?=$header->title?>">
	<meta name="twitter:description" content="<?=$header->title?>">
	<meta property="og:url" content="<?=current_url() ?>">
	<meta name="twitter:url" content="<?=current_url() ?>">
	<meta property="og:image" content="<?=site_url($header->image)?>" />
	<meta name="twitter:image" content="<?=site_url($header->image)?>" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@RaisaVanessa" />
	<meta name="twitter:creator" content="@RaisaVanessa" />
	<meta property="fb:app_id" content="">
	<meta property="fb:page_id" content="">
	<meta property="fb:pages" content="" />
	<meta property="og:site_name" content="raisavanessa.com">

	<meta itemprop="url" content="<?=current_url() ?>" />
	<meta itemprop="inLanguage" content="tr-TR" />
	<meta itemprop="name" content="Raisa Vanessa" />
	<meta itemprop="description" content="<?=$header->title?>"/>
	<link rel="canonical" href="<?=current_url() ?>">
	<meta name="p:domain_verify" content="5f07fbf295e1c5e497b13beec957b75e"/>
	<!-- SEO -->

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="<?=site_url('assets/Front/')?>css/jquery.fancybox.min.css" />
	<script src="<?=site_url('assets/Front/')?>js/jquery.fancybox.min.js"></script>

	<link rel="stylesheet" href="<?=site_url('assets/Front/')?>css/card.css">
	<script src="<?=site_url('assets/Front/')?>css/card.js"></script>

	<script src="<?=site_url('assets/Front/')?>js/plyr.min.js"></script>
	<link rel="stylesheet" href="<?=site_url('assets/Front/')?>css/plyr.css">

	<link rel="stylesheet" type="text/css" href="<?=site_url('assets/Front/')?>css/style.css?=v3.6">
	<link rel="icon" href="<?=site_url('assets/Front/')?>images/favicon.png" type="image/x-icon">
	<title><?=$header->title?></title>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119780785-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119780785-1');
	</script>

	<script>
		function createCookie(name,value,days) {
			if (days) {
				var date = new Date();
				date.setTime(date.getTime()+(days*24*60*60*1000));
				var expires = "; expires="+date.toGMTString();
			}
			else var expires = "";
			document.cookie = name+"="+value+expires+"; path=/";
		}
		function readCookie(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for(var i=0;i < ca.length;i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			}
			return null;
		}
		function eraseCookie(name) {
			createCookie(name,"",-1);
		}
	</script>
</head>
<body>
	<div class="whatsappContact">
		<a target="_blank" rel="nofollow noreferrer"  href="https://api.whatsapp.com/send?phone=90555 000 00 00">
			<img src="<?=site_url('assets/Front/')?>images/whatsapp.svg" alt="Raisa Vanessa menu">
		</a>
	</div>
	<header>
		<div class="nav">
			<div class="menu">
				<img src="<?=site_url('assets/Front/')?>images/menu-image.svg" alt="Raisa Vanessa menu">
				<ul class="menuList">
					<span id="closeMenu"><img src="<?=site_url('assets/Front/')?>images/cancel.svg" alt="close Menu"></span>
					<!--<li><a href="<?=site_url('category/last')?>">NEW IN</a></li>-->
					<!-- <li><a href="<?=site_url('category/sale')?>">SALE</a></li> -->
					<li>
						<h2 style="cursor: default;">SHOP</h2>					
						<ul class="altList rvSpecial">
							<?php foreach ($categories as $key => $val) { ?>
								<li><h3><?=$val->name?></h3> 
									<ul class="categoriesLink ">
										<li><h4><a style="font-size: 14px;" href="<?=site_url('category/'.$val->slug.'/'.$val->id)?>">VIEW ALL</a></h4></li>
										<?php foreach ($val->sub as $key2 => $val2) { ?>
											<?php if ($val2->sub == array()) { ?>
												<li><h4><a href="<?=site_url('category/'.$val2->slug.'/'.$val2->id)?>"><?=$val2->name?></a></h4></li>
											<?php }else{ ?>
												<li class="altTitle"><h4><?=$val2->name?></h4>
													<ul class="altCategories">
														<li><h4><a style="font-size: 13px;" href="<?=site_url('category/'.$val2->slug.'/'.$val2->id)?>">VIEW ALL</a></h4></li>
														<?php foreach ($val2->sub as $key3 => $val3) { ?>
															<li><h4><a href="<?=site_url('category/'.$val3->slug.'/'.$val3->id)?>"><?=$val3->name?></a></h4></li>
														<?php } ?>
													</ul>
												</li>
											<?php } ?>
										<?php } ?>
									</ul>
								</li>
							<?php } ?>
							<li><h2><a href="<?=site_url('category/bespoke')?>">BESPOKE</a></h2></li>
						</ul>
					</li>

					<li>
						<h2>COLLECTIONS</h2>
						<ul class="altList rst23">
							<?php foreach ($collections as $key => $val) { ?>
								<li><h3><?=$val->category_title?></h3>
									<ul class="categoriesLink">
										<?php foreach ($val->sub as $key2 => $val2){ ?>
											<li><h4><a href="<?=site_url('collections/'.$val2->slug.'/'.$val2->Id)?>"><?=$val2->category_title?></a></h4></li>
										<?php } ?>
									</ul>
								</li>
							<?php } ?>
						</ul>
					</li>
					<li>
						<h2>ARCHIVE</h2>
						<ul class="altList">
							<?php foreach ($archives as $key => $val) { ?>
								<li><h3><?=$val->category_title?></h3>
									<ul class="categoriesLink">
										<?php foreach ($val->sub as $key2 => $val2){ ?>
											<li><h4><a href="<?=site_url('collections/'.$val2->slug.'/'.$val2->Id)?>"><?=$val2->category_title?></a></h4></li>
										<?php } ?>
									</ul>
								</li>
							<?php } ?>
						</ul>
					</li>
					<li><a href="<?=site_url('Instagram') ?>">INSTAGRAM</a></li>
				</ul>
			</div>

			<a href="<?=site_url()?>">
				<img src="<?=site_url('assets/Front/')?>images/rv-logo.svg" alt="Raisa Vanessa Logo">
			</a>

			<div class="userInteractive">
				<div class="search">
					<img src="<?=site_url('assets/Front/')?>images/search.svg" alt="Raisa Vanessa search button">
					<form method="GET" action="<?=site_url('search')?>" class="searchWrapper">
						<input type="text" placeholder="SEARCH" name="k">
						<button type="submit">FIND</button>
					</form>
				</div>
				<?php if ($user) { ?>
					<a href="<?=site_url('account')?>"><img src="<?=site_url('assets/Front/')?>images/icons/user.svg" alt="account"><span>ACCOUNT</span></a>
				<?php }else{ ?>
					<a href="<?=site_url('user/login')?>"><img src="<?=site_url('assets/Front/')?>images/icons/user.svg" alt="login"><span>LOGIN</span></a>
				<?php } ?>
				<div class="cart">
					<p id="openCart"><img src="<?=site_url('assets/Front/')?>images/icons/shopping-basket.svg" alt="shopping cart"><a href="javascript:void(0)">CART (<span class="cartCount"><?=$this->cart->total_items()?></span>)</a></p>
					<div class="cartWrapper">
						<span id="closeCart"><img src="<?=site_url('assets/Front/')?>images/cancel.svg" alt="close Menu"></span>
						<h3>SHOPPING BAG</h3>
						<div class="Area catArea">
							<?php if ($this->cart->contents() == array()) { ?>
								<div class="blank-item">
									<p>Your shopping bag is empty.</p>
								</div>
							<?php }else{ ?>
								<?php foreach ($this->cart->contents() as $key => $val) { ?>
									<div class="item">
										<div class="content">
											<p><a target="_blank" href="/product/<?=$val['slug']?>/<?=$val['id']?>"><?=$val['name']?></a></p>
											<p class="size">Size : <?=$val['options']['size']?></p>
											<p class="qty">Qty : <?=$val['qty']?></p>
											<b>
												<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$val['price']),2,',','.')?>
												<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
											</b>
											<button class="deleteItem" onclick="productDeleteToCart('<?=$key?>')">Remove</button>
										</div>
										<img src="<?=$val['image']?>" alt="<?=$val['name']?>">
										<div class="selection">
											<?php for ($i=1; $i < 5; $i++) { 
												if ($i <= $val['options']['colorDetail']->rules) { ?> 
													<?php $var = 'color'.$i; ?>
													<span style="background-color:<?=$val['options']['colorDetail']->{$var}?>"></span>
												<?php }
											} ?>
											
										</div>
									</div>
								<?php } ?>
							<?php } ?>
						</div>
						<?php if ($this->cart->contents() != array()) { ?>
							<div class="cartFooter">
								<?php if ($this->cart->contents() != array()) { ?>
									<p class="qty">Quantit : 
										<?=$this->cart->total_items()?> x 
										<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$this->cart->total()),2,',','.')?>
										<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
									</p>
								<?php } ?>
								<p class="total">TOTAL : 
									<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$this->cart->total()),2,',','.')?>
									<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
								</p>
								<div class="links">
									<a href="<?=site_url('category/last')?>">SHOP</a>
									<?php if ($this->cart->contents() != array()) { ?>
										<a href="<?=site_url('cart')?>">SHOPPING BAG</a>
									<?php } ?>
									<a href="<?=site_url('cart')?>">CHECKOUT</a>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</header>

	<span class="overlay"></span>

	<div id="cookieArea" class="cookiePolicy">
		<div class="wrapper">
			<img src="<?=site_url('assets/Front/images/rvbgwhite.svg') ?>" alt="Cookie Policy">
			<a href="<?=site_url('s/cookie-policy') ?>">COOKIES POLICY</a>
			<p>BY CLICKING "ACCEPT ALL COOKIES". YOU AGREE TO THE STORING OF COOKIES ON YOUR DEVICE TO ENHANCE SITE NAVIGATION ANALYZE SITE USAGE. AND ASSIST IN OUR MARKETING EFFORTS.</p>
			<button id="acceptCookies">ACCEPT ALL COOKIES</button>
		</div>
	</div>

	<div class="welcomeBanner">
		<a href="listing.php"><img src="https://fakeimg.pl/500x500" alt="Banner content"></a>
	</div>
	<script>

		$('header .nav > .menu ul.menuList > li > ul.altList li ul.categoriesLink li.altTitle').click(function(event) {
			$(this).toggleClass('active');
		});

		$('#closeCart').click(function(event) {
			$('.cartWrapper').removeClass('active');
		});
		$('#openCart').click(function(event) {
			$('.cartWrapper').toggleClass('active');
		});

		$('div.menu > img').click(function(event) {
			$('ul.menuList').addClass('active');
			$('span.overlay').addClass('active');
			$('body').addClass('scrollOff');
		});

		$('#closeMenu').click(function(event) {
			$('ul.menuList').removeClass('active');
			$('span.overlay').removeClass('active');
			$('body').removeClass('scrollOff');
		});
		$('span.overlay').click(function(event) {
			$('ul.menuList').removeClass('active');
			$('span.overlay').removeClass('active');
			$('.addNewAddress').removeClass('active');

			$('body').removeClass('scrollOff');

		});

		$('header .nav > .menu ul.menuList > li > ul.altList li h3').click(function(event) {
			$(this).parent('li').find('ul.categoriesLink').toggleClass('active');
		});

		$('header .nav .search > img').click(function(event) {
			$('header .search .searchWrapper').toggleClass('active');
		});
		$(document).ready(function() {
			

			$('.rvSpecial .categoriesLink li:first-child > h4 > a').attr('style','font-size:13px;margin-left:14px;font-weight:600');
			$('.altCategories li:first-child h4 a').attr('style','font-size:12px');
		});
	</script>

	<style>
		ul.altList.rst23 > li:first-child{display:none}
	</style>