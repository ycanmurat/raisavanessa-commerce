<?include("header.php");?>
<section class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form action="" class="signup-form">
					<h2>JOIN US</h2>
					<div class="item">
						<label for="">NAME SURNAME *</label>
						<input type="text">
					</div>
					<div class="item">
						<label for="">PHONE NUMBER</label>
						<input type="text">
					</div>
					<div class="item">
						<label for="">EMAIL *</label>
						<input type="text">
					</div>
					<div class="item">
						<label for="">PASSWORD *</label>
						<input type="password">
					</div>
					<div class="item">
						<label for="">REPEAT PASSWORD *</label>
						<input type="password">
					</div>
					<div class="item checkboxes">
						<input type="checkbox" id="kvkk">
						<label for="kvkk">I have read the <b>GDPR</b> form, I approve.</label>
					</div>
					<button>SIGN ME UP</button>
				</form>

				<form action="" class="login-form" >
					<h2>LOGIN</h2>
					<div class="item">
						<label for="">EMAIL</label>
						<input type="text">
					</div>
					<div class="item">
						<label for="">PASSWORD</label>
						<input type="password">
					</div>
					<a href="forgot-password.php">FORGOT YOUR PASSWORD</a>
					<button>LOGIN</button>
				</form>
			</div>
			<div class="col-md-6">
				<div class="signUp">
					<h2>SIGNUP</h2>
					<p>IF YOU DO NOT HAVE AN ACCOUNT PLEASE USE ONE OF THE OPTIONS BELOW</p>
					<button class="facebook"><img src="images/facebook.svg" alt="facebook login">CONTINUE WITH FACEBOOK</button>
					<button class="google"><img src="images/google.svg" alt="google login">CONTINUE WITH GOOGLE</button>
					<span class="or"><b>OR</b></span>
					<button class="createAccount">CREATE ACCOUNT</button>
				</div>

			</div>
		</div>
	</div>
</section>
<script>
	$('.createAccount').click(function(event) {
		$('form.login-form').slideToggle(400);
		$('form.signup-form').slideToggle(400);
		$(this).text(function(i, text){
			return text === "CREATE ACCOUNT" ? "RESTORE LOGIN" : "CREATE ACCOUNT";
		})
	});
</script>
<?include("footer.php");?>