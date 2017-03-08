<?php
/**
 * Created by PhpStorm.
 * User: arthur.voncken
 * Date: 25/08/2015
 * Time: 11:25
 */

namespace Altaway\OfferBundle\Manager;

use Altaway\OfferBundle\Entity\Apply;
use Altaway\OfferBundle\Entity\Offer;

class ApplyManager{

    public function applied($usr, \Altaway\OfferBundle\Entity\Offer $offer){
        $list_applications = $offer->getApplies();
        foreach($list_applications as $apply)
        {
            if ($apply->getUser() == $usr)
                return true;
        }
        return false;
    }

}