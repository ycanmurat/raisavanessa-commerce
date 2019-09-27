<section class="cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Alışveriş Sepeti</h2>
				<div class="Area">
					<div class="items">
						<?php if ($this->cart->contents() == array()) { ?>
							<p class="blank-basket">Alışveriş Sepetiniz Boş</p>
						<?php } ?>
						<?php foreach ($this->cart->contents() as $key => $val) { ?>
							<div class="item">
								<a href="<?=site_url('product/'.$val['slug'].'/'.$val['id'])?>" target="_blank"><img src="<?=$val['image']?>" alt=""></a>
								<p class="productName">
									<?=$val['name']?>
								</p>
								<div class="selection">
									<?php for ($i=1; $i < 5; $i++) { 
										if ($i <= $val['options']['colorDetail']->rules) { ?> 
											<?php $var = 'color'.$i; ?>
											<span class="color" style="background-color:<?=$val['options']['colorDetail']->{$var}?>"></span>
										<?php }
									} ?>
								</div>
								<span class="size">Beden : <?=$val['options']['size']?></span>
								<div class="quantity">
									<button type="button" class="quantity-left-minus"  data-id="<?=$key?>" data-type="minus">-</button>
									<input type="text" id="quantity" name="quantity" value="<?=$val['qty']?>">
									<button type="button" class="quantity-right-plus" data-id="<?=$key?>" data-type="plus" >+</button>
								</div>
								<p class="price">
									<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$val['price']*$val['qty']),2,',','.')?>
									<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
								</p>
								<div class="actions">
									<!-- <button href="#">SAVE FOR LATER</button> -->
									<button onclick="productDeleteToCart('<?=$key?>')">Sil</button>
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="addittion">
						<p>Sipariş Alt toplam
							<b>
								<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$this->cart->total()),2,',','.')?>
								<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
							</b>
						</p>
						<p class="total">Order Total 
							<b>
								<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$this->cart->total()),2,',','.')?>
								<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
							</b>
						</p>
						<p style="font-size:12px;">* Vergiler, gönderildiği ülkeye göre hesaplanacaktır.</p>
						<p style="font-size:12px;">* Nakliye bedeli, gönderildiği ülkeye göre hesaplanacaktır.</p>

						<!-- <p style="font-size:12px;">* Shipping price will be calculated regarding the country of shipment</p> -->
						

						<div class="buttonGroup">
							<button onclick="location.href='<?=site_url('cart/address')?>'">Alışverişi Tamamla</button>
							<button onclick="location.href='<?=site_url('cart/address')?>'">Misafir olarak ilerle</button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>


<script>
	$(document).ready(function(){

		var quantitiy=0;
		$('.quantity-right-plus').click(function(e){
			e.preventDefault();
			var quantity = parseInt($('#quantity').val());
			$('#quantity').val(quantity + 1);

		});

		$('.quantity-left-minus').click(function(e){
			e.preventDefault();
			var quantity = parseInt($('#quantity').val());
			if(quantity>1){
				$('#quantity').val(quantity - 1);
			}
		});

	});
</script>