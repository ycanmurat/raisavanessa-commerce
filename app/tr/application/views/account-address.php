<section class="account address">
	<div class="container">
		<div class="row">
			<?php $this->load->view('account-menu')?>
			<div class="col-md-12">
				<div class="accountAddress">
					<p>Varsayılan olarak ödeme sayfasında aşağıdaki adresler kullanılacaktır</p>
					
					<?php if (count($adress) == 0) { ?> 
						<div class="blankWrapper">
							<p>Sisteme kayıtlı adres bilgileri bulunamıyor.</p>
						</div>
					<?php }else{ ?>
						<?php foreach ($adress as $key => $val) { ?>
							<div class="wrapper">
								<div class="item">
									<h3><?=$val->title?></h3>
									<h4><?=$val->name?> <?=$val->surname?></h4>
									<h5><?=$val->town?> / <?=$val->city?> / <?=$val->country?></h5>
									<h6><?=$val->address?></h6>
									<p><?=$val->phone?></p>
									<h5><?=$val->company?> / <?=$val->vd?> / <?=$val->vkn?></h5>
									<span class="edit" onclick="removeAddress(<?=$val->id?>)">Sil</span>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
					<button id="addNewAddress">Yeni Adres</button>
				</div>
			</div>
		</div>
	</div>



	<div class="addNewAddress">
		<span id="closeNewAddress"><img src="<?=site_url('assets/Front/')?>images/cancel.svg" alt="close Menu"></span>
		<h2>Yeni Adres Bilgileri</h2>
		<div class="allContents"></div>
		<form action="#" onsubmit="return false;">
			<div class="formItemGroup">
				<div class="formItem">
					<label for="title">Adres Başlığı</label>
					<input type="text" id="title" placeholder="başlık">
				</div>
				<div class="formItem">
					<label for="name">İsim</label>
					<input type="text" id="name" placeholder="İsim">
				</div>
				<div class="formItem">
					<label for="surname">Soyisim</label>
					<input type="text" id="surname" placeholder="Soyisim">
				</div>
			</div>
			<div class="formItemGroup">
				<div class="formItem">
					<label for="email">E-Posta</label>
					<input type="text" id="email" placeholder="E-Posta">
				</div>
				<div class="formItem">
					<label for="telephone">Telefon</label>
					<input type="text" id="telephone" placeholder="telefon">
				</div>
				<div class="formItem">
					<label for="PostCode">Posta Kodu</label>
					<input type="text" id="PostCode" placeholder="Posta Kodu">
				</div>
			</div>
			<div class="formItemGroup">
				<div class="formItem">
					<label for="country">Ülke</label>
					<select id="country">
						<option value="Türkiye">Türkiye</option>
						<?php foreach ($country as $key => $val) { ?>
							<option value="<?=$val->CountryName?>"><?=$val->CountryName?></option>
						<?php } ?>
					</select>
				</div>
				<div class="formItem">
					<label for="city">İl</label>
					<input type="text" id="city" placeholder="İl">
				</div>
				<div class="formItem">
					<label for="town">İlçe</label>
					<input type="text" id="town" placeholder="İlçe">
				</div>
			</div>
			<div class="formItem">
				<label for="address">Adres</label>
				<textarea id="address" placeholder="Adres"></textarea>
			</div>
			<br>
			<h6>Opsyonel</h6>
			<hr>
			<div class="formItemGroup">
				<div class="formItem">
					<label for="companyName">Firma Adı</label>
					<input type="text" id="companyName" placeholder="Firma Adı">
				</div>
				<div class="formItem">
					<label for="taxNo">Vergi No</label>
					<input type="text" id="taxNo" placeholder="Vergi No">
				</div>
				<div class="formItem">
					<label for="taxAdmin">Vergi Dairesi</label>
					<input type="text" id="taxAdmin" placeholder="Vergi Dairesi">
				</div>
			</div>
			<button onclick="addAddress()">SAVE</button>
		</form>
	</div>
</section>

<script>
	$('#addNewAddress').click(function(event) {
		$('.addNewAddress').addClass('active');
		$('span.overlay').addClass('active');
		$('body').addClass('scrollOff');
	});

	$('#closeNewAddress').click(function(event) {
		$('.addNewAddress').removeClass('active');
		$('span.overlay').removeClass('active');
		$('body').removeClass('scrollOff');
	});
</script>