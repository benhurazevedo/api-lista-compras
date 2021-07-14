<?php
namespace DAOs;

use \Slim\Container;
use \Usuario;

class LoginDAO
{
    private $container;
    function __construct(Container $c=null)
    {
        if($c==null)
        {
            exit("DIC is empty");
        }
        $this->container = $c;
    }
    public function consultaLogin(Usuario $usuario)
    {
        $entityManager = $this->container['entityManager'];
        #$objUsuario = $entityManager->find('Usuario', $usuario->getCod());
        
        #$queryBuilder = $entityManager->createQueryBuilder();

        die(var_dump($usuario));

        $objUsuario = $queryBuilder->select('u')
            ->from('Usuario', 'u')
            ->where($queryBuilder->expr()->andX(
                $queryBuilder->expr()->eq('u.usuario', '?1'),
                $queryBuilder->expr()->eq('u.senha', '?2')
            ))
            ->setParameter(1, $usuario->getUsuario())
            ->setParameter(2, $usuario->getSenha()) #           ->setFirstResult( 1 )            ->setMaxResults( 1 )
            ->getQuery()
            ->getResult();
        
        #die(var_dump($objUsuario));

        if(count($objUsuario) > 0)
            return 1;
        else 
            return 0;	
    }
}
?>
