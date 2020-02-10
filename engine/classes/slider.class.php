<?php

/**
* 
*/
class Slider
{
	
	function __construct(){}

	public static function pr($time = 240, $transition = 60)
	{
		$arr = self::getArray();
		echo '<div class="dx-slider slide-time-' . $time . ' slide-transition-' . $transition . '">';
			echo '<div class="slider-bgs">';
				foreach ($arr as $key => $item) {
					echo '<div class="slider-bg" style="background-image: url(' . $item['background'] . ');"></div>';
				}
				echo '<div class="slider-color"></div>';
			echo '</div>';
			echo '<div class="slider-contents">';
				echo '<div class="wrap-m">';
					echo '<div>';
						foreach ($arr as $key => $item) {
							echo '<div class="slider-content ta-c d-b">' . $item['content'] . '</div>';
						}
					echo '</div>';
				echo '</div>';
				echo '<div class="slider-switches content-c"></div>';
			echo '</div>';
		echo '</div>';
	}

	public static function getArray()
	{
		$result = Db::db_select('posts', ['type'=>'slide']);
		if ( $result )
		{
			foreach ($result as $key => $item) {
				$return[$key]['background'] = Media::getUri( $item['img'], 'big' );
				$return[$key]['description'] = $item['description'];
				$return[$key]['content'] = $item['content'];
			}
		}
		else
		{
			$return = false;
		}
		return $return;
	}
}