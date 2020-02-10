<?php
$nav = get_menu();
?>

<div class="mobile menu close">
	<div class="panel">
		<div class="padd-2 h-100p d-g gg-1" style="grid-template-rows: 2em 1fr auto;">
			<div class="grid a-cnt-c">
				<div class="ta-r">
					<div class="d-ib close pointer"></div>
				</div>
			</div>
			<div class=" ta-c">
				<ul class="d-g gg-1 c-b">
					<?php
					$i = 0;
					foreach ( $nav as $key => $item) : ?>
						<?php $link = str_ireplace( '/', '#', $item['link'] ); ?>
						<li class="<?= ( $item['act'] == 1 ? 'act' : null ) ?>" >
							<a class="d-b scrollto menu-item" href="<?=$link; ?>">
								<p><?php echo $item['title']; ?></p>
							</a>
						</li>
					<?php
					$i++;
					endforeach;
					?>
				</ul>
			</div>
			<div class="ta-c padd-v padd-h-2" style="">
				<button data-popup="callback" class=" open-popup br-0 h3 menu-item">Обратная связь</button>
			</div>
		</div>
	</div>
</div>