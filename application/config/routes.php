<?php /**************************************************************
 * Default Router
 **************************************************************/

Route::set('first', '(<controller>(/<action>(/<id>)))')
->defaults(array(
    'controller' => 'Welcome',
    'action'     => 'index',
));

Route::set('testing', '(<controller>(/<action>(/<id>)))')
->defaults(array(
    'controller' => 'Testing',
    'action'     => 'index',
));