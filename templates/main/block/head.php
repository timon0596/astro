<section class="head">
	<div class="limit">
		<div class="content">
			<div class="part anim-in-up">
				<div class="part-2 d-g astro-siteinfo">
					<h1 class="b">
						<?php 
							if( pageinfo('name') == 'index') {
								echo siteinfo('sitedesc');
							}
							else {
								echo pageinfo('title');
							};
						?>
					</h1>
					<p class="h4">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia quia nulla voluptatibus omnis quidem expedita, est aliquam. Doloribus rerum impedit obcaecati debitis nihil. Error suscipit excepturi libero nemo? Non, commodi!
					</p>
				</div>
				<div class="part-4">
					<div class="padd-v-2">
						<button id="callback" class="open-popup head__button">Заказать звонок</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>