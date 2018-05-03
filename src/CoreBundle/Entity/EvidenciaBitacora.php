<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CoreBundle\Entity\EvidenciaBitacora
 *
 * @ORM\Entity()
 * @ORM\Table(name="evidencia_bitacora")
 */
class EvidenciaBitacora
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $ideb;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    protected $evidencia;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    protected $observaciones;

    /**
     * @Gedmo\Timestampable(on="create", field="creado")
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created_at;

    /**
     * @ORM\OneToMany(targetEntity="Bitacora", mappedBy="evidenciaBitacora")
     * @ORM\JoinColumn(name="ideb", referencedColumnName="ideb", nullable=false)
     */
    protected $bitacoras;

    public function __construct()
    {
        $this->bitacoras = new ArrayCollection();
    }

    /**
     * Set the value of ideb.
     *
     * @param integer $ideb
     * @return \CoreBundle\Entity\EvidenciaBitacora
     */
    public function setIdeb($ideb)
    {
        $this->ideb = $ideb;

        return $this;
    }

    /**
     * Get the value of ideb.
     *
     * @return integer
     */
    public function getIdeb()
    {
        return $this->ideb;
    }

    /**
     * Set the value of evidencia.
     *
     * @param string $evidencia
     * @return \CoreBundle\Entity\EvidenciaBitacora
     */
    public function setEvidencia($evidencia)
    {
        $this->evidencia = $evidencia;

        return $this;
    }

    /**
     * Get the value of evidencia.
     *
     * @return string
     */
    public function getEvidencia()
    {
        return $this->evidencia;
    }

    /**
     * Set the value of observaciones.
     *
     * @param string $observaciones
     * @return \CoreBundle\Entity\EvidenciaBitacora
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get the value of observaciones.
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\EvidenciaBitacora
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of created_at.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Add Bitacora entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Bitacora $bitacora
     * @return \CoreBundle\Entity\EvidenciaBitacora
     */
    public function addBitacora(Bitacora $bitacora)
    {
        $this->bitacoras[] = $bitacora;

        return $this;
    }

    /**
     * Remove Bitacora entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Bitacora $bitacora
     * @return \CoreBundle\Entity\EvidenciaBitacora
     */
    public function removeBitacora(Bitacora $bitacora)
    {
        $this->bitacoras->removeElement($bitacora);

        return $this;
    }

    /**
     * Get Bitacora entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBitacoras()
    {
        return $this->bitacoras;
    }

    public function __sleep()
    {
        return array('ideb', 'evidencia', 'observaciones', 'created_at');
    }
}