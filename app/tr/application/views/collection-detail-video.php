<section class="collections">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="collectionTitles">
					<h1><?=$detail->category_title?></h1>
				</div>
			</div>
			<div class="col-md-12">
				<div class="videoWrapper">
					<div id="v-player" data-plyr-provider="vimeo" data-plyr-embed-id="<?=$detail->video?>"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	const controls = `
	<div class="plyr__controls om-controls">
	<div class="om-wrapper">
	<button type="button" class="plyr__control play-btn" aria-label="Play, {title}" data-plyr="play">


	<img class="icon--not-pressed" xlink:href="#plyr-play" role="presentation" class src="<?=site_url('assets/Front/')?>images/icons/play-button.svg">

	<img class="icon--pressed role="presentation""  xlink:href="#plyr-pause" src="<?=site_url('assets/Front/')?>images/icons/pause.svg">

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

	<img class="icon--pressed" role="presentation" xlink:href="#plyr-exit-fullscreen" src="<?=site_url('assets/Front/')?>images/icons/minimize.svg" >
	<img class="icon--not-pressed" role="presentation" xlink:href="#plyr-enter-fullscreen" src="<?=site_url('assets/Front/')?>images/icons/maximize.svg">

	<span class="label--pressed plyr__tooltip" role="tooltip">Exit fullscreen</span>
	<span class="label--not-pressed plyr__tooltip" role="tooltip">Enter fullscreen</span>
	</button>
	
	</div>

	</div>
	</div>
	`;
	const player = new Plyr('#v-player', {controls});
</script>
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