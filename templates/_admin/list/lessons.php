<?php

if ( isset( $_GET['banOn'] ) )
{
	Db::db_update( 'users', ['rank'=>-1], $_GET['banOn'] );
	unset( $_GET['banOn'] );
}
if ( isset( $_GET['banOff'] ) )
{
	Db::db_update( 'users', ['rank'=>1], $_GET['banOff'] );
	unset( $_GET['banOff'] );
}
//print_r( $_POST );
if ( count( $_POST ) > 0 && isset( $_POST['ACTION'] ) )
{
	if ( $_POST['ACTION'] == 'insert' )
	{
		$start = 0;
		$end = 1;

		$vars = $_POST;
		unset( $vars['ACTION'] );
		unset( $vars['TABLE'] );
		$each = false;
		if ( isset( $_POST['start'] ) && isset( $_POST['end'] ) )
		{
			unset( $vars['start'] );
			unset( $vars['end'] );
			$start = (int) $_POST['start'];
			$end = (int) ( $_POST['start'] < $_POST['end'] ? $_POST['end'] : $_POST['start']+1 );
		}
		for ($i=$start; $i < $end; $i++) {
			//var_dump( $i );
			if ( $vars['type']=='break' )
			{
				//	Получаем список техники

				if ( isset( $vars['recipient'] ) )
				{
					var_dump( $vars['recipient'] );
					$cycles = Db::db_select( 'posts', $vars['recipient'], null, 'id' );
					unset( $vars['recipient'] );
				}
				else
				{
					$cycles = Db::db_select( 'posts', ['parent'=>$_GET['place']], null, 'id' );
				}
				$temp_date['y'] = $vars['y'];
				$temp_date['m'] = $vars['m'];
				$temp_date['d'] = $vars['d'];
				unset( $vars['y'] );
				unset( $vars['m'] );
				unset( $vars['d'] );
				foreach ($cycles as $ckey => $cycle)
				{
					$lesson = Db::db_select( $_POST['TABLE'], [ '( `type`="lesson" OR `type`="break" )', 'recipient'=>$ckey, '`properties` LIKE \'%"place":"' . $_GET['place'] . '"%\'', '`date` LIKE \'%' . date('Y-m-d H',mktime(( $i < 10 ? 0 . $i : $i ),0,0,$temp_date['m'],$temp_date['d'],$temp_date['y'])) . '%\'' ] );
					//var_dump( $lesson );
					if( $lesson ) continue;

					$vars['recipient'] = $ckey;
					echo $i . ' ' . $ckey . '<br>';
					print_r( $vars );
					echo '<br>';
					$tmp = $vars;
					array_push($tmp, '`date` LIKE \'%' . date('Y-m-d'.( $tmp['type']=='break' ? ' H' : null ),mktime (( $i < 10 ? 0 . $i : $i ),0,0,$temp_date['m'],$temp_date['d'],$temp_date['y'])) . '%\'' );
					$result = Db::db_select( $_POST['TABLE'], $tmp );
					$tmp = $vars;
					if ( !is_array( $result ) )
					{
						$tmp['date'] = date('Y-m-d H:i:s',mktime ($i,0,0,$temp_date['m'],$temp_date['d'],$temp_date['y']));
						Db::db_insert( $_POST['TABLE'], $tmp );
					}
				}
			}
		}
	}
	if ( $_POST['ACTION'] == 'delete' )
	{
		$vars = $_POST;
		unset( $vars['ACTION'] );
		unset( $vars['TABLE'] );
		$tmp = $vars;
		array_push($tmp, '`date` LIKE \'%' . date('Y-m-d',mktime (0,0,0,$_GET['m'],$_GET['d'],$_GET['y'])) . '%\'' );
		$result = Db::db_select( $_POST['TABLE'], $tmp );
		if ( is_array( $result ) && count( $result ) > 0 )
		{
			foreach ($result as $key => $action) {
				Db::db_delete( $_POST['TABLE'], $action['id'] );
			}
			
		}
	}
	if ( $_POST['ACTION'] == 'type' )
	{
		$result = Db::db_select( $_POST['TABLE'], $_POST['id'] );
		$status =  (int) $result[0]['status'];
		$newStatus =  abs( $status - 1 );
		var_dump( $status );
		var_dump( $newStatus );
		Db::db_update( $_POST['TABLE'], ['status'=>$newStatus], $_POST['id'] );
	}
}
?>





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
				
				//my_calendar(array(date("Y-m-d")));

				$fill = array(date("Y-m-d"));

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
						$prevention = Db::db_select( 'actions', ['type'=>'prevention', '`date` LIKE \'%' . date('Y-m-d',mktime (0,0,0,$m,$d,$y)) . '%\''] );

						if (!($i++ % 7)) echo " <tr>\n";
						echo '  <td align="center" class="va-t" ' . ( $prevention ? ' style="background-color: rgba(255,255,0,.2)"' : null ) . '>';
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
								$off = Db::db_select( 'actions', ['type'=>'off', '`date` LIKE \'%' . date('Y-m-d',mktime (0,0,0,$m,$d,$y)) . '%\''] );
								//var_dump( $off );
								if ( $off )
								{
									$dstl = -1;
								}
								else
								{
									if ( strtotime( date('d.m.Y') ) > strtotime( ( $d < 10 ? 0 . $d : $d ).'.'.$m.'.'.$y ) )
									{
										$dstl = 0;
									}
									else
									{
										$dstl = 1;
									}
								}
									
							}
							echo '<div class="' . ( $dstl === -1 ? ' c-1' : ( $dstl === 0 ? ' c-g' : null ) ) . '">';
								$d = ( $d < 10 ? 0 . $d : $d );
								echo '<a href="?place='.$_GET['place'].'&d='.$d.'&m='.$m.'&y='.$y.'" class="d-b w-100p h-100p h3' . ( $d == @$_GET['d'] ? ' c-1' : null ) . '">';
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
		</div>
		<div class="part-2">
			<?php if ( @$_GET['full'] == 1) : ?>
				<h2>Календарь на месяц</h2>
				<div class="marg-v">
					<a
						href="?full=0<?php
							foreach ( $_GET as $get_key => $get_val )
							{
								if ( $get_key == 'full' ) continue;
								echo '&' . $get_key . '=' . $get_val;
							}
						?>"
						class="button"
					>
						Скрыть
					</a>
				</div>
				<?php
				$settings = siteinfo('settings');
				$settings = json_decode( $settings, true );

				//	Получаем список техники
				$cycles = Db::db_select( 'posts', ['parent'=>$_GET['place']], null, 'id' );

				?>
				<div style="overflow-x: auto;">
				<table class="ta-c">
					<thead class="bg-g">
						<tr>
							<td width="1%" style="font-size: 12px; padding: 4px;">#</td>
							<td width="4%" style="font-size: 12px; padding: 4px;">Техника</td>
							<?php for ($i=$settings['start']; $i <= $settings['end']; $i++) : ?>
								<td width="<?php echo ( 95 / $day_count ) . '%'; ?>" style="font-size: 12px; padding: 4px;"><?php echo $i . ':00' ?></td>
							<?php endfor; ?>
						</tr>
					</thead>
					<tbody>
					<?php

					$chet = 0;
					for ($d=1; $d <= $day_count; $d++)
					{
						$day_view = true;
						foreach ($cycles as $ckey => $cycle)
						{
							//echo $i . ' ' . $ckey . '<br>';

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

							<tr class="<?php echo ( (bool) $chet ? 'bg-g-20' : null ); ?>">

								<?php if ($day_view): ?>
									<td rowspan="<?php echo count($cycles); ?>" style="font-size: 12px; padding: 4px;">
										<?php
										echo '<a href="?place='.$_GET['place'].'&d='.$d.'&m='.$_GET['m'].'&y='.$_GET['y'].'" class="d-b w-100p h-100p h4">';
										echo $d;
										echo '</a>';
										?>
									</td>
								<?php endif ?>

								<td style="font-size: 12px; padding: 4px;">
									<?php echo $cycle['title'] ?>
								</td>


								<?php for ($i=$settings['start']; $i <= $settings['end']; $i++) : ?>
									
									<?php

									$where = [ 'type' => 'lesson', 'recipient' => $ckey, "`properties` LIKE '%place\":\"".$_GET['place']."\"%'", '`date` LIKE \'%' . $_GET['y'] . '-' . $_GET['m'] . '-' . ( $d < 10 ? '0'.$d : $d ) . ' ' . ( $i < 10 ? '0'.$i : $i ) . '%\'' ];
									/*print_r( $where );
									echo '<br>';*/
									$lessons = Db::db_select($tmp['table'], $where, null);

									$where = [ 'type' => 'break', 'recipient' => $ckey, "`properties` LIKE '%place\":\"".$_GET['place']."\"%'", '`date` LIKE \'%' . $_GET['y'] . '-' . $_GET['m'] . '-' . ( $d < 10 ? '0'.$d : $d ) . ' ' . ( $i < 10 ? '0'.$i : $i ) . '%\'' ];
									$breaks = Db::db_select($tmp['table'], $where, null);
									//var_dump( $where );
									$list = array();
									if ( is_array( $lessons ) ) $list += $lessons;
									if ( is_array( $breaks ) ) $list += $breaks;
									usort( $list, function($a,$b) {
										if ($a['date'] == $b['date']) {
											return 0;
										}
										return ($a['date'] < $b['date']) ? -1 : 1;
									});

									?>
											<?php
											$tmp_user = false;
											if ( isset( $lessons[0]['sender'] ) )
											{
												$tmp_user = User::get( $lessons[0]['sender'] );
											}
											//var_dump($tmp_user);
											?>
											<?php if ( $tmp_user ) : ?>

												<td style="font-size: 12px; padding: 4px;">
													<div class="marg-v-0">
														<a href="students/user/<?php echo $tmp_user['id']; ?>" class="b"><?php echo $tmp_user['name']; ?></a>
													</div>
													<div class="marg-v-0">
														<a href="tel:<?php echo $tmp_user['phone']; ?>" class=""><?php echo $tmp_user['phone']; ?></a>
													</div>
													<div class="marg-v-0">
														<?php if ( $tmp_user['rank'] == -1 ): ?>
															<a href="students?type=-1" class="c-1 b h4">В бане</a>
														<?php else: ?>
															<a href="students?type=-1&banOn=<?php echo $tmp_user['id']; ?>" class="c-1">Забанить</a>
														<?php endif; ?>
													</div>

												</td>
													
											<?php else: ?>
												
												<?php if ( isset( $breaks[0] ) ): ?>
													<td style="font-size: 12px; padding: 4px; background-color: rgba(255,255,0,.5);">
														забито
													</td>
												<?php else: ?>
													<td style="font-size: 12px; padding: 4px;">
														<form method="post">
															<input type="hidden" name="TABLE" value="actions">
															<input type="hidden" name="ACTION" value="insert">
															<input type="hidden" name="type" value="break">
															<input type="hidden" name="d" value="<?php echo ( $d < 10 ? '0'.$d : $d ); ?>">
															<input type="hidden" name="m" value="<?php echo $_GET['m'] ?>">
															<input type="hidden" name="y" value="<?php echo $_GET['y'] ?>">
															<input type="hidden" name="recipient" value="<?php echo $ckey; ?>">
															<input type="hidden" name="properties" value="{&quot;place&quot;:&quot;<?php echo $_GET['place']; ?>&quot;}">
															<input type="hidden" value="<?php echo $i; ?>" name="start" required>
															<input type="hidden" value="<?php echo $i+1; ?>" name="end" required>
															<span><button type="submit" class="d-ib c-g n" style="background-color: transparent; font-size: 12px;">Забить</button></span>
														</form>
													</td>
												<?php endif ?>

											<?php endif; ?>
								<?php endfor; ?>
							</tr>

							<?php
							$day_view = false;
						}
						$chet = abs( $chet - 1 );
					}
					
					?>
					</tbody>
				</table>
				</div>
			<?php else: ?>
				<a
					href="?full=1<?php
						foreach ( $_GET as $get_key => $get_val )
						{
							if ( $get_key == 'full' ) continue;
							echo '&' . $get_key . '=' . $get_val;
						}
					?>"
					class="button"
				>
					Показать весь месяц
				</a>
			<?php endif; ?>
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




		<div class="part">

			<div class="part-2">
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
							Мотоцикл <span class="c-"><?php echo $cycle['title'] ?></span><!--<span class="c-g">#<?php echo $cycle['id']; ?></span>--> на профилактике.
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
			</div>


			<div class="part-2">
				<?
				$where = [ $tmp['where'], "`properties` LIKE '%place\":\"".$_GET['place']."%'", '`date` LIKE \'%' . $_GET['y'] . '-' . $_GET['m'] . ( isset($_GET['d']) ? '-' . $_GET['d'] : null ) . '%\'' ];
				$lessons = Db::db_select($tmp['table'], $where, null, 'id');

				$where = [ 'type' => 'break', "`properties` LIKE '%place\":\"".$_GET['place']."%'", '`date` LIKE \'%' . $_GET['y'] . '-' . $_GET['m'] . ( isset($_GET['d']) ? '-' . $_GET['d'] : null ) . '%\'' ];
				$breaks = Db::db_select($tmp['table'], $where, null, 'id');
				//var_dump( $where );
				$list = array();
				if ( is_array( $lessons ) ) $list += $lessons;
				if ( is_array( $breaks ) ) $list += $breaks;
				usort( $list, function($a,$b) {
					if ($a['date'] == $b['date']) {
						return 0;
					}
					return ($a['date'] < $b['date']) ? -1 : 1;
				});
				/*echo '<pre>';
				print_r( $list );
				//print_r( $breaks );
				echo '</pre>';*/
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
						<div style="overflow-x: auto;">
						<table class="ta-c">
							<thead class="bg-g">
								<tr>
									<td width="5%">№ записи</td>
									<td width="10%">Дата</td>
									<td width="5%">Время</td>
									<td width="15%">Техника</td>
									<td width="5%">Тип</td>
									<td width="20%">Имя ученика</td>
									<td width="15%">Телефон</td>
									<td width="25%">Действия</td>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($list as $key => $item) :
								?>
												<tr id="<?php echo $item['id']; ?>" <?php echo ( $item['type'] == 'break' ?  ' class="bg-g-10"' : null ) ?>>
													<td><?php echo $item['id']; ?></td>
													<td><?php echo date("d.m.Y", strtotime($item['date']) ); ?></td>
													<td><?php echo date("H:i", strtotime($item['date']) ); ?></td>
													<td>
														<?php
														$cycle =  get_post($item['recipient']);
														$cycles[ $cycle['id'] ]['noPrevention'] = true;
														?>
														<div><?php echo $cycle['title']; ?><!--<span class="c-g">#<?php echo $cycle['id']; ?></span>--></div>
														<!--<div class="c-g"><?php echo get_post(  $cycle['parent'] , 'title'); ?></div>-->
													</td>
													<?php if ($item['type'] == 'break'): ?>
														<td colspan="3">забито</td>
														<td>
															<a class="h4 marg-0 c-1" href="<?php echo './' . $name . '/del/' . $item['id']; ?>">Удалить</a>
														</td>
													<?php else: ?>
														<td>
															<form method="post">
																<input type="hidden" name="TABLE" value="actions">
																<input type="hidden" name="ACTION" value="type">
																<input type="hidden" name="id" value="<?php echo $item['id']; ?>">
																<input type="submit" value="<?php echo ($item['status'] ? 'МШ' : 'ГАИ'); ?>" class="<?php echo (!$item['status'] ? 'c-1' : null); ?>">
															</form>
														</td>
														<td><a href="students/user/<?php echo $item['sender']; ?>" class="c-1"><?php echo get_user($item['sender'])['name']; ?></a></td>
														<td>
															<a href="tel:<?php echo get_user($item['sender'])['phone']; ?>"><?php echo get_user($item['sender'])['phone']; ?></a>
														</td>
														<td>
															<!--<a class="h4 marg-0 c-1" href="<?php echo './' . $name . '/edit/' . $item['id']; ?>">Ред.</a>-->
															<a class="h4 marg-0 c-1" href="<?php echo './' . $name . '/del/' . $item['id']; ?>">Удалить</a>
														</td>
													<?php endif ?>
														
												</tr>
										</p>
									</div>
								<?php
								endforeach;
								?>
							</tbody>
						</table>
						</div>
				<?php else : ?>
						<p>Нет записей</p>
				<?php endif; ?>
			</div>
		
			<div class="part-2">
				<?php
				foreach ($cycles as $ckey => $cycle) :
					if ( $cycle['act'] ) :
						?>
						<h4>
							Мотоцикл <span class="c-"><?php echo $cycle['title'] ?></span><!--<span class="c-g">#<?php echo $cycle['id']; ?></span>--> в работе.

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
			</div>

			<div class="part-2">
				<?php 
					$off = Db::db_select( 'actions', ['type'=>'off', '`date` LIKE \'%' . date('Y-m-d',mktime (0,0,0,$_GET['m'],$_GET['d'],$_GET['y'])) . '%\''] );
				?>
					<div class="marg-v">
					<?php
					if ( $off ) :
					?>
						<form method="post" style="display: inline;">
							<input type="hidden" name="TABLE" value="actions">
							<input type="hidden" name="ACTION" value="delete">
							<input type="hidden" name="type" value="off">
							<button type="submit" class="c-1" style="display: inline; padding: 0; background: none;">Сделать рабочим</button>
						</form>
					<?php
					else:
					?>
						<?php if ( !$list ) : ?>
							<form method="post" style="display: inline;">
								<input type="hidden" name="TABLE" value="actions">
								<input type="hidden" name="ACTION" value="insert">
								<input type="hidden" name="type" value="off">
								<button type="submit" class="c-1" style="display: inline; padding: 0; background: none;">Сделать выходным</button>
							</form>
						<?php else: ?>
							<span class="c-g">удалите записи чтобы сделать день выходным</span>
						<?php endif; ?>
					<?php
					endif;
					?>
					</div>

				<?php if ( !$off ): ?>
					<?php
					$settings = siteinfo('settings');
					$settings = json_decode( $settings, true );
					?>
					<h4>Забить период:</h4>
					<form method="post">
						<input type="hidden" name="TABLE" value="actions">
						<input type="hidden" name="ACTION" value="insert">
						<input type="hidden" name="type" value="break">
						<input type="hidden" name="d" value="<?php echo $_GET['d'] ?>">
						<input type="hidden" name="m" value="<?php echo $_GET['m'] ?>">
						<input type="hidden" name="y" value="<?php echo $_GET['y'] ?>">
						<input type="hidden" name="properties" value="{&quot;place&quot;:&quot;<?php echo $_GET['place']; ?>&quot;}">
						<span>С</span>
						<span><input type="number" min="<?php echo $settings['start']; ?>" max="<?php echo $settings['end']; ?>" name="start" required></span>
						<span>По</span>
						<span><input type="number" min="<?php echo $settings['start']+1; ?>" max="<?php echo $settings['end']+1; ?>" name="end" required></span>
						<span><button type="submit">Забить</button></span>
					</form>			
				<?php endif ?>

			</div>
			
		</div>
	<?php endif ?>
	

	<!--
	<div class="marg-v">
		<a href="<?php echo $name ?>/add" class="button">Создать запись</a>
	</div>
	-->
	

<?php endif ?>