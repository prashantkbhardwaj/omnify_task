<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Check extends Controller {

	public function action_index()
	{
		$view = View::factory('check');
	    $check_page = $view->render();
	    $this->response->body($check_page);
	}

} // End Welcome
?>