<?php


namespace Altaway\MediaBundle\Entity;

use Sonata\MediaBundle\Entity\BaseMedia as BaseMedia;

class Media extends BaseMedia
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var \Altaway\UserBundle\Entity\Document
     *
     * @ORM\OneToOne(targetEntity="Altaway\UserBundle\Entity\Document" mappedBy="media")
     */
    protected $document;

    /**
     * @var \Altaway\UserBundle\Entity\Profile
     */
    private $profile;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set profile
     *
     * @param \Altaway\UserBundle\Entity\Profile $profile
     * @return Media
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
     * Set document
     *
     * @param \Altaway\UserBundle\Entity\Document $document
     * @return Document
     */
    public function setDocument(\Altaway\UserBundle\Entity\Document $document = null)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return \Altaway\UserBundle\Entity\Document
     */
    public function getDocument()
    {
        return $this->document;
    }


}
