<section class="account address">
	<div class="container">
		<div class="row">
			<?php $this->load->view('account-menu')?>
			<div class="col-md-12">
				<div class="accountAddress">
					<p>The following addresses will be used on the checkout page by default</p>
					
					<?php if (count($adress) == 0) { ?> 
						<div class="blankWrapper">
							<p>The address information registered to the system cannot be found.</p>
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
									<span class="edit" onclick="removeAddress(<?=$val->id?>)">Remove</span>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
					<button id="addNewAddress">NEW ADDRESS</button>
				</div>
			</div>
		</div>
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