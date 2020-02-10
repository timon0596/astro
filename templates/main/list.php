<section>
	<div class="limit">
		<div class="content">
			<!-- <div class="part-2 anim-in-down">
				<?php
					$parent_id = pageinfo('parent');
					$parent = get_post($parent_id);
					$par = $parent['parent'];
					var_dump($par);
				?>
					<a class="" href="/">Главная</a>
				<?php if ( (isset($par) || isset($parent_id)) && (!empty($par) || !empty($parent_id)) && ($par == 2 || $parent_id == 2) ): ?>
					<span> / </span><a class="" href="<?= get_uri($parent_id); ?>"><?= $parent['title'] ?></a>
				<?php endif ?>
				<?php if ( (isset($par) || isset($parent_id)) && (!empty($par) || !empty($parent_id)) && ($par == 2 || $parent_id == 2) ): ?>
					<span> / </span><a class="" href="<?= get_uri($parent_id); ?>">Вернуться назад</a>
				<?php endif ?>
			</div> -->
			<div class="part">

				<?php
				echo get_content();
				?>
			</div>
		</div>
	</div>
</section>