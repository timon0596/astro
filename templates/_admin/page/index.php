<h2>Добро пожаловать в Админ-Панель!</h2>

<?php

/*
<(/)?([\w]+)\:([\w]+)>
*//*
<$1$2___$3>
*/

/*
><!\[CDATA\[
*//*
>
*/

/*
\]\]></
*//*
</
*/

/*
([A-z0-9_\-\.]+=[A-z0-9_\-\.]+)&([A-z0-9_\-\.]+=[A-z0-9_\-\.]+)
*//*
$1&amp;$2
*/

/*
<(/)?(iframe|ul|li)( [^>]+)?>
*//*
&lt;$1$2$3&gt;
*/

/*
&nbsp;
*//*
 
*/

/*
</?code>
*//*

*/

/*
<!--more-->(
)*
*//*

*/

/*
\[/?embed\]
*//*

*/

//echo "&lt;";
//echo "&gt;";


?>

<!-- <form method="POST" enctype="multipart/form-data">
	<input type="file" name="file">
	<button type="submit">OK</button>
</form> -->

<!-- <pre>

<?php

$categories = [];
$rubrics = Db::db_select('rubrics');
foreach ($rubrics as $key => $rubric)
{
	$categories[ abs($rubric['id']) ] = $rubric['title'];
}
//print_r($categories);

if( isset($_FILES['file']['tmp_name']) ) :

$obj = simplexml_load_file($_FILES['file']['tmp_name']);
$json = json_encode($obj, JSON_UNESCAPED_UNICODE);
$jsonArr = json_decode($json, true);

/*$file = 'wordpress.2019-02-27-news.xml';
$file = 'wordpress.2019-03-04-before-aug17-tmp.xml';
$obj = simplexml_load_file($file);
$json = json_encode($obj, JSON_UNESCAPED_UNICODE);
$jsonArr = json_decode($json, true);*/


// print_r($obj);
//print_r($jsonArr['channel']['item']);

$result = [];
foreach ($jsonArr['channel']['item'] as $item)
{
	//print_r($item);
	/**/
	$tmp['type'] = 'post';
	$tmp['parent'] = 2;
	$tmp['title'] = str_replace("'", "\\'", ( !empty($item['title']) && !is_array($item['title']) ? $item['title'] : 'title' ) );
	$tmp['name'] = md5($tmp['title'] . count($result) . $item['pubDate']);
	$tmp['content'] = str_replace("'", "\\'", $item['content___encoded']);
	if (empty($tmp['content'])) $tmp['content'] = null ;

	$tmp_categories = !is_array($item['category']) ? [$item['category']] : $item['category'];
	$tmp_cats = [];
	foreach ($tmp_categories as $tmp_category)
	{
		if( !in_array($tmp_category,$categories) )
		{
			$categories[ count($categories) + 1 ] = $tmp_category;
		}

		$tmp_cats[] = array_search($tmp_category, $categories);
	}
	$tmp['rubrics'] = implode(',', $tmp_cats);

	$tmp['date'] = date('Y-m-d H:i:s', strtotime($item['pubDate']));
	/**/
	
	//$tmp['properties'] = json_encode($item,JSON_UNESCAPED_UNICODE);

	$result[] = $tmp;
}

print_r($categories);
// foreach ($categories as $key => $cat)
// {
// 	Db::db_insert( 'rubrics', ['name'=>'rub_'.$key,'title'=>$cat] );
// }
//print_r($result);
foreach ($result as $key => $item)
{
	//var_dump($key);
	$isset_item = Db::db_select( 'posts', ['name' => $item['name']] );
	if ( !$isset_item )
		Db::db_insert( 'posts', $item );
}

endif;
?>
</pre> -->