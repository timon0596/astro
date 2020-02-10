<div class="mobile menu close">
	<div class="panel">
		<div class="padd-h-2 h-100p grid gap-2" style="grid-template-rows:5em auto /*auto*/;">
			<div class="grid a-cnt-c">
				<div class="ta-r">
					<div class="d-ib close pointer"></div>
				</div>
			</div>
			<div class="marg-v-2-">
				<ul class="c-b">
					<?php
					$nav = get_menu();
					$i = 0;
					foreach ( $nav as $key => $item) :
					?><li class="<?= ( $item['act'] == 1 ? 'act' : null ) ?>" >
						<?php if (pageinfo('name')=='index'):
							$link = str_ireplace('/', '#', $item['link']); ?>
							<a class="marg-v-2 d-b scrollto" href="<?php echo $link ?>">
								<div class="h3 lh-0"><?php echo $item['title']; ?></div>
							</a>
						<?php else:
							$link = str_ireplace('/', '/#', $item['link']); ?>
							<a class="marg-v-2 d-b" href="<?php echo $link ?>">
								<div class="h3 lh-0"><?php echo $item['title']; ?></div>
							</a>
						<?php endif ?>
							
					</li><?php
					$i++;
					endforeach;
					?><!--<li class="<?php echo ( pageinfo('name') == 'lk' ? 'act' : null ) ?>" >
						<a class="button d-b" href="<?php echo get_uri('lk'); ?>">
							<div class="h3"><?php echo get_post('lk', 'title'); ?></div>
						</a>
					</li>-->
				</ul>
			</div>
			<!-- <div class="grid a-cnt-c">
				<div>
					<a class="button radius-2" href="<?php echo pageinfo('name') == 'lk' && User::im() ? '?logout' : get_uri('lk'); ?>">
						<div class="h3"><?php echo pageinfo('name') == 'lk' && User::im() ? 'Выход' : get_post('lk', 'title'); ?></div>
					</a>
				</div>
			</div> -->
		</div>
	</div>
</div>