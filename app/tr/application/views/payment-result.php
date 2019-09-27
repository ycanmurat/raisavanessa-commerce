<section class="paymentResult">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>SEPET</h2>
				<ul class="cart-menu">
					<li><a href="javascript:void(0)">Kargo & Fatura</a></li>
					<li><a href="javascript:void(0)">ÖDEME</a></li>
					<li><a class="active" href="javascript:void(0)">Sipariş</a></li>
				</ul>
			</div>
			<div class="col-md-12">
                <?php if (!isset($error)) { ?>
					<div class="item success">
						<img src="<?=site_url('assets/Front/')?>images/check.svg" alt="Ödeme Başarılı">
						<p>Ödeme</p>
						<p>Başarılı</p>
						<a href="<?=site_url('account/orders')?>">Hesabıma Git</a>
					</div>
                <?php }else{ ?>
					<div class="item failed">
						<img src="<?=site_url('assets/Front/')?>images/error.svg" alt="Ödeme Başarısız">
						<p>Ödeme Başarısız</p>
						<h5><?=$error->errorGroup ?? ''?> ( <?=$error->errorMessage ?? ''?> )</h5>
						<a href="<?=site_url('cart')?>">Sepetime Dön</a>
					</div>
                <?php } ?>
			</div>
		</div>
	</div>
</section>
<script>
	fbq('track', 'Purchase', {value: <?=currencyChange($kur,$this->session->userdata('cur'),$detail->price+$detail->cargo)?>, currency: '<?=$this->session->userdata('cur')?>'});
	
    var googleProducts = [];
    <?php $pPrice = 0; ?>
    <?php foreach ($detail->lines as $key => $val) { ?>
        googleProducts.push({
            id: "<?=$val->id?>",
            name: "<?=$val->name?>",
            price: <?=$val->price?>,
            quantity: <?=$val->qty?>,
            variant: "<?=$val->color?>-<?=$val->size?>"
        });
        <?php $pPrice += $val->price*$val->qty ?>
    <?php } ?>
    gtag("event", "purchase", {
        transaction_id: "<?=$detail->id?>",
        currency: "EUR",
        shipping: <?=$detail->cargo?>,
        affiliation: "PRODUCT_BRAND",
        value: <?=$detail->cargo+$pPrice?>,
        items: googleProducts
    });
</script>