<?php

/**
* 
*/
class Form
{
	
	function __construct(){}






	public static function login()
	{
		//echo 'Form::login()';
		if ( ( isset( $_POST['login'] ) || isset( $_POST['email'] )) && isset( $_POST['password'] ) )
		{
			if ( isset( $_POST['login'] ) )
			{
				$login	= $_POST['login'];
				$col	= 'login';
			}
			if ( isset( $_POST['email'] ) )
			{
				$login	= $_POST['email'];
				$col	= 'email';
			}
			$return = User::login( $login , $_POST['password'], $col );
		}
		else
		{
			$return = false;
		}

		return $return;
	}



	/*
	 *	Функция получения массива параметров полей формы
	 *
	 *	table		-	Имя таблицы в БД
	 *	$part		-	Раздел
	 *	$action		-	add / edit / del
	 *	$id			-	id записи в таблице БД
	 *
	 */
	public static function get( $table, $part, $action = false, $id = false )
	{
		$fields = Db::db_show( $table );

		$return['TABLE'] = array
		(
			'include'	=> true,
			'title'		=> null,
			'tag'		=> 'input',
			'type'		=> 'hidden',
			'value'		=> $table
		);

		$return['ACTION'] = array
		(
			'include'	=> true,
			'title'		=> null,
			'tag'		=> 'input',
			'type'		=> 'hidden',
			'value'		=> $action
		);
		if ( $id !== false && $id !== null )
		{
			$return['ID'] = array
			(
				'include'	=> true,
				'title'		=> null,
				'tag'		=> 'input',
				'type'		=> 'hidden',
				'value'		=> $id
			);
		}
		foreach ($fields as $key => $value) {
			//var_dump( $key );

			if ( $key == 'img' || $key == 'icon' )
			{}

			$return[$key] = self::input_options($table, $key, $part);
			/*var_dump( $return[$key] );
			echo '<br>';*/

			if ( $key == 'parent' && $id )
			{
				//$parent = Post::get( $id, 'parent' );
				$result = Db::db_select( $table, $id );
				if ( $result )
				{
					$parent = $result[0]['parent'];
				}
				//var_dump( $parent );
				if ( isset( $return[$key]['value'][$parent] ) && $parent !== null )
				{
					$return[$key]['value'][$parent]['act'] = true;
				}
			}
			if ( $table == 'posts' && $key == 'type' )
			{
				if ( $id )
				{
					$result = Db::db_select( $table, $id );
					if ( $result )
					{
						$type = $result[0]['type'];
					}
					if ( isset( $return[$key]['value'][$type] ) )
					{
						$return[$key]['value'][$type]['act'] = true;
					}
				}
				else
				{
					mb_internal_encoding("UTF-8");
					$tmp_part = mb_substr($part, 0, -1);
					if ( isset( $return[$key]['value'][$tmp_part] ) )
					{
						$return[$key]['value'][$tmp_part]['act'] = true;
					}
				}
			}
		}
			

		return $return;
	}

	



	/*
	 *	Функция обработки $_FILES
	 */
	public static function files()
	{
		/*echo '<pre>';
		print_r( $_FILES );
		echo '</pre>';*/
		//$up_dir = '../content/media/img/';
		//$up_name = $_POST['old-img'];
		$array = array();

		foreach ($_FILES as $name => $files)
		{
			if ( !is_array( $files['name'] ) )
			{
				$file = $files;
				if ( $file['error'] == UPLOAD_ERR_OK )
				{
					foreach ($file as $key => $value)
					{
						$array[$name][0][$key] = $value;
					}
				}
			}
			else
			{
				foreach ($files as $key => $file)
				{
					foreach ($file as $num => $value)
					{
						$array[$name][$num][$key] = $value;
					}
				}
			}
		}

		/*echo '<pre>';
		print_r( $array );
		echo '</pre>';*/
		$return = false;
		foreach ($array as $name => $files) {
			$num = 0;
			foreach ($files as $col => $file) {
				
				//echo '$name : ' . $name . ' ; ' . '$num : ' . $num . '<br>';

				if ( $file['error'] == UPLOAD_ERR_OK )
				{
					/*echo '<pre>';
					echo $file['name'] . ':<br>';
					print_r( $file );
					echo '</pre>';*/
					$tmp_explode = explode( '.', $file['name'] );

					$up_extension = array_pop($tmp_explode);
					$up_name = md5( time() ) . '_' . time() . '_' . $num;

					if ( in_array( $file['type'] , [ 'image/png','image/jpeg' ]) )
					{
						if ( !file_exists( MEDIA_DIR . 'image/full' ) )
						{
							if ( !file_exists( MEDIA_DIR . 'image' ) )
							{
								mkdir( MEDIA_DIR . 'image' );
							}
							mkdir( MEDIA_DIR . 'image/full' );
						}
						$up_sub_dir = 'image/full/';
					}
					else
					{
						if ( !file_exists( MEDIA_DIR . 'file' ) )
						{
							mkdir( MEDIA_DIR . 'file' );
						}
						$up_sub_dir = 'file/';
					}

					$up_file = MEDIA_DIR . $up_sub_dir . $up_name . '.' . $up_extension;
					$tmp_file = $file['tmp_name'];

					if ( move_uploaded_file( $tmp_file, $up_file ) )
					{
						$return[$name][$col]['name'] = $up_name;
						$return[$name][$col]['extension'] = $up_extension;
						$return[$name][$col]['mime'] = $file['type'];
						//echo "Файл корректен и был успешно загружен.\n";
						if ( in_array( $file['type'] , ['image/png','image/jpeg',/*'image/bmp','image/gif'*/]) )
						{
							foreach ( array( 'min' => 400, 'mid' => 800, 'big' => 1600 ) as $size => $value)
							{
								if ( !file_exists( IMAGE_DIR . $size ) )
								{
									mkdir( IMAGE_DIR . $size );
								}
								$size_file = IMAGE_DIR . $size . '/' . $up_name . '.' . $up_extension;
								//self::imageResize( $size_file, $up_file, $value, $value, 85 );
								self::imageResize( $size_file, $up_file, $value, $file['type'], ( 90 + $value / 160 ) );
							}
							$return[$name][$col]['type'] = 'image';
						}
						else
						{
							$return[$name][$col]['type'] = 'file';
						}
					}
					else
					{
						//echo "Возможная атака с помощью файловой загрузки!\n";
					}

				}
				$num++;
			}
		}
		return $return;
	}





