
</div>
<!-- Конец контента страницы -->
<footer>
	<div class="bg-1 c-w">
		<!--<div class="delimiter-g"></div>-->
		<section>
			<div class="limit-h">
					<div class="content">
						<div class="copyright content-fl-l margin">
							<div class="p-75 ta-l p">
								
								<div class="menu">
									<ul class="content-l padding-no margin-no">
									<?php
									/*echo '<pre>';
									print_r( get_menu() );
									echo '</pre>';*/
									foreach ( get_menu() as $key => $item) {
										echo '<li class=""><a class="padding-0 d-b" href="' . $item['link'] . '">' . $item['title'] . '</a><li>';
									}
									?>
									</ul>
								</div>
							</div>
							<div class="p-25 ta-r">
								<div class="padding-0">
									<p><a href="tel:+7 (800) 2000 500">8 (800) 2000 500</a></p>
									<p><a href="mailto:mail@mail.ru">mail@mail.ru</a></p>
								</div>
									
							</div>
						</div>
					</div>
			</div>
		</section>
		<div class="delimiter-w"></div>
		<section>
			<div class="limit-h">
					<div class="content">
						<div class="copyright content-fl-l margin h3">
							<div class="p-50 ta-l">2018г. Все права защищены</div>
							<div class="p-50 ta-r"><a href="http://delaj-horosho.ru" target="blank">Сайт создан компанией "Делай хорошо"</a></div>
						</div>
					</div>
			</div>
		</section>
	</div>
</footer>



<!-- Всплывающие окна -->
<!--
<section id="menu" class="pop-up window close">
	<div class="limit">
		<div class="content">
			<div class="wrap-m">
				<div>
					<div class="box noclose radius-2">
						<div class="close"></div>
						<div class="box-content">
							<div class="wrap-m">
								<div>
									<div class="content-c">
										<ul class="margin-h">
											<?php
											foreach ( get_menu('second') as $key => $value ) :
											?>
												<li class="ta-l margin-no <?php echo ( $value['act'] ? 'act' : null );?> ">
													<a href="<?php echo $value['value']; ?>" class="padding-h-0 padding-v-0 d-b"><?php echo $value['title']; ?></a>
												</li>
											<?php
											endforeach;
											?>
										</ul>
										<ul class="margin-h">
											<?php
											foreach ( get_menu('first') as $key => $value ) :
											?>
												<li class="ta-l margin-no <?php echo ( $value['act'] ? 'act' : null );?> ">
													<a href="<?php echo $value['value']; ?>" class="padding-h-0 padding-v-0 d-b"><?php echo $value['title']; ?></a>
												</li>
											<?php
											endforeach;
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
-->
<?php
/*print_menu('second');
print_menu('first');*/
?>



<!-- Подключение стилей и скриптов -->
<?php get_links(); ?>
</body>
</html>