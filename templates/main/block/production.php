<section id="production" class="services bg-g-10">
	<div class="limit">
		<div class="content">


			<!-- SERVICES -->

			<?php
			// $id = 2;
			$name = 'production';
			$part = get_post($name);
			$list = get_childs($name, 1);
			?>

			<div class="part">
				<h2 class="b upper"><?=$part['title'];?></h2>
			</div>
			<div class="part">
				<div class="d-g gtc-3 gg-1 anim-group-in-up">

					<?php foreach ($list as $key => $subServices): ?>
						<?php $item = get_post($key);?>
							<a href="<?=get_uri($item['id']);?>" class="d-b bg-w over-h shadow-1 anim-item">
								<div class="ratio-3-2 bg-g-10">
									<div class="grid ac-c ta-c" style="background-image: url(<?php echo get_media_uri($item['img'], 'mid') ?>);">
										<div class="c-1 padd-h-0"></div>
									</div>
								</div>
								<div class="marg-h m-v ta-c b upper">
									<?=$item['title'];?>
								</div>
							</a>
							<!-- <div class="padd-h">
								<ul>
								<?php foreach ($subServices as $sKey => $subService): ?>
									<?php $subService = get_post($sKey); ?>
									<li><a href="<?=get_uri($subService['id']);?>">
											<?=$subService['title'];?>
									</a></li>

								<?php endforeach ?>
								</ul>
							</div> -->
					<?php endforeach ?>

				</div>
			</div>
		</div>
	</div>
</section>