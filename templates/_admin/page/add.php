<?php

//echo "\r\n" . 'PAGE ADD' . "\r\n";

$table =  Admin_Model::get_part($part, 'table');
$intype = Admin_model::get_part($part, 'intype');

//print_r( $table );
$inputs = Form::get( $table, $part, $action, $id, $intype );



?>
<form action="/admin/posts/complete" method="post" enctype="multipart/form-data">
	<?php

	/*echo '<pre>';
	print_r( $inputs );
	echo '</pre>';*/

	foreach ($inputs as $key => $input)
	{
		if ( !$input['include'] ) continue;

		if ( $key == 'img' || $key == 'icon' || ( $table == 'media' && $key == 'name' ) )
		{
			echo '<p class="b">' . $input['title'] . '</p>';

			echo '<input' ;
			echo ' type="file" ' ;
			echo ' name="file[' . $key . ']" ' ;
			echo '>' ;
			continue;

		}


		echo '<p class="b">' . $input['title'] . '</p>';
		switch ( $input['tag'] ) {
			case 'select':
				/*echo '<pre>';
				print_r( $input );
				echo '</pre>';*/
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
				echo '</' . $input['tag'] . '>';
				break;
			
			case 'textarea':
				echo '<' . $input['tag'] ;
				echo ' name="' . $key . '" ' ;
				echo ' class="text-editor" ';
				echo ' id="text-editor" ';
				echo ' >';
				echo '</' . $input['tag'] . '>';
				break;
			
			case 'array':
				if ( is_array( $input['value'] ) )
				{
					foreach ($input['value'] as $gkey => $group) {
						echo '<div>';
						if ( isset( $group['list'] ) )
						{
							echo '<select name="'.$key.'[' . $gkey . ']">';
							if ( is_array( $group['list'] ) )
							{
								echo '<option value="">- ' . $group['title'] .' -</option>';
								foreach ($group['list'] as $okey => $option) {
									echo '<option value="' . $okey . '" >' . $option . '</option>';
								}
							}
							echo '</select>';
						}
						else
						{
							echo '<input type="checkbox" name="'.$key.'[' . $group['id'] . ']" id="'.$key.'-' . $group['id'] . '" >';
							echo '<label for="'.$key.'-' . $group['id'] . '">' . $group['title'] . '</label>';
						}
						echo '</div>';
					}
				}
				break;
			
			case 'properties':
				if ( is_array( $input['value'] ) )
				{
					foreach ($input['value'] as $pkey => $prop)
					{
						echo '<div>';
						echo '<input type="checkbox" name="properties[' . $pkey . ']">';
						echo '<label>' . $prop['title'] . '</label>';
						echo '</div>';
					}
				}
				break;
			// case 'checklist':

			// 	// echo '<pre>';
			// 	// print_r($input['value']);
			// 	//$values = explode(',', $item[$key]);
			// 	// print_r($values);
			// 	// echo '<pre>';

			// 	foreach ($input['value'] as $rkey => $rub)
			// 	{
			// 		echo '<div>';
			// 		echo '<input type="checkbox" id="'.$key.'-'.$rkey.'" name="rubrics[' . $rkey . ']" >';
			// 		echo '<label for="'.$key.'-'.$rkey.'">' . $rub['title'] . '</label>';
			// 		echo '</div>';
			// 	}
			
			// 	break;
			
			default:
				if ( $input['type'] == 'datetime-local' )
				{
					$item[$key] = str_replace( ' ', 'T', $item[$key]  );
				}
				if ( $input['type'] == 'date' )
				{
					if ( isset( $item[$key] )  )
					{
						$item[$key] = explode( ' ', $item[$key]  )[0];
					}
					$input['value'] = date('Y-m-d');
				}
				echo '<' . $input['tag'] ;
				echo ' name="' . $key . '" ' ;
				echo ( $input['type'] ? ' type="' . $input['type'] . '" ' : null );
				echo ( isset( $item[$key] ) ? ' value="' . str_ireplace( '"', '&quot;', $item[$key]) . '" ' : ' value="' . $input['value'] . '" ' );
				echo ( isset( $input['required'] ) ? ' required ' : null );
				echo ' >';
				break;
			// default:
			// 	//var_dump($input['type']);
			// 	if ( $input['type'] == 'datetime-local' )
			// 	{
			// 		$input['value'] = str_replace( ' ', 'T', $input['value']  );
			// 	}
			// 	echo '<' . $input['tag'] ;
			// 	echo ' name="' . $key . '" ' ;
			// 	echo ( $input['type'] ? ' type="' . $input['type'] . '" ' : null );
			// 	echo ( isset( $item[$key] ) ? ' value="' . $item[$key] . '" ' : ' value="' . $input['value'] . '" ' );
			// 	echo ( isset( $input['required'] ) ? ' required ' : null );
			// 	echo ' >';
			// 	break;
		}

		/*echo '<' . $input['tag'] ;
		echo ' name="' . $key . '" ' ;
		if ( in_array( $input['tag'], [ 'select', 'textarea' ] ) )
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
		}
		else
		{
			echo ( $input['type'] ? ' type="' . $input['type'] . '" ' : null );
			echo ( $input['value'] ? ' value="' . $input['value'] . '" ' : null );
			echo ( isset( $input['required'] ) ? ' required ' : null );
			echo ' >';
		}
		echo '</' . $input['tag'] . '>';*/
	}
	?>
<div>
	<button type="submit" name="submit" >Добавить</button>
</div>
</form>
<?php
/*echo '<pre>';
print_r( $result );
echo '</pre>';*/