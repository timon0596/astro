<?php
$part = get_post('faq');
$list = get_posts($part['id'],false,true);
// debug($list);
?>
<section id="faq" class="faq">
	<div class="limit">
		<div class="content">
			<div class="part anim-in-l ta-c">
				<h2 class="b title-decor"><?=$part['title'];?></h2>
			</div>
			<div class="part anim-in-up">
				<div class="d-g gg-2 gtc-2-3 gaf-c faq__content">
					<div class="faq__img">
						<div class="ratio-4-3" style="background-image: url('/templates/main/img/229613-1578090675.jpg');"></div>
					</div>
					<div>
						<div class="faq__list">
							<?php $i = 1; ?>
							<?php foreach ($list as $key => $item): ?>
								<div class="faq__item showhide">
									<div class="faq__question showhide__title">
										<div class="faq__title">
											<span><?=$i;?>.</span>
											<span><?=$item['title'];?></span>
										</div>
									</div>
									<div class="faq__answer showhide__content">
										<?=$item['content'];?>
									</div>
								</div>
								<?php $i++; ?>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>