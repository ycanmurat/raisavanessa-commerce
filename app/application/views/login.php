<section class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div action="" class="signup-form">

					<h2>JOIN US</h2>
					<div id="SignInErrors"></div>
					<div class="item">
						<label for="re_name">NAME SURNAME *</label>
						<input id="re_name" type="text">
					</div>
					<div class="item">
						<label for="re_phone">PHONE NUMBER</label>
						<input id="re_phone" type="text">
					</div>
					<div class="item">
						<label for="re_email">EMAIL *</label>
						<input id="re_email" type="text">
					</div>
					<div class="item">
						<label for="re_password">PASSWORD *</label>
						<input id="re_password" type="password">
					</div>
					<div class="item">
						<label for="re_password2">REPEAT PASSWORD *</label>
						<input id="re_password2" type="password">
					</div>
					<div class="item checkboxes">
						<input type="checkbox" id="kvkk">
						<label for="kvkk">I have read the <b>GDPR</b> form, I approve.</label>
					</div>
					<button onclick="signUp()">SIGN ME UP</button>
				</div>
				<div action="" class="login-form" >
					<h2>LOGIN</h2>
					<div id="LoginErrors"></div>
					<div class="item">
						<label for="email">EMAIL</label>
						<input id="email" type="text">
					</div>
					<div class="item">
						<label for="password">PASSWORD</label>
						<input id="password" type="password">
					</div>
					<a href="<?=site_url('user/forget')?>">FORGOT YOUR PASSWORD</a>
					<button onclick="login()">LOGIN</button>
				</div>
			</div>
			<div class="col-md-6">
				<div class="signUp">
					<h2>SIGNUP</h2>
					<!--
					<p>IF YOU DO NOT HAVE AN ACCOUNT PLEASE USE ONE OF THE OPTIONS BELOW</p>
					<button class="facebook"><img src="<?=site_url('assets/Front/')?>images/facebook.svg" alt="facebook login">CONTINUE WITH FACEBOOK</button>
					<button class="google"><img src="<?=site_url('assets/Front/')?>images/google.svg" alt="google login">CONTINUE WITH GOOGLE</button>
					<span class="or"><b>OR</b></span> -->
					<button class="createAccount">CREATE ACCOUNT</button>
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
			return text === "CREATE ACCOUNT" ? "RESTORE LOGIN" : "CREATE ACCOUNT";
		})
	});
</script>