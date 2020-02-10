<section class="over-v">
	<div class="limit">
		<div class="content">
				<div class="part">
					<div class=" gallery grid col-4 gap-1 anim-group-in-up">
						<?php
						$gall = get_gallery( 'portfolio', 'mid' );
						$i = 0;
						if( $gall ) :
							$i = 0;
							foreach ($gall as $key => $item) :
								$item['img_uri'] = get_media_uri( $item['id'], 'big' );
								$path = ROOT_DIR . $item['img_uri'];
								if ( file_exists($path) )
									$item['img_size'] = getimagesize( $path );
								else
									$item['img_size'] = [300,300];

								$item['img_ratio'] = $item['img_size'][0] / $item['img_size'][1];
								$item['img_scale'] = $item['img_ratio'] < 1 ? 1 / (($item['img_ratio'] + 0.65) / 2) : ($item['img_ratio'] + 1.4) / 2;

								?>
									<div class="<?= ( $i >= 8 ? 'text-more' : null ); ?> anim-item">
										<div class="ratio-1-1">
											<div>
												<a href="<?=$item['img_uri'];?>" class=" d-b h-100p gallery-item marg-a" data-ratio="<?=$item['img_ratio']; ?>" data-w="<?= $item['img_size'][0]; ?>" data-h="<?= $item['img_size'][1]; ?>" style="background-image: url(<?=$item['src'];?>);">
												</a>
											</div>
										</div>
									</div>
								<?php
								$i++;
							endforeach;
						endif;
						?>
					</div>
					<?php if ( count($gall) > 8 ): ?>
						<div class="open-more act part ta-c c-2 anim-in-up">
							<p class="button radius-2">Еще фото</p>
						</div>
					<?php endif; ?>
				</div>
		</div>
	</div>
</section>