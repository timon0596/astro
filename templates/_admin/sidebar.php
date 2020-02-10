<div id="sidebar">
<?php
//$menu = require CONFIG_DIR . 'admin_parts.php';
$menu = Admin_Model::get_part();

echo '<ul>';
foreach ($menu as $key => $value) {
	if ( User::im('rank') >= $value['root'] )
	{
		echo '<li class="marg-v-0"><a href="/admin/' . $key . '">' . $value['title'] . '</a></li>';
	}
}
echo '</ul>';

?>
</div>