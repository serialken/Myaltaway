<?php

namespace Altaway\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Type
 *
 * @ORM\Table("type")
 * @ORM\Entity(repositoryClass="Altaway\UserBundle\Repository\TypeRepository")
 */
class Type
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="createdAt", type="time")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updatedAt", type="time")
     */
    private $updatedAt;

    /**
     * @var user $createdBy
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\ManyToOne(targetEntity="Altaway\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="createdBy", referencedColumnName="id")
     */
    protected $createdBy;

    /**
     * @var user $updatedBy
     *
     * @Gedmo\Blameable(on="update")
     * @ORM\ManyToOne(targetEntity="Altaway\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="updatedBy", referencedColumnName="id")
     */
    protected $updatedBy;

    /**
     * @var \Altaway\UserBundle\Entity\Document
     *
     * @ORM\OneToMany(targetEntity="Altaway\UserBundle\Entity\Document", mappedBy="type")
     */
    protected $document;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->document = new \Doctrine\Common\Collections\ArrayCollection();
    }

    // To rewrite The name in the "Fil d'ariane"
    public function __toString ()
    {
        return isset ($this->title) ? $this->title : 'n/a';
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
     * @return Type
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Type
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
     * @return Type
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
     * @return Type
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
     * @return Type
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

    /**
     * Add document
     *
     * @param \Altaway\UserBundle\Entity\Document $document
     * @return Type
     */
    public function addDocument(\Altaway\UserBundle\Entity\Document $document)
    {
        $this->document[] = $document;

        return $this;
    }

    /**
     * Remove document
     *
     * @param \Altaway\UserBundle\Entity\Document $document
     */
    public function removeDocument(\Altaway\UserBundle\Entity\Document $document)
    {
        $this->document->removeElement($document);
    }

    /**
     * Get document
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocument()
    {
        return $this->document;
    }
}
