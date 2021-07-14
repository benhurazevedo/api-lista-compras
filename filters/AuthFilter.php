<?php
namespace filters;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container as Container;
use \Usuario;

class AuthFilter
{
    private $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }
    public function __invoke(Request $request, Response $response, $next)
    {
        try
        {
            $headers = $request->getHeaders();
		
            if(!(isset($headers['HTTP_USUARIO']) && isset($headers['HTTP_SENHA'])))
                return $response->withStatus(403);
            
            $usuario = new Usuario();
            $usuario->setUsuario($headers['HTTP_USUARIO'][0]);
            $usuario->setSenha($headers['HTTP_SENHA'][0]);
            
            $LoginDAO = $this->container['LoginDAO'];

            $resultadoConsultaLogin = $LoginDAO->consultaLogin($usuario);

            if($resultadoConsultaLogin == 1)
                return $next($request, $response);
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
