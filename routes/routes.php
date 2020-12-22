<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use controllers\ListaController as ListaController;

$app->get('/lista','ListaController:list');

$app->post('/lista','ListaController:add');
	
$app->delete('/lista/{codigo}','ListaController:remove');
?>