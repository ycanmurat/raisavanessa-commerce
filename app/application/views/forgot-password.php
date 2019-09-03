<section class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-12">
				<div id="resetError"></div>
				<div class="login-form m-auto" style="width: 300px;">
					<h2>SEND PASSWORD</h2>
					<div class="item">
						<label for="reset_email">EMAIL</label>
						<input id="reset_email" type="text">
					</div>

					<a href="<?=site_url('login')?>">BACK TO LOGIN</a>
					<button onclick="password_reset()">SEND</button>
				</div>
			</div>
			<div class="col-md-6 d-md-block d-none">
				<img src="https://image.flaticon.com/icons/png/512/1745/1745226.png" style="opacity: .1;">
			</div>
		</div>
	</div>
</section>