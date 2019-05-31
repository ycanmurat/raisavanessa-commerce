<footer>
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<ul>
					<li>
						<p class="selectToggle">SELECT COUNTRY <span><img src="images/arrow.svg"></span></p>
						<div class="countrySelect" >
							<select name="" id="">
								<option value="1">TURKEY</option>
								<option value="1">IRELAND</option>
								<option value="1">CANADA</option>
								<option value="1">USA</option>
								<option value="1">ENGLAND</option>
								<option value="1">BAE</option>
							</select>
						</div>
					</li>
					<li>
						<p class="selectToggle">SELECT CURRENCY <span><img src="images/arrow.svg"></span></p>
						<div class="countrySelect" >
							<select name="" id="">
								<option value="1">TL ₺</option>
								<option value="1">USD $</option>
								<option value="1">EURO €</option>
								<option value="1">POUND £</option>
							</select>
						</div>
					</li>
				</ul>
			</div>
			<div class="col">
				<ul>
					<li><a href="about.php">ABOUT</a></li>
					<li><a href="contact.php">CONTACT US</a></li>
					<li><a href="stockist.php">STOCKISTS</a></li>
					<li><a href="customer-service.php">CUSTOMER SERVICE</a></li>
					<li><a href="#">COOKIE POLICY</a></li>
				</ul>
			</div>
			<div class="col">
				<ul>
					<li><a href="staticpage.php">PRIVACY POLICY</a></li>
					<li><a href="staticpage.php">GDPR FORM</a></li>
					<li><a href="staticpage.php">SALES CONTRACT</a></li>
					<li><a href="staticpage.php">RETURNS</a></li>
					<li><a href="staticpage.php">SHIPPING</a></li>
				</ul>
			</div>
			<div class="col">
				<ul>
					<li><a href="#">INSTAGRAM</a></li>
					<li><a href="#">FACEBOOK</a></li>
					<li><a href="#">TWITTER</a></li>
					<li><a href="#">LINKED IN</a></li>
					<li><a href="#">PINTEREST</a></li>
					<li><a href="#">TIKTOK</a></li>
					<li><a href="#">YOUTUBE</a></li>
				</ul>
			</div>
			<div class="col">
				<div class="subscribe">
					<p>SUBSCRIBE TO THE NEWSLETTER</p>
					<form action="">
						<input type="text" placeholder="E-MAIL"><button>SUBSCRIBE</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</footer>
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
<script src="js/main.js"></script>
</body>
</html>