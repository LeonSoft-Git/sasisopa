<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\Bitacora
 *
 * @ORM\Entity()
 * @ORM\Table(name="bitacora", indexes={@ORM\Index(name="fk_bitacora_evidencia_bitacora1_idx", columns={"ideb"})})
 */
class Bitacora
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idb;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $idu;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $hora_inicio;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $hora_termino;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $firma;

    /**
     * @ORM\ManyToOne(targetEntity="EvidenciaBitacora", inversedBy="bitacoras")
     * @ORM\JoinColumn(name="ideb", referencedColumnName="ideb", nullable=false)
     */
    protected $evidenciaBitacora;

    public function __construct()
    {
    }

    /**
     * Set the value of idb.
     *
     * @param integer $idb
     * @return \CoreBundle\Entity\Bitacora
     */
    public function setIdb($idb)
    {
        $this->idb = $idb;

        return $this;
    }

    /**
     * Get the value of idb.
     *
     * @return integer
     */
    public function getIdb()
    {
        return $this->idb;
    }

    /**
     * Set the value of ideb.
     *
     * @param integer $ideb
     * @return \CoreBundle\Entity\Bitacora
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
     * Set the value of idu.
     *
     * @param integer $idu
     * @return \CoreBundle\Entity\Bitacora
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
     * Set the value of hora_inicio.
     *
     * @param \DateTime $hora_inicio
     * @return \CoreBundle\Entity\Bitacora
     */
    public function setHoraInicio($hora_inicio)
    {
        $this->hora_inicio = $hora_inicio;

        return $this;
    }

    /**
     * Get the value of hora_inicio.
     *
     * @return \DateTime
     */
    public function getHoraInicio()
    {
        return $this->hora_inicio;
    }

    /**
     * Set the value of hora_termino.
     *
     * @param \DateTime $hora_termino
     * @return \CoreBundle\Entity\Bitacora
     */
    public function setHoraTermino($hora_termino)
    {
        $this->hora_termino = $hora_termino;

        return $this;
    }

    /**
     * Get the value of hora_termino.
     *
     * @return \DateTime
     */
    public function getHoraTermino()
    {
        return $this->hora_termino;
    }

    /**
     * Set the value of firma.
     *
     * @param string $firma
     * @return \CoreBundle\Entity\Bitacora
     */
    public function setFirma($firma)
    {
        $this->firma = $firma;

        return $this;
    }

    /**
     * Get the value of firma.
     *
     * @return string
     */
    public function getFirma()
    {
        return $this->firma;
    }

    /**
     * Set EvidenciaBitacora entity (many to one).
     *
     * @param \CoreBundle\Entity\EvidenciaBitacora $evidenciaBitacora
     * @return \CoreBundle\Entity\Bitacora
     */
    public function setEvidenciaBitacora(EvidenciaBitacora $evidenciaBitacora = null)
    {
        $this->evidenciaBitacora = $evidenciaBitacora;

        return $this;
    }

    /**
     * Get EvidenciaBitacora entity (many to one).
     *
     * @return \CoreBundle\Entity\EvidenciaBitacora
     */
    public function getEvidenciaBitacora()
    {
        return $this->evidenciaBitacora;
    }

    public function __sleep()
    {
        return array('idb', 'ideb', 'idu', 'hora_inicio', 'hora_termino', 'firma');
    }
}