<?php

error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_WARNING);
setlocale(LC_ALL, "ru_RU.UTF-8");
header('Content-type: text/html; charset=utf-8');

if(phpversion() < "5.4.0") 		die('inWidget required PHP >= <b>5.4.0</b>. Your version: '.phpversion());
if(!extension_loaded('curl')) 	die('inWidget required <b>cURL PHP extension</b>. Please, install it or ask your hosting provider.');

#ini_set('include_path', __DIR__ .'/' ); 

#require_once 'classes/Autoload.php';
require_once 'classes/InstagramScraper.php';
require_once 'classes/Unirest.php';
require_once 'classes/InWidget.php';

/* -----------------------------------------------------------
	Native initialization
 ------------------------------------------------------------*/

try {
	$inWidget = new \inWidget\Core;
	$inWidget->getData();
	//include 'template.php';
	?>

	<div id="widget" class="widget">
		<?php
		$i = 0;
		$count = $inWidget->countAvailableImages($inWidget->data->images);
		if($count>0) :
			if($inWidget->config['imgRandom'] === true) shuffle($inWidget->data->images);
			?>
			<div id="widgetData" class="data d-g gg-1 gtc-4" style="margin: -.5em;">
				<?php foreach ($inWidget->data->images as $key=>$item) : ?>
				<?php 
					if($inWidget->isBannedUserId($item->authorId) === true) continue;
					switch ($inWidget->preview){
						case 'large':
							$thumbnail = $item->large;
							break;
						case 'fullsize':
							$thumbnail = $item->fullsize;
							break;
						default:
							$thumbnail = $item->small;
					}
					?>

					<a href="<?=$item->link;?>" class="d-b" target="_blank">
						<div class="marg-0 radius-0 over-h">
							<div class="ratio-1-1">
								<div style="background-image:url(<?=$thumbnail;?>);">
									<?php
									$tmpText = $item->text;
									$tmpText = str_replace("
", " ", $tmpText);
									preg_match('/([^#]+)(#.*)*/', $tmpText, $resultText);
									//echo $tmpText ;
									if (isset($resultText[1])) : ?>
										<div class="hover" style="width:calc(100% + .5px);height:calc(100% + .5px);">
											<div>
												<div class="wrap-m">
													<div>
														<div class="c-w padd-0">
														<?php
														//print_r($resultText[1]);
														?>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php endif;?>
								</div>
							</div>
						</div>
					</a>

					<?php
					$i++;
					if($i >= $inWidget->view) break;
					?>
				<?php endforeach; ?>
				<div class="clear">&nbsp;</div>
			</div>
		<?php else : ?>
			<?php
			if(!empty($inWidget->config['HASHTAG'])) :
				$inWidget->lang['imgEmptyByHash'] = str_replace(
					'{$hashtag}', 
					$inWidget->config['HASHTAG'], 
					$inWidget->lang['imgEmptyByHash']
				);
				?>
				<div class="empty"><?=$inWidget->lang['imgEmptyByHash'];?></div><?php
			else:
			?>
				<div class="empty"><?=$inWidget->lang['imgEmpty'];?></div>
			<?php
			endif;
			?>
		<?php endif; ?>
	</div>
	<?php
}
catch (\Exception $e) {
	echo $e->getMessage();
}