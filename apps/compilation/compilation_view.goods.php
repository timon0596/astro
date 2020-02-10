<?php

/**
* 
*/
class Compilation_View
{
	
	function __construct()
	{
		# code...
	}


	public static function view($result)
	{

		echo $result;
		//$result = json_encode($result, JSON_UNESCAPED_UNICODE);

		/*if ( !isset( $_GET['print'] ) )
		{
			$tmp = $result;
			$result = array();
			foreach ($tmp as $mass) {
				$result += $mass;
			}
			$result = json_encode($result, JSON_UNESCAPED_UNICODE);
			echo $result;
		}
		else
		{			
			foreach ($result as $key => $mass) :
				//var_dump( Post::get('eclairs', 'id') );
				if ( $key == Post::get('eclairs', 'id') ) :
					?>
					<div id="eclairs-banner" class="margin bg-lg">
						<div class="wrap-m">
							<div>
								<h2 class="ta-c">Кондитерская «Mon eclair»</h2>
							</div>
						</div>
					</div>
					<?php
				endif;
				?><div class="content-l category-<?php echo $key; ?>"><?php
				foreach ($mass as $id => $item) :
					?><div id="<?php echo $id; ?>" class="item p-25">
						<div class="margin-0 shadow-0 ta-c radius-1 over-h">
							<div class="ratio ratio-10-9">
								<div >
									<div class="nophoto h-100 bg-g open-preview">
										<div class="img h-100" style="background-image: url(<?php echo Media::getUri($item['img'], 'min') ; ?>)">
											<div class="hover h-100">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="info margin padding-h">
								<p class="title b over-h"><?php echo $item['title']; ?></p>
								<p class="price"><?php echo $item['value']; ?> руб.</p>
							</div>
							<div class="button to-basket d-b padding-v">В корзину</div>
						</div>
					</div><?php
				endforeach;
				?></div><?php
			endforeach;
		}*/
		
	}
}