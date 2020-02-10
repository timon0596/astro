<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="icon" href="/favicon.png" type="x-image/icon">
	<link rel="shortcut icon" href="/favicon.png" type="image/icon" sizes="32x32">

	<?php
	$meta_tag['title'] = pageinfo('title') . ' — ' . siteinfo('sitename');
	$meta_tag['desc'] = siteinfo('sitedesc');
	$meta_tag['keys'] = siteinfo('keywords');
	if ( pageinfo('meta') == null )
	{
		$tmp_meta = json_decode( pageinfo('meta'), true );

		if ( isset( $tmp_meta['title'] ) ) $meta_tag['title'] = $tmp_meta['title'];
		if ( isset( $tmp_meta['desc'] ) ) $meta_tag['desc'] = $tmp_meta['desc'];
		if ( isset( $tmp_meta['keys'] ) ) $meta_tag['keys'] = $tmp_meta['keys'];
	}
	?>
	<title><?php echo $meta_tag['title']; ?></title>
	<meta name="description" content="<?php echo $meta_tag['desc']; ?>">
	<meta name="keywords" content="<?php echo $meta_tag['keys']; ?>">
	<!-- <meta property="og:image" content="http://pozharnaya-bezopasnost-moskva.ru/templates/main/img/header.jpg"> -->
	<meta name="viewport" content="width=device-width, initial-scale=.666666666, maximum-scale=1">

	<!-- Подключение стилей и скриптов -->
	<?php get_links(true); ?>
	<script type="text/javascript" src="/engine/functions.php"></script>
	<!-- Core CSS file -->
	<link rel="stylesheet" href="/plugins/photoswipe4/photoswipe.css?ver=1527858239"> 
	<!-- Skin CSS file -->
	<link rel="stylesheet" href="/plugins/photoswipe4/default-skin/default-skin.css?ver=1527858239"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	
</head>

<body id="<?php echo pageinfo('name');?>" class="<?php
echo pageinfo('type');
foreach ( get_parents() as $par )
{
	echo ' ' . $par;
}
?>">



<header>
<div class="bg-b-30 c-w">

	<?php block('nav'); ?>

	<?php block('head'); ?>

</div>
</header>

<main>