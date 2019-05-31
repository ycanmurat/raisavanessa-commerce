<?include("header.php");?>
<section class="payment">
	<div class="container">
		<div class="row">
			
			<form action="payment-result.php" id="CreditCart" class="card-form active">
				<div class="col-md-12">
					<h2>CHECKOUT</h2>
					<ul class="cart-menu">
						<li><a href="javascript:void(0)">SHIPPING & BILLING</a></li>
						<li><a class="active" href="javascript:void(0)">PAYMENT</a></li>
						<li><a href="javascript:void(0)">ORDER</a></li>
					</ul>
				</div>

				<div class="col-md-12 m-auto">
					<div class="card-area">
						<div class="credit-card is-front">
							<div class='card-wrapper'></div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="inputgroup">
						<div class="item">
							<label>CARD NUMBER</label>
							<input class="number" name="number" id="number" maxlength="19" onchange="ccNumberChange()" placeholder="0000 0000 0000 0000"/>
						</div>
						<div class="item">
							<label>CARD HOLDER NAME</label>
							<input type="text" class="name" id="first-name" name="first-name"  placeholder="NAME SURNAME">
						</div>
					</div>
					<div class="inputgroup">
						<div class="inputgroup">
							<div class="item">
								<label>EXPIRATION DATE</label>
								<input type="text" name="expiry" id="expiry" maxlength="7" placeholder="MM/YY">
							</div>
							<div class="item">
								<label>CVV</label>
								<input type="text" class="cvv" name="cvc" id="cvc" maxlength="4" placeholder="000"/>
							</div>
						</div>
					</div>
					<div class="guvenliode">
						<input type="checkbox" id="guvenliodeme" name="guvenliodeme">
						<label for="guvenliodeme">Make 3D Secure Payment</label>
						<div class="Deneme"></div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="installment">
						<div class="info">You must enter your credit card information to view installment options..</div>
						<table>
							<thead>
								<tr>
									<th>Number of Installments</th>
									<th>Monthly Payment</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody class="TaksitList">
								<tr>
									<td>
										<input type="radio" id="hire-1" name="radioHire" value="1" checked>
										<label for="hire-1">pay in 2</label>
									</td>
									<td>$ 150.15</td>

									<td>$ 150.15</td>
								</tr>
								<tr>
									<td>
										<input type="radio" id="hire-2" name="radioHire" value="2" >
										<label for="hire-2">pay in 4</label>
									</td>
									<td>$ 1,150.15</td>

									<td>$ 150.15</td>
								</tr>
								<tr>
									<td>
										<input type="radio" id="hire-3" name="radioHire" value="3" >
										<label for="hire-3">pay in 6</label>
									</td>
									<td>$ 150.15</td>

									<td>$ 2,150.15</td>
								</tr>
								<tr>
									<td>
										<input type="radio" id="hire-4" name="radioHire" value="4" >
										<label for="hire-4">Pay Cash</label>
									</td>
									<td>$ 150.15</td>

									<td>$ 150.15</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="contract-area">
						<div class="item">
							<input type="checkbox" id="preliminaryinformation" name="preliminaryinformation">
							<label for="preliminaryinformation">I have read and confirm the <a target="_blank" href="">sales contract</a></label>
						</div>
						<div class="item">
							<input type="checkbox" id="distancesales" name="distancesales">
							<label for="distancesales">I have read and confirm the <a target="_blank" href="">terms and conditions</a></label>
						</div>
					</div>
				</div>
				<div class="amountArea">
					<p>1 ITEM</p>
					<p>TOTAL $235.15</p>
				</div>
				<div class="col-md-12"><button onclick="location.href='payment-result.php'">PROCEED</button></div>
			</form>
		</div>
	</div>
</section>

<script>
	var card = new Card({
		form: '.card-form',
		container: '.card-wrapper',

		formSelectors: {
			nameInput: 'input[name="first-name"], input[name="last-name"]'
		},
		placeholders: {
			number: '____ ____ ____ ____',
			name: 'NAME SURNAME',
			expiry: 'MM/YY',
			cvc: '000'
		}
	});
</script>
<?include("footer.php");?>