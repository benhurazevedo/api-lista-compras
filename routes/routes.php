<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/lista','controllers\ListaController:list');

$app->post('/lista','controllers\ListaController:add');
	
$app->delete('/lista/{codigo}','controllers\ListaController:remove');
?>