<section class="paymentResult">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>CHECKOUT</h2>
				<ul class="cart-menu">
					<li><a href="javascript:void(0)">SHIPPING & BILLING</a></li>
					<li><a href="javascript:void(0)">PAYMENT</a></li>
					<li><a class="active" href="javascript:void(0)">ORDER</a></li>
				</ul>
			</div>
			<div class="col-md-12">
                <?php if (!isset($error)) { ?>
					<div class="item success">
						<img src="<?=site_url('assets/Front/')?>images/check.svg" alt="Payment Success">
						<p>PAYMENT</p>
						<p>SUCCESSFUL</p>
						<a href="<?=site_url('account/orders')?>">Go to my account</a>
					</div>
                <?php }else{ ?>
					<div class="item failed">
						<img src="<?=site_url('assets/Front/')?>images/error.svg" alt="Payment Failed">
						<p>PAYMENT FAILED</p>
						<h5><?=$error->errorGroup ?? ''?> ( <?=$error->errorMessage ?? ''?> )</h5>
						<a href="<?=site_url('cart')?>">Go to my cart</a>
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