<?php

if ( isset( $_GET['banOn'] ) )
{
	Db::db_update( 'users', ['rank'=>-1], $_GET['banOn'] );
}
if ( isset( $_GET['banOff'] ) )
{
	Db::db_update( 'users', ['rank'=>1], $_GET['banOff'] );
}


$tmp =  Admin_Model::get_part($name);

echo '<h2>' . $tmp['title'] . '</h2>';

if ( !isset( $_GET['type'] ) ) $_GET['type'] = 0;
if ( $_GET['type'] > 1 || $_GET['type'] < -1 ) $_GET['type'] = 0;
$typeList = $_GET['type'];
?>
		<span class="<?php echo ( $typeList == 0 ? 'c-1' : null ) ?>">
			<a href="?type=0" class="">Зарегестрированные</a>
		</span>
		|
		<span class="<?php echo ( $typeList == -1 ? 'c-1' : null ) ?>">
			<a href="?type=-1" class="">Забаненые</a>
		</span>
		|
		<span class="<?php echo ( $typeList == 1 ? 'c-1' : null ) ?>">
			<a href="?type=1" class="">Записавшиеся</a>
		</span>
<?php

//	echo '<div class="marg-v"><a href="' . $name . '/add' . '" class="button">' . 'Создать' . '</a></div>';


switch ( $typeList ) {
	case -1:
		$tmp['where']['rank'] = -1;
		$list = Db::db_select($tmp['table'], $tmp['where']);
		if ( is_array( $list ) )
		{
			$list = array_reverse($list);
		}
		break;
	
	case 1:
		$tmp['where']['rank'] = 1;
		$list = array();
		$tmp_list = Db::db_select($tmp['table'], $tmp['where']);
		if ( is_array( $tmp_list ) )
		{
			$tmp_list = array_reverse($tmp_list);
		}
		foreach ($tmp_list as $key => $user) {
			$tmp_lessons = Db::db_select('actions', ['sender'=>$user['id'],'type'=>'lesson']);
			if ( (bool) $tmp_lessons )
			{
				$tmp_count = 0;
				if ( is_array( $tmp_lessons ) )
				{
					foreach ($tmp_lessons as $tmp_lesson)
					{
						if ( strtotime('now') > strtotime($tmp_lesson['date']) )
						{
							$tmp_count++;
						}
					}
				}
				/*
				echo '<pre class="h4">';
				echo $user['id'] . ' = ' . $tmp_count . '<br>';
				echo '</pre>';
				*/
				$user['count'] = $tmp_count;
				array_push( $list, $user );
			}
				
		}
		break;
	
	default:
		unset($tmp['where']['rank']);
		$list = Db::db_select($tmp['table'], $tmp['where']);
		if ( is_array( $list ) )
		{
			$list = array_reverse($list);
		}
		break;
}


$page = ( isset($_GET['p']) ? $_GET['p'] : 1 );
$limit = ( isset($_GET['l']) ? $_GET['l'] : 20 );
$max = ceil(count($list) / $limit);
$page = ( $page > $max ? $max : $page );

$start = $limit * ($page - 1);
$end = $start + $limit;

//echo $start . ' - ' . $end . ' / ' . $max;
//var_dump( $list );

