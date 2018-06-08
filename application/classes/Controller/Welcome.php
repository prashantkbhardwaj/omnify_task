<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
		$view = View::factory('home');
	    $home_page = $view->render();
	    $this->response->body($home_page);
	}

	public function action_success()
	{
		$view = View::factory('success');
	    $success_page = $view->render();
	    $this->response->body($success_page);
	}

	public function action_check()
	{
		$view = View::factory('check');
	    $check_page = $view->render();
	    $this->response->body($check_page);
	}

} // End Welcome
