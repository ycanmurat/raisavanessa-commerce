<script>
	var prices = '<?=json_encode($product->size)?>'
</script>
<input type="hidden" id="product_id" value="<?=$product->Id?>">
<input type="hidden" id="product_cur" value="<?=$this->session->userdata('cur')?>">
<input type="hidden" id="product_price" value="<?=currencyChange($kur,$this->session->userdata('cur'),$product->price)?>">
<input type="hidden" id="product_cat" value="Apparel & Accessories > Shoes"> <!-- Kategoriler gelecek -->

<script src="<?=site_url('assets/Front/')?>js/jquery.zoom.js"></script>
<section class="productDetail">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="productLfArea">
					<video style='width:100%;margin:auto;' src="<?=site_url('/assets/uploads/test.mp4') ?>" autobuffer autoloop loop controls ></video>
					<div class="zoomImage">
						<img src="<?=site_url($product->product_image)?>" alt="<?=$product->product_name?>">
					</div>

					<?php foreach ($product->images as $key => $val) { ?>
						<div class="zoomImage">
							<img src="<?=site_url($val->name)?>" <?=$key == 0?'id="mainImage"':''?> alt="<?=$product->product_name?>">
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-4">
				<input type="hidden" id="product_slug" value="<?=$product->slug?>">
				<input type="hidden" id="product_price" value="<?=$product->price?>">
				<input type="hidden" id="product_slug_tr" value="<?=$product->tr_slug?>">
				<div class="detailConsole">
					<button class="addToWishlist <?=$favStatus?'added':''?>" onclick="addfavorites(<?=$product->Id?>)">
						<img src="<?=site_url('assets/Front/images/like.svg')?>" alt="add to wish list">
					</button>
					<div class="content">
						<p>NEW</p>
						<h2 id="productName"><?=$product->product_name?></h2>
						<h3>
							<span id="currentPrice"><?=number_format(currencyChange($kur,$this->session->userdata('cur'),$product->price),2,',','.')?></span>
							<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
						</h3>
						<p>Prices may vary above 40</p>
					</div>
					<div class="interactions">
						<div class="size">
							<?php if (empty($product->onlySize)) { ?>
								
							<?php }else{ ?>
								<select name="size">
									<?php foreach ($product->onlySize as $key => $val) { ?>
										<option value="<?=$val?>"><?=$val?></option>
									<?php } ?>
								</select>
							<?php } ?>
							<button onclick="window.location.href='<?=site_url('category/bespoke?product=').$product->Id?>'">BESPOKE</button>
						</div>

						<div class="colours">
							<?php foreach ($product->onlyColor as $key => $val) { ?>
								<div class="color">
									<input type="radio" id="color_<?=$val->name?>" name="color" value="<?=$val->name?>" <?=$key==0?'checked':''?>>
									<label for="color_<?=$val->name?>">
										<?php for ($i=1; $i < 5; $i++) { 
											if ($i <= $val->rules) { ?> 
												<?php $var = 'color'.$i; ?>
												<span style="background-color:<?=$val->{$var}?>"></span>
											<?php }
										} ?>
									</label>
								</div>
							<?php } ?>

							<?php foreach ($product->colors as $key => $val) { ?>
								<div class="color">
									<a href="<?=site_url('product/'.$val->slug.'/'.$val->product_id)?>">
										<label for="color_<?=$val->name?>">
											<?php for ($i=1; $i < 5; $i++) { 
												if ($i <= $val->rules) { ?> 
													<?php $var = 'color'.$i; ?>
													<span style="background-color:<?=$val->{$var}?>"></span>
												<?php }
											} ?>
										</label>
									</a>
								</div>
							<?php } ?>
						</div>
						<button onclick="addToCart(<?=$product->Id?>)">ADD TO CART</button>
						<div class="details">
							<h3>PRODUCT DETAILS <span class="trigger"></span></h3>
							<?=$product->description?>
						</div>
						<div class="fittest">
							<h3>SIZE & FIT</h3>
						</div>
						<div class="more ">
							<h3>SHIPPING & RETURNS <span class="trigger"></span></h3>
							<ul>
								<li>
									<p>
										<a target="_blank" href="<?=site_url('s/shipping-policy')?>">For Shipping click here</a>
										<a target="_blank" href="<?=site_url('s/returns-exchange')?>">For Returns click here</a>
									</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<script>
				function priceChange() {
					var size = $('[name=size]').val();
					var color = $('[name=color]:checked').val();

					var data = JSON.parse(prices);

					$.each(data, function(index, val) {
						if (val.color == color && val.size == size) {
							if (val.price == 0 || val.price == undefined) {
								$('#currentPrice').text('<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$product->price),2,',','.')?>');
								$('#product_price').val(<?=$product->price?>);
							}else{
								$('#currentPrice').text(val.priceCurrent);
								$('#product_price').val(val.price);
							}
						}
					});
				}

				$(document).ready(function() {
					priceChange();
				});

				$(document).on('change', '[name=color]', function() {
					priceChange();
				});

				$(document).on('change', '[name=size]', function() {
					priceChange();
				});
			</script>
			<?php if ($product->similar != array()) { ?>
				<div class="col-md-12">
					<h3 class="toWearTitle">WHAT TO WEAR WITH</h3>
					<div class="wearWith">
						<?php foreach ($product->similar as $key => $val) { ?>
							<div class="item">
								<a href="<?=site_url('product/'.$val->slug.'/'.$val->id)?>">
									<img src="<?=site_url($val->product_image)?>" alt="<?=$val->product_name?>">
									<h2><?=$val->product_name?></h2>
									<p>
										<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$val->price),2,',','.')?>
										<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
									</p>
									<?php if ($val->preorder == 1) { ?>
										<span class="listingBadge">PREORDER</span>
									<?php } ?>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>

<div class="sizesWrapper">
	<span id="closeSizesWrapper"><img src="<?=site_url('assets/Front/')?>images/cancel.svg"></span>
	<img src="<?=site_url('assets/Front/')?>images/sizes.png">
</div>

<script>
	$(document).ready(function() {
		$("[data-fancybox]").fancybox({
			buttons: [
			"zoom",
			"share",
			"fullScreen",
			"close"
			]
		});
		if ($(window).width() > 960) {
			$('.zoomImage').zoom({magnify:1.5});
		}

	});
	$('section.productDetail .interactions .fittest h3').click(function(event) {
		$('.sizesWrapper').addClass('active');
	});

	$('#closeSizesWrapper').click(function(event) {
		$('.sizesWrapper').removeClass('active');
	});	

	$('.details h3').click(function(event) {
		$(this).closest('.details').toggleClass('active');
	});

	$('.more h3').click(function(event) {
		$(this).closest('.more').toggleClass('active');
	});
</script>