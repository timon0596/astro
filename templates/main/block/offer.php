<?php
$part = get_post('offer');
// debug($list);
?>
<section id="offer" class="offer bg-g-10">
	<div class="limit">
		<div class="content">
			<div class="part bg-w shadow-1 over-h">
				<div class="d-g gtc-2">
					<div>
						<div class="padd-h-2 part ta-c">
							<div class="part-2">
								<h3 class="b upper"><?=$part['title'];?></h3>
							</div>
							<div class="part-2">
								<?=$part['content'];?>
							</div>
							<div class="part-2">
								<button id="callback" class="open-popup">Заказать звонок</button>
							</div>
						</div>
					</div>
					<div class="bg-g-10" style="background-image: url(<?=get_media_uri($part['img'],'big');?>);"></div>
				</div>
			</div>
		</div>
	</div>
</section>