<section id="adventages" class="adventages">
	<div class="limit">
		<div class="content">

			<!-- ADVENTAGES -->


			<?php
			$part = get_post('adventages');
			$list = get_posts('adventages', false, true);
			// debug($list);
			?>

			<div class="part anim-in-l">
				<h2 class="b upper"><?=$part['title'];?></h2>
			</div>

			<div class="part">
				<div class="d-g gtc-4 gg-2 anim-group-in-up" style="/*grid-template-columns: repeat(auto-fit, minmax(auto,10em) minmax(auto,10em)); justify-content: space-around;*/">

					<?php foreach ($list as $item) :?>

						<div class="d-g gg-1 anim-item" style="grid-template-rows: auto 1fr;">
							<div>
								<div class="marg-a maxw-6">
									<div class="ratio-1-1">
										<div class="" style="background-image: url(<?=get_media_uri($item['img']);?>);"></div>
									</div>
								</div>
							</div>
								
							<div class="ta-c">
								<p class="m-h-a maxw-11 b upper"><?=$item['title'];?></p>
								
								<div class="c-g"><?=$item['description'];?></div>
							</div>
						</div>

					<?php endforeach; ?>

				</div>
			</div>

		</div>
	</div>
</section>