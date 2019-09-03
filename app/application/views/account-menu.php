<div class="col-md-12">
	<h2>ACCOUNT</h2>
	<ul>
		<li><a <?=($step==1?'class="active" ':'')?> href="<?=site_url('account')?>">ACCOUNT DETAILS</a></li>
		<li><a <?=($step==2?'class="active" ':'')?> href="<?=site_url('account/address')?>">ADDRESSES</a></li>
		<li><a <?=($step==3?'class="active" ':'')?> href="<?=site_url('account/wishlist')?>">WISHLIST</a></li>
		<li><a <?=($step==4?'class="active" ':'')?> href="<?=site_url('account/orders')?>">ORDERS</a></li>
		<li><a href="<?=site_url('log-out')?>">LOG OUT</a></li>
	</ul>
</div>