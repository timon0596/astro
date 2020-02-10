<?php
/*echo '<pre>';
print_r( $_POST );
echo '</pre>';*/
if ( isset( $_POST['schedule'] ) )
{
	foreach ($_POST['schedule'] as $day => $times)
	{
	/*echo '<pre>';
	var_dump( $times );
	echo '</pre>';*/
		foreach ($times as $key => $value)
		{
			$times[$key] = ( $value == '' ? null : $value );
		}
		//echo $day . ' ' . json_encode( $times, JSON_UNESCAPED_UNICODE );

		$check = DB::db_select( 'actions', ['type'=>'schedule', '`date` LIKE \'%' . $day . '%\''] );
		//var_dump( $check );
		//echo '<br>';

		if ( $check )
		{
			/*echo '<pre>';
			var_dump( $check[0]['id'] );
			echo '</pre>';*/
			$result = Db::db_update( 'actions', ['type'=>'schedule', 'sender'=>User::im('id'), 'recipient'=>$_POST['recipient'], 'properties'=>json_encode( $times, JSON_UNESCAPED_UNICODE ), 'date'=>$day . ' 00:00:00'], $check[0]['id'] );
			/*echo '<pre>';
			var_dump( $result );
			echo '</pre>';*/
		}
		else
		{
			$result = Db::db_insert( 'actions', ['type'=>'schedule', 'sender'=>User::im('id'), 'recipient'=>$_POST['recipient'], 'properties'=>json_encode( $times, JSON_UNESCAPED_UNICODE ), 'date'=>$day . ' 00:00:00'] );
			var_dump( $result );
		}
	}
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
	var_dump( $day_count );
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
	<div style="overflow-x: auto;">
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
	</div>
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

		$tmp['where'] = [ $tmp['where'], "`properties` LIKE '%place\":\"".$_GET['place']."%'", '`date` LIKE \'%' . $_GET['y'] . '-' . $_GET['m'] . ( isset($_GET['d']) ? '-' . $_GET['d'] : null ) . '%\'' ];

		$list = Db::db_select($tmp['table'], $tmp['where'], null, 'id');

		$month_stamp=mktime(0,0,0,$_GET['m'],1,$_GET['y']);
		$day_count=date("t",$month_stamp);

		$trainers = get_posts( 'trainers', false, true );

		$month_names=array("январь","февраль","март","апрель","май","июнь","июль","август","сентябрь","октябрь","ноябрь","декабрь"); 
		$prev='?place='.$_GET['place'].'&'.date('\m=m&\y=Y',mktime (0,0,0,$_GET['m']-1,1,$_GET['y']));  
		$next='?place='.$_GET['place'].'&'.date('\m=m&\y=Y',mktime (0,0,0,$_GET['m']+1,1,$_GET['y']));
		?>


		<form method="post" style="max-width: 30em;">
			<input type="hidden" name="recipient" value="<?php echo $_GET['place']; ?>">
			<div class="marg-v">
				<button type="submit">Сохранить</button>
			</div>
			<h3>
				<a href="<?php echo $prev ?>#page" class="d-ib w-1 ta-l c-1">&lt;</a>
				<span class="d-ib w-8 ta-c"><?php echo $month_names[$_GET['m']-1]," ",$_GET['y'] ?></span>
				<a href="<?php echo $next ?>#page" class="d-ib w-1 ta-r c-1">&gt;</a>
			</h3>
			<div style="overflow-x: auto;">
			<table class="ta-c">
				<thead>
					<tr>
						<td width="20%">Число</td>
						<td width="40%">08:00 - 15:00</td>
						<td width="40%">15:00 - 21:00</td>
					</tr>
				</thead>
				<tbody>
					<?php for ($i=1; $i <= $day_count; $i++) : ?>
						<?php
						$d = ( $i < 10 ? 0 . $i : $i );
						?>
						<tr>
							<td>
								<?php echo $d; ?>

								<?php
								$schedule = Db::db_select( 'actions', ['type'=>'schedule', 'recipient'=>$_GET['place'], '`date` LIKE \'%' . $_GET['y'] . '-' . $_GET['m'] . '-' . $d . '%\''] );
								if ( $schedule )
								{
									$schedule = $schedule[0];
									$schedule['properties'] = json_decode( $schedule['properties'], true );
								}
								?>
							</td>
							<td>
								<select name="schedule[<?php echo date( 'Y-m-d',mktime(0,0,0,$_GET['m'],$d,$_GET['y'])); ?>][0]">
									<option value="">Не выбрано</option>
									<?php foreach ($trainers as $tkey => $trainer): ?>
										<option value="<?php echo $tkey; ?>" <?php echo ( $schedule['properties'][0] == $tkey ? 'selected' : null ); ?>><?php echo $trainer['title'] ?></option>
									<?php endforeach ?>
								</select>
							</td>
							<td>
								<select name="schedule[<?php echo date( 'Y-m-d',mktime(0,0,0,$_GET['m'],$d,$_GET['y'])); ?>][1]">
									<option value="">Не выбрано</option>
									<?php foreach ($trainers as $tkey => $trainer): ?>
										<option value="<?php echo $tkey ?>" <?php echo ( $schedule['properties'][1] == $tkey ? 'selected' : null ); ?>><?php echo $trainer['title'] ?></option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
					<?php endfor; ?>
				</tbody>
			</table>
			</div>
			<div class="marg-v">
				<button type="submit">Сохранить</button>
			</div>
		</form>





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
	

	<!--
	<div class="marg-v">
		<a href="<?php echo $name ?>/add" class="button">Создать запись</a>
	</div>
	-->
	

<?php endif ?>