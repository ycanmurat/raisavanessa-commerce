<footer>
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<ul class="selectLangWrap">
					<li>
						<p class="selectToggle">SELECT LANGUAGE <span><img src="<?=site_url('assets/Front/')?>images/arrow.svg" alt="Language Select Button"></span></p>
						<div class="countrySelect" >
							<select id="langSelect" onchange="langChange()">
								<option value="1">ENGLISH</option>
								<option value="2">TURKISH</option>
							</select>
						</div>
					</li>
					<li>
						<p class="selectToggle">SELECT CURRENCY <span><img src="<?=site_url('assets/Front/')?>images/arrow.svg" alt="Language Select Button"></span></p>
						<div class="countrySelect" >
							<select id="kurSelect" onchange="kurChange()">
								<option value="TL" <?=$this->session->userdata('cur')=='TL'?'selected':''?>>TL ₺</option>
								<?php foreach ($kur as $key => $val) { ?>
									<option value="<?=$val->code?>" <?=$this->session->userdata('cur')==$val->code?'selected':''?>><?=$val->code?> <?=$val->icon?></option>
								<?php } ?>
							</select>
						</div>
					</li>
				</ul>
			</div>
			<div class="col">
				<ul>
					<li><a href="<?=site_url('about')?>">ABOUT</a></li>
					<li><a href="<?=site_url('contact')?>">CONTACT US</a></li>
					<li><a href="<?=site_url('stockists')?>">STOCKISTS</a></li>
					<li><a href="<?=site_url('contact/costumer')?>">CUSTOMER SERVICE</a></li>
					<li><a href="<?=site_url('s/cookie-policy')?>">COOKIE POLICY</a></li>
				</ul>
			</div>
			<div class="col">
				<ul>
					<li><a href="<?=site_url('s/privacy-policy')?>">PRIVACY POLICY</a></li>
					<li><a href="<?=site_url('home/gdpr')?>">GDPR FORM</a></li>
					<li><a href="<?=site_url('s/sales-contract')?>">SALES CONTRACT</a></li>
					<li><a href="<?=site_url('s/returns-exchange')?>">RETURNS</a></li>
					<li><a href="<?=site_url('s/shipping-policy')?>">SHIPPING</a></li>
				</ul>
			</div>
			<div class="col">
				<ul>
					<li><a href="<?=$Lang->instagram?>">INSTAGRAM</a></li>
					<li><a href="<?=$Lang->facebook?>">FACEBOOK</a></li>
					<li><a href="<?=$Lang->twitter?>">TWITTER</a></li>
					<li><a href="<?=$Lang->linkedin?>">LINKED IN</a></li>
					<li><a href="<?=$Lang->pinterest?>">PINTEREST</a></li>
					<li><a href="<?=$Lang->tiktok?>">TIKTOK</a></li>
					<li><a href="<?=$Lang->youtube?>">YOUTUBE</a></li>
				</ul>
			</div>
			<div class="col">
				<div class="subscribe">
					<p>SUBSCRIBE TO THE NEWSLETTER</p>
					<form action="#" onsubmit="return false" class="subscribe">
						<input type="text" id="subscribe" placeholder="e-mail adress">
						<button type="button" onclick="subscribeEmail()">subscribe</button>
					</form>
				</div>
			</div>
			<div class="col-12">
				<img style="margin: 20px auto;" class="iyzico" src="<?=site_url('assets/Front/images/logoband-iyzico.svg') ?>" alt="iyzico">
			</div>
		</div>
	</div>
</footer>
<div class="makingknowing">
	2021 Raisavanessa , All Rights Reserved © <a target="_blank" href="https://makingknowing.com">Powered by Making Knowing</a>
</div>
<style>
	.makingknowing {
		text-align: center;
		padding: 15px 0px;
		background: #f7f7f7;
		color: black;
		font-size: 12px;
	}
	.makingknowing a {
		font-weight: 600;
		margin-left: 15px;
		color: black;
	}
</style>
<script>
	$('footer p.selectToggle').click(function(event) {
		$(this).next('.countrySelect').toggleClass('active');
		$(this).toggleClass('active');
	});

	$('.countrySelect select').change(function(event) {
		$(this).parent('.countrySelect').removeClass('active'); ;
	});

	$(document).ready(function() {
		if (!readCookie('hide')) {
			$('#cookieArea').show();
		}

		$('#acceptCookies').click(function() {
			$('#cookieArea').hide();
			createCookie('hide', true, 1)
			return false;
		});
		/*if (!readCookie('banner')) {
			$('.welcomeBanner').css('display','flex');	
		}
		$('.welcomeBanner a , .welcomeBanner').click(function(event) {
			createCookie('banner', true, 1)
			return false;
		});*/
	});
/*
	$(document).mouseup(function(e) 
	{
		var container = $(".welcomeBanner a");

		if (!container.is(e.target) && container.has(e.target).length === 0) 
		{
			$('.welcomeBanner').hide();
		}
	});*/
</script>
<noscript>Tarayıcınızda uyum sorunu var.</noscript>
<script src="<?=site_url('assets/Front/')?>js/main.js?v=1"></script>
<!-- Facebook Pixel Code -->
<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '269235554497354');
		fbq('track', 'PageView');
	</script>
	<noscript>
		<img height="1" width="1" style="display:none" 
		src="https://www.facebook.com/tr?id=269235554497354&ev=PageView&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->
</body>
</html>