<?php
#use dbService\ConectorDAO as ConectorDAO;
use dbService\ListaDAO;
use DAOs\LoginDAO;
use controllers\ListaController;
use controllers\LoginController;
use filters\AuthFilter;

// DIC configuration
$container = $app->getContainer();

$container['entityManager'] = function($container)
{
	global $entityManager;

	return $entityManager;
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