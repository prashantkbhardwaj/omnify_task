<?php defined('SYSPATH') OR die('No direct script access.');

class Route extends Kohana_Route {
public function set('check', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'check',
		'action'     => 'index',
	));
}
