<?php
//print_r( $_POST );
if ( count( $_POST ) > 0 )
{
	$result = Db::db_select( $_POST['TABLE'], ['type'=>$_POST['type'], 'recipient'=>$_POST['recipient'], '`date` LIKE \'%' . date('Y-m-d',mktime (0,0,0,$_GET['m'],$_GET['d'],$_GET['y'])) . '%\''] );
	//$result = ( $result ? true : false );
	//var_dump( $result );
	if ( $_POST['ACTION'] == 'insert' )
	{
		if ( !is_array( $result ) )
		{
			Db::db_insert( $_POST['TABLE'], ['type'=>$_POST['type'], 'recipient'=>$_POST['recipient'], 'date'=>date('Y-m-d H:i:s',mktime (0,0,0,$_GET['m'],$_GET['d'],$_GET['y']))] );
		}
	}
	if ( $_POST['ACTION'] == 'delete' )
	{
		if ( is_array( $result ) && count( $result ) > 0 )
		{
			foreach ($result as $key => $action) {
				Db::db_delete( $_POST['TABLE'], $action['id'] );
			}
			
		}
	}

	/*if ( is_array( $result ) )
	{
		foreach ( $result as $akey => $action) {
			var_dump( $action['id'] );

		}
	}*/
}
?>


<?php 
function my_calendar($fill=array()) { 
    //global $new_list;
	$month_names=array("январь","февраль","март","апрель","май","июнь",
	"июль","август","сентябрь","октябрь","ноябрь","декабрь"); 
	if (isset($_GET['y'])) $y=$_GET['y'];
	if (isset($_GET['m'])) $m=$_GET['m']; 
	//if (isset($_GET['date']) AND strstr($_GET['date'],"-")) list($y,$m)=explode("-",$_GET['date']);
	if (!isset($y) OR $y < 1970 OR $y > 2037) $y=date("Y");
	if (!isset($m) OR $m < 1 OR $m > 12) $m=date("m");

	$month_stamp=mktime(0,0,0,$m,1,$y);
	$day_count=date("t",$month_stamp);
	$weekday=date("w",$month_stamp);
	if ($weekday==0) $weekday=7;
	$start=-($weekday-2);
	$last=($day_count+$weekday-1) % 7;
	if ($last==0) $end=$day_count; else $end=$day_count+7-$last;
	$today=date("Y-m-d");
	$prev='?place='.$_GET['place'].'&'.date('\m=m&\y=Y',mktime (0,0,0,$m-1,1,$y));  
	$next='?place='.$_GET['place'].'&'.date('\m=m&\y=Y',mktime (0,0,0,$m+1,1,$y));
	$i=0;
	//var_dump($fill);
	//var_dump($new_list);
	?> 
	<table border=1 cellspacing=0 cellpadding=2>
		<thead>
			<tr>
				<td colspan=7> 
					<table width="100%" border=0 cellspacing=0 cellpadding=0> 
						<tr> 
							<td align="center" width="30%"><a href="<?php echo $prev ?>">&lt;&lt;&lt;</a></td> 
							<td align="center" width="40%"><?php echo $month_names[$m-1]," ",$y ?></td> 
							<td align="center" width="30%"><a href="<?php echo $next ?>">&gt;&gt;&gt;</a></td> 
						</tr> 
					</table> 
				</td> 
			</tr> 
			<tr class="bg-g">
				<td align="center" width="14%">Пн</td>
				<td align="center" width="14%">Вт</td>
				<td align="center" width="14%">Ср</td>
				<td align="center" width="14%">Чт</td>
				<td align="center" width="14%">Пт</td>
				<td align="center" width="14%">Сб</td>
				<td align="center" width="14%">Вс</td>
			</tr>
		</thead>
		<?php 
		for($d=$start;$d<=$end;$d++)
		{ 
			if (!($i++ % 7)) echo " <tr>\n";
			echo '  <td align="center" class="va-t">';
			if ($d < 1 OR $d > $day_count)
			{
				echo "&nbsp";
			}
			else
			{
				$now="$y-$m-".sprintf("%02d",$d);

				if (is_array($fill) AND in_array($now,$fill))
				{
					$dstl = 0;
				}
				else
				{
					if ( strtotime( date('d.m.Y') ) > strtotime( ( $d < 10 ? 0 . $d : $d ).'.'.$m.'.'.$y ) )
					{
						$dstl = -1;
					}
					else
					{
						$dstl = 1;
					}
				}
				echo '<div' . ( $dstl === -1 ? ' class="c-g"' : null ) . '>';
					$d = ( $d < 10 ? 0 . $d : $d );
					echo '<a href="?place='.$_GET['place'].'&d='.$d.'&m='.$m.'&y='.$y.'" class="h2' . ( $d == @$_GET['d'] ? ' c-1' : null ) . '">';
					echo $d;
					echo '</a>';
					?>
				<?php
				echo '</div>';

			} 
			echo "</td>\n";
			if (!($i % 7))  echo " </tr>\n";
		} 
		?>
	</table> 
<?php } ?>




