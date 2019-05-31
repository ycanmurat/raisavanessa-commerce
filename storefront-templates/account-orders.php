<?include("header.php");?>
<section class="account orders">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>ACCOUNT</h2>
				<ul>
					<li><a href="account-wishlist.php">WISHLIST</a></li>
					<li><a class="active" href="account-orders.php">ORDERS</a></li>
					<li><a href="account-address.php">ADDRESSES</a></li>
					<li><a href="account.php">ACCOUNT DETAILS</a></li>
					<li><a href="#">LOG OUT</a></li>
				</ul>
			</div>
			<div class="col-md-12">
				<div class="accountOrders">

					<div class="blankOrder">
						<a href="#">Browse products</a><p>No order has been made yet</p>
					</div>

					<div class="orders">

						<div class="item">
							<a href="#" target="_blank"><img src="images/ex.png" alt=""></a>
							<div class="content">
								<span class="status">DELIVERED</span>
								<p class="orderNumber">ORDER NO. 4521</p>
								<p>DELIVERED ON 4/2/2021</p>
								<p>28/1/2021 - 1,499.70 TL</p>
							</div>
							<a class="cargoTrack" href="#">TRACK ORDER</a>
						</div>

						<div class="item">
							<a href="#" target="_blank"><img src="images/ex2.png" alt=""></a>
							<div class="content">
								<span class="status">DELIVERED</span>
								<p class="orderNumber">ORDER NO. 4521</p>
								<p>DELIVERED ON 4/2/2021</p>
								<p>28/1/2021 - 1,499.70 TL</p>
							</div>
							<a class="cargoTrack" href="#">TRACK ORDER</a>
						</div>

						<div class="item">
							<a href="#" target="_blank"><img src="images/ex3.png" alt=""></a>
							<div class="content">
								<span class="status">DELIVERED</span>
								<p class="orderNumber">ORDER NO. 4521</p>
								<p>DELIVERED ON 4/2/2021</p>
								<p>28/1/2021 - 1,499.70 TL</p>
							</div>
							<a class="cargoTrack" href="#">TRACK ORDER</a>
						</div>


					</div>


				</div>
			</div>
		</div>
	</div>



</section>


<?include("footer.php");?>