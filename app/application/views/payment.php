<section class="payment">
	<div class="container">
		<div class="row">
			
			<form action="<?=site_url('cart/iyzipay')?>" id="CreditCart" class="card-form active" method="POST">
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
									<th>installments</th>
									<th>monthly payment</th>
									<th>total</th>
								</tr>
							</thead>
							<tbody class="TaksitList">
								<tr>
									<td>
										<input type="radio" id="hire-1" name="radioHire" value="1" checked>
										<label for="hire-1">Pay Cash</label>
									</td>
									<td><?=number_format(currencyChange($kur,$this->session->userdata('cur'),$this->cart->total()+$order->cargo),2,',','.')?>
									<?=getCurrencyCode($kur,$this->session->userdata('cur'))?></td>

									<td><?=number_format(currencyChange($kur,$this->session->userdata('cur'),$this->cart->total()+$order->cargo),2,',','.')?>
									<?=getCurrencyCode($kur,$this->session->userdata('cur'))?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="contract-area">
						<div class="item">
							<input type="checkbox" id="salescontract" name="salescontract">
							<label for="salescontract">I have read and confirm the <a target="_blank" href="">sales contract</a></label>
						</div>
						<div class="item">
							<input type="checkbox" id="terms" name="terms">
							<label for="terms">I have read and confirm the <a target="_blank" href="">terms and conditions</a></label>
						</div>
					</div>
				</div>
				<div class="amountArea">
					<p><?=$this->cart->total_items()?> ITEM</p>
					<p>PRODUCTS 
						<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$this->cart->total()),2,',','.')?>
						<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
					</p>
					<?php if ($order->cargo > 0) { ?>
						<p>CARGO 
							<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$order->cargo),2,',','.')?>
							<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
						</p>
					<?php } ?>
					<p>TOTAL 
						<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$this->cart->total()+$order->cargo),2,',','.')?>
						<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
					</p>
				</div>
				<div class="col-md-12"><a class="paymentProceed" href="javascript:void(0)" onclick="KartSiparisiTamamla()">PROCEED</a></div>
			</form>
		</div>
	</div>
</section>

<script>

	function ccNumberChange(){
		var bin = $('#number').val();
		var price = <?=currencyChange($kur,$this->session->userdata('cur'),$this->cart->total()+$order->cargo)?>;
		bin = bin.replace(' ','');
		bin = bin.substr(0, 6);
		if (bin.length==6) {
			$.ajax({
				type: "POST",
				dataType:"JSON",
				url: site_url+'Ajax/Bin/'+bin+'/'+price,
				success: function(data) {
					options = '';
					$.each(data.result, function(key, val) {
						if (data['3d'] == 1) {
							document.getElementById("guvenliodeme").checked = true;
							$('#guvenliodeme').attr('disabled','disabled');
							$('.Deneme').append('<input type="hidden" value="on" name="guvenliodeme" class="gecici3D"/>');
						}else{
							$('#guvenliodeme').removeAttr('disabled');
							$('.gecici3D').remove();
						}
						if (key == 0) {
							options += '\
							<tr>\
							<td>\
							<input type="radio" name="radioHire" id="hire-'+val.installmentNumber+'" value="'+val.installmentNumber+'" checked>\
							<label for="hire-'+val.installmentNumber+'">Pay Cash</label>\
							</td>\
							<td>'+val.installmentPrice+' <?=getCurrencyCode($kur,$this->session->userdata('cur'))?></td>\
							<td>'+val.installmentPrice+' <?=getCurrencyCode($kur,$this->session->userdata('cur'))?></td>\
							</tr';
						}else{
							options += '\
							<tr>\
							<td>\
							<input type="radio" name="radioHire" id="hire-'+val.installmentNumber+'" value="'+val.installmentNumber+'">\
							<label for="hire-'+val.installmentNumber+'">'+val.installmentNumber+' Piece</label>\
							</td>\
							<td>'+val.installmentPrice+' <?=getCurrencyCode($kur,$this->session->userdata('cur'))?></td>\
							<td>'+currencyFormatDE(val.totalPrice)+' $</td>\
							</tr';
						}

					});
					$('.RemevodItemTaksit').remove();
					$('.TaksitList').html(options);

					$('.TaksitList > li:first').attr('selected','selected');
				}
			});
		}
	};

	function KartSiparisiTamamla() {
		var i       = 0;
		var expiry  = $('#expiry').val();
		expiry      = expiry.split('/');
		var ccMonth = parseInt(expiry[0]);
		var ccYear  = parseInt('20'+(expiry[1] || '').trim());
		var ccName  = $('#first-name').val();
		var ccNumber= $('#number').val();
		var ccCvv   = $('#cvc').val();
		var date    = new Date();
		var Month   = date.getMonth()+1;
		var year    = date.getFullYear();
		if (ccYear<year) {
			i++;
		}else if (ccYear==year && ccMonth<Month) {
			i++;
		}



		$('.KartHata').remove();
		var a = [];
		if (i==0) {
			if (ccName.trim() == "") {
				a.push('<div class="KartHata alert alert-danger">Cardholder Field cannot be blank.</div>');
			}else if(ccNumber.trim().length < 15){
				a.push('<div class="KartHata alert alert-danger">Card Number Must Be More Than 15 Digits.</div>');
			}else if(ccCvv.trim().length < 3){
				a.push('<div class="KartHata alert alert-danger">Cvv Field Must Be More Than 3 Digits.</div>');
			}else if(valid_credit_card(ccNumber) == false) {
				a.push('<div class="KartHata alert alert-danger">Invalid Card Number.</div>');
			}else if ($('#terms').prop('checked') == false){
				a.push('<div class="KartHata alert alert-danger">terms & conditions Must Be Accepted.</div>');
			}else if ($('#salescontract').prop('checked') == false){
				a.push('<div class="KartHata alert alert-danger">sales contract Must Be Accepted.</div>');
			}else{
				$('#CreditCart').submit();  
			}
		}else{
			a.push('<div class="KartHata alert alert-danger">Card Expired</div>');
		}

		if (a.length > 0) {
			a = a.join('<br>');
			Swal.fire({
				type: 'error',
				title: 'Error !',
				html: a,
			});
		}
	}

	function valid_credit_card(value) {
  // accept only digits, dashes or spaces
  if (/[^0-9-\s]+/.test(value)) return false;

    // The Luhn Algorithm. It's so pretty.
    var nCheck = 0, nDigit = 0, bEven = false;
    value = value.replace(/\D/g, "");

    for (var n = value.length - 1; n >= 0; n--) {
    	var cDigit = value.charAt(n),
    	nDigit = parseInt(cDigit, 10);

    	if (bEven) {
    		if ((nDigit *= 2) > 9) nDigit -= 9;
    	}

    	nCheck += nDigit;
    	bEven = !bEven;
    }

    return (nCheck % 10) == 0;
}
</script>

<script>
	$(document).ready(function() {
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
	});

</script>