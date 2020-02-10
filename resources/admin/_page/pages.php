<?php

$pages = Page::getList();

foreach ($pages as $id => $page) {
	echo '<div>#' . $id;
	echo '<a href="pages/' . $id . '">' . $page['title'] . '</a></div>';
}