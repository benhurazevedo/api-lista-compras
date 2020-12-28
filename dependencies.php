<?php
use dbService\ConectorDAO as ConectorDAO;
use dbService\ListaDAO as ListaDAO;
use dbService\LoginDAO as LoginDAO;
use controllers\ListaController as ListaController;
use controllers\LoginController as LoginController;
use filters\AuthFilter as AuthFilter;

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

$container['LoginDAO'] = function ($c) 
{  
    $dbLoginDAOService = new LoginDAO($c);
    
    return $dbLoginDAOService;
};

// controller
$container['ListaController'] = function ($c) 
{
    return new ListaController($c);
};

$container['LoginController'] = function($c)
{
    return new LoginController($c);
};

//Filters
$container['AuthFilter'] = function ($c) 
{
    return new AuthFilter( $c);
};