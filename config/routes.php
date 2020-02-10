<?php

return
	array
	(
		/*
		 *	Роуты админки
		 */
		'^admin/([A-z]+)/([A-z]+)/(\d+)$'	=>	'admin|start|$1|$2|$3',
		'^admin/([A-z]+)/([A-z]+)$'			=>	'admin|start|$1|$2',
		'^admin/([A-z]+)$'					=>	'admin|start|$1',
		'^admin/*$'							=>	'admin|start|index',
		'^admin.*$'							=>	'admin|404',

		/*'^admin/([A-z]+)/(\d+)$'	=>	'admin|item|$2|$1',
		'^admin/([A-z]+)$'			=>	'admin|part|$1',
		'^admin/*$'					=>	'admin|part|index',
		'^admin.*$'					=>	'admin|404',*/

		/*'^admin(/*(.*))*([A-z0-9-_]+)*$'			=>	'admin|identify|$3|$2',
		'^admin/([A-z0-9-_]+)/([A-z0-9-_]+)$'	=>	'admin|post|$2|$1',
		'^admin/([A-z0-9-_]+)$'					=>	'admin|page|$1',
		'^admin$'								=>	'admin|index',*/

		/*
		 *	Роуты сайта
		 */
		'^compilation/([A-z0-9-_]+)/([A-z0-9-_]+)$'		=>	'compilation|start|$1|$2',
		'^compilation/([A-z0-9-_]+)$'					=>	'compilation|start|$1',
		
		'^((.*)/)*([A-z0-9-_]+)*$'			=>	'main|identify|$3|$2',
		/*'^(.*)/([A-z0-9-_]+)/*$'			=>	'main|identify|$2|$1',
		'^([A-z0-9-_]+)/*$'					=>	'main|page|$1',
		'^$'								=>	'main|index',*/

		'^.*$'								=>	'main|404',
	);
