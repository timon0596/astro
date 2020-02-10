<?php

$tmp =  Admin_Model::get_part($name);

echo '<h2>' . $tmp['title'] . '</h2>';

echo '<a href="' . $name . '/add' . '" class="button">' . 'Создать' . '</a>';

$list = Db::db_select($tmp['table'], $tmp['where'], null, 'id');
//var_dump( $list );
if ( $list )
{
	/*
	foreach ($list as $key => $item) :
	?>
		<div id="<?php echo $key; ?>" class="margin-v-0 padding-0 bg-g-15">
			<p>
				<span class="c-g">#<?php echo $key; ?></span>
				<b><?php echo $item['title']; ?></b>

				<span class="h4 c-g">
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
	<?php
	endforeach;
	*/
	?>

	<div class="margin-v-0">
	<div style="overflow-x: auto;">
	<table>
		<thead>
			<tr class="b">
				<td width="10%">Фото</td>
				<td width="30%">Имя</td>
				<td width="20%">Действия</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($list as $key => $item) : ?>
				<tr>
					<td><img src="<?php echo get_media_uri($item['img'], 'mid'); ?>" width="100%"></td>
					<td><h3><?php echo $item['title']; ?></h3></td>
					<td>
						<a class="h4 button" href="<?php echo './' . $name . '/edit/' . $key; ?>">Ред.</a>
						<a class="h4 button" href="<?php echo './' . $name . '/del/' . $key; ?>">Удалить.</a>
					</td>
				</tr>
			<?php
			endforeach;
			?>
		</tbody>
	</table>
	</div>
	</div>
<?php
}
else
{
	?>
		<div class="margin-v-0">
			<p>Нет элементов</p>
		</div>
	<?php
}