<?php

if ( isset($_POST['login']) && isset($_POST['pass'] ) )
{
	
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title><?php echo pageinfo('title') . ' — ' . siteinfo('sitename'); ?></title>
	<meta name="description" content="<?php echo siteinfo('sitedesc'); ?>">
	<meta name="keywords" content="<?php echo siteinfo('keywords'); ?>">
	<!-- Подключение стилей и скриптов -->
	<?php get_links(true); ?>
</head>

<body id="<?php echo pageinfo('name');?>" class="<?php echo pageinfo('type') ?>">



<!-- HEADER START -->
<header class="bg-w">
<section class="over-i">
	<div class="limit-h">
		<div class="indent-h">
			<div class="content">
				<div class="content-fl p">
					<a href="/" id="logo" class="fl-l d-b margin-v lh-0"><img src="<?php echo get_media_uri(1) ?>" height="120px" /></a>
					<div class="fl-r p-50">
						<div class="info padding-h-0 margin-v">
							<p><a href="tel:+7 (800) 2000 500">8 (800) 2000 500</a></p>
							<p><a href="mailto:mail@mail.ru">mail@mail.ru</a></p>
						</div>
						<div class="menu margin-v">
							<ul class="content-l padding-no margin-no"><?php
							foreach ( get_menu() as $key => $item) {
								echo '<li><a class="padding-0 d-b ' . ( $item['act'] ? 'act' : null ) . '" href="' . $item['link'] . '">' . $item['title'] . '</a></li>';
							}
							?></ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="over-i shadow-0">
	<div class="limit-h">
		<div class="padding-h-0">
			<div class="content">
			</div>
		</div>
	</div>
</section>
</header>
<!-- HEADER END -->



<!-- CONTENT START -->
<div id="page">
