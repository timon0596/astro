<?php

//echo "\r\n" . 'PAGE DEL' . "\r\n";

$table =  Admin_Model::get_part($part, 'table');
//print_r($table);

$result = Db::db_select( $table, $id );
//print_r($result);

if ( $result )
{
	?>
		<form action="/admin/posts/complete" method="post">
			<input name="TABLE" type="hidden" value="<?php echo $table; ?>">
			<input name="ACTION" type="hidden" value="<?php echo $action; ?>">
			<input name="ID" type="hidden" value="<?php echo $id; ?>">
			<div>
				<button type="submit" name="submit">Удалить</button>
			</div>
		</form>
	<?php
	/*$return = Db::db_delete( $table, $id );
	var_dump( $return );*/
}
