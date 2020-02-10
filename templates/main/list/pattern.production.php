

<section class="bg-g-10">
	<div class="limit">
		<div class="content">


			<?php
			// $id = 2;
			$id = pageinfo('id');
			$part = get_post($id);
			$list = get_childs($id, 0);
			?>
			<!-- PRICES -->
			<?php
			$id = pageinfo('id');
			$list = Db::db_select('posts', ['type' => 'list', 'parent' => $id]);
			$prices = Db::db_select('posts', ['type' => 'price', 'parent' => $id]);
			?>
			<div class="part anim-in-up">
				<a href="/" class="b upper d-ib under">Главная</a>
				<span class="p b c-1">/</span>
				<a href="/#production" class="b upper d-ib under">продукция</a>
				<span class="p b c-1">/</span>
				<?php if (pageinfo('parent') !== '2'): ?>
					<?php $parent = get_post(pageinfo('parent')); ?>
					<a href="<?= get_uri($parent['id']); ?>" class="b upper d-ib under"><?= $parent['title'] ?></a>
					<span class="p b c-1">/</span>
				<?php endif; ?>
				<p class="h4 upper d-ib"><?= $part['title'];?></p>
			</div>


			<?php if ( $prices ): ?>
			
				<!-- <div id="prices" class="part">
					<div class="d-g gtc-3 gg-2 anim-group-in-up">

						<?php foreach ($prices as $key => $item): ?>
							<?php $props = json($item['properties']); ?>
								
							<div class="">
								<div class="marg-a" style="max-width: 30rem;">
									<div class="anim-item ratio-3-4 bg-3-80 w-100p">
										<div class="d-g c-w ta-c" style="background-image: url(<?php echo get_media_uri($item['img']) ?>); grid-template-rows: auto 1fr auto;">
											<div>
												<?php if ( isset($props['price']) ): ?>
													<div class="h2 b marg-v-2 padd"><p><?= $props['price'] ?></p></div>
												<?php endif; ?>
											</div>
											<div class="d-g" style="align-content: flex-start;">
												<?php if ( isset($props['title']) ): ?>
													<div class="h3 marg-h bdr-b-w"><p><?= $props['title'] ?></p></div>
												<?php endif; ?>
												<?php if ( isset($props['delivery']) ): ?>
													<div class="h3 marg-v-0 marg-h bdr-b-w"><p><?= $props['delivery'] ?></p></div>
												<?php endif; ?>
												<?php if ( isset($props['optional']) ): ?>
													<div class="marg-v-0 marg-h bdr-b-w"><p><?= $props['optional'] ?></p></div>
												<?php endif; ?>
												<?php if ( isset($props['form']) ): ?>
													<div class="marg-v-0 marg-h bdr-b-w"><p><?= $props['form'] ?></p></div>
												<?php endif; ?>
											</div>
												
											<div class="marg-v">
												<button id="callback" class="open-popup">Заказать услугу</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						<?php endforeach ?>

					</div>
				</div> -->
	
			<?php endif ?>

			<?php if (is_array($list)): ?>
			<div class="part">
				<div class="d-g gtc-3 gg-2 anim-in-up">
					<?php foreach ($list as $key => $item): ?>
						
							<a href="<?=get_uri($item['id']);?>" class="bg-w bdr-1- over-h shadow-1">
								<div class="ratio-3-2 bg-g-10">
									<div class="grid ac-c ta-c" style="background-image: url(<?php echo get_media_uri($item['img'], 'mid') ?>);">
										<div class="c-1 padd-h-0"></div>
									</div>
								</div>
								<div class="padd ta-c b upper">
									<?=$item['title'];?>
								</div>
							</a>
						
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>

			<?php if ( pageinfo('content') ): ?>
				<div class="part anim-in-up">
					<div class="">
						<?php echo pageinfo('content'); ?>
					</div>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>

<?php block('adventages'); ?>