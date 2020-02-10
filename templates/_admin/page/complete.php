<?php
echo '<pre>';
echo "\r\n" . 'PAGE COMPLETE';
echo '</pre>';

//var_dump( $_POST );

if ( Form::post() )
{
	echo "Успешно!";
}
else
{
	echo "Ошибка";
}

/*echo '<pre>';
echo '$_POST' . "\r\n";
print_r($_POST);
echo '$_FILES' . "\r\n";
print_r($_FILES);
echo '</pre>';*/