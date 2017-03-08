<?php

namespace Altaway\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sizannia\TranslationBundle\Annotation as Sizannia;

/**
 * Page
 *
 * @ORM\Table(name="page")
 * @ORM\Entity(repositoryClass="Altaway\PageBundle\Repository\PageRepository")
 * @Sizannia\TranslationClass()
 */
class Page
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
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="translations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Page", mappedBy="reference", cascade={"remove"})
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
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=255, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var float
     *
     * @Sizannia\MaintainPropriety()
     * @ORM\Column(name="rank", type="integer")
     */
    private $rank;

    /**
     * @var string
     *
     * @ORM\Column(name="subtitle", type="string", length=255)
     */
    private $subtitle;

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
     * Constructor
     */
    public function __construct()
    {
        $this->translations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setTitle("");
        $this->setSubtitle("");
        $this->setRank(0);
        $this->setBody("");

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
     * @return Page
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
     * @return Page
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
     * Set body
     *
     * @param string $body
     * @return Page
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
     * Set rank
     *
     * @param float $rank
     * @return Page
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return float 
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set subtitle
     *
     * @param string $subtitle
     * @return Page
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string 
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Page
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
     * @param \Altaway\PageBundle\Entity\Page $reference
     * @return Page
     */
    public function setReference(\Altaway\PageBundle\Entity\Page $reference = null)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return \Altaway\PageBundle\Entity\Page 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Add translations
     *
     * @param \Altaway\PageBundle\Entity\Page $translations
     * @return Page
     */
    public function addTranslation(\Altaway\PageBundle\Entity\Page $translations)
    {
        $this->translations[] = $translations;

        return $this;
    }

    /**
     * Remove translations
     *
     * @param \Altaway\PageBundle\Entity\Page $translations
     */
    public function removeTranslation(\Altaway\PageBundle\Entity\Page $translations)
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

    public function __toString ()
    {
        return isset ($this->title) ? $this->title : 'n/a';
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Page
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
     * @return Page
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
     * Set createdBy
     *
     * @param \Altaway\UserBundle\Entity\User $createdBy
     * @return Page
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
     * @return Page
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
