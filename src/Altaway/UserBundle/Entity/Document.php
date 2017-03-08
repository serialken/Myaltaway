<?php

namespace Altaway\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Document
 *
 * @ORM\Table("document")
 * @ORM\Entity(repositoryClass="Altaway\UserBundle\Repository\DocumentRepository")
 */
class Document
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
     * @var boolean
     *
     * @ORM\Column(name="isEnable", type="boolean")
     */
    private $isEnable;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="time")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UpdatedAt", type="time")
     */
    private $updatedAt;

    /**
     * @var \Altaway\UserBundle\Entity\Profile
     *
     * @ORM\ManyToOne(targetEntity="Altaway\UserBundle\Entity\Profile", inversedBy="documents")
     * @ORM\joinColumn(name="profile_id")
     */
    protected $profile;

    /**
     * @var \Altaway\MediaBundle\Entity\Media
     *
     * @ORM\OneToOne(targetEntity="Altaway\MediaBundle\Entity\Media", inversedBy="document", cascade={"remove", "persist"})
     * @ORM\joinColumn(name="media_id")
     */
    protected $media;

    /**
     * @var \Altaway\UserBundle\Entity\Type
     *
     * @ORM\ManyToOne(targetEntity="Altaway\UserBundle\Entity\Type" , inversedBy="document")
     * @ORM\JoinColumn(name="type_id")
     */
    protected $type;



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
     * Set isEnable
     *
     * @param boolean $isEnable
     * @return Document
     */
    public function setIsEnable($isEnable)
    {
        $this->isEnable = $isEnable;

        return $this;
    }

    /**
     * Get isEnable
     *
     * @return boolean 
     */
    public function getIsEnable()
    {
        return $this->isEnable;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Document
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

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Document
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set profile
     *
     * @param \Altaway\UserBundle\Entity\Profile $profile
     * @return Document
     */
    public function setProfile(\Altaway\UserBundle\Entity\Profile $profile = null)
    {
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

    /**
     * Set media
     *
     * @param \Altaway\MediaBundle\Entity\Media $media
     * @return Document
     */
    public function setMedia(\Altaway\MediaBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \Altaway\MediaBundle\Entity\Media 
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set type
     *
     * @param \Altaway\UserBundle\Entity\Type $type
     * @return Document
     */
    public function setType(\Altaway\UserBundle\Entity\Type $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Altaway\UserBundle\Entity\Type 
     */
    public function getType()
    {
        return $this->type;
    }
}
