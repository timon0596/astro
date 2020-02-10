<?php

echo '<pre>';
echo 'Это категория: ';
print_r( Page::getInfo('title') );

var_dump( Page::getInfo('id') );
$hierarchy = Post::getList( Page::getInfo('id') );
var_dump( $hierarchy );

/****$hierarchy = Category::getHierarchy( Page::getInfo('id') );
//$hierarchy = Post::childs( Page::getInfo('id') );
var_dump($hierarchy);
if ( $hierarchy )
{
	echo "\r\n\r\nПодкатегории:\r\n";
	foreach ( $hierarchy as $key => $value ) {
		//echo $key;
		echo Category::getInfo($key,'id') . ":\t" . Category::getInfo($key,'title') . "\r\n";
	}
	echo "\r\n";
	print_r($hierarchy);
}
****/
echo '</pre>';