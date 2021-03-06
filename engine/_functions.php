<?php




/**
 *	-
 */
function siteinfo($option, $column=null)
{
	return Site::getOptions($option, $column);
}




/**
 *	-
 */
function pageinfo($option = null)
{
	return Page::getInfo($option);
}




/**
 *	-
 */
function get_sitename()
{
	return Site::getOptions('sitename');
}




/**
 *	-
 */
function get_title()
{
	return Page::getInfo('title');
}




/**
 *	-
 */
function get_name()
{
	return Page::getInfo('name');
}




/**
 *	Функция получения Типа: Страницы/Записи/Категории
 */
function get_type()
{
	return Page::getInfo('type');
}




/**
 *	Функция получения контента Страницы/Записи
 */
function get_content()
{
	return Page::getContent();
}




/**
 *	-
 */
function block( $name )
{
	$path = get_template_dir() . 'block/' . $name . '.php';
	if ( file_exists( $path ) )
	{
		require $path;
	}
	return $path;
}




/**
 *	-
 */
function pop_up( $name )
{
	$path = get_template_dir() . 'pop-up/' . $name . '.php';
	if ( file_exists( $path ) )
	{
		require $path;
	}
	return $path;
}




/**
 *	-
 */
function get_template_uri()
{
	$path = '/' . TEMPLATES_URI . siteinfo('template') . '/';
	return $path;
}




/**
 *	-
 */
function get_template_dir()
{
	$path = TEMPLATES_DIR . siteinfo('template') . '/';
	return $path;
}




/*
 *	Функция Получения списка постов категории
 *
 *	Принимает 
 *		id (или name) категории
 *		глубина включаемых в себя подкатегорий
 *			- true		-	включает без ограничений
 *			- false		-	не включает
 *			- [число]	-	значение глубины включаемых подкатегорий
 *		флаг объединения в одномерный массив (без разделения на подкатегории)
 *
 *	Возвращает 
 *		массив (одномерный или двумерный) списка постов категории
 *
 */
function get_posts($parent=null,$inc=false,$one=false)
{
	return Post::getList( $parent, $inc, $one );
}




/*
 *	Функция Получения свойств записи по ее id или name
 *
 *	Принимает 
 *		id/name категории
 *		указанное свойство	-	[необязательно]
 *
 *	Возвращает 
 *		1 аргумент	-	массив свойств
 *		2 аргумента	-	одно свойство
 *
 */
function get_post($id, $property = null)
{
	return Post::get( $id, $property );
}




/**
 *	Функция получения родительских элементов
 */
function get_parents($id=null, $reverce = false, $im = false)
{
	//if ( $id == null ) $id = pageinfo('id');
	$return = Post::parents($id, $reverce, $im);
	return $return;
}




/**
 *	Функция получения дочерних элементов
 */
function get_childs( $id, $depth = false, $inc = false )
{
	$return = Post::childs($id, $depth, $inc);
	return $return;
}




/**
 *	Функция получения дочерних элементов
 */
function get_uri( $id )
{
	$return = Post::getUri($id);
	return $return;
}




/**
 *	Функция получения дочерних элементов
 */
function get_media( $idname, $property = null )
{
	$return = Media::get( $idname, $property );
	return $return;
}




/**
 *	Функция получения дочерних элементов
 */
function get_media_uri( $id, $size = null )
{
	$return = Media::getUri( $id, $size );
	return $return;
}




/**
 *	Функция получения дочерних элементов
 */
function get_gallery( $parent, $size = null )
{
	$return = Media::getGallery( $parent, $size );
	return $return;
}




/**
 *	Функция получения фильтров
 */
function get_filters( $parent )
{
	//	Получаем массив элементов меню
	$filters = Filter::get( $parent );

	return $filters;
}




/**
 *	Функция получения меню
 */
function get_user( $id = null )
{
	//	Получаем массив элементов меню
	$user = User::get($id);

	return $user;
}




/**
 *	Функция получения пользователя
 */
function get_menu( $name = null )
{
	//	Получаем массив элементов меню
	$menu = Menu::get($name);

	return $menu;
}




/**
 *	Функция получения меню
 */
