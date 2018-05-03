<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\Activities
 *
 * @ORM\Entity()
 * @ORM\Table(name="activities")
 */
class Activities
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idac;

    /**
     * @ORM\Column(type="string", length=550, nullable=true)
     */
    protected $activity;

    /**
     * @ORM\OneToMany(targetEntity="AddedResponsabilities", mappedBy="activities")
     * @ORM\JoinColumn(name="idac", referencedColumnName="idac", nullable=false)
     */
    protected $addedResponsabilities;

    public function __construct()
    {
        $this->addedResponsabilities = new ArrayCollection();
    }

    /**
     * Set the value of idac.
     *
     * @param integer $idac
     * @return \CoreBundle\Entity\Activities
     */
    public function setIdac($idac)
    {
        $this->idac = $idac;

        return $this;
    }

    /**
     * Get the value of idac.
     *
     * @return integer
     */
    public function getIdac()
    {
        return $this->idac;
    }

    /**
     * Set the value of activity.
     *
     * @param string $activity
     * @return \CoreBundle\Entity\Activities
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get the value of activity.
     *
     * @return string
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Add AddedResponsabilities entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\AddedResponsabilities $addedResponsabilities
     * @return \CoreBundle\Entity\Activities
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
     * @return \CoreBundle\Entity\Activities
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
        return array('idac', 'activity');
    }
}