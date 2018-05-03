<?php
use \Core\Router;

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/user', ['controller' => 'app', 'action' => 'index']);
Router::connect('/user/add', ['controller' => 'user', 'action' => 'add']);
Router::connect('/user/log', ['controller' => 'user', 'action' => 'log']);
Router::connect('/error/error', ['controller' => 'error', 'action' => 'error']);

Router::connect('/userController/registerAction', ['controller' => 'user', 'action' => 'register']);
Router::connect('/userController/loginAction', ['controller' => 'user', 'action' => 'login']);
Router::connect('/userController/updateAction', ['controller' => 'user', 'action' => 'update']);
Router::connect('/userController/deleteAction', ['controller' => 'user', 'action' => 'delete']);

Router::connect('/genreController/addAction', ['controller' => 'genre', 'action' => 'add']);
Router::connect('/genreController/listAction', ['controller' => 'genre', 'action' => 'list']);
Router::connect('/genreController/updateAction', ['controller' => 'genre', 'action' => 'update']);
Router::connect('/genreController/deleteAction', ['controller' => 'genre', 'action' => 'delete']);

Router::connect('/FilmController/addAction', ['controller' => 'film', 'action' => 'add']);
Router::connect('/FilmController/updateAction', ['controller' => 'film', 'action' => 'update']);
Router::connect('/FilmController/deleteAction', ['controller' => 'film', 'action' => 'delete']);
Router::connect('/FilmController/filmAction', ['controller' => 'film', 'action' => 'film']);
Router::connect('/FilmController/detailAction', ['controller' => 'film', 'action' => 'detail']);
?>