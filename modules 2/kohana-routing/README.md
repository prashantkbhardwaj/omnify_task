# kohana-routing

Stop using bootstrap.php to set your Kohana routes - routing is just another configuration file now!

## Installation

1. add `guss77/kohana-routing` to your `composer.json`, or run `composer require guss77/kohana-routing`
2. edit your `bootstrap.php` to add the `kohana-routing` module and remove the `Route::set()` call from the bottom of the file

The built-in configuration file includes a replacement for the default `Route::set()` code.

## Usage

Instead of adding `Route::set()` calls in the `bootstrap.php` code, copy the `routes.php` config file from the module to
your application, and add the rules there.

The configuration format is very simple - its an array of routing rules, where each element in the top level of the array
represents a single `Route::set` call. For each rule:

- The rule "key" is the name of the route and corresponds to the first argument to `Route::set()`
- The rule "value" is an array with the following keys:
  - 'uri' - the rule expressions used to parse the URI, corresponds to the second argument to `Route::set()`
  - 'defaults' - optional array that defines the default values for the route expression values, corresponds to the
    `defaults()` call on the `Route` instance
  - 'rules' - optional array that contains regular expressions to limit the matching of the route expression to only
    parameters with valid values. This corresponds to the third argument to `Route::set()`

## Example Configuration

The following snippets demonstrates how to set up rules in the configuration file, but omit the config file boilerplate
(the PHP decleration and return array syntax).

1. Default Koahan route
~~~
	'default' => [
		'uri' => '(<controller>(/<action>(/<id>)))',
		'defaults' => [
			'controller' => 'welcome',
			'action'     => 'index',
		],
	],
~~~

1. Routes that load controllers from subdirectories
~~~
  'admins' => [
    'uri' => 'backoffice/(controller(/<action>))',
    'defaults' => [
      'directory' => 'admin',
      'controller' => 'backoffice',
      'action' => 'menu',
    ],
  ],
  'clients' => [
    'uri' => '(/controller(/<action>))',
    'defaults' => [
      'directory' => 'users',
      'controller' => 'welcome',
      'action' => 'index',
    ],
  ],
~~~

1. Route with argument validation
~~~
  'categories' => [
    'uri' => 'cat/<category>',
    'rules' => [
      'category' => '[a-z\-_\.]+',
    ],
    'defaults' => [
      'controller' => 'categories',
      'action' => 'category',
    ],
  ],
~~~
