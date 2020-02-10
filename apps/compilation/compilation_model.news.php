<?php

/**
* 
*/
class Compilation_Model
{
	private static
		$limit	=	3;



	private static function limit()
	{
		//	LIMIT
		if ( isset($_GET['limit']) && (int) $_GET['limit'] > 0 )
		{
			$limit = (int) $_GET['limit'];
		}
		else
		{
			$limit = self::$limit;
		}

		//	OFFSET
		if ( isset($_GET['p']) && (int) $_GET['p'] > 1 )
		{
			$page = (int) $_GET['p'];
		}
		else
		{
			$page = 1;
		}

		$offset = ($page - 1) * $limit;

		$result = "$offset, $limit";
		
		return $result;
	}




	public static function getList()
	{
		//$limit = self::limit();

		//$query = "SELECT * FROM `posts` WHERE `type`='post' LIMIT $limit";

		$parentId = get_post('news', 'id');
		$query = "SELECT * FROM `posts` WHERE `type`='post' && `parent`=$parentId ORDER BY `date` DESC";
		$list = Db::db_query($query);

		//print_r($list);

		return $list;
	}




	public static function jsonAll()
	{
		$list = self::getList();

		//	
		$rubrics = Rubrics::get_list();

		//
		foreach ($list as $key => $item)
		{
			$itemRubs = '';
			$tmpRubrics = explode(',', $item['rubrics']);
			$r = 1;
			foreach ($tmpRubrics as $rkey)
			{
				if ( isset($rubrics[$rkey]) )
				{
					//$rub[$r] = $rubrics[$rkey]['title'];
					$itemRubs .= '<div class="rubric">'.$rubrics[$rkey]['title'].'</div>';
				}
				$r++;
				if ($r>2) break;
			}

			$tmp = array
			(
				'id'		=>	$item['id'],
				'uri'		=>	get_uri($item['id']),
				'img_big'	=>	get_media_uri($item['img'], 'big'),
				'title'		=>	$item['title'],
				'date'		=>	date( 'd.m.Y', strtotime($item['date']) ),
				'rubrics'	=>	$itemRubs,
				//'rubric_1'	=>	@$rub[1],
				//'rubric_2'	=>	@$rub[2],
			);

			$list[$key] = $tmp;
		}
		
		return json_encode( [ 'list'=>$list, 'item'=>self::htmlItem() ], JSON_UNESCAPED_UNICODE );
	}




	private static function htmlItem()
	{
		ob_start();
		?>
			<div id="%%id%%" class="news__item shadow-0 bdr-0 over-h">
				<div class="d-g h-100p gg-1 padd bg-w">
					<div class="news__date b">%%title%%</div>
					<div class="news__content">%%content%%</div>
					<div class="news__date c-g">%%date%%</div>
				</div>
			</div>
		<?php
		$result = ob_get_clean();

		return $result;
	}





	public static function more()
	{
		$startNum = isset($_GET['start']) && !empty($_GET['start']) ? $_GET['start'] : 4;
		$loadCount = isset($_GET['count']) && !empty($_GET['count']) ? $_GET['count'] : 4;
		$endNum = $startNum + $loadCount;

		$list = self::getList();
		usort($list, function ($a,$b) {
			if ($a['date'] == $b['date']) return 0;
			return $a['date'] < $b['date'] ? 1 : -1;
		});
		$load = [];

		for ($i = $startNum; $i < $endNum; $i++)
		{
			if (isset($list[$i]))
			{
				$minContent = mb_strimwidth( $list[$i]['content'], 0, 100, '...');
				$list[$i]['minContent'] = $minContent;
				$list[$i]['date'] = date('d.m.Y', strtotime($list[$i]['date']));
				array_push($load, $list[$i]);
			}
		}

		$more = count($list) < $endNum ? false : true;

		$return = json_encode( array( 'list' => $load, 'item' => self::htmlItem(), 'more' => $more ), JSON_UNESCAPED_UNICODE );

		return $return;
	}



	public static function item()
	{
		if ( isset($_GET['id']) )
		{
			$item = get_post( (int) $_GET['id'] );

			$img = $item['img'];
			$item['img'] = [];
			$item['img']['full'] = get_media_uri($img,'full');
			$item['img']['big'] = get_media_uri($img,'big');
			$item['img']['mid'] = get_media_uri($img,'mid');
			$item['img']['min'] = get_media_uri($img,'min');

			$item['date'] = date('d.m.Y', strtotime($item['date']));

			$return = json_encode( $item, JSON_UNESCAPED_UNICODE );

			return $return;
		}
	}






