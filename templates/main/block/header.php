<section>
	<div class="part">
		<div class="limit">
			<a href="/"><h1 class="c-1 ta-c"><?=siteinfo('sitename');?></h1></a>
					<!-- <div class="" style="">
						<div class="h-100p limit padd grid a-cnt-c ta-c">
							<h3 class="anim-in-down c-g"><?=siteinfo('sitedesc');?></h3>
						</div>
					</div> -->
		</div>
	</div>

	<div class="part-2 media-800-h anim-in-down">
		<div class="limit">
			<div class="nav">
				<div class="grid gap-1" style="grid-auto-flow: column; justify-content: space-between;">
					<?php
					$nav = get_menu();
					foreach ($nav as $item) :
					?>
						<a href="<?=$item['link'];?>" class="upper <?= ( $item['act'] >= 0 ? 'c-1 b' : 'c-1' ) ?>"><?php print_r($item['title']); ?></a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>

	<?php if (pageinfo('name') !== 'index'): ?>

		<div class="padd-v-2 bg-1 ta-c">
			<div class="limit">
				<h2 class="anim-in-down"><?=pageinfo('title');?></h2>
				<?php
					$parent_id = pageinfo('parent');
					$parent = get_post($parent_id);
					$par = $parent['parent'];
				?>
				<?php if ( (isset($par) || isset($parent_id)) && (!empty($par) || !empty($parent_id)) && ($par == 2 || $parent_id == 2) ): ?>
					<a class="anim-in-down btn bg-w c-1" href="<?= get_uri($parent_id); ?>">Вернуться назад</a>
				<?php endif ?>
				
			</div>
		</div>

	<?php endif; ?>
</section>