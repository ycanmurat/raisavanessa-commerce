<?include("header.php");?>
<section class="paymentResult">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>CHECKOUT</h2>
				<ul class="cart-menu">
					<li><a href="javascript:void(0)">SHIPPING & BILLING</a></li>
					<li><a href="javascript:void(0)">PAYMENT</a></li>
					<li><a class="active" href="javascript:void(0)">ORDER</a></li>
				</ul>
			</div>
			<div class="col-md-12">
				<div class="item success">
					<img src="images/check.svg" alt="Payment Success">
					<p>PAYMENT</p>
					<p>SUCCESSFUL</p>
					<a href="account-orders.php">Go to my account</a>
				</div>
				<div class="item failed">
					<img src="images/error.svg" alt="Payment Success">
					<p>PAYMENT FAILED</p>
					<a href="cart.php">Go to my cart</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?include("footer.php");?>