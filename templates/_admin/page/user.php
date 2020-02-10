<?php

//echo "\r\n" . 'PAGE EDIT' . "\r\n";

$table =  Admin_Model::get_part($part, 'table');
//print_r( $table );
$result = Form::get( $table, $part, $action, $id );
//print_r( $result );
$item = Db::db_select($table,$id)[0];

//echo "<pre>";
//var_dump( 'table ', $table );
//var_dump( 'result ', $result );
//print_r( $item );

$lessons = Db::db_select( 'actions', [ 'sender'=>$id, 'type'=>'lesson' ], null, 'id' );
if ( is_array( $lessons ) )
{
	uasort($lessons, function($a,$b) {
		$a = strtotime( $a['date'] );
		$b = strtotime( $b['date'] );
		if ($a == $b) {
			return 0;
		}
		return ($a < $b) ? -1 : 1;
	});
}
	
//print_r( $lessons );

$cycles = Db::db_select( 'posts', [ 'type'=>'bike' ], null, 'id' );
//print_r( $cycles );

//echo "</pre>";
?>

		<h3>Расписание занятий пользователя "<?php echo $item['name'] ?>"</h3>
	<div class="marg-v">
		<a href="tel:<?php echo $item['phone']; ?>"><?php echo $item['phone']; ?></a>
	</div>

	<?php if ( is_array( $lessons ) ) : ?>
	<table>
		<thead>
			<tr>
				<td width="10%">Дата</td>
				<td width="5%">Время</td>
				<td width="5%">Тип</td>
				<td width="25%">Площадка</td>
				<td width="30%">Мотоцикл</td>
				<td width="25%">Инструктор</td>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ($lessons as $lkey => $lesson):
			$actual = ( strtotime( $lesson['date'] ) <= time() ? true : false );
			?>
			<tr <?php echo ( $actual ? 'class="c-lg"' : null ) ?>>
				<td><?php echo date("d.m.Y", strtotime($lesson['date']) ); ?></td>
				<td><?php echo date("H:i", strtotime($lesson['date']) ); ?></td>
				<td><?php echo ($lesson['status'] == 1 ? 'МШ' : 'ГАИ' ); ?></td>
				<td><?php echo get_post( json_decode( $lesson['properties'], true )['place'], 'title') ?></td>
				<td><?php echo $cycles[$lesson['recipient']]['title'] ?></td>
				<td>
					<?php
					$trainers = Db::db_select( 'actions', [ 'type'=>'schedule', '`date` LIKE \'%' . date( 'Y-m-d', strtotime( $lesson['date'] ) ) . '%\'' ] );
					if( $trainers )
					{
						$trainers = json_decode( $trainers[0]['properties'], true );
						$settings = json_decode( siteinfo('settings'), true );
						$settings['middle'] = ( isset( $settings['middle'] ) ? $settings['middle'] : 15 );
						$trainer = ( date( 'H', strtotime( $lesson['date'] ) ) < $settings['middle'] ? get_post( $trainers[0], 'title' ) : get_post( $trainers[1], 'title' ) );
					}
					else
					{
						$trainer = 'Дежурный';
					}
					unset( $trainers );
					echo $trainer;
					?>
				</td>
			</tr>
		<?php
		endforeach;
		?>
		</tbody>
	</table>
	<?php else: ?>
		<p class="c-lg">Нет занятий</p>
	<?php endif; ?>

<div class="part">
	<div class="marg-v">
		<h3>Комментарии</h3>
	</div>
	<?php 
	if ( isset( $_POST['TABLE']) && isset( $_POST['ACTION'] ) ) {
		if ( Form::post() )
		{
		}
		else
		{
			echo "Ошибка";
		}
	}
	if ( isset( $_GET['del'] ) )
	{
		Db::db_delete('actions',$_GET['del']);
	}
	?>

	<?php
	$comments = Db::db_select( 'actions', ['recipient'=>$id] );
	?>
	<div class="marg-v">
	<?php if ( is_array( $comments ) ): ?>
		<?php foreach ($comments as $key => $comment): ?>
			<div class="marg-v-0 padd shadow-0">
				<div class="marg-v-0">
					<?php echo $comment['value']; ?>
				</div>
				<?php if ($comment['img']): ?>
					
				<div class="marg-v-0">
					<a href="<?php echo get_media_uri($comment['img']); ?>" target="_blank">
						<img src="<?php echo get_media_uri($comment['img']); ?>" style="max-width:360px; max-height:360px;">
					</a>
				</div>
				<?php endif ?>
				<div class="marg-v-0">
				<h4 class="c-lg over-h">
					<span class="fl-l">
						<?php echo User::get($comment['recipient'])['name'] ?> / <?php echo date("d.m.Y H:i", strtotime($comment['date']) ); ?>
					</span>
					<a class="fl-r c-1" href="<?php echo '?del=' . $comment['id']; ?>">удалить</a>
				</h4>
				</div>
			</div>
		<?php endforeach; ?>
	<?php else: ?>
		<p class="c-lg">Нет комментариев</p>
	<?php endif; ?>
	</div>

	
	<div class="marg-v">
		<p>Добавить комментарий</p>
	</div>
	<form method="post" enctype="multipart/form-data">
		<input name="TABLE" type="hidden" value="actions">
		<input name="ACTION" type="hidden" value="add">
		<input name="type" type="hidden" value="comment">
		<input name="sender" type="hidden" value="<?php echo User::im('id'); ?>">
		<input name="recipient" type="hidden" value="<?php echo $id; ?>">
		<textarea name="value" class="text-editor"></textarea>
		<p>Изображение</p>
		<input type="file" name="file[img]">
		<input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
		<button type="submit" name="submit">Добавить</button>
	</form>
</div>