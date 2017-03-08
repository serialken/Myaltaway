<?php

namespace Altaway\OfferBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Altaway\UserBundle\Entity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Apply
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Altaway\OfferBundle\Repository\ApplyRepository")
 */
class Apply
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Offer", inversedBy="applies")
     * @ORM\JoinColumn(name="offer_id", referencedColumnName="id")
     */
    protected $offer;

    /**
     * @ORM\ManyToOne(targetEntity="Altaway\UserBundle\Entity\User", inversedBy="applies")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set offer
     *
     * @param \Altaway\OfferBundle\Entity\Offer $offer
     * @return Apply
     */
    public function setOffer(\Altaway\OfferBundle\Entity\Offer $offer = null)
    {
        $this->offer = $offer;

        return $this;
    }

    /**
     * Get offer
     *
     * @return \Altaway\OfferBundle\Entity\Offer 
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * Set user
     *
     * @param \Altaway\UserBundle\Entity\User $user
     * @return Apply
     */
    public function setUser(\Altaway\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Altaway\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Apply
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
