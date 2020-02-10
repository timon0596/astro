<?php

if ( count( $_POST ) > 0 )
{
	Db::db_update( 'actions', ['value'=>$_POST['value'], 'status'=>$_POST['status']], $_POST['id'] );
}

$tmp =  Admin_Model::get_part($name);

echo '<h2>' . $tmp['title'] . '</h2>';

//echo '<a href="' . $name . '/add' . '" class="button">' . 'Создать' . '</a>';

$list = Db::db_select($tmp['table'], $tmp['where'], null, 'id');

if ( $list )
{
	foreach ($list as $key => $item) :
	?>
		<?php $user = get_user( $item['sender'] ); ?>
		<div id="<?php echo $key; ?>" class="margin-v-0 padding-0 bg-g-15">
			<form method="post">
				<input type="hidden" name="id" value="<?php echo $key; ?>">
				<p>
					<span class="c-g">#<?php echo $key; ?></span>
					<b><?php echo $user['name']; ?></b>
					<a class="h4" href="tel:<?php echo $user['phone']; ?>"><?php echo $user['phone']; ?></a>
				</p>
				<p>
					Текст отзыва:
				</p>
				<h4>
					<textarea name="value" class="w-100p" rows="6"><?php echo $item['value']; ?></textarea>
				</h4>
				<h4>
					Статус:
				</h4>
				<h4>
					<select name="status">
						<option value="1" <?php echo ($item['status'] == 1 ? 'selected' : null ); ?> >Опубликовано</option>
						<option value="0" <?php echo ($item['status'] == 0 ? 'selected' : null ); ?> >На рассмотрении</option>
					</select>
				</h4>
				<button type="submit">Сохранить</button>
				<a class="h4 button" href="<?php echo './' . $name . '/del/' . $key; ?>">Удалить</a>
			</form>
				
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