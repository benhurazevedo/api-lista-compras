<?php
use dbService\ConectorDAO as ConectorDAO;
use dbService\ListaDAO as ListaDAO;
use controllers\ListaController as ListaController;

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
$container['ListaController'] = function ($c) {
    return new ListaController( $c);
};