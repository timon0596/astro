<?php

$tmp =  Admin_Model::get_part($name);

echo '<h2>' . $tmp['title'] . '</h2>';

echo '<a href="' . $name . '/add' . '" class="btn">' . 'Создать' . '</a>';

$list = Db::db_select($tmp['table'], $tmp['where'], null, 'id');
//var_dump( $list );
if ( $list )
{
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
			<a class="h4 btn" href="<?php echo './' . $name . '/edit/' . $key; ?>">edit</a>
			<a class="h4 btn" href="<?php echo './' . $name . '/del/' . $key; ?>">del</a>
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