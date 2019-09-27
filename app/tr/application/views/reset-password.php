<section class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-12">
				<div id="accountErrors"></div>
				<div class="login-form m-auto" style="width: 300px;">
					<h2>Şifre Sıfırlama</h2>
					<input type="hidden" id="token" value="<?=$reset_token?>">
					<div class="item">
						<label for="newpass">Yeni Şifre</label>
						<input id="newpass" type="password">
					</div>
					<div class="item">
						<label for="newpass2">Yeni Şifre Tekrar</label>
						<input id="newpass2" type="password">
					</div>
					<button onclick="passwordNew()">Gönder</button>
				</div>
			</div>
			<div class="col-md-6 d-md-block d-none">
				<img src="https://image.flaticon.com/icons/png/512/1745/1745226.png" style="opacity: .1;">
			</div>
		</div>
	</div>
</section>