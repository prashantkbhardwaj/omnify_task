<?php defined('SYSPATH') OR die('No direct script access.');

class Route extends Kohana_Route {
set('check', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'check',
		'action'     => 'index',
	));
}
