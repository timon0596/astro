<?php
$part = get_post('about');
$list = get_posts($part['id'],false,true);
// debug($list);
?>
<section id="about" class="about">
	<div class="limit">
		<div class="content">
			<div class="part anim-in-l ta-c">
				<h2 class="b title-decor"><?=$part['title'];?></h2>
			</div>
			<div class="part anim-in-up">
				<div class="d-g gg-2 gtc-1-3 founder">
					<div class="d-g gg-1 padd-0 bd-grad">
						<div style="background-image: url('/templates/main/img/depositphotos_149973114-stock-photo-handsome-young-man-portrait.jpg');">
							<div class="ratio-1-1"></div>
						</div>
						<div class="d-g padd h4 content-c">
							<div>Иванов Иван Иванович</div>
							<p class="c-g">Основатель центра<br>эзотерики "AstroLife"</p>
						</div>
					</div>
					<div class="d-g ac-c">
						<div class="about__text">
							<?= $part['content'] ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>