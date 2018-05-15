<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\ListaEquiposNuevos
 *
 * @ORM\Entity()
 * @ORM\Table(name="lista_equipos_nuevos")
 */
class ListaEquiposNuevos
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idlen;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $nombre_estacion;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $equipo;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $serial;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $marca;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $fabricante;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $critico;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $no_estacion;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $fecha_llenado;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $no_id;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $modelo;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $fecha_compra;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $ano_fabricacion;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $ubicacion_final;

    /**
     * @Gedmo\Timestampable(on="create", field="creado")
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created_at;

    /**
     * @ORM\OneToOne(targetEntity="EspecificacionesTecnicasEquipnuev", mappedBy="listaEquiposNuevos")
     */
    protected $especificacionesTecnicasEquipnuev;

    public function __construct()
    {
        $this->especificacionesTecnicasEquipnuevs = new ArrayCollection();
    }

    /**
     * Set the value of idlen.
     *
     * @param integer $idlen
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setIdlen($idlen)
    {
        $this->idlen = $idlen;

        return $this;
    }

    /**
     * Get the value of idlen.
     *
     * @return integer
     */
    public function getIdlen()
    {
        return $this->idlen;
    }

    /**
     * Set the value of nombre_estacion.
     *
     * @param string $nombre_estacion
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setNombreEstacion($nombre_estacion)
    {
        $this->nombre_estacion = $nombre_estacion;

        return $this;
    }

    /**
     * Get the value of nombre_estacion.
     *
     * @return string
     */
    public function getNombreEstacion()
    {
        return $this->nombre_estacion;
    }

    /**
     * Set the value of equipo.
     *
     * @param string $equipo
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setEquipo($equipo)
    {
        $this->equipo = $equipo;

        return $this;
    }

    /**
     * Get the value of equipo.
     *
     * @return string
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * Set the value of serial.
     *
     * @param string $serial
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;

        return $this;
    }

    /**
     * Get the value of serial.
     *
     * @return string
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Set the value of marca.
     *
     * @param string $marca
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get the value of marca.
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of fabricante.
     *
     * @param string $fabricante
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setFabricante($fabricante)
    {
        $this->fabricante = $fabricante;

        return $this;
    }

    /**
     * Get the value of fabricante.
     *
     * @return string
     */
    public function getFabricante()
    {
        return $this->fabricante;
    }

    /**
     * Set the value of critico.
     *
     * @param string $critico
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setCritico($critico)
    {
        $this->critico = $critico;

        return $this;
    }

    /**
     * Get the value of critico.
     *
     * @return string
     */
    public function getCritico()
    {
        return $this->critico;
    }

    /**
     * Set the value of no_estacion.
     *
     * @param integer $no_estacion
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setNoEstacion($no_estacion)
    {
        $this->no_estacion = $no_estacion;

        return $this;
    }

    /**
     * Get the value of no_estacion.
     *
     * @return integer
     */
    public function getNoEstacion()
    {
        return $this->no_estacion;
    }

    /**
     * Set the value of fecha_llenado.
     *
     * @param \DateTime $fecha_llenado
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setFechaLlenado($fecha_llenado)
    {
        $this->fecha_llenado = $fecha_llenado;

        return $this;
    }

    /**
     * Get the value of fecha_llenado.
     *
     * @return \DateTime
     */
    public function getFechaLlenado()
    {
        return $this->fecha_llenado;
    }

    /**
     * Set the value of no_id.
     *
     * @param integer $no_id
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setNoId($no_id)
    {
        $this->no_id = $no_id;

        return $this;
    }

    /**
     * Get the value of no_id.
     *
     * @return integer
     */
    public function getNoId()
    {
        return $this->no_id;
    }

    /**
     * Set the value of modelo.
     *
     * @param string $modelo
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get the value of modelo.
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of fecha_compra.
     *
     * @param \DateTime $fecha_compra
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setFechaCompra($fecha_compra)
    {
        $this->fecha_compra = $fecha_compra;

        return $this;
    }

    /**
     * Get the value of fecha_compra.
     *
     * @return \DateTime
     */
    public function getFechaCompra()
    {
        return $this->fecha_compra;
    }

    /**
     * Set the value of ano_fabricacion.
     *
     * @param \DateTime $ano_fabricacion
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setAnoFabricacion($ano_fabricacion)
    {
        $this->ano_fabricacion = $ano_fabricacion;

        return $this;
    }

    /**
     * Get the value of ano_fabricacion.
     *
     * @return \DateTime
     */
    public function getAnoFabricacion()
    {
        return $this->ano_fabricacion;
    }

    /**
     * Set the value of ubicacion_final.
     *
     * @param string $ubicacion_final
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setUbicacionFinal($ubicacion_final)
    {
        $this->ubicacion_final = $ubicacion_final;

        return $this;
    }

    /**
     * Get the value of ubicacion_final.
     *
     * @return string
     */
    public function getUbicacionFinal()
    {
        return $this->ubicacion_final;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\ListaEquiposNuevos
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
     * Set EspecificacionesTecnicasEquipnuev entity (one to one).
     *
     * @param \CoreBundle\Entity\EspecificacionesTecnicasEquipnuev $especificacionesTecnicasEquipnuev
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setEspecificacionesTecnicasEquipnuev(EspecificacionesTecnicasEquipnuev $especificacionesTecnicasEquipnuev = null)
    {
        $especificacionesTecnicasEquipnuev->setListaEquiposNuevos($this);
        $this->especificacionesTecnicasEquipnuev = $especificacionesTecnicasEquipnuev;

        return $this;
    }

    /**
     * Get EspecificacionesTecnicasEquipnuev entity (one to one).
     *
     * @return \CoreBundle\Entity\EspecificacionesTecnicasEquipnuev
     */
    public function getEspecificacionesTecnicasEquipnuev()
    {
        return $this->especificacionesTecnicasEquipnuev;
    }

    public function __sleep()
    {
        return array('idlen', 'nombre_estacion', 'equipo', 'serial', 'marca', 'fabricante', 'critico', 'no_estacion', 'fecha_llenado', 'no_id', 'modelo', 'fecha_compra', 'ano_fabricacion', 'ubicacion_final', 'created_at');
    }
}