<?php
namespace DAOs;
use \Slim\Container;
use \Item;

class ListaDAO
{
    private $container;
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
        $entityManager = $this->container['entityManager'];
        $listaCompras = $entityManager
            ->get_repository('Item')
            ->findAll();

        return $listaCompras;
    }
    public function remove(Item $item)
    {
        $entityManager = $this->container['entityManager'];
        $entityManager
            ->remove($item);
        $entityManager
            ->flush();
    }
    public function add(Item $item)
    {
        $entityManager = $this->container['entityManager'];
        $entityManager
            ->persist($item);
        $entityManager
            ->flush();
        
        return $item->getId();
    }
    public function get($id)
    {
        $entityManager = $this->container['entityManager'];
        $item = $entityManager
            ->find('Post', $args['id']);
        
        return $item;
    }
}
?>
