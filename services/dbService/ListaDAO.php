<?php
namespace dbService;
use \PDO;
use \Slim\Container;
class ListaDAO
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
    public function list()
    {
        $sql = "
            SELECT
                    cod
                    ,descricao
                    ,null as marcado
            FROM lista_compras
        ";
        $stmt = $this->connector->prepare($sql);
        try {
            $stmt->execute();
        } catch (\Exception $e) {
            throw new SqlCommandException($e);
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
    public function remove($cod)
    {
        $sql = "
            delete
            FROM lista_compras
                where cod = :cod
        ";
        $stmt = $this->connector->prepare($sql);
        $stmt->bindParam(":cod", $cod,PDO::PARAM_STR);
        try {
            $stmt->execute();
        } catch (\Exception $e) {
            throw new SqlCommandException($e);
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function add(array $params)
    {
        $sql = "
            insert into lista_compras
            (
                descricao
            )
            values (:descricao)
        ";
        $stmt = $this->connector->prepare($sql);
        $stmt->bindParam(":descricao", $params['descricao'],PDO::PARAM_STR);
        try {
            $stmt->execute();
        } catch (\Exception $e) {
            throw new SqlCommandException($e);
        }
        return $this->connector->lastInsertId ();
    }
}
?>
