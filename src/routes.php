<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@signin');
$router->post('/login', 'LoginController@signinAction');

$router->get('/cadastro', 'LoginController@signup');
$router->post('/cadastro', 'LoginController@signupAction');

$router->get('/edit_user', 'UserController@getUser');
$router->post('/{id}/edit_user', 'UserController@update');

$router->get('/newnote', 'NoteController@newNote');
$router->post('/newnote', 'NoteController@addNote');

$router->get('/{id}/editnote', 'NoteController@editNote');
$router->post('/{id}/updatenote', 'NoteController@updateNote');

$router->get('/{id}/delnote', 'NoteController@delNote');