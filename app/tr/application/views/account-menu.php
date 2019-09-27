<div class="col-md-12">
	<h2>HESABIM</h2>
	<ul>
		<li><a <?=($step==1?'class="active" ':'')?> href="<?=site_url('account')?>">HESAP DETAYLARI</a></li>
		<li><a <?=($step==2?'class="active" ':'')?> href="<?=site_url('account/address')?>">ADRESLERİM</a></li>
		<li><a <?=($step==3?'class="active" ':'')?> href="<?=site_url('account/wishlist')?>">FAVORİLERİM</a></li>
		<li><a <?=($step==4?'class="active" ':'')?> href="<?=site_url('account/orders')?>">SİPARİŞLERİM</a></li>
		<li><a href="<?=site_url('log-out')?>">ÇIKIŞ YAP</a></li>
	</ul>
</div>