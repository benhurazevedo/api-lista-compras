<?php
namespace dbService;

use \PDO as PDO;
use \Slim\Container as Container;

class LoginDAO
{
    private $connector;
    function __construct(Container $c=null)
    {
        if($c==null)
        {
            exit("DIC is empty");
        }
        $this->connector = $c['dbConnService']->getConn();
    }
    public function consultaLogin(array $params)
    {
        $sql = "
            SELECT
                count(*)  as quantidade      
            FROM usuarios
            where nome = :usuario and senha = :senha
        ";
        
        $stmt = $this->connector->prepare($sql);

        $stmt->bindParam(":usuario", $params['usuario'],PDO::PARAM_STR);
        $stmt->bindParam(":senha", $params['senha'],PDO::PARAM_STR);

        try {
            $stmt->execute();
        } catch (\Exception $e) {
            throw new SqlCommandException($e);
        }
        
        $LoginEncontrado = $stmt->fetch(PDO::FETCH_ASSOC) == null? 0 : 1;
        
        return $LoginEncontrado;   
    }
}
?>
