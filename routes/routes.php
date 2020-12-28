<?php
use \Slim\App as App;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \controllers\ListaController as ListaController;
use \controllers\LoginController as LoginController;
use \filters\AuthFilter as AuthFilter;

$app->post('/login', 'LoginController');

$app->group('', function(App $app)
{
    $app->get('/lista','ListaController:list');

    $app->post('/lista','ListaController:add');
	
    $app->delete('/lista/{codigo}','ListaController:remove');
})->add('AuthFilter');

?>