<?php

if ( isset( $_GET['add'] ) ):
?>
	<h2>Добавить</h2>
	<form action="media" method="post">
		<input type="hidden" name="type" value="<?php echo $_GET['add']; ?>"></input>
		<p><input type="radio" name="link" value="0" checked> Загрузить</input></p>
		<p><input type="file" name="img" placeholder="Изображение"></p>
		<p><input type="radio" name="link" value="1"> По ссылке</p>
		<p><input type="text" name="url" placeholder="Ссылка"></p>
		<p><input type="text" name="title" placeholder="Название"></p>
		<p><input type="submit" name="submit" value="Загрузить"></p>
	</form>

<?php
	/*Form::get('media', 'post', [
		[
			'teg'=>'input',
			'type'=>'hidden',
			'name'=>'type',
			'value'=>$_GET['add']
		],
		[
			'teg'=>'input',
			'type'=>'radio',
			'name'=>'link',
			'value'=>0,
			'checked'=>null,
			'text'=>'Загрузить'
		],
		[
			'teg'=>'input',
			'type'=>'file',
			'name'=>'img',
			'placeholder'=>'Изображение'
		],
		[
			'teg'=>'input',
			'type'=>'radio',
			'name'=>'link',
			'value'=>1,
			'text'=>'По ссылке'
		],
		[
			'teg'=>'input',
			'type'=>'text',
			'name'=>'url',
			'placeholder'=>'Ссылка'
		],
		[
			'teg'=>'input',
			'type'=>'text',
			'name'=>'title',
			'placeholder'=>'Название'
		],
		[
			'teg'=>'input',
			'type'=>'submit',
			'name'=>'submit',
			'value'=>'Загрузить'
		]
	]);*/
endif;

if ( isset( $_POST['submit'] ) )
{
	print_r( $_POST );
}


$media = Media::getList();
/*echo '<pre>';
var_dump( $media );
echo '</pre>';*/

foreach ($media as $type => $list)
{
	echo '<h2>' . $type . '</h2>';
	echo '<div><a href="?add=' . $type . '">Добавить</a></div>';
	foreach ($list as $id => $item) {
		echo '<div>';
		echo '#' . $id;
		echo '<img src="' . $item['src'] . $item['name'] . '">';
		echo '<a href="media/' . $id . '">' . $item['title'] . '</a>';
		echo '</div>';
	}
}


