<?php

$filters = get_filters('catalog');
?>
<ul>
	<?php foreach ($filters as $item) : ?>
		<li class="<?php echo $item['name'] ?>">
			<?php if ( isset($item['list']) ): ?>
				<ul><?php echo $item['title'] ?>
					<div class="content-l">
					<?php foreach ($item['list'] as $value) : ?>
						<li class="<?php echo $value['name'] ?>"><a href="?filter=<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a></li>
					<?php endforeach; ?>
					</div>
				</ul>
			<?php else : ?>
				<a href="?filter=<?php echo $item['id'] ?>"><?php echo $item['title'] ?></a>
			<?php endif ?>
		</li>
	<?php endforeach; ?>
</ul>
<?php
echo '<pre>';

//print_r( $filters );
echo '<pre>';
print_r( $_GET );
echo '</pre>';

if ( isset( $_GET['filter'] ) )
{
	$elements = Filter::getElements( $_GET['filter'] );

	print_r( $elements );
}






echo '</pre>';