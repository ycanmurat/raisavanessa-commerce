<section class="cartShipping">
	<div class="container">
		<div class="row">
			<?php if (!isset($user)) { ?>
				<div class="col-md-12">
					<h2>Sepet</h2>
					<ul class="cart-menu">
						<li><a class="active" href="javascript:void(0)">KARGO & FATURA</a></li>
						<li><a href="javascript:void(0)">ÖDEME</a></li>
						<li><a href="javascript:void(0)">SİPARİŞ</a></li>
					</ul>
				</div>
				<form action="javascript:void()" onsubmit="return false;" class="row customerAddressForm" >
					<div class="formItem col-md-6">
						<label for="name">İsim</label>
						<input type="text" id="name" placeholder="isim">
					</div>
					<div class="formItem col-md-6">
						<label for="surname">Soyisim</label>
						<input type="text" id="surname" placeholder="soyisim">
					</div>
					<div class="formItem col-md-4">
						<label for="email">E-Posta</label>
						<input type="text" id="email" placeholder="E-Posta">
					</div>
					<div class="formItem col-md-4">
						<label for="telephone">Telefon</label>
						<input type="text" id="telephone" placeholder="Telefon">
					</div>
					<div class="formItem col-md-4">
						<label for="PostCode">Posta Kodu</label>
						<input type="text" id="PostCode" placeholder="Posta Kodu">
					</div>
					<div class="formItem col-md-4">
						<label for="country">Ülke</label>
						<select id="country">
							<option value="Türkiye">Türkiye</option>
							<?php foreach ($country as $key => $val) { ?>
								<option value="<?=$val->CountryName?>"><?=$val->CountryName?></option>
							<?php } ?>
						</select>
					</div>
					<div class="formItem col-md-4">
						<label for="city">İl</label>
						<input type="text" id="city" placeholder="İl">
					</div>
					<div class="formItem col-md-4">
						<label for="town">İlçe</label>
						<input type="text" id="town" placeholder="İlçe">
					</div>
					<div class="formItem col-md-12">
						<label for="address">Adres</label>
						<textarea id="address" placeholder="Adres"></textarea>
					</div>
					<br>
					<h6>Opsyonel</h6>
					<hr>
					<div class="formItem col-md-4">
						<label for="companyName">Firma Adı</label>
						<input type="text" id="companyName" placeholder="Firma Adı">
					</div>
					<div class="formItem col-md-4">
						<label for="taxNo">Vergi No</label>
						<input type="text" id="taxNo" placeholder="Vergi No">
					</div>
					<div class="formItem col-md-4">
						<label for="taxAdmin">Vergi Dairesi</label>
						<input type="text" id="taxAdmin" placeholder="Vergi Dairesi">
					</div>

					<div class="col-md-12">
						<div class="billingDifferent">
							<input type="checkbox" id="billgingDifferent">
							<label for="billgingDifferent">My billing address is different</label>
						</div>
					</div>
					<div class="billingFormArea row d-none">
						<div class="formItem col-md-6">
							<label for="name">İsim</label>
							<input type="text" id="billing_name" placeholder="İsim">
						</div>
						<div class="formItem col-md-6">
							<label for="surname">Soyisim</label>
							<input type="text" id="billing_surname" placeholder="soyisim">
						</div>
						<div class="formItem col-md-4">
							<label for="email">E-Posta</label>
							<input type="text" id="billing_email" placeholder="E-Posta">
						</div>
						<div class="formItem col-md-4">
							<label for="telephone">Telefon</label>
							<input type="text" id="billing_telephone" placeholder="Telefon">
						</div>
						<div class="formItem col-md-4">
							<label for="PostCode">Posta Kodu</label>
							<input type="text" id="billing_PostCode" placeholder="Posta Kodu">
						</div>
						<div class="formItem col-md-4">
							<label for="country">Ülke</label>
							<select id="billing_country">
								<option value="Türkiye">Türkiye</option>
								<?php foreach ($country as $key => $val) { ?>
									<option value="<?=$val->CountryName?>"><?=$val->CountryName?></option>
								<?php } ?>
							</select>
						</div>
						<div class="formItem col-md-4">
							<label for="city">İl</label>
							<input type="text" id="billing_city" placeholder="İl">
						</div>
						<div class="formItem col-md-4">
							<label for="town">İlçe</label>
							<input type="text" id="billing_town" placeholder="İlçe">
						</div>
						<div class="formItem col-md-12">
							<label for="address">Adres</label>
							<textarea id="billing_address" placeholder="Adres"></textarea>
						</div>
						<br>
						<h6>Opsyonel</h6>
						<hr>
						<div class="formItem col-md-4">
							<label for="companyName">Firma Adı</label>
							<input type="text" id="billing_companyName" placeholder="Firma Adı">
						</div>
						<div class="formItem col-md-4">
							<label for="taxNo">Vergi No</label>
							<input type="text" id="billing_taxNo" placeholder="Vergi No">
						</div>
						<div class="formItem col-md-4">
							<label for="taxAdmin">Vergi Dairesi</label>
							<input type="text" id="billing_taxAdmin" placeholder="Vergi Dairesi">
						</div>
					</div>


					<div class="col-md-12">
						<div class="orderAddition">
							<h3>Siparişiniz</h3>
							<div class="wrapper">
								<p>Ürün <span>Alt Toplam</span></p>
								<?php foreach ($this->cart->contents() as $key => $val) { ?>
									<p class="productName"><?=$val['name']?><span><?=$val['qty']?> x 
										<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$val['price']),2,',','.')?>
										<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
									
								</span></p>
								<?php } ?>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<button onclick="goToPaymentWithAddress()">Kredi / Banka Kartı İle öde</button>
					</div>
				</form>
			<?php }else{ ?>
				<div class="col-md-12">
					<h2>CHECKOUT</h2>
					<ul class="cart-menu">
						<li><a class="active" href="javascript:void(0)">Kargo & Fatura</a></li>
						<li><a href="javascript:void(0)">ÖDEME</a></li>
						<li><a href="javascript:void(0)">SİPARİŞ</a></li>
					</ul>
				</div>
				<div class="col-md-12">
					<div class="accountAddress" >
						<p>Varsayılan olarak ödeme sayfasında aşağıdaki adresler kullanılacaktır</p>

						<?php if (count($adress) == 0) { ?>
							<div class="blankWrapper">
								<p>Sisteme kayıtlı adres bilgileri bulunamıyor.</p>
								<button id="addNewAddress" href="javascript:void(0)">Adres Ekle</button>
							</div>
						<?php }else{ ?>
							<?php foreach ($adress as $key => $val) { ?>
								<div class="wrapper">
									<input id="<?=$val->id?>" value="<?=$val->id?>" type="radio" name="cartAddress" <?=$key==0?'checked':''?>>
									<label for="<?=$val->id?>">
										<div class="item">
											<h3><?=$val->title?></h3>
											<h4><?=$val->name?> <?=$val->surname?></h4>
											<h5><?=$val->town?> / <?=$val->city?> / <?=$val->country?></h5>
											<h6><?=$val->address?></h6>
											<p><?=$val->phone?></p>
											<h5><?=$val->company?> / <?=$val->vd?> / <?=$val->vkn?></h5>
											<span class="edit" onclick="removeAddress(<?=$val->id?>)">Sil</span>
										</div>
									</label>
								</div>
							<?php } ?>
							<button id="addNewAddress" href="javascript:void(0)">Adres Ekle</button>
						<?php } ?>
						<div class="billingDifferent">
							<input type="checkbox" id="billgingDifferent">
							<label for="billgingDifferent">Fatura Adresim Farklı</label>
						</div>
						<div class="billingFormArea d-none">
							<?php foreach ($adress as $key => $val) { ?>
								<div class="wrapper">
									<input id="b_<?=$val->id?>" value="<?=$val->id?>" type="radio" name="Billing_cartAddress" <?=$key==0?'checked':''?>>
									<label for="b_<?=$val->id?>">
										<div class="item">
											<h3><?=$val->title?></h3>
											<h4><?=$val->name?> <?=$val->surname?></h4>
											<h5><?=$val->town?> / <?=$val->city?> / <?=$val->country?></h5>
											<h6><?=$val->address?></h6>
											<p><?=$val->phone?></p>
											<h5><?=$val->company?> / <?=$val->vd?> / <?=$val->vkn?></h5>
											<span class="edit" onclick="removeAddress(<?=$val->id?>)">Sil</span>
										</div>
									</label>
								</div>
							<?php } ?>
						</div>
						<div class="orderAddition">
							<h3>Siparişiniz</h3>
							<div class="wrapper">
								<p>Ürün <span>Alt Toplam</span></p>
								<?php foreach ($this->cart->contents() as $key => $val) { ?>
									<p class="productName"><?=$val['name']?><span><?=$val['qty']?> x 
										<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$val['price']),2,',','.')?>
										<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
									</span></p>
								<?php } ?>
							</div>
						</div>
						<button class="payBtn" onclick="goToPayment()">Kredi / Banka Kartı İle öde</button>
					</div>
				</div>
			<?php } ?>
		</div>

		<div class="addNewAddress">
			<span id="closeNewAddress"><img src="<?=site_url('assets/Front/')?>images/cancel.svg" alt="close Menu"></span>
			<h2>Yeni Adres Bilgileri</h2>
			<div class="allContents"></div>
			<form action="#" onsubmit="return false;">
				<div class="formItemGroup">
					<div class="formItem">
						<label for="title">Adres Başlığı</label>
						<input type="text" id="title" placeholder="Başlık">
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
						<label for="taxAdmin">Vergi No</label>
						<input type="text" id="taxAdmin" placeholder="Vergi No">
					</div>
				</div>
				<button onclick="addAddress()">Kaydet</button>
			</form>
		</div>
	</section>

	<script>

		$("#billgingDifferent").change(function() {
			if(this.checked) {
				$('.billingFormArea').removeClass('d-none');
			}else{
				$('.billingFormArea').addClass('d-none');
			}
		});

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
		$("#differentBilling").click( function(){
			if( $(this).is(':checked') ) {
				$('.billingInformation').slideToggle(400);
			}else{
				$('.billingInformation').slideToggle(400);
			};
		});

		$('span.edit').click(function(event) {
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