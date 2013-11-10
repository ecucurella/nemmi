<?php

namespace nemmi\WebBundle\Entity;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\ORM\AbstractQuery;


/**
 * UserRepository
 *
 */
class UserRepository extends EntityRepository
{
    public function findLastUsers()
    {
        $dql = 'SELECT u FROM nemmiWebBundle:User u
                ORDER BY u.id DESC';
        $query = $this->getEntityManager()->createQuery($dql);

        return $query->execute();
    }
}
