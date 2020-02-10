<?php

//echo "\r\n" . 'PAGE EDIT' . "\r\n";

$table =  Admin_Model::get_part($part, 'table');

//print_r( $table );
$action = 'edit';
$result = Form::get( $table, $part, $action, $id );
//print_r( $result );

//$item = Post::get($id);
$items = Db::db_select($table,$id);
pr($result);
?>
<form action="/admin/posts/complete" method="post" enctype="multipart/form-data">
	<input name="TABLE" type="hidden" value="options">
	<input name="ACTION" type="hidden" value="edit">
	<?php
	/*echo $key;
	echo '<pre>';
	print_r( $result );
	echo '</pre>';*/
	foreach ($items as $key => $input)
	{
		$input['tag'] = 'input';
		$input['type'] = 'text';
		echo '<p class="b">' . $input['description'] . '</p>';

		switch ( $input['tag'] ) {
			case 'select':
				echo '<' . $input['tag'] ;
				echo ' name="' . $input['name'] . '" ' ;
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
						echo '<option value="' . $val . '" ' . ( isset( $option['act'] ) ? 'selected' : null ) . '>' . $otstup . $option['description'] . '</option>';
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
				echo ' id="text-editor-'.$key.'" ';
				echo ' class="text-editor" ';
				echo ' >';
				echo $item[$key];
				echo '</' . $input['tag'] . '>';
				break;
			
			case 'array':
				$values = json_decode($item[$key],true);
				//print_r($values);
				if ( is_array( $input['value'] ) )
				{
					foreach ($input['value'] as $gkey => $group) {
						echo '<div>';
						if ( isset( $group['list'] ) )
						{
							echo '<select name="'.$key.'[' . $gkey . ']">';
							if ( is_array( $group['list'] ) )
							{
								echo '<option value="">- ' . $group['description'] .' -</option>';
								foreach ($group['list'] as $okey => $option) {
									echo '<option value="' . $okey . '" ' . ( in_array($okey, $values) ? 'selected' : null ) . '>' . $option . '</option>';
								}
							}
							echo '</select>';
						}
						else
						{
							echo '<input type="checkbox" name="'.$key.'[' . $group['id'] . ']" id="'.$key.'-' . $group['id'] . '" >';
							echo '<label for="'.$key.'-' . $group['id'] . '">' . $group['description'] . '</label>';
						}
						echo '</div>';
					}
				}
				break;
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
								echo '<option value="">- ' . $group['description'] .' -</option>';
								foreach ($group['list'] as $okey => $option) {
									echo '<option value="' . $option['id'] . '" ' . ( in_array($option['id'], $values) ? 'selected' : null ) . '>' . $option['description'] . '</option>';
								}
							}
							echo '</select>';
						}
						else
						{
							echo '<input type="checkbox" name="filters[' . $group['id'] . ']" id="filters-' . $group['id'] . '" ' . ( in_array($group['id'], $values) ? 'checked' : null ) . '>';
							echo '<label for="filters-' . $group['id'] . '">' . $group['description'] . '</label>';
						}
						echo '</div>';
					}
				}
				break;*/
			
			case 'properties':
				$values =  json_decode( $item[$key], true);
				/*var_dump( $values );
				var_dump( $item );*/
				if ( is_array( $input['value'] ) )
				{
					foreach ($input['value'] as $pkey => $prop)
					{
						echo '<div>';
						echo '<div>' . $prop['description'] . '</div>';
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
				echo '<' . $input['tag'] ;
				echo ' name="' . $input['name'] . '" ' ;
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
					echo '<option value="' . $val . '" ' . ( isset( $option['act'] ) ? 'selected' : null ) . '>' . $option['description'] . '</option>';
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
