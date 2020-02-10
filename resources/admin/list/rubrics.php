<?php

$tmp =  Admin_Model::get_part($name);

echo '<h2>' . $tmp['title'] . '</h2>';

echo '<a href="' . $name . '/add' . '" class="button">' . 'Создать' . '</a>';

$list = Db::db_select($tmp['table'], $tmp['where'], null, 'id');
//var_dump( $list );
if ( $list )
{
	foreach ($list as $key => $item) :
	?>
		<div id="<?php echo $key; ?>" class="margin-v-0 padd bg-g-15" style="display: grid; grid-template-columns: 1fr auto; grid-gap: 1em;">
			<div>
				<p>
					<span class="c-g">#<?php echo $key; ?></span>
					<b><?php echo $item['title']; ?></b>
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
			</div>
				
			<div>
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