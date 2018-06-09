<?php /**************************************************************
 * Default Router
 **************************************************************/

Route::set('testing', '<action>',
  array(
    'action' => 'index'
  ))
  ->defaults(array(
    'controller' => 'Welcome'
  ));
