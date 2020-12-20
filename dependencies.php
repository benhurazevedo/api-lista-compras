<?php
use dbService;
// DIC configuration
$container = $app->getContainer();


$container['dbConnService'] = function ($c)
{
    return new ConectorDAO ($c);
};

// db service
$container['ListaDAO'] = function ($c) 
{  
    $dbListaDAOService = new ListaDAO($c);
    
    return $dbListaDAOService;
};

// controller
$container['controllers\ListaController'] = function ($c) {
    return new controllers\ListaController( $c);
};