<?include("header.php");?>
<section class="account address">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>ACCOUNT</h2>
				<ul>
					<li><a href="account-wishlist.php">WISHLIST</a></li>
					<li><a href="account-orders.php">ORDERS</a></li>
					<li><a class="active" href="account-address.php">ADDRESSES</a></li>
					<li><a href="account.php">ACCOUNT DETAILS</a></li>
					<li><a href="#">LOG OUT</a></li>
				</ul>
			</div>
			<div class="col-md-12">
				<div class="accountAddress">
					<p>The following addresses will be used on the checkout page by default</p>
					
					<!-- Boş ise-->
					<div class="blankWrapper">
						<p>The address information registered to the system cannot be found.</p>
					</div>
					<!-- Boş ise-->
					
					<div class="wrapper">
						<div class="item">
							<h3>Billing Addresses</h3>
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
							<h3>Billing Addresses</h3>
							<h4>HOME</h4>
							<h5>Murat CAN</h5>
							<h6>Levent mahallesi kore sokağı no:23 Kat:12 daire 97 </h6>
							<h5>İstanbul / Levent - TURKEY</h5>
							<p>0555 000 00 00</p>
							<span class="edit">Edit</span>
						</div>
					</div>
					<button id="addNewAddress">NEW ADDRESS</button>
				</div>
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



<?include("footer.php");?>