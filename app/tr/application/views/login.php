<section class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div action="" class="signup-form">

					<h2>Hesap Oluştur</h2>
					<div id="SignInErrors"></div>
					<div class="item">
						<label for="re_name">İsim Soyisim *</label>
						<input id="re_name" type="text">
					</div>
					<div class="item">
						<label for="re_phone">Telefon</label>
						<input id="re_phone" type="text">
					</div>
					<div class="item">
						<label for="re_email">E-Posta *</label>
						<input id="re_email" type="text">
					</div>
					<div class="item">
						<label for="re_password">Şifre *</label>
						<input id="re_password" type="password">
					</div>
					<div class="item">
						<label for="re_password2">Şifre Tekrar *</label>
						<input id="re_password2" type="password">
					</div>
					<div class="item checkboxes">
						<input type="checkbox" id="kvkk">
						<label for="kvkk"><b>KVKK</b> bildiri Formunu Okudum ve kabul ediyorum.</label>
					</div>
					<button onclick="signUp()">Kaydol</button>
				</div>
				<div action="" class="login-form" >
					<h2>GİRİŞ YAP</h2>
					<div id="LoginErrors"></div>
					<div class="item">
						<label for="email">E-Posta</label>
						<input id="email" type="text">
					</div>
					<div class="item">
						<label for="password">Şifre</label>
						<input id="password" type="password">
					</div>
					<a href="<?=site_url('user/forget')?>">Şifremi Unuttum</a>
					<button onclick="login()">Giriş</button>
				</div>
			</div>
			<div class="col-md-6">
				<div class="signUp">
					<h2>Kayıt Ol</h2>
					<!--
					<p>IF YOU DO NOT HAVE AN ACCOUNT PLEASE USE ONE OF THE OPTIONS BELOW</p>
					<button class="facebook"><img src="<?=site_url('assets/Front/')?>images/facebook.svg" alt="facebook login">CONTINUE WITH FACEBOOK</button>
					<button class="google"><img src="<?=site_url('assets/Front/')?>images/google.svg" alt="google login">CONTINUE WITH GOOGLE</button>
					<span class="or"><b>OR</b></span> -->
					<button class="createAccount">Hesap Oluştur</button>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$('.createAccount').click(function(event) {
		$('div.login-form').slideToggle(400);
		$('div.signup-form').slideToggle(400);
		$(this).text(function(i, text){
			return text === "Hesap Oluştur" ? "Giriş Yap" : "Hesap Oluştur";
		})
	});
</script>