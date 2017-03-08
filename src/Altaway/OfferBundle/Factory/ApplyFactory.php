<?php


namespace Altaway\OfferBundle\Factory;

use Altaway\OfferBundle\Entity\Apply;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ApplyFactory
{
    public function __construct(SessionInterface $session)
    {
        $this->response = NULL;
        $this->locale = $session->get('locale');
    }

    public function init()
    {
        $this->apply = new Apply();
        return $this;
    }

    public function setUser($user)
    {
        $this->apply->setUser($user);
        return $this;
    }

    public function setOffer($offer)
    {
        $this->apply->setOffer($offer);
        return $this;
    }

    public function get()
    {
        return $this->apply;
    }

    private $apply;
    private $locale;
}