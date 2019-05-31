<?include("header.php");?>
<section class="account detail">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>ACCOUNT</h2>
				<ul>
					<li><a href="account-wishlist.php">WISHLIST</a></li>
					<li><a href="account-orders.php">ORDERS</a></li>
					<li><a href="account-address.php">ADDRESSES</a></li>
					<li><a class="active" href="account.php">ACCOUNT DETAILS</a></li>
					<li><a href="#">LOG OUT</a></li>
				</ul>
			</div>
			<div class="col-md-12">
				<div class="accountSettings">
					<form action="" class="row">
						<div class="col-md-6">
							<div class="item">
								<label for="">Name Surname*</label>
								<input type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="item">
								<label for="">EMAIL*</label>
								<input type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="item">
								<label for="">PHONE NUMBER*</label>
								<input type="number">
							</div>
						</div>
						<div class="col-md-6">
							<div class="item">
								<label for="">AGE*</label>
								<input type="date">
							</div>
						</div>
						<div class="col-md-12">
							<div class="passwordChangeWrapper">
								<h3>Password Change</h3>
								<div class="item">
									<label for="">Current password (leave blank to leave unchanged)</label>
									<input type="password">
								</div>
								<div class="item">
									<label for="">New password (leave blank to leave unchanged)</label>
									<input type="password">
								</div>
								<div class="item">
									<label for="">Confirm new password</label>
									<input type="password">
								</div>
							</div>
							<button>SAVE CHANGES</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?include("footer.php");?>