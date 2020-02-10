<?php
$part = Admin_Model::getPart();
$item = Admin_Model::getItem();
?>
<h4>
	<a href="./"><?php echo $part['title']; ?></a>
</h4>

<h2><?php echo $part['item']['title'] . ': '. ( isset( $item['title'] ) ? $item['title'] : $item['name'] ); ?></h2>

<?php

echo '<pre>';
echo $id;
echo "\r\n";
echo $name;
echo "\r\n";
//print_r( $part );
echo "\r\n";


if ( $item )
{
	foreach ($item as $key => $value) {
		echo $key . "\t\t" . $value . "\r\n";
	}
}
echo '</pre>';