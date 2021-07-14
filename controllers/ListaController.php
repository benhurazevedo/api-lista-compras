<?php
namespace controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use \Item;

final class ListaController
{
	private $container;
	public function __construct($container)
    {
        $this->container = $container;
    }
	public function list(Request $req, Response $res, array $args)
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
    public function add(Request $req, Response $res, array $args)
    {
        try
        {
            $postParams = $req->getParsedBody();
            $item = new Item();
            if(!isset($postParams['descricao']))
                throw new \Exception();
            $item->setDescricao($postParams['descricao']);
            if($item->getDescricao() == "")
                throw new \Exception();
            $ListaDAO = $this->container['ListaDAO'];
            return $res->withJson(['id' => $ListaDAO->add($item)], 200);
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
            if(!is_numeric($args['id']))
            {
                return $res-withStatus(401);
            }
            $ListaDAO = $this->container['ListaDAO'];
            $item = $ListaDAO->get($args['id']);
            if($item == null)
                return $res->withStatus(401);
            $ListaDAO->remove($item);
            return $res->withStatus(200);
        }
        catch(\Exception $e)
        {
            return $res->withStatus(500);
        }
    }
}
