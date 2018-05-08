<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CoreBundle\Entity\Deberes
 *
 * @ORM\Entity()
 * @ORM\Table(name="deberes")
 */
class Deberes
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $idd;

    /**
     * @ORM\Column(type="string", length=550, nullable=true)
     */
    protected $deber;

    public function __construct()
    {
    }

    /**
     * Set the value of idd.
     *
     * @param integer $idd
     * @return \CoreBundle\Entity\Deberes
     */
    public function setIdd($idd)
    {
        $this->idd = $idd;

        return $this;
    }

    /**
     * Get the value of idd.
     *
     * @return integer
     */
    public function getIdd()
    {
        return $this->idd;
    }

    /**
     * Set the value of deber.
     *
     * @param string $deber
     * @return \CoreBundle\Entity\Deberes
     */
    public function setDeber($deber)
    {
        $this->deber = $deber;

        return $this;
    }

    /**
     * Get the value of deber.
     *
     * @return string
     */
    public function getDeber()
    {
        return $this->deber;
    }

    public function __sleep()
    {
        return array('idd', 'deber');
    }
}