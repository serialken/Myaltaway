<?php

namespace Altaway\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Altaway\UserBundle\Repository\ProfileRepository")
 */
class Profile
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
     * @var \Altaway\MediaBundle\Entity\Document
     *
     * @ORM\OneToMany(targetEntity="Altaway\UserBundle\Entity\Document", mappedBy="profile", cascade={"persist", "remove"})
     */
    protected $documents;

    /**
     * @var \Altaway\UserBundle\Entity\User
     *
     * @ORM\OneToOne(targetEntity="Altaway\UserBundle\Entity\User", mappedBy="profile")
     */
    protected $user;

    /**
     * @var string
     *
     * @ORM\column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\OneToOne(targetEntity="Altaway\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     * @ORM\joinColumn(name="avatar_id")
     */
    protected $avatar;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->documents = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set user
     *
     * @param \Altaway\UserBundle\Entity\User $user
     * @return Profile
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
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set avatar
     *
     * @param \Altaway\MediaBundle\Entity\Media $avatar
     * @return User
     */
    public function setAvatar(\Altaway\MediaBundle\Entity\Media $avatar = null)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return \Altaway\MediaBundle\Entity\Media
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Add documents
     *
     * @param \Altaway\UserBundle\Entity\Document $documents
     * @return Profile
     */
    public function addDocument(\Altaway\UserBundle\Entity\Document $documents)
    {
        $this->documents[] = $documents;

        return $this;
    }

    /**
     * Remove documents
     *
     * @param \Altaway\UserBundle\Entity\Document $documents
     */
    public function removeDocument(\Altaway\UserBundle\Entity\Document $documents)
    {
        $this->documents->removeElement($documents);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocuments()
    {
        return $this->documents;
    }
}