<?php
$tmp =  Admin_Model::get_part($name);
echo '<h1>' . $tmp['title'] . '</h1>';
?>




<?php if ( !isset( $_GET['place'] ) ): ?>
	<?php foreach (get_posts( 'places', false, true ) as $key => $place): ?>
		<span class="marg-0">
			<a href="?place=<?php echo $place['id'] . ( isset($_GET['y']) ? '&y=' . $_GET['y'] : null ) . ( isset($_GET['m']) ? '&m=' . $_GET['m'] : null ) . ( isset($_GET['d']) ? '&d=' . $_GET['d'] : null ); ?>" class="button"><?php echo $place['title']; ?></a>
		</span>
	<?php endforeach ?>
<?php else: ?>
	<a class="p c-1" href="?<?php echo ( isset($_GET['y']) ? '&y=' . $_GET['y'] : null ) . ( isset($_GET['m']) ? '&m=' . $_GET['m'] : null ) . ( isset($_GET['d']) ? '&d=' . $_GET['d'] : null ); ?>">Площадка: <?php echo get_post( $_GET['place'], 'title' ) ?></a>




	
	<?php
	//	Если Не выбран день
	if ( !isset( $_GET['d'] ) ):
	?>
		<div class="marg-v">
			<?php
			my_calendar(array(date("Y-m-d")));
			?>
		</div>
	<?php
	//	Если Выбран день
	else:
	?>
		<?php
		//	Если год не указан
		if( !isset( $_GET['y'] ) )
		{
			$_GET['y'] = date('Y');
			$_GET['m'] = date('m');
		}
		//	Если год указан
		else
		{
			if( !isset( $_GET['m'] ) || @$_GET['m'] < 1 || @$_GET['m'] > 12 )
			{
				if ( $_GET['y'] == date('Y') )
				{
					$_GET['m'] = date('m');
				}
				else
				{
					$_GET['m'] = '01';
				}
			}
			
		}
		?>
		<div class="marg-v">
			<a class="p c-1" href="?<?php echo ( isset($_GET['place']) ? 'place=' . $_GET['place'] : null ) . ( isset($_GET['y']) ? '&y=' . $_GET['y'] : null ) . ( isset($_GET['m']) ? '&m=' . $_GET['m'] : null ); ?>">Дата: <?php echo date('d.m.Y',mktime (0,0,0,$_GET['m'],$_GET['d'],$_GET['y'])) ?></a>
		</div>




		<?php
		//	Получаем список техники
		//echo $_GET['place'];
		$cycles = Db::db_select( 'posts', ['parent'=>$_GET['place']], null, 'id' );
		foreach ($cycles as $ckey => $cycle)
		{
			$result = ( Db::db_select( 'actions', ['type'=>'prevention', 'recipient'=>$ckey, '`date` LIKE \'%' . date('Y-m-d',mktime (0,0,0,$_GET['m'],$_GET['d'],$_GET['y'])) . '%\''], null, 'id' ) );
			$cycle['act'] = ( $result ? false : true );
			$cycles[$ckey] = $cycle;

			if ( !$cycle['act'] ) :
				?>
				<h4>
					Мотоцикл <span class="c-"><?php echo $cycle['title'] ?></span><span class="c-g">#<?php echo $ckey ?></span> на профилактике.
					<form method="post" style="display: inline;">
						<input type="hidden" name="TABLE" value="actions">
						<input type="hidden" name="ACTION" value="delete">
						<input type="hidden" name="type" value="prevention">
						<input type="hidden" name="recipient" value="<?php echo $ckey; ?>">
						<button type="submit" class="c-1" style="display: inline; padding: 0; background: none;">Вернуть в работу</button>
					</form>
				</h4>
				<?php
			endif;
		}
		//echo date('Y-m-d',mktime (0,0,0,$_GET['m'],$_GET['d'],$_GET['y']));
		
		?>

		<?
		$tmp['where'] = [ $tmp['where'], "`properties` LIKE '%place\":\"".$_GET['place']."%'", '`date` LIKE \'%' . $_GET['y'] . '-' . $_GET['m'] . ( isset($_GET['d']) ? '-' . $_GET['d'] : null ) . '%\'' ];

		$list = Db::db_select($tmp['table'], $tmp['where'], null, 'id');
		/*$new_list = false;
		if ( $list )
		{
			foreach ($list as $key => $item)
			{
				$new_key = explode( ' ', $item['date'] );
				$new_key[0] = explode( '-', $new_key[0])[2];
				if ( !isset( $new_list[ $new_key[0] ][ $new_key[1] ] ) ) $new_list[ $new_key[0] ][ $new_key[1] ] = array();
				array_push( $new_list[ $new_key[0] ][ $new_key[1] ] ,$item );
			}
		}*/
		?>
		<?php if ( $list ) : ?>
			<table class="ta-c">
				<thead class="bg-g">
					<tr>
						<td width="5%">№ записи</td>
						<td width="10%">Дата</td>
						<td width="5%">Время</td>
						<td width="15%">Техника</td>
						<td width="25%">Имя ученика</td>
						<td width="15%">Телефон</td>
						<td width="25%">Действия</td>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($list as $key => $item) :
					?>
									<tr id="<?php echo $key; ?>">
										<td><?php echo $key; ?></td>
										<td><?php echo date("d.m.Y", strtotime($item['date']) ); ?></td>
										<td><?php echo date("H:i", strtotime($item['date']) ); ?></td>
										<td>
											<?php
											$cycle =  get_post($item['recipient']);
											$cycles[ $cycle['id'] ]['noPrevention'] = true;
											?>
											<div><?php echo $cycle['title']; ?> <span class="c-g">#<?php echo $cycle['id']; ?></span></div>
											<div class="c-g"><?php echo get_post(  $cycle['parent'] , 'title'); ?></div>
										</td>
										<td><?php echo get_user($item['sender'])['name']; ?></td>
										<td><?php echo get_user($item['sender'])['phone']; ?></td>
										<td>
											<a class="button" href="<?php echo './' . $name . '/edit/' . $key; ?>">редактировать</a>
											<a class="button" href="<?php echo './' . $name . '/del/' . $key; ?>">удалить</a>
										</td>
									</tr>
							</p>
						</div>
					<?php
					endforeach;
					?>
				</tbody>
			</table>
		<?php else : ?>
				<div class="margin-v-0">
					<p>Нет записей</p>
				</div>
		<?php endif; ?>

		<?php
		foreach ($cycles as $ckey => $cycle) :
			if ( $cycle['act'] ) :
				?>
				<h4>
					Мотоцикл <span class="c-"><?php echo $cycle['title'] ?></span><span class="c-g">#<?php echo $ckey ?></span> в работе.

					<?php if( !@$cycle['noPrevention'] ) : ?>
						<form method="post" style="display: inline;">
							<input type="hidden" name="TABLE" value="actions">
							<input type="hidden" name="ACTION" value="insert">
							<input type="hidden" name="type" value="prevention">
							<input type="hidden" name="recipient" value="<?php echo $ckey; ?>">
							<button type="submit" class="c-1" style="display: inline; padding: 0; background: none;">Отправить на профилактику</button>
						</form>
					<?php else: ?>
						<span class="c-g">Мотоцикл используется</span>
					<?php endif; ?>
						
				</h4>
				<?php
			endif;
		endforeach;
		//echo date('Y-m-d',mktime (0,0,0,$_GET['m'],$_GET['d'],$_GET['y']));
		
		?>
	<?php endif ?>
	

	<!--
	<div class="marg-v">
		<a href="<?php echo $name ?>/add" class="button">Создать запись</a>
	</div>
	-->
	

<?php endif ?>