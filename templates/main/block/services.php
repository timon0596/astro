<?php
$part = get_post('services');
$list = get_childs($part['id'],false,true);
?>
<section id="services" class="services">
	<div class="limit">
		<div class="content">
			<div class="part anim-in-l  title-decor_wrapper">
				<h2 class="b title-decor"><?=$part['title'];?></h2>
			</div>
			<div class="part anim-in-up">
				<!-- <div class="">
					<?= $part['content']; ?>
				</div> -->

				<div class="tabs d-g gg-2">
					<div class="tabs__items_wrapper">
						<div class="tabs__items services__tabs">
							<?php foreach ($list as $key => $v): ?>
								<?php
								$tab = get_post($key);
								?>
								<div class="tabs__item services__tab"><?=$tab['title'];?><i class="fas fa-angle-down"style="margin-left: 1rem;"></i></div>
							<?php endforeach ?>
						</div>
					</div>
					
					<div class="tabs__contents">
						<?php foreach ($list as $key => $v): ?>
							<?php
							$services = get_posts($key,false,true);
							?>
							<div class="tabs__content tabs__content_act">
								<div class="services__grid services__slider">
									<?php foreach ($services as $service): ?>
										<div class="services__item">
											<div class="b">
												<?=$service['title'];?>
											</div>
											<div class="underline"></div>
											<div class="desc c-g h4">
												<p class="c-w">Вы получите:</p>
												<?=$service['content'];?>
											</div>
											<p class="content-c">
												цена:
												<span class="b"><?=$service['value'];?>₽</span>
											</p>
											<div class="button content-c open-popup" id="service">Заказать услугу</div>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>