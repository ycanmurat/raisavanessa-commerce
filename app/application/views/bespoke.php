<section class="bespoke">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="bodyWrapper">
					<img src="<?=site_url('assets/Front/')?>images/bespoke.png" alt="bespoke">
					<div class="inputsWrapper">
						<div class="inputGroup" style="color:#FA9B97">
							<span>1.</span>
							<input style="border: none;border-bottom:2px solid #FA9B97;color:#FA9B97" id="bespoke_1" type="text">
							<label for="bespoke_1">Required length of Coat / Jacket</label>
						</div>
						<div class="inputGroup" style="color:#F9E7BF">
							<span>2.</span>
							<input style="border: none;border-bottom:2px solid #F9E7BF;color:#F9E7BF" id="bespoke_2" type="text">
							<label for="bespoke_2">Sleeve length</label>
						</div>
						<div class="inputGroup" style="color:#E49DBD">
							<span>3.</span>
							<input style="border: none;border-bottom:2px solid #E49DBD;color:#E49DBD" id="bespoke_3" type="text">
							<label for="bespoke_3">Shoulders - measured at the black from the knobbly bit</label>
						</div>
						<div class="inputGroup" style="color:#64779F">
							<span>4.</span>
							<input style="border: none;border-bottom:2px solid #64779F;color:#64779F" id="bespoke_4" type="text">
							<label for="bespoke_4">Upper chest (above bust)</label>
						</div>
						<div class="inputGroup" style="color:#FAACD3">
							<span>5.</span>
							<input style="border: none;border-bottom:2px solid #FAACD3;color:#FAACD3" id="bespoke_5" type="text">
							<label for="bespoke_5">Full bust</label>
						</div>
						<div class="inputGroup" style="color:#5A9FD8">
							<span>6.</span>
							<input style="border: none;border-bottom:2px solid #5A9FD8;color:#5A9FD8" id="bespoke_6" type="text">
							<label for="bespoke_6"> Under bust</label>
						</div>
						<div class="inputGroup" style="color:#AF9FBC">
							<span>7.</span>
							<input style="border: none;border-bottom:2px solid #AF9FBC;color:#AF9FBC" id="bespoke_7" type="text">
							<label for="bespoke_7">Waist (narrowest part)</label>
						</div>
						<div class="inputGroup" style="color:#ECBA85">
							<span>8.</span>
							<input style="border: none;border-bottom:2px solid #ECBA85;color:#ECBA85" id="bespoke_8" type="text">
							<label for="bespoke_8">High hip</label>
						</div>
						<div class="inputGroup" style="color:#7A8E72">
							<span>9.</span>
							<input style="border: none;border-bottom:2px solid #7A8E72;color:#7A8E72" id="bespoke_9" type="text">
							<label for="bespoke_9">Hips (fullest part)</label>
						</div>
						<div class="inputGroup" style="color:#A4BBDA">
							<span>10.</span>
							<input style="border: none;border-bottom:2px solid #A4BBDA;color:#A4BBDA" id="bespoke_10" type="text">
							<label for="bespoke_10">Armpit / Shoulder diameter</label>
						</div>
						<div class="inputGroup" style="color:#F2AEBD">
							<span>11.</span>
							<input style="border: none;border-bottom:2px solid #F2AEBD;color:#F2AEBD" id="bespoke_11" type="text">
							<label for="bespoke_11">Bicep (widest part)</label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<p>Select the product</p>
				<div class="bespokeFilter">
					<input type="text" placeholder="FILTER.." id="bespokeFilter">
				</div>
				<div class="items">
					<?php foreach ($products as $key => $val) { ?>
						<?php if (empty($selected)) { ?>
							<input type="radio" name="products" id="<?=$val->id?>" value="<?=$val->id?>" <?=$key == 0?'checked':''?>/>
						<?php }else{ ?>
							<input type="radio" name="products" id="<?=$val->id?>" value="<?=$val->id?>" <?=$val->id == $selected?'checked':''?>/>
						<?php } ?>

						<?php if (empty($selected)) { ?>
							<label for="<?=$val->id?>" class="<?=$key == 0?'checked':''?>" />
							<?php } else{ ?>
							<label for="<?=$val->id?>" class="<?=$val->id == $selected?'checked':''?>"/>
							<?php } ?>
							<div class="item">
								<div class="content">
									<p><a target="_blank" href="<?=site_url('product/'.$val->slug.'/'.$val->id)?>"><?=$val->product_name?></a></p>
									<b>
										<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$val->price),2,',','.')?>
										<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
									</b>
								</div>
								<img src="https://raisavanessa.com/thumb.php?src=<?=site_url($val->product_image)?>&size=90x129&zoom=0&crop=0&trim=0" alt="<?=$val->product_name?>">
							</div>
							</label>
					<?php } ?>
				</div>
				<div class="bespokeInteractive">
					<textarea id="notes" placeholder="NOTES AND contact information"></textarea>
					<a href="javascript:void(0)" onclick="addBespoke()">PROCEED</a>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function($) {
		$("#bespokeFilter").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$(".items label").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});

	function getBespokeProduct () {
		productName = $('section.bespoke label.checked a').html();
		$('#bespokeFilter').attr('value',productName);
		var value = productName.replace(/(^"|"$)/g, '').toLowerCase();
			$(".items label").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
	}

	$(document).ready(function() {
		if (window.location.search != '') {
			getBespokeProduct();
		}else{
			console.log('done.')
		}
	});
</script>