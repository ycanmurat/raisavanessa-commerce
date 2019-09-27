<section class="account wishlist">
	<div class="container">
		<div class="row">
			<?php $this->load->view('account-menu')?>
			<div class="col-md-12">
				<div class="accountWishlist">
					<?php if (empty($favorites)) { ?>
						<div class="blankOrder">
							<a href="<?=site_url('category/last')?>">Ürünleri Gör</a><p>Henüz favorilerinizde ürün bulunmamaktadır</p>
						</div>
					<?php }else{ ?>
						<div class="row">
							<?php foreach ($favorites as $key => $val) { ?>
								<div class="col-md-4">
									<div class="item">
										<span class="remove" onclick="addfavorites(<?=$val->Id?>);setTimeout(function(){location.reload();},500)">Remove</span>
										<a href="<?=site_url('product/'.$val->slug.'/'.$val->Id)?>">
											<img src="<?=site_url($val->product_image)?>" alt="<?=$val->product_name?>">
											<p><?=$val->product_name?></p>
											<span><?=$val->price?></span>
										</a>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>