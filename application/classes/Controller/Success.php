<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Success extends Controller {

	public function action_index()
	{
		$view = View::factory('success');
	    $success_page = $view->render();
	    $this->response->body($success_page);
	}

} // End Welcome
