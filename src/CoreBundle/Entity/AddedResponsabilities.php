<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\AddedResponsabilities
 *
 * @ORM\Entity()
 * @ORM\Table(name="added_responsabilities", indexes={@ORM\Index(name="fk_added_responsabilities_activities_idx", columns={"idac"}), @ORM\Index(name="fk_added_responsabilities_responsibilities1_idx", columns={"idr"}), @ORM\Index(name="fk_added_responsabilities_usuarios1_idx", columns={"idu"})})
 */
class AddedResponsabilities
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idar;

    /**
     * @ORM\ManyToOne(targetEntity="Activities", inversedBy="addedResponsabilities")
     * @ORM\JoinColumn(name="idac", referencedColumnName="idac", nullable=false)
     */
    protected $activities;

    /**
     * @ORM\ManyToOne(targetEntity="Responsibilities", inversedBy="addedResponsabilities")
     * @ORM\JoinColumn(name="idr", referencedColumnName="idr", nullable=false)
     */
    protected $responsibilities;

    /**
     * @ORM\ManyToOne(targetEntity="Usuarios", inversedBy="addedResponsabilities")
     * @ORM\JoinColumn(name="idu", referencedColumnName="idu", nullable=false)
     */
    protected $usuarios;

    public function __construct()
    {
    }

    /**
     * Set the value of idar.
     *
     * @param integer $idar
     * @return \CoreBundle\Entity\AddedResponsabilities
     */
    public function setIdar($idar)
    {
        $this->idar = $idar;

        return $this;
    }

    /**
     * Get the value of idar.
     *
     * @return integer
     */
    public function getIdar()
    {
        return $this->idar;
    }

    /**
     * Set the value of idac.
     *
     * @param integer $idac
     * @return \CoreBundle\Entity\AddedResponsabilities
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
     * Set the value of idr.
     *
     * @param integer $idr
     * @return \CoreBundle\Entity\AddedResponsabilities
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
     * Set the value of idu.
     *
     * @param integer $idu
     * @return \CoreBundle\Entity\AddedResponsabilities
     */
    public function setIdu($idu)
    {
        $this->idu = $idu;

        return $this;
    }

    /**
     * Get the value of idu.
     *
     * @return integer
     */
    public function getIdu()
    {
        return $this->idu;
    }

    /**
     * Set Activities entity (many to one).
     *
     * @param \CoreBundle\Entity\Activities $activities
     * @return \CoreBundle\Entity\AddedResponsabilities
     */
    public function setActivities(Activities $activities = null)
    {
        $this->activities = $activities;

        return $this;
    }

    /**
     * Get Activities entity (many to one).
     *
     * @return \CoreBundle\Entity\Activities
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * Set Responsibilities entity (many to one).
     *
     * @param \CoreBundle\Entity\Responsibilities $responsibilities
     * @return \CoreBundle\Entity\AddedResponsabilities
     */
    public function setResponsibilities(Responsibilities $responsibilities = null)
    {
        $this->responsibilities = $responsibilities;

        return $this;
    }

    /**
     * Get Responsibilities entity (many to one).
     *
     * @return \CoreBundle\Entity\Responsibilities
     */
    public function getResponsibilities()
    {
        return $this->responsibilities;
    }

    /**
     * Set Usuarios entity (many to one).
     *
     * @param \CoreBundle\Entity\Usuarios $usuarios
     * @return \CoreBundle\Entity\AddedResponsabilities
     */
    public function setUsuarios(Usuarios $usuarios = null)
    {
        $this->usuarios = $usuarios;

        return $this;
    }

    /**
     * Get Usuarios entity (many to one).
     *
     * @return \CoreBundle\Entity\Usuarios
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    public function __sleep()
    {
        return array('idar', 'idac', 'idr', 'idu');
    }
}