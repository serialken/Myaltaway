<?php

namespace Altaway\PageBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PageRepository extends EntityRepository
{
    public function getMenu($locale){

        $qb = $this->createQueryBuilder('p');

        $qb->select('p.title, p.slug')
            ->where("p.language = :locale")
            ->orderBy('p.rank', 'ASC')
            ->setParameter("locale", $locale);

        return $qb->getQuery()->getResult();
    }

}
