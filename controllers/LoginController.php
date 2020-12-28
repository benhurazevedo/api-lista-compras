<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Container\ContainerInterface as ContainerInterface;

namespace controllers;

class LoginController
{
    private $container;
    public function __construct(ContainerInterface $container)
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