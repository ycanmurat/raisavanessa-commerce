<section class="listing">
	<div class="container-fluid">
		<div class="row mainProducts">
			<?php foreach ($products as $key => $val) { ?>
				<div class=" col-4">
					<a href="<?=site_url('product/'.$val->slug.'/'.$val->Id)?>">
						<?php foreach ($val->images as $key2 => $val2) { ?>
							<img src="<?=site_url($val2->name)?>" alt="<?=$val->product_name?>">
							<?php break; ?>
						<?php } ?>
						<img src="<?=site_url($val->product_image)?>" alt="<?=$val->product_name?>">
						<h2><?=$val->product_name?><span>+ COLORS</span></h2>
						<p>
							<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$val->price),2,',','.')?> 
							<?=getCurrencyCode($kur,$this->session->userdata('cur'))?> 
							<span>
								<?php if ($val->old_price > 0) { ?>
									<?=number_format(currencyChange($kur,$this->session->userdata('cur'),$val->old_price),2,',','.')?> 
									<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>
								<?php } ?>
							</span>
						</p>
						<?php if ($val->old_price != 0) { ?>
							<span class="listingBadge">SALE</span>
						<?php }elseif($val->preorder == 1){ ?>
							<span class="listingBadge">PREORDER</span>
						<?php } ?>
					</a>
				</div>
			<?php } ?>
		</div>
		<div>
			<center>
				<?php if ($type == 1) { ?>
					<a href="javascript:void(0)" id="wiewMoreButton" onclick="wiewMore(<?=$category->id?>,2)">View More</a>
				<?php }elseif($type == 2){ ?>
					<a href="javascript:void(0)" id="wiewMoreButton" onclick="wiewMore('last',2)">View More</a>
				<?php }elseif($type == 3){ ?>
					<a href="javascript:void(0)" id="wiewMoreButton" onclick="wiewMore('sale',2)">View More</a>
				<?php } ?>
			</center>
		</div>
	</div>
</section>
<script>
	function wiewMore(category,page) {
		
        $.ajax({
            url: site_url + 'Ajax/loadMore/'+category+'/'+page,
            method: 'GET',
            dataType: 'JSON',
            success: function (result) {
            	if (result.status) {
            		textData = '';
					$.each(result.data.products, function(index, val) {
						console.log(val);
            			textData += '\
            	<div class="col-4">\
					<a href="'+site_url+'product/'+val.slug+'/'+val.Id+'">';
						$.each(val.images, function(index2, val2) {
							 textData += '<img src="'+site_url+val2.name+'" alt="'+val.product_name+'">';
							 return false;
						});
						textData +='\
						<img src="'+site_url+val.product_image+'" alt="'+val.product_name+'">\
						<h2>'+val.product_name+'<span>+ COLORS</span></h2>\
						<p>'+val.currentPrice+'<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>\
							<span>';
							if (val.old_price > 0) {
								textData += val.currentOldPrice + 
								'<?=getCurrencyCode($kur,$this->session->userdata('cur'))?>'
							}

							textData += '\
							</span>\
						</p>';
						if (val.old_price != 0) {
							textData += '<span class="listingBadge">SALE</span>';
						}else if(val.preorder == 1){
							textData += '<span class="listingBadge">PREORDER</span>';
						}

						textData += '\
					</a>\
				</div>';
            		});
            		$('.mainProducts').append(textData);
            		if (result.data.isLast) {
            			$('#wiewMoreButton').hide();
            		}
            		$('#wiewMoreButton').attr('onclick','wiewMore("'+category+'",'+result.data.nextPage+')');
            	}
            },
            error: function (result) {
                $('#SignInErrors').html('<p class="alert alert-danger">Sorry, we encountered a technical error.</p>');
            }
        });
	}
</script>