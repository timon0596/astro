<?php

$tmp =  Admin_Model::get_part($name);

echo '<h2>' . $tmp['title'] . '</h2>';

echo '<a href="' . $name . '/add' . '" class="button">' . 'Создать' . '</a>';

$list = Db::db_select($tmp['table'], $tmp['where'], null, 'id');

krsort($list);
//var_dump( $list );
if ( $list )
{
	foreach ($list as $key => $item) :
	?>
		<div id="<?php echo $key; ?>" class="margin-v-0 padd bg-g-15" style="display: grid; grid-template-columns: 6em 1fr; grid-gap: 1em;">
			<div>
				<div class="ratio-1-1">
					<div style="background-image: url(<?=get_media_uri($item['img'],'min');?>);"></div>
				</div>
			</div>
			<div>
				<p>
					<span class="c-g">#<?php echo $key; ?></span>
					<b><?php echo $item['title']; ?></b>
					<br>
					<span class="h4 c-g">
						<?php echo date('d.m.Y H:i', strtotime($item['date'])); ?>
					</span>
				</p>
				<?php
				$tmp2 = get_parents( $key, true );
				$parents = array();
				$pnames = array();
				foreach ($tmp2 as $value) {
					array_push( $pnames, get_post( $value, 'title' ) );
					array_push( $parents, $value );
				}
				?>
				<div class="c-g"><?php echo implode(' > ', $pnames ); ?></div>
				<div class="c-g"><?php echo implode(' > ', $parents ); ?></div>
				<a class="h4 button" href="<?php echo './' . $name . '/edit/' . $key; ?>">edit</a>
				<a class="h4 button" href="<?php echo './' . $name . '/del/' . $key; ?>">del</a>
			</div>
		</div>
	<?php
	endforeach;
}
else
{
	?>
		<div class="margin-v-0">
			<p>Нет элементов</p>
		</div>
	<?php
}