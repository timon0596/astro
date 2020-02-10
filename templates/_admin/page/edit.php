<?php

//echo "\r\n" . 'PAGE EDIT' . "\r\n";

$table =  Admin_Model::get_part($part, 'table');

//print_r( $table );
$result = Form::get( $table, $part, $action, $id );
//print_r( $result );

//$item = Post::get($id);
$item = Db::db_select($table,$id)[0];
?>
<form action="/admin/posts/complete" method="post" enctype="multipart/form-data">
	<?php
	/*echo $key;
	echo '<pre>';
	print_r( $result );
	echo '</pre>';*/
	foreach ($result as $key => $input)
	{
		if ( !$input['include'] ) continue;
		if ( $key == 'img' || $key == 'icon' || ( $table == 'media' && $key == 'name' ) )
		{
			//print_r( $item );
			if ( $table == 'media' )
			{
				$mime = $item['mime'];
			}
			else
			{
				$mime = Media::get( $item[$key], 'mime' );
			}
			//var_dump( $item[$key] );
			if ( $mime )
			{
				if ( in_array( $mime , [ 'image/jpeg', 'image/png', 'image/bmp', 'image/gif', 'image/svg+xml' ]) )
				{
					echo '<p class="b">' . $input['title'] . '</p>';
					echo '<div>';
					echo '<div class="d-ib bg-lg lh-0"><img src="' . Media::getUri($item[$key], 'min') . '" width="200px" /></div>';
					echo Media::getUri($key);
				}
				else
				{
					echo '<p class="b">Файл</p>';
					echo '<div>';
				}
			}
			else
			{
				echo '<p class="b">' . $input['title'] . '</p>';
				echo '<div>';
			}
			

			echo '<div>';
			echo '<input type="checkbox" name="old-' . $key . '" id="old-' . $key . '" checked >';
			echo '<label for="old-' . $key . '">Оставить без изменений</label>';
			echo '</div>';

			echo '<input' ;
			echo ' type="file" ' ;
			echo ' name="file[' . $key . ']" ' ;
			echo '>' ;
			echo '</div>';

			continue;
		}


		echo '<p class="b">' . $input['title'] . '</p>';

		switch ( $input['tag'] ) {
			case 'select':
				echo '<' . $input['tag'] ;
				echo ' name="' . $key . '" ' ;
				echo ' >';
				if ( is_array( $input['value'] ) )
				{
					foreach ($input['value'] as $val => $option) {
						$otstup = '';
						if ( isset( $option['level'] ) )
						{
							for ( $lvl=0; $lvl<$option['level']; $lvl++ )
							{
								//$otstup += '&emsp;';
								//if ( $lvl == 0 ) $otstup .= '-';
								$otstup .= '&emsp;';
							}
						}
						echo '<option value="' . $val . '" ' . ( isset( $option['act'] ) ? 'selected' : null ) . '>' . $otstup . $option['title'] . '</option>';
					}
				}
				else
				{
					echo $item[$key];
				}
				echo '</' . $input['tag'] . '>';
				break;
			
			case 'textarea':
				echo '<' . $input['tag'] ;
				echo ' name="' . $key . '" ' ;
				echo ' class="text-editor" ';
				echo ' id="text-editor" ';
				echo ' >';
				echo $item[$key];
				echo '</' . $input['tag'] . '>';
				break;
			
			// case 'array':
			// 	$values = json_decode($item[$key],true);
			// 	//print_r($values);
			// 	if ( is_array( $input['value'] ) )
			// 	{
			// 		foreach ($input['value'] as $gkey => $group) {
			// 			echo '<div>';
			// 			if ( isset( $group['list'] ) )
			// 			{
			// 				echo '<select name="'.$key.'[' . $gkey . ']">';
			// 				if ( is_array( $group['list'] ) )
			// 				{
			// 					echo '<option value="">- ' . $group['title'] .' -</option>';
			// 					foreach ($group['list'] as $okey => $option) {
			// 						echo '<option value="' . $okey . '" ' . ( in_array($okey, $values) ? 'selected' : null ) . '>' . $option . '</option>';
			// 					}
			// 				}
			// 				echo '</select>';
			// 			}
			// 			else
			// 			{
			// 				echo '<input type="checkbox" name="'.$key.'[' . $group['id'] . ']" id="'.$key.'-' . $group['id'] . '" >';
			// 				echo '<label for="'.$key.'-' . $group['id'] . '">' . $group['title'] . '</label>';
			// 			}
			// 			echo '</div>';
			// 		}
			// 	}
			// 	break;
			/*case 'array':
				$values = explode(',', $item[$key]);
				if ( is_array( $input['value'] ) )
				{
					foreach ($input['value'] as $gkey => $group) {
						echo '<div>';
						if ( isset( $group['list'] ) )
						{
							echo '<select name="filters[' . $group['id'] . ']">';
							if ( is_array( $group['list'] ) )
							{
								echo '<option value="">- ' . $group['title'] .' -</option>';
								foreach ($group['list'] as $okey => $option) {
									echo '<option value="' . $option['id'] . '" ' . ( in_array($option['id'], $values) ? 'selected' : null ) . '>' . $option['title'] . '</option>';
								}
							}
							echo '</select>';
						}
						else
						{
							echo '<input type="checkbox" name="filters[' . $group['id'] . ']" id="filters-' . $group['id'] . '" ' . ( in_array($group['id'], $values) ? 'checked' : null ) . '>';
							echo '<label for="filters-' . $group['id'] . '">' . $group['title'] . '</label>';
						}
						echo '</div>';
					}
				}
				break;*/
			
			/*case 'properties':
				$values =  json_decode( $item[$key], true);
				//var_dump( $values );
				if ( is_array( $input['value'] ) )
				{
					foreach ($input['value'] as $pkey => $prop)
					{
						echo '<div>';
						echo '<input type="checkbox" id="'.$key.'-'.$pkey.'" name="properties[' . $pkey . ']" ' . ( isset( $values[ $pkey ] ) ? 'checked' : null ) . '>';
						echo '<label for="'.$key.'-'.$pkey.'">' . $prop['title'] . '</label>';
						echo '</div>';
						echo '<div>';
						echo '<div>' . $prop['title'] . '</div>';
						echo '<input type="text" name="properties[' . $pkey . ']" value="' . ( isset( $values[ $pkey ] ) ? $values[ $pkey ] : $prop['value'] ) . '">';
						echo '</div>';
					}
				}

				break;*/
			
			case 'checklist':

				// echo '<pre>';
				// print_r($input['value']);
				$values = explode(',', $item[$key]);
				// print_r($values);
				// echo '<pre>';

				foreach ($input['value'] as $rkey => $rub)
				{
					echo '<div>';
					echo '<input type="checkbox" id="'.$key.'-'.$rkey.'" name="rubrics[' . $rkey . ']" ' . ( in_array($rkey, $values) ? 'checked' : null ) . '>';
					echo '<label for="'.$key.'-'.$rkey.'">' . $rub['title'] . '</label>';
					echo '</div>';
				}
			
				break;
			case 'properties':
				$values =  json_decode( $item[$key], true);
				/*var_dump( $values );
				var_dump( $item );*/
				if ( is_array( $input['value'] ) )
				{
					foreach ($input['value'] as $pkey => $prop)
					{
						echo '<div>';
						echo '<div>' . $prop['title'] . '</div>';
						echo '<input type="text" name="' . $key . '[' . $pkey . ']" value="' . ( isset( $values[ $pkey ] ) ? $values[ $pkey ] : $prop['value'] ) . '" style="min-width: 10em; width: calc(100% - 2em);">';
						echo '</div>';
					}
				}
				
				break;
			default:
				if ( $input['type'] == 'datetime-local' && isset( $item[$key] ) )
				{
					$item[$key] = str_replace( ' ', 'T', $item[$key]  );
				}
				if ( $input['type'] == 'date' && isset( $item[$key] ) )
				{
					$item[$key] = explode( ' ', $item[$key]  )[0];
					$input['value'] = date('Y-m-d');
				}
				echo '<' . $input['tag'] ;
				echo ' name="' . $key . '" ' ;
				echo ( $input['type'] ? ' type="' . $input['type'] . '" ' : null );
				echo ( isset( $item[$key] ) ? ' value="' . str_ireplace( '"', '&quot;', $item[$key]) . '" ' : ' value="' . $input['value'] . '" ' );
				echo ( isset( $input['required'] ) ? ' required ' : null );
				echo ' >';
				break;
		}

		/*echo '<' . $input['tag'] ;
		echo ' name="' . $key . '" ' ;*/

		/*if ( in_array( $input['tag'], [ 'select', 'textarea' ] ) )
		{
			if ( $input['tag'] == 'textarea' ) echo ' class="text-editor" ';

			echo ' >';
			//var_dump( $input['value'] );
			if ( is_array( $input['value'] ) )
			{
				foreach ($input['value'] as $val => $option) {
					echo '<option value="' . $val . '" ' . ( isset( $option['act'] ) ? 'selected' : null ) . '>' . $option['title'] . '</option>';
				}
			}
			else
			{
				echo $item[$key];
			}
		}
		else
		{
			echo ( $input['type'] ? ' type="' . $input['type'] . '" ' : null );
			echo ( isset( $item[$key] ) ? ' value="' . $item[$key] . '" ' : ' value="' . $input['value'] . '" ' );
			echo ( isset( $input['required'] ) ? ' required ' : null );
			echo ' >';
		}*/
		echo '</' . $input['tag'] . '>';
		//var_dump( $item[$key] );
	}
	?>
<div>
	<div class="marg-v">
		<button type="submit" name="submit" >Сохранить</button>
	</div>
</div>
</form>
<?php
