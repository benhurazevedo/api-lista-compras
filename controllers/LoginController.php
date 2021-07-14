<?php
namespace controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use \Usuario;

class LoginController
{
    private $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }
    public function __invoke(Request $request, Response $response, array $args)
    {
        $postParams = $request->getParsedBody();

        if(!(isset($postParams['usuario']) && isset($postParams['senha'])))
        {
            return $response->withStatus(403);
        }

        $usuario = new Usuario();
        $usuario->setUsuario($postParams['usuario']);
        $usuario->setSenha($postParams['senha']);

        $LoginDAO = $this->container['LoginDAO'];
        
        $resultadoConsultaLogin = $LoginDAO->consultaLogin($usuario);

        if($resultadoConsultaLogin == 1)
            return $response->withStatus(200);
        else   
            return $response->withStatus(403);
    }
}
?>
