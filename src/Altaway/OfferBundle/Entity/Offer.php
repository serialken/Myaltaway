<?php

namespace Altaway\OfferBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sizannia\TranslationBundle\Annotation as Sizannia;

/**
 * Offer
 *
 * @ORM\Table("offer")
 * @ORM\Entity(repositoryClass="Altaway\OfferBundle\Repository\OfferRepository")
 * @Sizannia\TranslationClass()
 */
class Offer
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
     * @var integer
     *
     * @Sizannia\Original()
     * @ORM\ManyToOne(targetEntity="Offer", inversedBy="translations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Offer", mappedBy="reference", cascade={"remove"})
     */
    private $translations;

    /**
     * @var string
     *
     * @Sizannia\Language()
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * @Gedmo\Slug(fields={"publishAt", "title"}, dateFormat="Y-m")
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="shortTitle", type="string", length=25)
     */
    private $shortTitle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isEnable", type="boolean")
     */
    private $isEnable;

    /**
     * @var string
     *
     * @Sizannia\MaintainPropriety()
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var string
     *
     * @Sizannia\MaintainPropriety()
     * @ORM\Column(name="sector", type="string", length=255)
     */
    private $sector;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publishAt", type="datetime")
     */
    private $publishAt;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;

    /**
     * @var user $createdBy
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\ManyToOne(targetEntity="Altaway\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="createdBy", referencedColumnName="id")
     */
    private $createdBy;

    /**
     * @var user $updatedBy
     *
     * @Gedmo\Blameable(on="update")
     * @ORM\ManyToOne(targetEntity="Altaway\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="updatedBy", referencedColumnName="id")
     */
    private $updatedBy;

    /**
     * @ORM\OneToMany(targetEntity="Apply", mappedBy="offer", cascade={"remove"})
     */
    protected $applies;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->translations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setIsEnable(true);
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
     * Set title
     *
     * @param string $title
     * @return Offer
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Offer
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set shortTitle
     *
     * @param string $shortTitle
     * @return Offer
     */
    public function setShortTitle($shortTitle)
    {
        $this->shortTitle = $shortTitle;

        return $this;
    }

    /**
     * Get shortTitle
     *
     * @return string 
     */
    public function getShortTitle()
    {
        return $this->shortTitle;
    }

    /**
     * Set isEnable
     *
     * @param boolean $isEnable
     * @return Offer
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
     * Set body
     *
     * @param string $body
     * @return Offer
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set publishAt
     *
     * @param \DateTime $publishAt
     * @return Offer
     */
    public function setPublishAt($publishAt)
    {
        $this->publishAt = $publishAt;

        return $this;
    }

    /**
     * Get publishAt
     *
     * @return \DateTime
     */
    public function getPublishAt()
    {
        return $this->publishAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Offer
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
     * @return Offer
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
     * Set location
     *
     * @param string $location
     * @return Offer
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    public function __toString ()
    {
        return isset ($this->shortTitle) ? $this->shortTitle : 'n/a';
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Offer
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set reference
     *
     * @param \Altaway\OfferBundle\Entity\Offer $reference
     * @return Offer
     */
    public function setReference(\Altaway\OfferBundle\Entity\Offer $reference = null)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return \Altaway\OfferBundle\Entity\Offer
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Add translations
     *
     * @param \Altaway\OfferBundle\Entity\Offer $translations
     * @return Offer
     */
    public function addTranslation(\Altaway\OfferBundle\Entity\Offer $translations)
    {
        $this->translations[] = $translations;

        return $this;
    }

    /**
     * Remove translations
     *
     * @param \Altaway\OfferBundle\Entity\Offer $translations
     */
    public function removeTranslation(\Altaway\OfferBundle\Entity\Offer $translations)
    {
        $this->translations->removeElement($translations);
    }

    /**
     * Get translations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * Add applies
     *
     * @param \Altaway\OfferBundle\Entity\Apply $applies
     * @return Offer
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
     * Set sector
     *
     * @param string $sector
     * @return Offer
     */
    public function setSector($sector)
    {
        $this->sector = $sector;

        return $this;
    }

    /**
     * Get sector
     *
     * @return string 
     */
    public function getSector()
    {
        return $this->sector;
    }

    /**
     * Set createdBy
     *
     * @param \Altaway\UserBundle\Entity\User $createdBy
     * @return Offer
     */
    public function setCreatedBy(\Altaway\UserBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \Altaway\UserBundle\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param \Altaway\UserBundle\Entity\User $updatedBy
     * @return Offer
     */
    public function setUpdatedBy(\Altaway\UserBundle\Entity\User $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return \Altaway\UserBundle\Entity\User 
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }
}
