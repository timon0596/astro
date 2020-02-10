<?php
$part = get_post('partners');
$list = get_posts($part['id'],false,true);
// debug($list);
?>
<section id="partners" class="partners <?= (pageinfo('name')=='index') ? null : 'bg-g-10'; ?>">
	<div class="limit">
		<div class="content">
			<div class="part anim-in-l">
				<h2 class="b upper"><?=$part['title'];?></h2>
			</div>
			<div class="part">
				<div class="parnters__slider anim-group-in-up">
				<!-- <div class="d-g gtc-4 gg-2"> -->
					<?php foreach ($list as $key => $item): ?>
						<div class="marg-h-0 anim-item">
							<div class="ratio-3-2 bgz-cnt" style="background-image: url(<?=get_media_uri($item['img'],'mid');?>);"></div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</section>