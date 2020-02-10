<?php header('X-XSS-Protection: 1'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<title>Админ-панель</title>
	<meta name="viewport" content="width=device-width, initial-scale=.5, maximum-scale=1">
	<!-- Подключение стилей и скриптов -->
	<?php get_links(true); ?>
</head>
<body style="min-width: 960px;">

<header>
	<div class="over-h">
		<div class="fl-l">
			<a href="/">Вернуться на сайт</a>
		</div>
		<div class="fl-r">
			<b><?php
				print_r( User::im('name') );
			?></b>
			<a href="?logout">Выход</a>
		</div>
	</div>
	
			
</header>