$pagination = array
(
	array
	(
		'name'	=>	'<<',
		'page'	=>	1,
		'act'	=>	( $page > 1 ? true : false ),
	),
	array
	(
		'name'	=>	$page - 2,
		'page'	=>	$page - 2,
		'act'	=>	( $page - 2 >= 1 ? true : false ),
	),
	array
	(
		'name'	=>	$page - 1,
		'page'	=>	$page - 1,
		'act'	=>	( $page - 1 >= 1 ? true : false ),
	),
	array
	(
		'name'	=>	$page,
		'page'	=>	$page,
		'act'	=>	true,
	),
	array
	(
		'name'	=>	$page + 1,
		'page'	=>	$page + 1,
		'act'	=>	( $page + 1 <= $max ? true : false ),
	),
	array
	(
		'name'	=>	$page + 2,
		'page'	=>	$page + 2,
		'act'	=>	( $page + 2 <= $max ? true : false ),
	),
	array
	(
		'name'	=>	'>>',
		'page'	=>	$max,
		'act'	=>	( $page < $max ? true : false ),
	)
);
?>
<?php
if ( $list )
{
	?>


	<?php
		$tmp_get = '';
		foreach ($_GET as $get_key => $get_value)
		{
			if( in_array( $get_key, ['banOn','banOff','l'] ) ) continue;
			$tmp_get .= '&' . $get_key . '=' . $get_value;
		}
	?>



	<div class="marg-v over-h">
		<div class="fl-l">
			<?php foreach ($pagination as $key => $item): ?>
				<?php if (!$item['act']) continue; ?>
				<a href="?p=<?php echo $item['page'] ?>&l=<?php echo $limit; ?>" class="padd-0 <?php echo ( $page == $item['name'] ? 'b' : nill ) ?> "><?php echo $item['name'] ?></a>
			<?php endforeach ?>
		</div>
		<div class="fl-r">
			По:
			<!--
			<a href="?<?php echo ( isset( $_GET['p'] ) ? 'p=' . $_GET['p'] : null ) ?>&l=10">10</a>
			|
			<a href="?<?php echo ( isset( $_GET['p'] ) ? 'p=' . $_GET['p'] : null ) ?>&l=20">20</a>
			|
			<a href="?<?php echo ( isset( $_GET['p'] ) ? 'p=' . $_GET['p'] : null ) ?>&l=50">50</a>
			-->
			<a href="?<?php echo 'l=10' . $tmp_get; ?>">10</a>
			|
			<a href="?<?php echo 'l=25' . $tmp_get; ?>">25</a>
			|
			<a href="?<?php echo 'l=50' . $tmp_get; ?>">50</a>
		</div>
	</div>
			


			
	<div style="overflow-x: auto;">
	<table>
		<thead>
			<tr class="b">
				<td width="5%">id</td>
				<td width="30%">Имя</td>
				<td width="20%">Телефон</td>
				<td width="20%">Дата регистрации</td>
				<td width="25%">
					<?php if ( $typeList == 1 ): ?>
						Посетил (раз)
					<?php else: ?>
						Действия
					<?php endif ?>
				</td>
			</tr>
		</thead>
		<tbody>
			<?php
			for ($i=$start; $i <$end ; $i++) : ?>
				<?php if ( !isset( $list[$i] ) ) continue; ?>
				<?php $item = $list[$i]; ?>
				<tr>
					<td><?php echo $item['id']; ?></td>
					<td><a href="<?php echo $tmp['name'] . '/user/' . $item['id']; ?>" class="c-1"><?php echo $item['name']; ?></a></td>
					<td><a href="tel:<?php echo $item['phone']; ?>"><?php echo $item['phone']; ?></a></td>
					<td><?php echo $item['date']; ?></td>
					<td>
						<?php if ( $typeList == 1 ): ?>
							<?php echo $item['count']; ?>
						<?php else: ?>
							<!--<a class="h4 marg-0 c-1" href="<?php echo './' . $name . '/edit/' . $key; ?>">Ред.</a>
							<a class="h4 marg-0 c-1" href="<?php echo './' . $name . '/del/' . $key; ?>">Удалить.</a>-->
							<?php if ( $item['rank'] == -1 ): ?>
								<a class="h4 marg-0 c-1" href="<?php echo './' . $name . '?banOff=' . $item['id'] . $tmp_get; ?>">Разбанить</a>
							<?php else: ?>
								<a class="h4 marg-0" href="<?php echo './' . $name . '?banOn=' . $item['id'] . $tmp_get; ?>">Забанить</a>
							<?php endif ?>
						<?php endif ?>
							
					</td>
				</tr>
			<?php
			endfor;
			foreach ($list as $key => $item) :
			?>
				
			<?php
			endforeach;
			?>
		</tbody>
	</table>
	</div>
	<div class="marg-v">
		<?php foreach ($pagination as $key => $item): ?>
			<?php if (!$item['act']) continue; ?>
			<a href="?p=<?php echo $item['page'] ?>&l=<?php echo $limit; ?>" class="padd-0 <?php echo ( $page == $item['name'] ? 'b' : nill ) ?> "><?php echo $item['name'] ?></a>
		<?php endforeach ?>
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
?>