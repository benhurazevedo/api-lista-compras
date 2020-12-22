<?php

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
		,'CONNECTION_STRING' => 'pgsql:host=localhost;dbname=lista_compras;user=usrLista;password=123456'
    ]
]);
?>