<?php
namespace controllers;

use Slim\Router;

final class ListaController
{
	private $router;
	
	public function __construct($container)
    {
        $this->container = $container;
    }
	public function list($req, $res, array $args)
	{
        try 
        {
            $ListaDAO = $this->container['ListaDAO'];
            return $res->withJson($ListaDAO->list(), 200);
        }
        catch(\Exception $e)
        {
            return $res->withStatus(500);
        }
    }
    public function add($req, $res, array $args)
    {
        try
        {
            $postParams = $req->getParsedBody();
            $ListaDAO = $this->container['ListaDAO'];
            return $res->withJson(['cod' => $ListaDAO->add($postParams)], 200);
        }
        catch(\Exception $e)
        {
            return $res->withStatus(500);
        }
    }
    public function remove($req, $res, array $args)
    {
        try 
        {
            if(!is_numeric($args['codigo']))
            {
                return $res-withStatus(401);
            }
            $ListaDAO = $this->container['ListaDAO'];
            $ListaDAO->remove($args['codigo']);
            return $res->withStatus(200);
        }
        catch(\Exception $e)
        {
            return $res->withStatus(500);
        }
    }
}
