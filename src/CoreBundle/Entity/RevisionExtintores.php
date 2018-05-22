<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CoreBundle\Entity\RevisionExtintores
 *
 * @ORM\Entity()
 * @ORM\Table(name="revision_extintores")
 */
class RevisionExtintores
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idreevext;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $tipo;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $ubicacion;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $ubicacion_lugar;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $sello;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $nemotecnia;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $ultima_carga;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $obstaculos;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $ruedas;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $senalamientos;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $danos;

    /**
     * @Gedmo\Timestampable(on="create", field="creado")
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created_at;

    public function __construct()
    {
    }

    /**
     * Set the value of idreevext.
     *
     * @param integer $idreevext
     * @return \CoreBundle\Entity\RevisionExtintores
     */
    public function setIdreevext($idreevext)
    {
        $this->idreevext = $idreevext;

        return $this;
    }

    /**
     * Get the value of idreevext.
     *
     * @return integer
     */
    public function getIdreevext()
    {
        return $this->idreevext;
    }

    /**
     * Set the value of tipo.
     *
     * @param string $tipo
     * @return \CoreBundle\Entity\RevisionExtintores
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of tipo.
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of ubicacion.
     *
     * @param string $ubicacion
     * @return \CoreBundle\Entity\RevisionExtintores
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get the value of ubicacion.
     *
     * @return string
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set the value of ubicacion_lugar.
     *
     * @param integer $ubicacion_lugar
     * @return \CoreBundle\Entity\RevisionExtintores
     */
    public function setUbicacionLugar($ubicacion_lugar)
    {
        $this->ubicacion_lugar = $ubicacion_lugar;

        return $this;
    }

    /**
     * Get the value of ubicacion_lugar.
     *
     * @return integer
     */
    public function getUbicacionLugar()
    {
        return $this->ubicacion_lugar;
    }

    /**
     * Set the value of sello.
     *
     * @param integer $sello
     * @return \CoreBundle\Entity\RevisionExtintores
     */
    public function setSello($sello)
    {
        $this->sello = $sello;

        return $this;
    }

    /**
     * Get the value of sello.
     *
     * @return integer
     */
    public function getSello()
    {
        return $this->sello;
    }

    /**
     * Set the value of nemotecnia.
     *
     * @param integer $nemotecnia
     * @return \CoreBundle\Entity\RevisionExtintores
     */
    public function setNemotecnia($nemotecnia)
    {
        $this->nemotecnia = $nemotecnia;

        return $this;
    }

    /**
     * Get the value of nemotecnia.
     *
     * @return integer
     */
    public function getNemotecnia()
    {
        return $this->nemotecnia;
    }

    /**
     * Set the value of ultima_carga.
     *
     * @param integer $ultima_carga
     * @return \CoreBundle\Entity\RevisionExtintores
     */
    public function setUltimaCarga($ultima_carga)
    {
        $this->ultima_carga = $ultima_carga;

        return $this;
    }

    /**
     * Get the value of ultima_carga.
     *
     * @return integer
     */
    public function getUltimaCarga()
    {
        return $this->ultima_carga;
    }

    /**
     * Set the value of obstaculos.
     *
     * @param integer $obstaculos
     * @return \CoreBundle\Entity\RevisionExtintores
     */
    public function setObstaculos($obstaculos)
    {
        $this->obstaculos = $obstaculos;

        return $this;
    }

    /**
     * Get the value of obstaculos.
     *
     * @return integer
     */
    public function getObstaculos()
    {
        return $this->obstaculos;
    }

    /**
     * Set the value of ruedas.
     *
     * @param integer $ruedas
     * @return \CoreBundle\Entity\RevisionExtintores
     */
    public function setRuedas($ruedas)
    {
        $this->ruedas = $ruedas;

        return $this;
    }

    /**
     * Get the value of ruedas.
     *
     * @return integer
     */
    public function getRuedas()
    {
        return $this->ruedas;
    }

    /**
     * Set the value of senalamientos.
     *
     * @param integer $senalamientos
     * @return \CoreBundle\Entity\RevisionExtintores
     */
    public function setSenalamientos($senalamientos)
    {
        $this->senalamientos = $senalamientos;

        return $this;
    }

    /**
     * Get the value of senalamientos.
     *
     * @return integer
     */
    public function getSenalamientos()
    {
        return $this->senalamientos;
    }

    /**
     * Set the value of danos.
     *
     * @param integer $danos
     * @return \CoreBundle\Entity\RevisionExtintores
     */
    public function setDanos($danos)
    {
        $this->danos = $danos;

        return $this;
    }

    /**
     * Get the value of danos.
     *
     * @return integer
     */
    public function getDanos()
    {
        return $this->danos;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\RevisionExtintores
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

    public function __sleep()
    {
        return array('idreevext', 'tipo', 'ubicacion', 'ubicacion_lugar', 'sello', 'nemotecnia', 'ultima_carga', 'obstaculos', 'ruedas', 'senalamientos', 'danos', 'created_at');
    }
}