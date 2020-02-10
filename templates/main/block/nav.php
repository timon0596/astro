<section class="nav">
	<div class="nav__box">
		<div class="limit">
			<div class="content">
				<div class="d-g gaf-c jc-sb ac-c anim-in-down">
					<div class="part">
						<!-- <a href="/" class="logo">
							<img src="" alt="Пожарная безопасность Москва" class="d-b w-10 h-3">
						</a> -->
						<a href="/" class="logo-astrolife">
							<h1>AstroLife</h1>
						</a>
					</div>
					<div class="part d-g ac-c">
						<div class="h-100p d-g ac-c ta-c media-880-h">
							<?php if (pageinfo('name')=='index'): ?>
								<div class="d-g gaf-c gg-1">
									<?php
									$nav = get_menu();
									$i = 0;
									foreach ( $nav as $key => $item) :
									$link = str_ireplace('/', '#', $item['link']);
									?>
									<a href="<?php echo $link; ?>" class="nav__item scrollto <?= ( $item['act'] == 1 ? 'nav__item_act' : null ) ?>" >
										<?php echo $item['title']; ?>
									</a>
									<?php
									$i++;
									endforeach;
									?>
								</div>
							<?php else: ?>
								<div class="d-g gaf-c gg-1">
									<?php
									$nav = get_menu();
									$i = 0;
									foreach ( $nav as $key => $item) :
									$link = str_ireplace('/', '/#', $item['link']);
									?><div class="<?= ( $item['act'] == 1 ? 'act' : null ) ?>" >
										<a class="d-b menu-item" href="<?php echo $link; ?>">
											<div class="lh-0"><?php echo $item['title']; ?></div>
										</a>
									</div><?php
									$i++;
									endforeach;
									?>
								</div>
							<?php endif; ?>
								
						</div>
						<div class=" media-880-v">
							<!-- <button class="nav__open">Меню</button> -->
							<i class="pointer h3 nav__open fa fa-bars" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>