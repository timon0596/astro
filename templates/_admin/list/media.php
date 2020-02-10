<?php

$tmp =  Admin_Model::get_part($name);

echo '<h2>' . $tmp['title'] . '</h2>';

echo '<a href="' . $name . '/add' . '" class="button">' . 'Добавить' . '</a>';

$list = Db::db_select($tmp['table'], $tmp['where'], null, 'id');

?>
<div class="content-l">
<?php
if ( $list )
{
	foreach ($list as $key => $item) :
		//print_r($item)
		?><div class="p-25" style="max-width: 200px;"><div id="<?php echo $key; ?>" class="margin-0 padding-0 shadow-0">
			<p>
				<span class="c-g">#<?php echo $key; ?></span>
				<!--<b><?php echo $item['title']; ?></b>-->
			</p>

			
			<?php if ( explode('/', $item['mime'])[0] == 'image' ): ?>
				<div class="ratio ratio-1-1">
					<div style="background: linear-gradient(180deg, rgb(253,253,253), rgb(242, 242, 242) );">
						<div class="contain h-100p" style="background-image: url(<?php echo Media::getUri($key, 'min'); ?>);"></div>
					</div>
				</div>
			<?php else: ?>
				<div class="ratio ratio-1-1">
					<div class="bg-1">
						<div class="wrap-m">
							<div class="ta-c b h2">.<?php echo $item['extension'] ?></div>
						</div>
					</div>
				</div>
			<?php endif ?>
				
			<div class="over-h b margin-v-0 ta-c" style="height: 1.15em;"><?php echo $item['title']; ?></div>

			<?php $parent = !empty($item['parent']) ? $item['parent'] : false; ?>
			<div class="over-h c-g margin-v-0" style="height: 1.15em;">
				Род.кат: 
				<?php if ($parent): ?>
					<a href="<?php echo get_uri($parent); ?>" target="_blank" class="c-1"><?php echo get_post($parent,'title'); ?></a>
				<?php else: ?>
					<span class="c-g"><пусто></span>
				<?php endif ?>
			</div>
			
			<div class="margin-v-0">
				<div class="h4 c-g">Ссылки:</div>
				<div>
					<a href="<?php echo Media::getUri($key,'full'); ?>" target="blank">[full]</a>
					<?php if ( in_array( $item['mime'], [ 'image/jpeg', 'image/png' ] ) ): ?>
						<a href="<?php echo Media::getUri($key,'big'); ?>" target="blank">[big]</a>
						<a href="<?php echo Media::getUri($key,'mid'); ?>" target="blank">[mid]</a>
						<a href="<?php echo Media::getUri($key,'min'); ?>" target="blank">[min]</a>
					<?php endif ?>
				</div>
			</div>

			<a class="h4 button margin-0" href="<?php echo './' . $name . '/edit/' . $key; ?>">edit</a>
			<a class="h4 button margin-0" href="<?php echo './' . $name . '/del/' . $key; ?>">del</a>
		</div></div><?php
	endforeach;
}
?>
</div>