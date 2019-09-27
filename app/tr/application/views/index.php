<section class="index">
	<div class="container">
		<div class="row">
			<div class="col-10 m-auto">
				<div id="v-player" data-plyr-provider="vimeo" data-plyr-embed-id="<?=$Lang->mainPageVideo?>"></div>
			</div>
		</div>
	</div>
</section>
<script src="<?=site_url('assets/Front/')?>js/plyr.min.js"></script>
<section class="showcase">
	<div class="container">
		<div class="row">
			<?php foreach ($main_products as $key => $val) { ?>
				<div class=" col-4 m-auto">
					<a href="<?=site_url('product/'.$val->slug.'/'.$val->Id)?>">
						<?php foreach ($val->images as $key2 => $val2) { ?>
							<img src="<?=main_site_url($val2->name)?>" alt="<?=$val->tr_product_name?>">
							<?php break; ?>
						<?php } ?>
						<img src="<?=main_site_url($val->product_image)?>" alt="<?=$val->tr_product_name?>">
						<h2><?=$val->tr_product_name?><span>+ Renk Seçenekleri</span></h2>
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
	</div>
</section>
<script>
	const controls = `
	<div class="plyr__controls om-controls">
	<div class="om-wrapper">
	<button type="button" class="plyr__control play-btn" aria-label="Play, {title}" data-plyr="play">


	<img alt="Play Pause Button" class="icon--not-pressed" xlink:href="#plyr-play" role="presentation" class src="<?=site_url('assets/Front/')?>images/icons/play-button.svg">

	<img alt="Play Pause Button" class="icon--pressed role="presentation""  xlink:href="#plyr-pause" src="<?=site_url('assets/Front/')?>images/icons/pause.svg">

	<span class="label--pressed plyr__tooltip" role="tooltip">Pause</span>
	<span class="label--not-pressed plyr__tooltip" role="tooltip">Play</span>
	</button>

	<div class="plyr__progress om-progress">

	<input data-plyr="seek" type="range" min="0" max="100" step="0.01" value="0" aria-label="Seek">

	<progress class="plyr__progress__buffer" min="0" max="100" value="0">% buffered</progress>

	<span role="tooltip" class="plyr__tooltip">00:00</span>
	</div>

	<div class="om-ts-area">

	<div class="om-timearea">
	<div class="plyr__time plyr__time--current" aria-label="Current time">00:00</div>
	<div class="plyr__time plyr__time--duration" aria-label="Duration">00:00</div>
	</div>

	<div class="om-soundarea">
	<button type="button" class="plyr__control" aria-label="Mute" data-plyr="mute">
	<svg class="icon--pressed" role="presentation"><use xlink:href="#plyr-muted"></use></svg>
	<svg class="icon--not-pressed" role="presentation"><use xlink:href="#plyr-volume"></use></svg>
	<span class="label--pressed plyr__tooltip" role="tooltip">Unmute</span>
	<span class="label--not-pressed plyr__tooltip" role="tooltip">Mute</span>
	</button>

	<div class="plyr__volume">
	<input data-plyr="volume" type="range" min="0" max="1" step="0.05" value="1" autocomplete="off" aria-label="Volume">
	</div>
	</div>

	<button type="button" class="plyr__control om-fullscreen" data-plyr="fullscreen">

	<img alt="Full Screen" class="icon--pressed" role="presentation" xlink:href="#plyr-exit-fullscreen" src="<?=site_url('assets/Front/')?>images/icons/minimize.svg" >
	<img alt="Full Screen" class="icon--not-pressed" role="presentation" xlink:href="#plyr-enter-fullscreen" src="<?=site_url('assets/Front/')?>images/icons/maximize.svg">

	<span class="label--pressed plyr__tooltip" role="tooltip">Exit fullscreen</span>
	<span class="label--not-pressed plyr__tooltip" role="tooltip">Enter fullscreen</span>
	</button>
	
	</div>

	</div>
	</div>
	`;
	const player = new Plyr('#v-player', {controls});
</script>
<h1 style="opacity:0;position:absolute;z-index: -1;">Raisa Vanessa</h1>