function print_menu( $name, $classes = null, $img = false, $icon = false )
{
	//	Получаем массив элементов меню
	$menu = Menu::get($name);
	//	Пишем начало списка <ul> с id = $name
	echo '<ul id="' . $name . '" class="menu ';
	if ( $classes != null )
	{
		if ( is_array( $classes ) )
		{
			echo implode(' ', $classes);
		}
		else
		{
			echo $classes;
		}
	}
	echo '">';
	//	Перебираем весь список меню
	foreach ($menu as $key => $value) {
		//	Если ссылка не заказная
		if ( $value['type'] != 'custom' )
		{
			//	Записываем ссылку

			//	Корень сайта
			$link = '/';

			//	Получаем родительские категории указанного элемента меню
			$categories = get_parents($value['value'], $value['type']);
			//	Если родительские категории получены
			if ( $categories )
			{
				//	Преобразуем массив родительских категорий в строку
				$categories = implode('/', $categories) . '/';
			}

			//	Получаем информацию об указанном элементе меню
			$result = Db::db_select( $value['type'], $value['value'] );

			//	Если элемент существует
			if ( $result )
			{
				$result = $result[0];

				//	Добавляем к ссылке
				$link .= $categories;
				$link .= $result['name'];
			}
		}
		//	Если ссылка заказная
		else
		{
			//	Записываем значение ссылки
			$link = $value['value'];
		}

		//	Выводим пункт меню
		echo '<li>';
			echo '<a href="' . $link . '">';
				if ( $img )
				{
					$src = Media::get( $value['img'], 'src' );
					echo '<div class="img"' . ( $src ? ' style="background-image: url(' . $src . ')"' : null ) . '>';

					if ( $icon )
					{
						$src = Media::get( $value['icon'], 'src' );
						echo '<div class="icon"' . ( $src ? ' style="background-image: url(' . $src . ')"' : null ) . '>';
						echo '</div>';
					}

					echo '</div>';
				}
				echo '<span>' . $value['title'] . '</span>';
			echo '</a>';
		echo '</li>';
		
	}
	//	Заканчиваем список
	echo '</ul>';
}




/**
 *	Функция получения css и js
 */
function get_links($top = false)
{
	$links = Site::getLInks($top);
	//print_r($links);
	if ( $top )
	{
	}

	if ( isset($links['styles']) )
	{
		foreach ($links['styles'] as $key => $value) {
			echo '<link href="' . $value . '" rel="stylesheet" type="text/css">';
		}
	}

	if ( isset( $links['scripts']['jquery'] ) && $top )
	{
		$jquery = $links['scripts']['jquery'];
		unset( $links['scripts']['jquery'] );
		if ( $jquery )
		{
			echo '<script type="text/javascript" src="' . JQUERY . '"></script>';
		}
	}

	if ( isset($links['scripts']) )
	{
		foreach ($links['scripts'] as $key => $value) {
			echo '<script type="text/javascript" src="' . $value . '"></script>';
		}
	}
		
}




/**
 *	Функция добавления js
 *	имя, файл, версия, в header, jquery
 */
function add_script($name, $src, $ver, $top=false, $jquery=false)
{
	Site::setScript($name, $src, $ver, $top, $jquery);
}




/**
 *	Функция добавления css
 *	имя, файл, версия, в header
 */
function add_style($name, $src, $ver, $top=false)
{
	Site::setStyle($name, $src, $ver, $top);
}


function pr(/* $arg */)
{
	// массив переданных аргументов
	$args = func_get_args();

	echo '<pre style="
			width:calc(100% - 2em);
			padding: 1em;
			overflow:auto;
			background-color: #f1f1f1;
			color: #656565;
		">';

	foreach ($args as $key => $arg)
	{
		$arg = tags_to_code($arg);

		if( $key != 0 )
		{
			if( ( is_array($arg) || is_object($arg) ) )
			{
				echo "\r\n";
			}
			else
			{
				echo " ";
			}
		}

		if ( empty($arg) )
		{
			var_dump( $arg );
		}
		else
		{
			print_r( $arg );
		}
	}

	echo '</pre>';
}


/*
 *	Функция экранирования тэгов
 */
function tags_to_code($string)
{
	$string = json($string,true);

	$string = str_replace('<', '&lt;', $string);
	$string = str_replace('>', '&gt;', $string);

	$string = json($string,false);

	return $string;
}


/*
 *	Функция проверки является ли строкой JSON
 */
function is_json($string){
   return is_string($string) && is_array(json_decode($string, true)) ? true : false;
}


/*
 *	Превращает JSON строку в массив и наоборот
 *	При ошибке отдает false
 */
function json( $json, $polus=null )
{
	$is_json = is_json( $json );

	if ( ( $polus === true && $is_json ) || ( $polus === false && !$is_json ) )
	{
		return $json;
	}
	else
	{
		if ( $is_json )
		{
			return json_decode( $json, true );
		}
		else
		{
			return json_encode( $json, JSON_UNESCAPED_UNICODE );
		}
	}
}

