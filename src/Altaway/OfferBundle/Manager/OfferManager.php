<?php

namespace Altaway\OfferBundle\Manager;

use Altaway\OfferBundle\Repository\OfferRepository;
use Altaway\OfferBundle\Entity\Offer;
use Sonata\CoreBundle\Model\BaseEntityManager;

class OfferManager  extends BaseEntityManager
{
    public function getOffersForSlider($locale){

        $offers = $this->findBy(array('language' => $locale), array('publishAt' => 'DESC'), 9);
        //structure une liste de trio d'offres pour le slider
        $i = 0;
        $data = array();
        foreach ($offers as $key => $offer)
        {
            if (($key % 3) == 0)
            {
                $i++;
            }
            $data[$i][] = $offer;
        }
        while (count($data[$i]) < 3)
        {
            $data[$i][] = new Offer;
        }
        return $data;
    }
}
