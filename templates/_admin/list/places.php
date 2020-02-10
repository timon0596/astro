<?php

/*echo '<pre>';
print_r( $_POST );
echo '</pre>';*/

if ( isset( $_POST['places'] ) )
{
	foreach ($_POST['places'] as $id => $vals)
	{
		Db::db_update( 'posts', $vals, $id );
	}
}

$tmp =  Admin_Model::get_part($name);
?>
<h2><?php echo $tmp['title']; ?></h2>
<!--<div class="marg-v">
	<a href="<?php echo $name . '?add'; ?>" class="button">Создать</a>
</div>-->
<?php
$list = Db::db_select($tmp['table'], $tmp['where'], null, 'id');
if ( $list )
{
	?>
	<form method="post">
		<div style="overflow-x: auto;">
		<table>
			<thead>
				<tr>
					<td width="25%">Название</td>
					<td width="65%">Адрес</td>
					<td width="10%">Видимость</td>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($list as $key => $item) :
				?>
					<tr id="<?php echo $key; ?>">
						<td class="padd-n">
							<!--<input class="w-100p" type="text" name="places[<?php echo $key ?>][title]" value="<?php echo $item['title']; ?>">-->
							<?php echo $item['title']; ?>
						</td>
						<td>
							<!--<input class="w-100p" type="text" name="places[<?php echo $key ?>][value]" value="<?php echo $item['value']; ?>">-->
							<?php echo $item['value']; ?>
						</td>
						<td>
							<select class="w-100p" type="text" name="places[<?php echo $key ?>][visibility]">
								<option value="1" <?php echo ( $item['visibility'] == 1 ? 'selected' : null ); ?> >Вкл.</option>
								<option value="0" <?php echo ( $item['visibility'] == 0 ? 'selected' : null ); ?> >Выкл.</option>
							</select>
						</td>
					</tr>
				<?php
				endforeach;
				?>
			</tbody>
		</table>
		</div>
		<div class="marg-v">
			<button type="submit">Сохранить</button>
		</div>
	</form>
	<?php
	/*foreach ($list as $key => $item) :
	?>
		<div id="<?php echo $key; ?>" class="margin-v-0 padding-0">

		</div>
		<div id="<?php echo $key; ?>" class="margin-v-0 padding-0 bg-lg">
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
	endforeach;*/
}
else
{
	?>
		<div class="margin-v-0">
			<p>Нет элементов</p>
		</div>
	<?php
}