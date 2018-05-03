<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\Responsibilities
 *
 * @ORM\Entity()
 * @ORM\Table(name="responsibilities")
 */
class Responsibilities
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idr;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    protected $responsability;

    /**
     * @ORM\OneToMany(targetEntity="AddedResponsabilities", mappedBy="responsibilities")
     * @ORM\JoinColumn(name="idr", referencedColumnName="idr", nullable=false)
     */
    protected $addedResponsabilities;

    public function __construct()
    {
        $this->addedResponsabilities = new ArrayCollection();
    }

    /**
     * Set the value of idr.
     *
     * @param integer $idr
     * @return \CoreBundle\Entity\Responsibilities
     */
    public function setIdr($idr)
    {
        $this->idr = $idr;

        return $this;
    }

    /**
     * Get the value of idr.
     *
     * @return integer
     */
    public function getIdr()
    {
        return $this->idr;
    }

    /**
     * Set the value of responsability.
     *
     * @param string $responsability
     * @return \CoreBundle\Entity\Responsibilities
     */
    public function setResponsability($responsability)
    {
        $this->responsability = $responsability;

        return $this;
    }

    /**
     * Get the value of responsability.
     *
     * @return string
     */
    public function getResponsability()
    {
        return $this->responsability;
    }

    /**
     * Add AddedResponsabilities entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\AddedResponsabilities $addedResponsabilities
     * @return \CoreBundle\Entity\Responsibilities
     */
    public function addAddedResponsabilities(AddedResponsabilities $addedResponsabilities)
    {
        $this->addedResponsabilities[] = $addedResponsabilities;

        return $this;
    }

    /**
     * Remove AddedResponsabilities entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\AddedResponsabilities $addedResponsabilities
     * @return \CoreBundle\Entity\Responsibilities
     */
    public function removeAddedResponsabilities(AddedResponsabilities $addedResponsabilities)
    {
        $this->addedResponsabilities->removeElement($addedResponsabilities);

        return $this;
    }

    /**
     * Get AddedResponsabilities entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddedResponsabilities()
    {
        return $this->addedResponsabilities;
    }

    public function __sleep()
    {
        return array('idr', 'responsability');
    }
}