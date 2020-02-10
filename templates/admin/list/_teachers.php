<?php

$tmp =  Admin_Model::get_part($name);

echo '<h2>' . $tmp['title'] . '</h2>';

//echo '<div class="marg-v"><a href="' . $name . '/add' . '" class="button">' . 'Создать' . '</a></div>';

$list = Db::db_select($tmp['table'], $tmp['where'], null, 'id');
//var_dump( $list );
if ( $list )
{
	?>
	<table>
		<thead>
			<tr>
				<td>#</td>
				<td>Имя</td>
				<td>Телефон</td>
				<td>Дата регистрации</td>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($list as $key => $item) :
			?>
				<tr>
					<td><?php echo $key; ?></td>
					<td><?php echo $item['name']; ?></td>
					<td><?php echo $item['phone']; ?></td>
					<td><?php echo $item['date']; ?></td>
				</tr>
					
				<!--<div id="<?php echo $key; ?>" class="margin-v-0 padding-0 bg-lg">
					<p>
						<span class="c-g">#<?php echo $key; ?></span>
						<b><?php echo $item['name']; ?></b>

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
				</div>-->
			<?php
			endforeach;
			?>
		</tbody>
	</table>
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