<?php
namespace controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container as Container;

class LoginController
{
    private $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }
    public function __invoke(Request $request, Response $response, array $args)
    {
        try
        {
            $postParams = $request->getParsedBody();

            if(!(isset($postParams['usuario']) && isset($postParams['senha'])))
            {
                return $response->withStatus(403);
            }

            $LoginDAO = $this->container['LoginDAO'];
            
            $resultadoConsultaLogin = $LoginDAO->consultaLogin($postParams);

            if($resultadoConsultaLogin == 1)
                return $response->withStatus(200);
            else   
                return $response->withStatus(403);
        }
        catch(\Exception $e)
        {
            return $response->withStatus(500);
        }
    }
}
?>