	/*
	 *	Функция изменения размера изображения
	 */
	private static function imageResize($outfile,$infile,$newwh,$type,$quality)
	{
		//var_dump( $type );

		switch ( $type ) {
			case 'image/jpeg':
				$im=imagecreatefromjpeg($infile);
				break;
			
			case 'image/png':
				$im=imagecreatefrompng($infile);
				break;
			
			/*case 'image/bmp':
				$im=imagecreatefrombmp($infile);
				break;
			
			case 'image/gif':
				$im=imagecreatefromgif($infile);
				break;*/
			
			default:
				return false;
				break;
		}

		$oldw = imagesx($im);
		$oldh = imagesy($im);

		if ( $oldh > $newwh || $oldw > $newwh )
		{
			$k1=$newwh/$oldw;
			$k2=$newwh/$oldh;
			$k=$k1>$k2?$k2:$k1;
		}
		else
		{
			$k = 1;
		}

		$w=intval($oldw*$k);
		$h=intval($oldh*$k);

		//echo '<br>newwh=' . $newwh . ' ; oldw=' . $oldw . ' ; oldh=' . $oldh . ' ; k=' . $k . ' ; w=' . $w . ' ; h=' . $h . ' ; ' . '<br>';

		$im1=imagecreatetruecolor($w,$h);

		imageAlphaBlending($im1, false);
		imageSaveAlpha($im1, true);

		imagecopyresampled($im1,$im,0,0,0,0,$w,$h,imagesx($im),imagesy($im));

		switch ( $type ) {
			case 'image/jpeg':
				imagejpeg($im1,$outfile,$quality);
				break;
			
			case 'image/png':
				imagepng($im1,$outfile, ( 9 - round( 9 / 100 * $quality ) ) );
				break;
			
			/*case 'image/bmp':
				imagebmp($im1,$outfile);
				break;
			
			case 'image/gif':
				imagegif($im1,$outfile);
				break;*/
			
			default:
				return false;
				break;
		}
		//imagejpeg($im1,$outfile,$quality);
		imagedestroy($im);
		imagedestroy($im1);
	}

	



	/*
	 *	Функция обработки $_POST
	 */
	public static function post()
	{
		$values = $_POST;
		$table = $values['TABLE'];
		$action = $values['ACTION'];
		if ( isset( $values['ID'] ) ) {
			$id = $values['ID'];
			unset( $values['ID'] );
		}
		unset( $values['TABLE'] );
		unset( $values['ACTION'] );
		unset( $values['submit'] );

		foreach ($values as $key => $value) {
			if ( $value === '' )
			{
				$values[$key] = false;
			}
		}


		if ( isset( $values['properties'] ) )
		{
			$properties = array();

			foreach ($values['properties'] as $key => $value) {
				if ( $value == '' )
				{
					$value = null;
				}
				
				$properties[$key] = $value;
			}
			$values['properties'] = json_encode( $properties, JSON_UNESCAPED_UNICODE );
		}

		if ( isset( $values['filters'] ) )
		{
			$filters = array();

			foreach ($values['filters'] as $key => $value) {
				if ( $value == 'on' )
				{
					array_push($filters, $key);
				}
				else
				{
					if ( (string) $value === (string) (int) $value )
					{
						array_push($filters, $value);
					}
					
				}
			}
			$values['filters'] = implode(',', $filters);

			
		}



		if ( isset( $values['name'] ) )
		{
			$generateName = true;
			if ( $action == 'edit' )
			{
				$realName = Post::get( $id, 'name' );
				if ( $realName === null )
				{
					$values['name'] = false;
					$generateName = false;
				}
			}

			if ( !$values['name'] && $generateName )
			{
					$title = md5( time() );
					if ( isset( $values['title'] )  )
					{
						if ( $values['title'] )
						{
							$title = $values['title'];
						}
					}
					$values['name'] = self::retranslit( $title );

					$repeat = true;
					$num = 0;
					$tmp_name = $values['name'];

					while ($repeat) {
						if ( $action == 'add' )
						{
							$where = ['name', $tmp_name ];
						}
						else
						{
							$where = [ [ 'name', $tmp_name ], [ 'id', '!=', $id ] ];
						}

						$repeat =  Db::db_select( $table, $where );
						if ( $repeat )
						{
							$tmp_name = $values['name'] . '-' . $num;
							$num++;
						}
					}
					$values['name'] = $tmp_name;
			}
		}


		$files = self::files();


		/*echo '<pre>$files = ';
		var_dump( $files );
		echo '</pre>';*/
		//var_dump($table);

		if ( is_array( $files ) )
		{
			foreach ($files as $names) {
				foreach ($names as $col => $vals) {
					//echo $table;
					//echo $col;
					if ( isset( $values[ 'old-' . $col ] ) )
					{
						var_dump( $values[ 'old-' . $col ] );
						continue;
					}
					if ( $table != 'media' )
					{
						Db::db_insert( 'media', $vals );
						$result = Db::db_select( 'media', [ 'name' => $vals['name'] ] );
						$imgId = (int) $result[0]['id'];
						//var_dump($imgId);
						//	Записываем в массив значений id изображения
						$values[$col] = $imgId;
					}
					else
					{
						foreach ($vals as $key => $value) {
							$values[$key] = $value;
						}
					}
				}
			}
		}


		if ( isset( $values['old-img'] ) ) unset( $values['old-img'] );
		if ( isset( $values['old-icon'] ) ) unset( $values['old-icon'] );
		if ( isset( $values['old-video'] ) ) unset( $values['old-video'] );
		if ( isset( $values['old-name'] ) ) unset( $values['old-name'] );


		//var_dump( $values );
		//echo '</pre>';

		foreach ($values as $key => $value) {
			if ( $value )
			{
				if ( is_array( $value ) )
				{
					$values[$key] = json_encode( $value, JSON_UNESCAPED_UNICODE );
				}
			}
		}


		switch ( $action ) {
			case 'add':
				foreach ($values as $key => $value) {
					if ( !$value )
					{
						unset( $values[$key] );
					}
				}
				Db::db_insert( $table, $values );
				$return = true;
				break;
			
			case 'del':
				Db::db_delete( $table, $id );
				$return = true;
				break;
			
			case 'edit':
				Db::db_update( $table, $values, $id );
				$return = true;
				break;
			
			default:
				$return = false;
				break;
		}

		return $return;
	}




