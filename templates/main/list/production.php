<?php if ( !pageinfo('content') ): ?>
	<section>
		<div class="limit">
			<div class="content">
				<div class="part">
					<div class="">
						<?php echo pageinfo('content'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php block('production'); ?>

