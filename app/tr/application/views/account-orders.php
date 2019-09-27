<section class="account orders">
	<div class="container">
		<div class="row">
			<?php $this->load->view('account-menu')?>
			<div class="col-md-12">
				<div class="accountOrders">
					<?php if ($orders == array()) { ?>
						<div class="blankOrder">
							<a href="<?=site_url('category/last')?>">Ürünleri Gör</a><p>Henüz siparişiniz bulunmamaktadır</p>
						</div>
		            <?php }else{ ?>
						<div class="orders">
							<?php foreach ($orders as $key => $val) { ?>
								<div class="item">
									<div class="content">
										<span class="status"><?=admin_order_status($val->status)?></span>
										<p class="orderNumber">Sipariş Numarası. <?=$val->id?></p>
										<!-- <p>DELIVERED ON 4/2/2021</p> -->
										<p><?=dateparse($val->added_time)?> - <?=number_format($val->price,2,',','.') ?> €</p>
									</div>
									<?php if (!empty($val->cargotext)) { ?>
										<a class="cargoTrack" href="#"><?=$val->cargotext?></a>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>