	/**
	 *	Функция получения столбцов таблицы
	 */
	public static function input_options( $table, $key, $part )
	{
		$parents = null;
		if ( $key == 'parent' )
		{
			$parents[null]['title'] = 'Не выбрано';
			switch ($part) {
				case 'bikes':
					$hierarchy = Db::db_select( $table, ['parent', 5], null, 'id' );
					if ( $hierarchy )
					{
						foreach ( $hierarchy as $i => $item ) {
							$parents[$i]['title'] = $item['title'];
							$parents[$i]['level'] = 1;
						}
					}
					break;
				
				default:
					$hierarchy = Post::childs(null,0,true);
					if ( $hierarchy )
					{
						foreach ( $hierarchy as $i => $item ) {
							$parents[$i]['title'] = Post::get($i, 'title');
							$parents[$i]['level'] = count(Post::parents($i));
						}
					}
					break;
			}
					
			//var_dump( $parents );
		}
		//echo '<pre>';
		//print_r( $parents );
		//echo $table;
		//var_dump( Db::db_select( $table, ['parent',5], null, 'id' ) );
		//echo '</pre>';


		$filters = null;
		if ( $key == 'filters' )
		{
			$hierarchy = Filter::get();
			if ( $hierarchy )
			{
				foreach ( $hierarchy as $gkey => $group ) {
					if ( !$group['visibility'] ) continue;
					$filters[$gkey] = $group;
				}
			}
		}

		$places = get_posts( 5, false, true, 'id' );
		foreach ( $places as $pkey => $place ) {
			$places[$pkey] = $place['title'];
		}
		//print_r($places);


		/*$bikes = null;
		if ( $key == 'filters' )
		{
			$hierarchy = Filter::get();
			if ( $hierarchy )
			{
				foreach ( $hierarchy as $gkey => $group ) {
					if ( !$group['visibility'] ) continue;
					$bikes[$gkey] = $group;
				}
			}
		}*/



		if ( $part != null )
		{
			mb_internal_encoding("UTF-8");
			$part = mb_substr($part, 0, -1);
		}




		$options = array
		(
			'default'	=>	array
			(
				'id'	=>	array
				(
					'include'	=> false
				),
				'login'	=>	array
				(
					'title'	=>	'Логин'
				),
				'password'	=>	array
				(
					'title'	=>	'Парольку',
					'type'	=>	'password'
				),
				'name'	=>	array
				(
					'include'	=>	true,
					'title'	=>	'Имя страницы в адресной строке (en)'

				),
				'extension'	=>	array
				(
					'include'	=> false
				),
				'firstname'	=>	array
				(
					'title'	=>	'Имя'
				),
				'lastname'	=>	array
				(
					'title'	=>	'Фамилия'
				),
				'title'	=>	array
				(
					'title'	=>	'Заголовок'
				),
				'title_es'	=>	array
				(
					'title'	=>	'Заголовок (es)'
				),
				'title_fr'	=>	array
				(
					'title'	=>	'Заголовок (fr)'
				),
				'title_cz'	=>	array
				(
					'title'	=>	'Заголовок (cz)'
				),
				'title_ru'	=>	array
				(
					'title'	=>	'Заголовок (ru)'
				),
				'type'	=>	array
				(
					'title'	=>	'Тип'
				),
				'parent'	=>	array
				(
					'title'	=>	'Родительская категория',
					'tag'	=>	'select',
					'type'	=>	null,
					'value'	=>	$parents
				),
				'rubrics'	=>	array
				(
					'include'	=>	false
				),
				'table'	=>	array
				(
					'title'	=>	'Соответствующая таблица'
				),
				'filters'	=>	array
				(
					'include'	=> false,
					'title'		=>	'Фильтры',
					'tag'		=>	'array',
					'type'		=>	null,
					'value'		=> $filters
				),
				'sort'	=>	array
				(
					'include'	=> false
				),
				'img'	=>	array
				(
					'title'	=>	'Изображение',
					'include'	=> true
				),
				'icon'	=>	array
				(
					'title'	=>	'Иконка',
					'include'	=> true
				),
				'file'	=>	array
				(
					'title'	=>	'Файл',
					'include'	=> true
				),
				'video'	=>	array
				(
					'title'	=>	'Видео',
					'include'	=> false
				),
				'mime'	=>	array
				(
					'title'	=>	'Mime',
					'include'	=> false
				),
				'properties'	=>	array
				(
					'include'	=> false
				),
				'value'	=>	array
				(
					'title'	=>	'Значение',
					'include'	=> true
				),
				'src'	=>	array
				(
					'include'	=> false
				),
				'youtube'	=>	array
				(
					'title'	=>	'Youtube (ссылка)',
					'include'	=> true
				),
				'content'	=>	array
				(
					'tag'	=>	'textarea',
					'title'	=>	'Содержимое',
					'type'	=>	null
				),
				'content_es'	=>	array
				(
					'tag'	=>	'textarea',
					'title'	=>	'Содержимое (es)',
					'type'	=>	null
				),
				'content_fr'	=>	array
				(
					'tag'	=>	'textarea',
					'title'	=>	'Содержимое (fr)',
					'type'	=>	null
				),
				'content_cz'	=>	array
				(
					'tag'	=>	'textarea',
					'title'	=>	'Содержимое (cz)',
					'type'	=>	null
				),
				'content_ru'	=>	array
				(
					'tag'	=>	'textarea',
					'title'	=>	'Содержимое (ru)',
					'type'	=>	null
				),
				'description'	=>	array
				(
					'title'	=>	'Описание',
					'include'	=> true
				),
				'visibility'	=>	array
				(
					'include'	=> false
				),
				'protection'	=>	array
				(
					'include'	=> false
				),
				'date'	=>	array
				(
					'title'	=>	'Дата',
					'type'	=>	'datetime-local',
					'value'	=>	date ( 'Y-m-d\TH:i:s' )
				),
				'sex'	=>	array
				(
					'title'		=>	'Пол',
					'tag'		=>	'select',
					'type'		=>	null,
					'value'	=>	array
					(
							0	=>	'Женский',
							1	=>	'Мужской'
					)
				),
				'email'	=>	array
				(
					'title'	=>	'Email',
					'type'	=>	'email'
				),
				'birthday'	=>	array
				(
					'title'	=>	'Дата рождения',
					'type'	=>	'date'
				),
				'phone'	=>	array
				(
					'title'	=>	'Телефон',
					'type'	=>	'phone'
				),
				'rank'	=>	array
				(
					'include'	=> false
				),
				'user'	=>	array
				(
					'title'	=>	'Поьзователь ( ID )',
					'type'	=>	'number'
				),
				'session'	=>	array
				(
					'include'	=> false
				),
				'author'	=>	array
				(
					'include'	=> false
				),
				'client'	=>	array
				(
					'include'	=> false
				),
				'ip'	=>	array
				(
					'include'	=> false
				),
				'sender'	=>	array
				(
					'title'	=>	'Ученик ( ID )',
					'include'	=> true
				),
				'recipient'	=>	array
				(
					'title'	=>	'Техника ( ID )',
					'include'	=> true
				),
				'status'	=>	array
				(
					'title'	=>	'Статус',
					'include'	=> true
				),
				'meta'	=>	array
				(
					'title'	=>	'meta',
					'tag'	=>	'properties',
					'value'	=>	array
					(
						'title'	=>	array
						(
							'title'	=>	'title',
							'value'	=>	null
						),
						'desc'	=>	array
						(
							'title'	=>	'description',
							'value'	=>	null
						),
						'keys'	=>	array
						(
							'title'	=>	'keywords',
							'value'	=>	null
						),
					),
				),
			),

			'posts'	=>	array
			(
				'default'	=>	array
				(
					'type'	=>	array
					(
						/*'value'	=>	$part*/

						'title'		=>	'Тип',
						'tag'		=>	'select',
						'type'		=>	null,
						'value'	=>	array
						(
							'post'	=>	array
							(
								'title'	=>	'Запись'
							),
							'page'	=>	array
							(
								'title'	=>	'Страница'
							),
							'list'	=>	array
							(
								'title'	=>	'Список'
							),
							'slide'	=>	array
							(
								'title'	=>	'Слайд'
							),
							'price'	=>	array
							(
								'title'	=>	'Цена'
							)
						)
					),
				),
				'price'	=>	array
				(
					'include'	=> true,
					'type'	=>	array
					(
						/*'value'	=>	$part*/

						'title'		=>	'Тип',
						'include'	=> true,
						'tag'		=>	'select',
						'type'		=>	null,
						'value'	=>	array
						(
							'post'	=>	array
							(
								'title'	=>	'Запись'
							),
							'page'	=>	array
							(
								'title'	=>	'Страница'
							),
							'list'	=>	array
							(
								'title'	=>	'Список'
							),
							'slide'	=>	array
							(
								'title'	=>	'Слайд'
							),
							'price'	=>	array
							(
								'title'	=>	'Цена'
							)
						),
					),

					'properties'	=>	array
					(
						'include'	=> true,
						'title'	=>	'Цены',
						'tag'	=>	'properties',
						'value'	=>	array
						(
							'title'	=>	array
							(
								'title'	=>	'1',
								'value'	=>	null
							),
							'price'	=>	array
							(
								'title'	=>	'Цена',
								'value'	=>	null
							),
							'delivery'	=>	array
							(
								'title'	=>	'Доставка',
								'value'	=>	null
							),
							'optional'	=>	array
							(
								'title'	=>	'Доп',
								'value'	=>	null
							),
							'form'	=>	array
							(
								'title'	=>	'Форма обучения',
								'value'	=>	null
							),
						),
					),
				),

				'place'	=>	array
				(
					'visibility'	=>	array
					(
						'title'	=>	'Видимость',
						'include'	=> true,
						'tag'		=>	'select',
						'type'		=>	null,
						'value'	=>	array
						(
								1	=>	array
								(
									'title'	=>	'Вкл.'
								),
								0	=>	array
								(
									'title'	=>	'Выкл.'
								)
						)
					)
				),
				'teacher'	=>	array
				(
					'type'	=>	array
					(
						'title'		=>	false,
						'tag'		=>	'input',
						'type'		=>	'hidden',
						'value'		=>	'post'
					),
					'parent'	=>	array
					(
						'title'		=>	false,
						'tag'		=>	'input',
						'type'		=>	'hidden',
						'value'		=>	4
					),
					'icon'	=>	array
					(
						'include'	=>	false
					),
					'title'	=>	array
					(
						'title'	=>	'Имя'
					),
					'value'	=>	array
					(
						'include'	=>	false
					),
					'date'	=>	array
					(
						'title'		=>	false,
						'tag'		=>	'input',
						'type'		=>	'hidden',
						'value'		=>	date('Y-m-d H:i:s')
					),

				),
				'article'	=>	array
				(
					'type'	=>	array
					(
						'title'		=>	false,
						'tag'		=>	'input',
						'type'		=>	'hidden',
						'value'		=>	'post'
					),
					'parent'	=>	array
					(
						'title'		=>	false,
						'tag'		=>	'input',
						'type'		=>	'hidden',
						'value'		=>	41
					),
					'icon'	=>	array
					(
						'include'	=>	false
					),
					'title'	=>	array
					(
						'title'	=>	'Заголовок'
					),
					'description'	=>	array
					(
						'include'	=>	false
					),
					'value'	=>	array
					(
						'include'	=>	false
					),
					'content'	=>	array
					(
						'title'	=>	'Содержимое'
					),
					'date'	=>	array
					(
						'title'		=>	false,
						'tag'		=>	'input',
						'type'		=>	'hidden',
						'value'		=>	date('Y-m-d H:i:s')
					),
				),
				'prices'	=>	array
				(
					'type'	=>	array
					(
						/*'value'	=>	$part*/

						'title'		=>	'Тип',
						'tag'		=>	'select',
						'type'		=>	null,
						'value'	=>	array
						(
							'post'	=>	array
							(
								'title'	=>	'Запись'
							),
							'page'	=>	array
							(
								'title'	=>	'Страница'
							),
							'list'	=>	array
							(
								'title'	=>	'Список'
							),
							'slide'	=>	array
							(
								'title'	=>	'Слайд'
							),
							'price'	=>	array
							(
								'title'	=>	'Цена22'
							)
						),
					),

					'properties'	=>	array
					(
						'include'	=> true,
						'title'	=>	'Цены',
						'tag'	=>	'properties',
						'value'	=>	array
						(
							'title'	=>	array
							(
								'title'	=>	'1',
								'value'	=>	null
							),
							'price'	=>	array
							(
								'title'	=>	'Цена',
								'value'	=>	null
							),
							'delivery'	=>	array
							(
								'title'	=>	'Доставка',
								'value'	=>	null
							),
							'optional'	=>	array
							(
								'title'	=>	'Доп',
								'value'	=>	null
							),
							'form'	=>	array
							(
								'title'	=>	'Форма обучения',
								'value'	=>	null
							),
						),
					),
				),
			),


			'media'	=>	array
			(
				'default'	=>	array
				(
					'parent'	=>	array
					(
						'include'	=>	true,
					),
					'name'	=>	array
					(
						'include'	=>	true,
						'title'	=>	'Файл'
					),
					'type'	=>	array
					(
						'include'	=>	false,
						'title'		=>	'Тип',
						'tag'		=>	'select',
						'type'		=>	null,
						'value'	=>	array
						(
								'image'	=>	'Изображение',
								'file'	=>	'Файл'
						)
					)
				)
			),

			'actions'	=>	array
			(
				'default'	=>	array
				(
					'name'	=>	array
					(
						'include'	=>	false
					),
					'type'	=>	array
					(
						'title'		=>	false,
						'include'	=>	true,
						'tag'		=>	'input',
						'type'		=>	'hidden',
						'value'		=>	'lesson'
					),
					'value'	=>	array
					(
						'include'	=>	false,
					),
					'status'	=>	array
					(
						'include'	=>	true,
						'title'		=>	'Статус',
						'tag'		=>	'select',
						'type'		=>	null,
						'value'	=>	array
						(
								0	=>	['title' => 'Новое'],
								1	=>	['title' => 'Подтверждено']
						)
					),
					'date'	=>	array
					(
						'title'	=>	'Дата',
						'type'	=>	'datetime-local',
						'value'	=>	false
					),
					'properties'	=>	array
					(
						'include'	=>	true,
						'title'		=>	'Свойства',
						'tag'		=>	'array',
						'type'		=>	null,
						'value'		=>	array
						(
							'place'	=>	array
							(
								'title'	=>	'Площадка',
								'list'	=>	$places
							),
						)
					)
				)
			),

			'users'	=>	array
			(
				'default'	=>	array
				(
					'login'	=>	array
					(
						'include'	=>	false,
					),
					'password'	=>	array
					(
						'include'	=>	false,
					),
					'name'	=>	array
					(
						'title'		=>	'ФИО',
						'include'	=>	true,
						'tag'		=>	'input',
						'type'		=>	'text',
					),
					'img'	=>	array
					(
						'title'		=>	'Аватар',
					),
					'email'	=>	array
					(
						'include'	=>	false,
					),
					'firstname'	=>	array
					(
						'include'	=>	false,
					),
					'lastname'	=>	array
					(
						'include'	=>	false,
					),
					'sex'	=>	array
					(
						'include'	=>	false,
					),
					'date'	=>	array
					(
						'title'		=>	false,
						'include'	=>	true,
						'tag'		=>	'input',
						'type'		=>	'hidden',
						'value'		=>	date('Y-m-d H-i')

					),
					'birthday'	=>	array
					(
						'include'	=>	false,
					),
					'address'	=>	array
					(
						'include'	=>	false,
					),
					'entity'	=>	array
					(
						'include'	=>	false,
					),
					'value'	=>	array
					(
						'include'	=>	false,
					),
					'description'	=>	array
					(
						'include'	=>	false,
					),

				)
			)
		);



		$return = array
		(
			'include'	=> true,
			'title'	=> null,
			'tag'	=> 'input',
			'type'	=> 'text',
			'value'	=> null
		);

		foreach ($return as $k => $value) {
			if ( isset( $options['default'][$key][$k] ) )
			{
				$return[$k] = $options['default'][$key][$k];
			}

			if ( isset( $options[$table]['default'][$key][$k] ) )
			{
				$return[$k] = $options[$table]['default'][$key][$k];
			}

			//echo $table.' '.$part.' '.$key.' '.$k.'<br>';
			if ( isset( $options[$table][$part][$key][$k] ) )
			{
				//var_dump( 'bikes' );
				$return[$k] = $options[$table][$part][$key][$k];
			}
		}
		//echo $key;
		//var_dump( $return );
		return $return;
	}












