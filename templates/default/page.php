
<!--<section id="header" style="background-image: url(<?php echo pageinfo('img'); ?>)">
	<div class="limit-h">
		<div class="indent-h">
			<div class="content" style="height: 360px;">
				<div class="wrap-m">
					<div>
						<h1 class="ta-c">
							<?php
							print_r( pageinfo('title') );
							?>
						</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>-->
<section id="content">
	<div class="limit">
		<div class="indent">
			<div class="content">
				<div class="margin-v">
					<h2><?php echo pageinfo('title') ?></h2>
				</div>
				
				<?php
				echo get_content();
				?>
			</div>
		</div>
	</div>
</section>