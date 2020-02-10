<?php
$part = get_post('astrologers');
$list = get_posts($part['id'],false,true);
// debug($list);
?>
<section id="astrologers" class="astrologers">
	<div class="limit">
		<div class="content">
			<div class="part anim-in-l ta-c">
				<h2 class="b title-decor"><?=$part['title'];?></h2>
			</div>
			<div class="anim-in-up">
				<!-- <div class="">
					<?= $part['content']; ?>
				</div> -->
				<div class="part">
					<div class="d-g gtc-1-2 astrolog gg-2">
						<div style="background-image: url('/templates/main/img/shutterstock_492562780_be_you_resized.jpg');">
							<div class="ratio-4-3"></div>
						</div>
							
							<div class="d-g gg-2">
								<div>
									<h3 class="f-0">Сергиенко Алексей Андреевич</h3>
									<p>Эзотерик и нумеролог</p>
								</div>
								<div class="c-g h4">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo adipisci, magnam dolores, soluta accusantium incidunt id impedit necessitatibus quaerat consectetur voluptas porro quos iste atque sunt at ipsum inventore quia consequatur voluptates in culpa architecto commodi! Sunt tenetur, ipsum, aliquid sequi maxime atque aspernatur laborum quibusdam sint quos, amet in?</p>
								</div>
							</div>
								
							
					</div>
				</div>
			</div>
		</div>
	</div>
</section>