	public static function retranslit($word) {
		$word = mb_strtolower($word, 'UTF-8');

		$word = str_replace('(', '', $word);
		$word = str_replace(')', '', $word);
		$word = str_replace('[', '', $word);
		$word = str_replace(']', '', $word);
		$word = str_replace('{', '', $word);
		$word = str_replace('}', '', $word);
		$word = str_replace('!', '', $word);
		$word = str_replace('@', '', $word);
		$word = str_replace('#', '', $word);
		$word = str_replace('$', '', $word);
		$word = str_replace('%', '', $word);
		$word = str_replace('^', '', $word);
		$word = str_replace('&', '', $word);
		$word = str_replace('*', '', $word);
		$word = str_replace('?', '', $word);
		$word = str_replace('/', '', $word);
		$word = str_replace('\\', '', $word);
		$word = str_replace('\'', '', $word);
		$word = str_replace('\"', '', $word);
		$word = str_replace('"', '', $word);
		$word = str_replace('....', '.', $word);
		$word = str_replace('...', '.', $word);
		$word = str_replace('..', '.', $word);
		$word = str_replace('.', '-', $word);
		$word = str_replace(',,,,', ',', $word);
		$word = str_replace(',,,', ',', $word);
		$word = str_replace(',,', ',', $word);
		$word = str_replace(',', '-', $word);
		$word = str_replace('    ', ' ', $word);
		$word = str_replace('   ', ' ', $word);
		$word = str_replace('  ', ' ', $word);
		$word = str_replace(' ', '-', $word);
		$word = str_replace('----', '-', $word);
		$word = str_replace('---', '-', $word);
		$word = str_replace('--', '-', $word);
		$word = str_replace('ий', 'ij', $word);
		$word = str_replace('ай', 'aj', $word);
		$word = str_replace('уй', 'aj', $word);
		$word = str_replace('ой', 'aj', $word);
		$word = str_replace('юй', 'aj', $word);
		$word = str_replace('ый', 'aj', $word);
		$word = str_replace('эй', 'aj', $word);
		$word = str_replace('ей', 'aj', $word);

		$word = str_replace('а', 'a', $word);
		$word = str_replace('б', 'b', $word);
		$word = str_replace('в', 'v', $word);
		$word = str_replace('г', 'g', $word);
		$word = str_replace('д', 'd', $word);
		$word = str_replace('е', 'e', $word);
		$word = str_replace('ё', 'e', $word);
		$word = str_replace('ж', 'zh', $word);
		$word = str_replace('з', 'z', $word);
		$word = str_replace('и', 'i', $word);
		$word = str_replace('й', 'j', $word);
		$word = str_replace('к', 'k', $word);
		$word = str_replace('л', 'l', $word);
		$word = str_replace('м', 'm', $word);
		$word = str_replace('н', 'n', $word);
		$word = str_replace('о', 'o', $word);
		$word = str_replace('п', 'p', $word);
		$word = str_replace('р', 'r', $word);
		$word = str_replace('с', 's', $word);
		$word = str_replace('т', 't', $word);
		$word = str_replace('у', 'u', $word);
		$word = str_replace('ф', 'f', $word);
		$word = str_replace('х', 'h', $word);
		$word = str_replace('ц', 'z', $word);
		$word = str_replace('ч', 'ch', $word);
		$word = str_replace('ш', 'sh', $word);
		$word = str_replace('щ', 'sh', $word);
		$word = str_replace('ъ', '', $word);
		$word = str_replace('ы', 'i', $word);
		$word = str_replace('ь', '', $word);
		$word = str_replace('э', 'e', $word);
		$word = str_replace('ю', 'ju', $word);
		$word = str_replace('я', 'ja', $word);
		$word = str_replace('ĭ', 'j', $word);

		$word = substr( $word, 0, 16);
		$word = trim($word, "-");

		return $word;
	}
















