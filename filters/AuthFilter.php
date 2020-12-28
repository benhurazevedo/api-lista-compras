<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Psr\Container\ContainerInterface as ContainerInterface;

namespace filters;

class AuthFilter
{
    private $container;
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    public function __invoke(Request $request, Response $response, $next)
    {
        try
        {
            $headers = $request->getHeaders();

            if(!(isset($headers['usuario']) && isset($headers['senha'])))
                return $response->withStatus(403);
            
            $LoginDAO = $this->container['LoginDAO'];

            $resultadoConsultaLogin = $LoginDAO->consultaLogin($headers);

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