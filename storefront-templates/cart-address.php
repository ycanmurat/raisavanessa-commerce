<?include("header.php");?>
<section class="cartShipping">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>CHECKOUT</h2>
				<ul class="cart-menu">
					<li><a class="active" href="javascript:void(0)">SHIPPING & BILLING</a></li>
					<li><a href="javascript:void(0)">PAYMENT</a></li>
					<li><a href="javascript:void(0)">ORDER</a></li>
				</ul>
			</div>
			<div class="col-md-12">
				<!-- Üyelikli Satış-->
				<div class="accountAddress" >
					<p>The following addresses will be used on the checkout page by default</p>
					
					<!-- Boş ise-->
					<div class="blankWrapper">
						<p>The address information registered to the system cannot be found.</p>
						<a href="account-address.php">Add Address</a> <!-- Hiç adres eklenmemiş ve üyelik girişi yapılmış ise profile-->
					</div>
					<!-- Boş ise-->
					
					<div class="wrapper">
						<div class="item">
							<h3>Shipping Address</h3>
							<h4>HOME</h4>
							<h5>Murat CAN</h5>
							<h6>Levent mahallesi kore sokağı no:23 Kat:12 daire 97</h6>
							<h6>İstanbul / Levent - TURKEY</h6>
							<p>0555 000 00 00</p>
							<span class="edit">Edit</span>
						</div>
					</div>
					<div class="wrapper">
						<div class="item">
							<h3>Billing Address</h3>
							<h4>HOME</h4>
							<h5>Murat CAN</h5>
							<h6>Levent mahallesi kore sokağı no:23 Kat:12 daire 97 </h6>
							<h5>İstanbul / Levent - TURKEY</h5>
							<p>0555 000 00 00</p>
							<span class="edit">Edit</span>
						</div>
					</div>
					<div class="orderAddition">
						<h3>Your Order</h3>
						<div class="wrapper">
							<p>Product <span>Subtotal</span></p>
							<p class="productName">DRAPPED OFF THE SHOULDER MAXI DRESS WITH RUFFLES AND HIGHT SLIT -Ecru 36x1 <span>₺ 11,214.12</span></p>
							<p class="productName">DRAPPED OFF THE SHOULDER MAXI DRESS WITH RUFFLES AND HIGHT SLIT -Ecru 36x1 <span>₺ 11,214.12</span></p>
							<p class="productName">DRAPPED OFF THE SHOULDER MAXI DRESS WITH RUFFLES AND HIGHT SLIT -Ecru 36x1 <span>₺ 11,214.12</span></p>
							<p class="productName">DRAPPED OFF THE SHOULDER MAXI DRESS WITH RUFFLES AND HIGHT SLIT -Ecru 36x1 <span>₺ 11,214.12</span></p>
							<p>Shipping <span>₺ 99</span></p>
							<p>Total <span>₺ 99</span></p>
						</div>
					</div>
					<a class="payBtn" href="payment.php">Pay with Credit/Bank Card</a>
				</div>
				<!-- Üyeliksiz Satış-->
				<form action="payment.php" class="row customerAddressForm" >
					<div class="col-md-12">
						<p>Internation AMEX users please choose TRY as currency of payment.<br> Sizes 44 and 46 are 10% higher than the retail price.</p>
					</div>
					<div class="col-md-6">
						<h3>Billing details</h3>
					</div>
					<div class="col-md-6">
						<div class="checkGroup">

						</div>
					</div>
					<div class="col-md-6">
						<label for="">Name & Surname</label>
						<input type="text">
						<label for="">Country / Region*</label>
						<select name="" id="">
							<option value="">Select a country / region...</option>
						</select>
					</div>

					<div class="col-md-6">
						<label for="">Order notes (optional)</label>
						<textarea name="" id="" placeholder="Notes about your oder, e.g. special notes for delivery."></textarea>
					</div>
					<div class="col-md-6">
						<label for="">Town/City*</label>
						<input type="text">
					</div>
					<div class="col-md-6">
						<label for="">Province*</label>
						<select name="" id="">
							<option value="">Select an option...</option>
						</select>
					</div>
					<div class="col-md-12">
						<label for="">Street Address</label>
						<input type="text">
					</div>
					<div class="col-md-4">
						<label for="">Postcode/ZIP*</label>
						<input type="text">
					</div>

					<div class="col-md-4">
						<label for="">Phone</label>
						<input type="text">
					</div>
					<div class="col-md-4">
						<label for="">Email address*</label>
						<input type="text">
					</div>
					<div class="col-md-12">
						<div class="orderAddition">
							<h3>Your Order</h3>
							<div class="wrapper">
								<p>Product <span>Subtotal</span></p>
								<p class="productName">DRAPPED OFF THE SHOULDER MAXI DRESS WITH RUFFLES AND HIGHT SLIT -Ecru 36x1 <span>₺ 11,214.12</span></p>
								<p>Shipping <span>₺ 99</span></p>
								<p>Total <span>₺ 99</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<button>Pay with Credit/Bank Card</button>
					</div>
				</form>
			</div>
		</div>
	</div>



	<div class="addNewAddress">
		<span id="closeNewAddress"><img src="images/cancel.svg" alt="close Menu"></span>
		<h2>New Address Information</h2>
		<form action="">
			<div class="checkBoxGroup">
				<div class="item">
					<input type="checkbox" id="differentBilling">
					<label for="differentBilling">My Billing Address Is Different</label>
				</div>
			</div>
			<div class="formItem">
				<label for="">Name Surname</label>
				<input type="text">
			</div>
			<div class="formItem">
				<label for="">Address</label>
				<input type="text">
			</div>
			<div class="formItemGroup">
				<div class="formItem">
					<label for="">City</label>
					<select name="" id="">
						<option value="">Select</option>
					</select>
				</div>

				<div class="formItem">
					<label for="">Town</label>
					<select name="" id="">
						<option value="">Select</option>
					</select>
				</div>
				<div class="formItem">
					<label for="">Country</label>
					<select name="" id="">
						<option value="">Select</option>
					</select>
				</div>
			</div>

			<!-- Is billing address different -->
			<div class="billingInformation">
				<h4>Billing Address</h4>
				<div class="formItem">
					<label for="">Name Surname</label>
					<input type="text">
				</div>
				<div class="formItem">
					<label for="">Address</label>
					<input type="text">
				</div>
				<div class="formItemGroup">

					<div class="formItem">
						<label for="">City</label>
						<select name="" id="">
							<option value="">Select</option>
						</select>
					</div>

					<div class="formItem">
						<label for="">Town</label>
						<select name="" id="">
							<option value="">Select</option>
						</select>
					</div>
					<div class="formItem">
						<label for="">Country</label>
						<select name="" id="">
							<option value="">Select</option>
						</select>
					</div>
				</div>
			</div>

			<button>SAVE</button>
		</form>
	</div>
</section>

<script>
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




<?include("footer.php");?>