	/*
	 *	Функция получения html кода формы
	 *
	 *	table		-	Имя таблицы в БД
	 *	$action		-	add / edit / del
	 *	$script		-	путь обработчика запроса post
	 *	$enctype	-	true / false
	 *	$id			-	id записи в таблице БД
	 */
	public static function get_old( $table, $action, $script, $enctype = null, $id = null )
	{
		if ( $id !== null )
		{
			$result = Db::db_select( $table, $id );
			if ( $result ) $item = $result[0];
			if ( $result ) print_r( $item['type'] );
		}
		if ( $enctype == null )
		{
			$enctype = true;
		}
		echo '<form action="' . $script . '" method="post"' . ( $enctype ? ' enctype="multipart/form-data"' : null ) . '>';
		echo '<input type="hidden" name="TABLE" value="' . $table . '">';
		echo '<input type="hidden" name="ACTION" value="' . $action . '">';
		if ( $action == 'add' || ( $action == 'edit' && isset($item) ) )
		{
			foreach ( Db::db_show( $table ) as $key => $value) {

				if ( $key == 'id' && isset( $item ) )
				{
					echo '<input type="hidden" name="ID" value="' . $item[$key] . '">';
					continue;
				}

				echo '<div>';
				$options = Db::get_tables_options($key, $table );
				if ( $options['type'] != 'hidden' )
				{
					echo '<p class="b">' . $options['title'] . '</p>';
				}

				switch ( $options['type'] ) {
					case 'select':
						echo '<select name="' . $key . '">';
							foreach ($options['values'] as $i => $title) {
								echo '<option value="' . $i . '">' . $title . '</option>';
							}
							//$categories = Category::getHierarchy(null,0,true);
							$categories = Post::childs(null,0,true);
						echo '</select>';
						break;

					case 'json':
						if ( isset( $item ) )
						{
							$json = (array) json_decode( $item[$key] );
							if ( is_array($json) )
							{
								echo '<ul>';
									foreach ($json as $i => $v)
									{
										echo '<li>';
											echo '<p>' . $i . '</p>';
											echo '<p>' . ' <input type="text" name="' . $key . '-' . $i . '" value="' . $v . '">' . '</p>';
										echo '</li>';
									}
								echo '</ul>';
							}
						}
						break;

					case 'file':
						if ( isset( $item ) )
						{
							echo '<p>' . '<img width="200px" src="' . Media::getUri( $item[$key] ) . '">' . '</p>';
						}

						echo '<div>';
							echo '<p>';
								echo '<input type="radio" name="img-type" value="-1" checked>';
								echo 'Оставить без изменений';
							echo '</p>';
						echo '</div>';
						/*echo '<div>';
							echo '<p>';
								echo '<input type="radio" name="img-type" value="0" >';
								echo 'Выбрать из галереи';
							echo '</p>';
						echo '</div>';*/
						echo '<div>';
							echo '<p>';
								echo '<input type="radio" name="img-type" value="1" >';
								echo 'Загрузить с компьютера';
							echo '</p>';
							echo '<input type="file" name="img-new" >';
						echo '</div>';
						break;
					
					default:
						var_dump($item[$key]);
						echo '<input';
						echo ' type="' . $options['type'] . '" name="' . $key . '"';
						echo ' placeholder="' . $key . '"';
						if ( isset($item) )
						{
							echo ' value="' . str_ireplace( '"', '&quot;', $item[$key]) . '"';
						}
						else
						{
							echo ( isset($options['value']) ? ' value="' . $options['value'] . '"' : null );
						}
						echo ( mb_strtolower( $value['Null'] ) == 'no' ? ' required' : null);
						echo '>';
						break;
				}
				/*switch ($key) {
					case 'id':
						if ( isset($item) )
						{
							echo '<input type="hidden" name="ID" value="' . $item[$key] . '">';
						}
						break;

					case 'parent':
						//print_r($options);
						echo '<select name="' . $key . '">';
						echo '<option value> --- </option>';
						$categories = Category::getHierarchy(null,0,true);
						if ( $categories )
						{
							//var_dump($categories);

							foreach ($categories as $i => $bool)
							{
								echo '<option value="' . $i . '"';
								if ( isset($item) )
								{
									echo ( $item[$key] == $i ? ' selected' : null );
								}
								echo '>' . Category::getInfo($i)['title'] . '</option>';
							}
						}
						echo '</select>';
						break;
					
					default:
						echo '<input';
						echo ' type="text" name="' . $key . '"';
						echo ' placeholder="' . $key . '"' . ( isset($item) ? ' value="' . $item[$key] . '"' : null );
						echo ( mb_strtolower( $value['Null'] ) == 'no' ? ' required' : null);
						echo '>';
						break;
				}*/
				echo '</div>';

				/*if ( $key != 'id' )
				{
					if ( $key == 'parent' )
					{
					}
					echo '<div>';
					echo '<input type="text" name="' . $key . '"';
					echo ' placeholder="' . $key . '"' . ( isset($item) ? ' value="' . $item[$key] . '"' : null ) . '>';
					echo '</div>';
				}
				else
				{
					if ( isset($item) )
					{
						echo '<input type="hidden" name="ID" value="' . $item[$key] . '">';
					}
				}*/
			}
			echo '<input type="submit" name="submit" value="Сохранить">';
		}
		if ( $action == 'del' && isset( $item ) )
		{
			echo '<input type="hidden" name="ID" value="' . $item['id'] . '">';
			echo '<input type="submit" name="submit" value="Удалить">';
		}
		echo '</form>';
		//print_r( Db::db_show( $name ) );
	}

	



