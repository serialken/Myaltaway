<?php

namespace Altaway\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Altaway\OfferBundle\Entity\Apply;
use Altaway\MediaBundle\Entity\Media;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \Altaway\OfferBundle\Entity\Apply
     *
     * @ORM\OneToMany(targetEntity="Altaway\OfferBundle\Entity\Apply", mappedBy="user")
     */
    protected $applies;


    /**
     * @var \Altaway\UserBundle\Entity\Profile
     *
     * @ORM\OneToOne(targetEntity="Altaway\UserBundle\Entity\Profile", inversedBy="user", cascade={"persist", "remove"})
     */
    protected $profile;


    // Getters Setters

    /**
     * Get Roles As String
     *
     * @return  string
     */
    public function getRolesAsString()
    {
        $roles = array();
        foreach ($this->getRoles() as $role) {
            $role = explode('_', $role);
            array_shift($role);
            if ($role) $roles[] = ucfirst(strtolower(implode(' ', $role)));
        }
        return implode(', ', $roles);
    }


    public function __construct()
    {
        parent::__construct();
// your own logic
    }

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
     * Add applies
     *
     * @param \Altaway\OfferBundle\Entity\Apply $applies
     * @return User
     */
    public function addApply(\Altaway\OfferBundle\Entity\Apply $applies)
    {
        $this->applies[] = $applies;

        return $this;
    }

    /**
     * Remove applies
     *
     * @param \Altaway\OfferBundle\Entity\Apply $applies
     */
    public function removeApply(\Altaway\OfferBundle\Entity\Apply $applies)
    {
        $this->applies->removeElement($applies);
    }

    /**
     * Get applies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getApplies()
    {
        return $this->applies;
    }

    /**
     * Set profile
     *
     * @param \Altaway\UserBundle\Entity\Profile $profile
     * @return User
     */
    public function setProfile(\Altaway\UserBundle\Entity\Profile $profile = null)
    {
        //$profile->setUser($this);
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return \Altaway\UserBundle\Entity\Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }
}
