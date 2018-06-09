<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Testing extends Controller {

	public function action_index()
	{
		$this->response->body('hello, friend!');
	}

} // End Welcome