	/*
	 *	Функция обработки Post
	 */
	public static function old_post()
	{
		$table = $_POST['TABLE'];
		$action = $_POST['ACTION'];
		if ( isset( $_POST['ID'] ) ) {
			$id = $_POST['ID'];
			unset( $_POST['ID'] );
		}
		unset( $_POST['TABLE'] );
		unset( $_POST['ACTION'] );
		unset( $_POST['submit'] );

		foreach ($_POST as $key => $value) {
			if ( $value === '' )
			{
				$_POST[$key] = null;
			}
		}


		//echo 'Функция post класса form временно замороженна';
		//echo '<pre>';
		//print_r( $_POST );

		$data = $_POST;

		foreach ($data as $key => $item) {
			$exp = ( explode('-', $key) );

			if ( count( $exp ) > 1 )
			{
				print_r($exp);
				$data[ $exp[0] ][ $exp[1] ] = $item;
				unset( $data[$key] );
			}

		}
		//print_r( $data );
		if ( isset( $data['img'] ) )
		{
			if ( $data['img']['type'] == 1 )
			{
				//print_r( $_FILES );

				$up_dir = IMAGE_DIR;
				echo $up_dir;

				$Successfull = false;
				if ( !is_array($_FILES['img-new']['name']) )
				{
					if ($_FILES['img-new']["error"] == UPLOAD_ERR_OK)
					{

						$name = explode('.', $_FILES['img-new']['name']);
						$up_type = array_pop($name);
						$name = implode('.', $name);
						$up_name = 'i' . time();
						$up_file = $up_dir. $up_name . '_full.'.$up_type;
						$tmp_name = $_FILES['img-new']["tmp_name"];
						if (move_uploaded_file($tmp_name, $up_file)) {
							echo "Файл корректен и был успешно загружен.\n";
							$Successfull = true;
						} else {
							echo "Возможная атака с помощью файловой загрузки!\n";
						}
					}
				}

				if ( $Successfull )
				{
					//var_dump(  $up_name );
					Db::db_insert( 'media', ['type'=>'image','name'=>$up_name, 'extension'=>$up_type] );
					//var_dump( Media::get( $up_name ) );
					$image = Media::get( $up_name );

					$data['img'] = $image['id'];

					self::imageResize( IMAGE_DIR . $up_name . '_min.' . $up_type, $up_file, 300, 300, 100);
					self::imageResize( IMAGE_DIR . $up_name . '_mid.' . $up_type, $up_file, 600, 600, 100);
					self::imageResize( IMAGE_DIR . $up_name . '_big.' . $up_type, $up_file, 900, 900, 100);
				}

			}



			if ( is_array( $data['img'] ) )
			{
				unset( $data['img'] );
			}
		}


		/*print_r( $data );
		print_r( $table );
		print_r( $data );
		print_r( $id );*/
		switch ($action) {
			case 'add':
				$return = Db::db_insert( $table, $data );
				break;
			case 'edit':
				$return = Db::db_update( $table, $data, $id );
				break;
			case 'del':
				$return = Db::db_delete( $table, $id );
				break;
			default:
				$return = false;
				break;
		}

		return $return;
		
		//echo '</pre>';
		/*
		$table = $_POST['TABLE'];
		$action = $_POST['ACTION'];
		if ( isset( $_POST['ID'] ) ) {
			$id = $_POST['ID'];
			unset( $_POST['ID'] );
		}
		unset( $_POST['TABLE'] );
		unset( $_POST['ACTION'] );
		unset( $_POST['submit'] );

		foreach ($_POST as $key => $value) {
			if ( $value === '' )
			{
				$_POST[$key] = null;
			}
		}

		switch ($action) {
			case 'add':
				$return = Db::db_insert( $table, $_POST );
				break;
			case 'edit':
				$return = Db::db_update( $table, $_POST, $id );
				break;
			case 'del':
				$return = Db::db_delete( $table, $id );
				break;
			default:
				$return = false;
				break;
		}

		return $return;
		*/
	}





	/*
	 *	Функция получения html кода формы
	 *
	 *	[action, method, [], enctype="multipart/form-data"]
	 */
	/*public static function get($action = null, $method = 'post', $arr, $enctype = 'multipart/form-data')
	{
		echo '<form';
		if ( $action !== null )
		{
			echo ' action="' . $action . '"';
		}
		echo ' method="' . $method . '"';
		echo ' enctype="' . $enctype . '"';
		echo '>';

			foreach ($arr as $key => $item) {
				$teg = $item['teg'];
				unset( $item['teg'] );
				if ( isset( $item['text'] ) )
				{
					$text = $item['text'];
					unset( $item['text'] );
				}
				else
				{
					$text = null;
				}

				echo '<p>';
				echo '<' . $teg . ' ';
				foreach ($item as $prop => $value) {
					echo ' ' . $prop . ( $value !== null ? '="' . $value . '"' : null );
				}
				echo '>';
				echo $text;
				echo '</' . $teg . '>';
				echo '</p>';
			}

		echo '</form>';
	}*/
}