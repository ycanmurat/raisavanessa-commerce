<section class="cartShipping">
	<div class="container">
		<div class="row">
			<?php if (!isset($user)) { ?>
				<div class="col-md-12">
					<h2>CHECKOUT</h2>
					<ul class="cart-menu">
						<li><a class="active" href="javascript:void(0)">SHIPPING & BILLING</a></li>
						<li><a href="javascript:void(0)">PAYMENT</a></li>
						<li><a href="javascript:void(0)">ORDER</a></li>
					</ul>
				</div>
				<form action="javascript:void()" onsubmit="return false;" class="row customerAddressForm" >
					<div class="formItem col-md-6">
						<label for="name">Name</label>
						<input type="text" id="name" placeholder="name">
					</div>
					<div class="formItem col-md-6">
						<label for="surname">Surname</label>
						<input type="text" id="surname" placeholder="surname">
					</div>
					<div class="formItem col-md-4">
						<label for="email">E-Mail</label>
						<input type="text" id="email" placeholder="E-Mail">
					</div>
					<div class="formItem col-md-4">
						<label for="telephone">Telephone</label>
						<input type="text" id="telephone" placeholder="telephone">
					</div>
					<div class="formItem col-md-4">
						<label for="PostCode">Post Code</label>
						<input type="text" id="PostCode" placeholder="Post Code">
					</div>
					<div class="formItem col-md-4">
						<label for="country">Country</label>
						<select id="country">
							<option value="Türkiye">Türkiye</option>
							<?php foreach ($country as $key => $val) { ?>
								<option value="<?=$val->CountryName?>"><?=$val->CountryName?></option>
							<?php } ?>
						</select>
					</div>
					<div class="formItem col-md-4">
						<label for="city">City</label>
						<input type="text" id="city" placeholder="City">
					</div>
					<div class="formItem col-md-4">
						<label for="town">Town</label>
						<input type="text" id="town" placeholder="town">
					</div>
					<div class="formItem col-md-12">
						<label for="address">Address</label>
						<textarea id="address" placeholder="Address"></textarea>
					</div>
					<br>
					<h6>Optional</h6>
					<hr>
					<div class="formItem col-md-4">
						<label for="companyName">Company Name</label>
						<input type="text" id="companyName" placeholder="Company Name">
					</div>
					<div class="formItem col-md-4">
						<label for="taxNo">Tax No</label>
						<input type="text" id="taxNo" placeholder="Tax No">
					</div>
					<div class="formItem col-md-4">
						<label for="taxAdmin">Tax Admin</label>
						<input type="text" id="taxAdmin" placeholder="Tax Admin">
					</div>

					<div class="col-md-12">
						<div class="billingDifferent">
							<input type="checkbox" id="billgingDifferent">
							<label for="billgingDifferent">My billing address is different</label>
						</div>
					</div>
					<div class="billingFormArea row d-none">
						<div class="formItem col-md-6">
							<label for="name">Name</label>
							<input type="text" id="billing_name" placeholder="name">
						</div>
						<div class="formItem col-md-6">
							<label for="surname">Surname</label>
							<input type="text" id="billing_surname" placeholder="surname">
						</div>
						<div class="formItem col-md-4">
							<label for="email">E-Mail</label>
							<input type="text" id="billing_email" placeholder="E-Mail">
						</div>
						<div class="formItem col-md-4">
							<label for="telephone">Telephone</label>
							<input type="text" id="billing_telephone" placeholder="telephone">
						</div>
						<div class="formItem col-md-4">
							<label for="PostCode">Post Code</label>
							<input type="text" id="billing_PostCode" placeholder="Post Code">
						</div>
						<div class="formItem col-md-4">
							<label for="country">Country</label>
							<select id="billing_country">
								<option value="Türkiye">Türkiye</option>
								<?php foreach ($country as $key => $val) { ?>
									<option value="<?=$val->CountryName?>"><?=$val->CountryName?></option>
								<?php } ?>
							</select>
						</div>
						<div class="formItem col-md-4">
							<label for="city">City</label>
							<input type="text" id="billing_city" placeholder="City">
						</div>
						<div class="formItem col-md-4">
							<label for="town">Town</label>
							<input type="text" id="billing_town" placeholder="town">
						</div>
						<div class="formItem col-md-12">
							<label for="address">Address</label>
							<textarea id="billing_address" placeholder="Address"></textarea>
						</div>
						<br>
						<h6>Optional</h6>
						<hr>
						<div class="formItem col-md-4">
							<label for="companyName">Company Name</label>
							<input type="text" id="billing_companyName" placeholder="Company Name">
						</div>
						<div class="formItem col-md-4">
							<label for="taxNo">Tax No</label>
							<input type="text" id="billing_taxNo" placeholder="Tax No">
						</div>
						<div class="formItem col-md-4">
							<label for="taxAdmin">Tax Admin</label>
							<input type="text" id="billing_taxAdmin" placeholder="Tax Admin">
						</div>
					</div>


					<div class="col-md-12">
						<div class="orderAddition">
							<h3>Your Order</h3>
							<div class="wrapper">
								<p>Product <span>Subtotal</span></p>
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
						<button onclick="goToPaymentWithAddress()">Pay with Credit/Bank Card</button>
					</div>
				</form>
			<?php }else{ ?>
				<div class="col-md-12">
					<h2>CHECKOUT</h2>
					<ul class="cart-menu">
						<li><a class="active" href="javascript:void(0)">SHIPPING & BILLING</a></li>
						<li><a href="javascript:void(0)">PAYMENT</a></li>
						<li><a href="javascript:void(0)">ORDER</a></li>
					</ul>
				</div>
				<div class="col-md-12">
					<div class="accountAddress" >
						<p>The following addresses will be used on the checkout page by default</p>

						<?php if (count($adress) == 0) { ?>
							<div class="blankWrapper">
								<p>The address information registered to the system cannot be found.</p>
								<button id="addNewAddress" href="javascript:void(0)">Add Address</button>
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
											<span class="edit" onclick="removeAddress(<?=$val->id?>)">Remove</span>
										</div>
									</label>
								</div>
							<?php } ?>
							<button id="addNewAddress" href="javascript:void(0)">Add Address</button>
						<?php } ?>
						<div class="billingDifferent">
							<input type="checkbox" id="billgingDifferent">
							<label for="billgingDifferent">My billing address is different</label>
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
											<span class="edit" onclick="removeAddress(<?=$val->id?>)">Remove</span>
										</div>
									</label>
								</div>
							<?php } ?>
						</div>
						<div class="orderAddition">
							<h3>Your Order</h3>
							<div class="wrapper">
								<p>Product <span>Subtotal</span></p>
								<?php foreach ($this->cart->contents() as $key => $val) { ?>
									<p class="productName"><?=$val['name']?><span><?=$val['qty']?> x 
										<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$val['price']),2,',','.')?>
										<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
									</span></p>
								<?php } ?>
							</div>
						</div>
						<button class="payBtn" onclick="goToPayment()">Pay with Credit/Bank Card</button>
					</div>
				</div>
			<?php } ?>
		</div>

		<div class="addNewAddress">
			<span id="closeNewAddress"><img src="<?=site_url('assets/Front/')?>images/cancel.svg" alt="close Menu"></span>
			<h2>New Address Information</h2>
			<div class="allContents"></div>
			<form action="#" onsubmit="return false;">
				<div class="formItemGroup">
					<div class="formItem">
						<label for="title">Address Title</label>
						<input type="text" id="title" placeholder="title">
					</div>
					<div class="formItem">
						<label for="name">Name</label>
						<input type="text" id="name" placeholder="name">
					</div>
					<div class="formItem">
						<label for="surname">Surname</label>
						<input type="text" id="surname" placeholder="surname">
					</div>
				</div>
				<div class="formItemGroup">
					<div class="formItem">
						<label for="email">E-Mail</label>
						<input type="text" id="email" placeholder="E-Mail">
					</div>
					<div class="formItem">
						<label for="telephone">Telephone</label>
						<input type="text" id="telephone" placeholder="telephone">
					</div>
					<div class="formItem">
						<label for="PostCode">Post Code</label>
						<input type="text" id="PostCode" placeholder="Post Code">
					</div>
				</div>
				<div class="formItemGroup">
					<div class="formItem">
						<label for="country">Country</label>
						<select id="country">
							<option value="Türkiye">Türkiye</option>
							<?php foreach ($country as $key => $val) { ?>
								<option value="<?=$val->CountryName?>"><?=$val->CountryName?></option>
							<?php } ?>
						</select>
					</div>
					<div class="formItem">
						<label for="city">City</label>
						<input type="text" id="city" placeholder="City">
					</div>
					<div class="formItem">
						<label for="town">Town</label>
						<input type="text" id="town" placeholder="town">
					</div>
				</div>
				<div class="formItem">
					<label for="address">Address</label>
					<textarea id="address" placeholder="Address"></textarea>
				</div>
				<br>
				<h6>Optional</h6>
				<hr>
				<div class="formItemGroup">
					<div class="formItem">
						<label for="companyName">Company Name</label>
						<input type="text" id="companyName" placeholder="Company Name">
					</div>
					<div class="formItem">
						<label for="taxNo">Tax No</label>
						<input type="text" id="taxNo" placeholder="Tax No">
					</div>
					<div class="formItem">
						<label for="taxAdmin">Tax Admin</label>
						<input type="text" id="taxAdmin" placeholder="Tax Admin">
					</div>
				</div>
				<button onclick="addAddress()">SAVE</button>
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