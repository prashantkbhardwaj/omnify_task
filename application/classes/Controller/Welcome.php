<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
		$view = View::factory('home');
            	$check_page = $view->render();
            	$this->response->body($check_page);
	}

} // End Welcome
