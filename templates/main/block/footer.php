<section id="contacts" class="contacts">
	<div class="over-h">
		<div class="limit">
			<div class="content ta-c">
				<div class="part-2 d-g gaf-c jc-sb contacts__row">

					<div class="d-g gtc-3 gg-1 contacts__data" style="grid-template-columns: auto auto 1fr;">
						<a class="ta-c d-g ac-c" href="/"><h1 class="ta-c"><?=siteinfo('sitename');?></h1></a>
						<div class="sep bg-1" style="height: 60%;"></div>
						<div class="d-g c-w ac-c contacts__tel">
							<div class="h3">
								<a href="tel:<?php echo siteinfo('phone') ?>" class="p"><?php echo siteinfo('phone') ?></a>
							</div>
							<div class="c-g" style="font-size: 1.5rem">
								<a href="mailto:<?php echo siteinfo('email') ?>" class="p"><?php echo siteinfo('email') ?></a>
							</div>
						</div>
						<div class="contacts__icons d-g c-w gaf-c gg-2">
							<div class="h3">
								<a href="tel:<?php echo siteinfo('phone') ?>" class="p"><i class="fa fa-phone" aria-hidden="true" style="-webkit-transform: rotate(90deg);
								-ms-transform: rotate(90deg);
								-o-transform: rotate(90deg);
								transform: rotate(90deg);"></i></a>
							</div>
							<div class="c-g" style="font-size: 1.5rem">
								<a href="mailto:<?php echo siteinfo('email') ?>" class="p"><i class="fa fa-envelope h3" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
					<div class="part-2 media-800-h anim-in-down">
						<div class="limit">
							<div class="nav">
									<div class="h-100p d-g ac-c ta-c media-880-h">
										<?php if (pageinfo('name')=='index'): ?>
											<div class="d-g gaf-c gg-1">
												<?php
												$nav = get_menu();
												$i = 0;
												foreach ( $nav as $key => $item) :
												$link = str_ireplace('/', '#', $item['link']);
												?><div class="<?= ( $item['act'] == 1 ? '' : null ) ?>" >
													<a class="d-b scrollto menu-item" href="<?php echo $link; ?>">
														<div class="lh-0"><?php echo $item['title']; ?></div>
													</a>
												</div><?php
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>