<?php 
/**************************************************************
 * Default Router
 **************************************************************/

Route::set('default', '(<controller>(/<action>(/<id>)))')
->defaults(array(
    'controller' => 'Welcome',
    'action'     => 'index',
));

Route::set('success', '(<controller>(/<action>(/<id>)))')
->defaults(array(
    'controller' => 'Success',
    'action'     => 'index',
));
