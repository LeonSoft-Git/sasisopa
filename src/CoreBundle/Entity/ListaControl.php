<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\ListaControl
 *
 * @ORM\Entity()
 * @ORM\Table(name="lista_control")
 */
class ListaControl
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $idlc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $clave;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $no_revision;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $fecha_ultima;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $nombre_registro;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $responsable;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $ubicacion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $tiempo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $archivo_tiempo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $destruccion;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $papel;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $electronico;

    /**
     * @ORM\Column(type="text", length=350, nullable=true)
     */
    protected $observaciones;

    public function __construct()
    {
    }

    /**
     * Set the value of idlc.
     *
     * @param integer $idlc
     * @return \CoreBundle\Entity\ListaControl
     */
    public function setIdlc($idlc)
    {
        $this->idlc = $idlc;

        return $this;
    }

    /**
     * Get the value of idlc.
     *
     * @return integer
     */
    public function getIdlc()
    {
        return $this->idlc;
    }

    /**
     * Set the value of clave.
     *
     * @param integer $clave
     * @return \CoreBundle\Entity\ListaControl
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get the value of clave.
     *
     * @return integer
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set the value of no_revision.
     *
     * @param integer $no_revision
     * @return \CoreBundle\Entity\ListaControl
     */
    public function setNoRevision($no_revision)
    {
        $this->no_revision = $no_revision;

        return $this;
    }

    /**
     * Get the value of no_revision.
     *
     * @return integer
     */
    public function getNoRevision()
    {
        return $this->no_revision;
    }

    /**
     * Set the value of fecha_ultima.
     *
     * @param \DateTime $fecha_ultima
     * @return \CoreBundle\Entity\ListaControl
     */
    public function setFechaUltima($fecha_ultima)
    {
        $this->fecha_ultima = $fecha_ultima;

        return $this;
    }

    /**
     * Get the value of fecha_ultima.
     *
     * @return \DateTime
     */
    public function getFechaUltima()
    {
        return $this->fecha_ultima;
    }

    /**
     * Set the value of nombre_registro.
     *
     * @param string $nombre_registro
     * @return \CoreBundle\Entity\ListaControl
     */
    public function setNombreRegistro($nombre_registro)
    {
        $this->nombre_registro = $nombre_registro;

        return $this;
    }

    /**
     * Get the value of nombre_registro.
     *
     * @return string
     */
    public function getNombreRegistro()
    {
        return $this->nombre_registro;
    }

    /**
     * Set the value of responsable.
     *
     * @param string $responsable
     * @return \CoreBundle\Entity\ListaControl
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get the value of responsable.
     *
     * @return string
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set the value of ubicacion.
     *
     * @param string $ubicacion
     * @return \CoreBundle\Entity\ListaControl
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
     * Set the value of tiempo.
     *
     * @param integer $tiempo
     * @return \CoreBundle\Entity\ListaControl
     */
    public function setTiempo($tiempo)
    {
        $this->tiempo = $tiempo;

        return $this;
    }

    /**
     * Get the value of tiempo.
     *
     * @return integer
     */
    public function getTiempo()
    {
        return $this->tiempo;
    }

    /**
     * Set the value of archivo_tiempo.
     *
     * @param integer $archivo_tiempo
     * @return \CoreBundle\Entity\ListaControl
     */
    public function setArchivoTiempo($archivo_tiempo)
    {
        $this->archivo_tiempo = $archivo_tiempo;

        return $this;
    }

    /**
     * Get the value of archivo_tiempo.
     *
     * @return integer
     */
    public function getArchivoTiempo()
    {
        return $this->archivo_tiempo;
    }

    /**
     * Set the value of destruccion.
     *
     * @param boolean $destruccion
     * @return \CoreBundle\Entity\ListaControl
     */
    public function setDestruccion($destruccion)
    {
        $this->destruccion = $destruccion;

        return $this;
    }

    /**
     * Get the value of destruccion.
     *
     * @return boolean
     */
    public function getDestruccion()
    {
        return $this->destruccion;
    }

    /**
     * Set the value of papel.
     *
     * @param boolean $papel
     * @return \CoreBundle\Entity\ListaControl
     */
    public function setPapel($papel)
    {
        $this->papel = $papel;

        return $this;
    }

    /**
     * Get the value of papel.
     *
     * @return boolean
     */
    public function getPapel()
    {
        return $this->papel;
    }

    /**
     * Set the value of electronico.
     *
     * @param boolean $electronico
     * @return \CoreBundle\Entity\ListaControl
     */
    public function setElectronico($electronico)
    {
        $this->electronico = $electronico;

        return $this;
    }

    /**
     * Get the value of electronico.
     *
     * @return boolean
     */
    public function getElectronico()
    {
        return $this->electronico;
    }

    /**
     * Set the value of observaciones.
     *
     * @param string $observaciones
     * @return \CoreBundle\Entity\ListaControl
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

    public function __sleep()
    {
        return array('idlc', 'clave', 'no_revision', 'fecha_ultima', 'nombre_registro', 'responsable', 'ubicacion', 'tiempo', 'archivo_tiempo', 'destruccion', 'papel', 'electronico', 'observaciones');
    }
}