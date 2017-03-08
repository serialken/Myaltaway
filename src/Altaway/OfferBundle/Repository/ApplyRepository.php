<?php

namespace Altaway\OfferBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ApplyRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ApplyRepository extends EntityRepository
{

    public function applied($usr, $offer)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->where("a.user = :usr")
            ->andWhere("a.offer = :offer")
            ->setParameter("usr", $usr)
            ->setParameter("offer", $offer);
        return ($qb->getQuery()->setMaxResults(1)->getOneOrNullResult() != null);
    }

}
