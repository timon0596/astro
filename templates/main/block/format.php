<section class="">
	<div class="limit">
		<div class="content">

			<div class="part c-1 anim-in-r">
				<h2 class="ta-c">Формат работ</h2>
			</div>

			<?php $array = get_posts('format', false, true); ?>

			<div class="part c-1">
				<div class="d-g gg-2 anim-group-in-up gtc-4 jc-sb" style="/*grid-template-columns: repeat(auto-fit, minmax(auto,10em) minmax(auto,10em)); justify-content: space-around;*/">

					<?php foreach ($array as $item) :?>

						<div class="d-g gg-1 anim-item" style="grid-template-rows: auto 4em;">
							<div>
								<div class="marg-a" style="max-width: 6em;">
									<div class="ratio-1-1">
										<div class="" style="background-image: url(<?=get_media_uri($item['img']);?>);"></div>
									</div>
								</div>
							</div>
								
							<div class="ta-c" style="">
								<span class="d-ib p" style="">
									<?=$item['title'];?>
								</span>
							</div>
						</div>

					<?php endforeach; ?>

				</div>
			</div>

		</div>
	</div>
</section>