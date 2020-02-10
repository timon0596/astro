<?php

/**
* 
*/
class Compilation_Model
{
	
	function __construct()
	{
		# code...
	}


	public static function getList()
	{
		//return 'Compilation - Goods';
		if ( !isset($_GET['c']) && !isset($_GET['f']) )
		{
			$_GET['f'] = 1;
		}

		$list = false;

		if ( isset($_GET['c']) )
		{
			//var_dump($_GET['c']);
			$list = get_posts( $_GET['c'], true, false );
			//$list = get_posts( $_GET['c'], true, true );
			$list = array_reverse($list, true);
		}
		if ( isset($_GET['f']) )
		{
			$list = Filter::getElements( $_GET['f'] );
		}
		foreach ($list as $cf => $group) {
			uasort(
				$list[$cf],
				function($a,$b)
				{
					if ( (int) $a['sort'] == (int) $b['sort'] ) { 
					return 0; 
					} 
					return ( (int) $a['sort'] < (int) $b['sort'] ) ? 1 : -1;
				}
			);
		}

		return $list;
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
									$print .= '<div class="img h-100 over-h" style="background-image: url(' . Media::getUri($item['img'], 'min') . ')">';
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