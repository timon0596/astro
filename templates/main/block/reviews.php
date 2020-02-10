<?php
$part = get_post('reviews');
$list = get_posts('reviews',false,true);
//var_dump( $reviews );
?>
<section id="reviews" class="reviews">
	<div class="limit">
		<div class="content">
				<div class="part ta-c anim-in-down">
					<h2 class="b title-decor"><?=$part['title'];?></h2>
				</div>
				<div class="part anim-in-up">
					<div class="reviews__slider">
						<?php foreach ($list as $key => $item): ?>
							<div>
								<div class="reviews__item">
									<div class="title d-g gg-1">
										<div class="bdr-50" style="background-image: url('/templates/main/img/koza-zima-800x533-800x533.jpg');">
											<div class="ratio-1-1"></div>
										</div>
										<div class="d-g ac-c"><?=$item['title'];?></div>
									</div>
									<div class="underline"></div>
									<div class="c-g h4">
										<?=$item['content'];?>
									</div>
									<div class="c-w pointer">Свернуть</div>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
		</div>
	</div>
</section>