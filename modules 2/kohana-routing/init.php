<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */

// We can't use Kohana::$config because that causes my default config file to be merged
// with the application config file, with my config file taking priority. I'm almost 100%
// sure this is not what the user wants

$files = Kohana::find_file('config', 'routes', NULL);
while (count($files) > 1) {
	// remove my copy of the config file from considerations, if its not the only one
	if (strstr($files[0], basename(__DIR__)))
		array_shift($files);
}

foreach (Kohana::load(array_shift($files)) as $name => $params) {
	$r = Route::set($name, $params['uri'], array_key_exists('rules', $params) ? $params['rules'] : null);
	if (@$params['defaults'])
		$r->defaults($params['defaults']);
}
