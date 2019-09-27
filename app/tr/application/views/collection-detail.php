<section class="collections">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="collectionTitles">
					<h1><?=$detail->category_title?></h1>
					<h2><?=$detail->category_title?></h2>
					<p><?=$detail->content?></p>
				</div>
			</div>
		</div>
		<div class="col-md-8 m-auto" style="padding: 0px 10px;">
			<div class="row">
				<?php foreach ($detail->images as $key => $val) { ?>
					<div class="col-6">
						<a data-fancybox="detail-img" href="<?=main_site_url($val->image_url)?>">
							<img id="mainImage" src="<?=main_site_url($val->image_url)?>">
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function() {
		$("[data-fancybox]").fancybox({
			buttons: [
			"zoom",
			"share",
			"slideShow",
			"fullScreen",
			"thumbs",
			"close"
			]
		});
	});
</script>