	public static function getArr()
	{
		$result = self::getList();

		/*echo '<pre>';
		var_dump( $result );
		echo '</pre>';*/

		$tmp = $result;

		/*foreach ($tmp as $key => $mass)
		{
			foreach ($mass as $id => $item) {
				$tmp[$key][$item] = 
			}
		}*/

		$json = array();
		foreach ($tmp as $mass) {
			$json += $mass;
		}
		$first = false;
		$prev = null;
		$similars = array();
		foreach ($json as $key => $value) {
			//$json[$key]['filters'] = ( in_array( $value['filters'], [ null, '' ] ) ? null : explode(',', $value['filters']) );
			$filters = ( in_array( $value['filters'], [ null, '' ] ) ? null : explode(',', $value['filters']) );
			$json[$key]['filters'] = $filters;
			if ( $filters !== null ) {
				$json[$key]['filters'] = array();
				foreach ($filters as $filter) {
					$json[$key]['filters'][$filter] = $filter;
				}
			}
				
			//Filter::getInfo($filter)
			$json[$key]['properties'] = json_decode( $value['properties'], true );
			$json[$key]['img'] = array
			(
				'min' => Media::getUri( $value['img'], 'min' ),
				'mid' => Media::getUri( $value['img'], 'mid' ),
				'big' => Media::getUri( $value['img'], 'big' )
			);
			//$json[$key]['similar']
			array_push($similars, $key);

			// -- -- -- //

			if ( $first === false )
			{
				$first = $key;
			}
			$json[$key]['prev'] = $prev;
			if ( isset( $json[$prev] ) )
			{
				$json[$prev]['next'] = $key;
			}
			$prev = $key;
		}

		$json[$first]['prev'] = $prev;
		$json[$prev]['next'] = $first;


		foreach ($similars as $num => $key) {
			if ( count($similars) >= 2 ) $json[$key]['similar'][0] = ( isset( $similars[$num + 1] ) ? $similars[$num + 1] : $similars[$num + 1 - count($similars)] );
			if ( count($similars) >= 3 ) $json[$key]['similar'][1] = ( isset( $similars[$num + 2] ) ? $similars[$num + 2] : $similars[$num + 2 - count($similars)] );
			if ( count($similars) >= 4 ) $json[$key]['similar'][2] = ( isset( $similars[$num + 3] ) ? $similars[$num + 3] : $similars[$num + 3 - count($similars)] );
			if ( count($similars) >= 5 ) $json[$key]['similar'][3] = ( isset( $similars[$num + 4] ) ? $similars[$num + 4] : $similars[$num + 4 - count($similars)] );
			if ( count($similars) >= 6 ) $json[$key]['similar'][4] = ( isset( $similars[$num + 5] ) ? $similars[$num + 5] : $similars[$num + 5 - count($similars)] );
		}



		$print = '';
		/*echo '<pre>';
		var_dump( $result );
		echo '</pre>';*/
		foreach ($result as $key => $mass) 
		{
			//var_dump( Post::get('eclairs', 'id') );
			if ( $key == Post::get('eclairs', 'id') )
			{
				$print .= '<div id="eclairs-banner" class="margin-v margin-h-0 padding bg-lg radius-1">';
					$print .= '<div class="wrap-m">';
						$print .= '<div>';
							$print .= '<h2 class="ta-c">Кондитерская «Mon eclair»</h2>';
						$print .= '</div>';
					$print .= '</div>';
				$print .= '</div>';
			}

			$print .= '<div class="content-l category-' . $key . ' anim-group-in-up">';
			foreach ($mass as $id => $item)
			{
				$print .= '<div id="' . $id . '" class="item p-25">';
					$print .= '<div class="margin-0 shadow-0 ta-c radius-1 over-h">';
						$print .= '<div class="ratio ratio-10-9">';
							$print .= '<div >';
								$print .= '<div class="nophoto h-100 bg-g open-preview">';
									$print .= '<div class="img h-100 over-h" style="background-image: url(' . Media::getUri($item['img'], 'min') . '); background-position-y: initial;">';
										/*$filters = explode(',', $item['filters']);
										foreach ($filters as $filter) {
											$filter = Filter::getInfo($filter);
											$print .= '<div class="label padding-v-00 margin-v-0 p-66 h3 c-w ' . $filter['name'] . '">' . $filter['title'] . '</div>';
										}*/
										$item['filters'] = ( in_array( $item['filters'], [ null, '' ] ) ? null : explode(',', $item['filters']) );
										if ( $item['filters'] !== null )
										{
											foreach ($item['filters'] as $filter) {
												if ( in_array( (int) $filter, [2,3] ) )
												{
													$filter = Filter::getInfo($filter);
													$print .= '<div class="label margin-v-0 p-66 h3 c-w ' . $filter['name'] . '">' . $filter['title'] . '</div>';
												}
											}
										}
									$print .= '</div>';
									$print .= '<div class="hover h-100"></div>';
								$print .= '</div>';
							$print .= '</div>';
						$print .= '</div>';
						$print .= '<div class="info margin padding-h">';
							$print .= '<p class="title b over-h">' . $item['title'] . '</p>';
							$print .= '<p class="price">' . $item['value'] . ' руб.</p>';
						$print .= '</div>';
						$print .= '<div class="button plus-basket d-b padding-v">В корзину</div>';
					$print .= '</div>';
				$print .= '</div>';
			}
			$print .= '</div>';
		}

		$return = json_encode( array( 'json' => $json, 'html' => $print ), JSON_UNESCAPED_UNICODE );

		return $return;
	}

}