<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CoreBundle\Entity\HojaEspecificacion
 *
 * @ORM\Entity()
 * @ORM\Table(name="hoja_especificacion")
 */
class HojaEspecificacion
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idhe;

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
    protected $no_id;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $modelo;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $fecha;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $ano_fabricacion;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $ubicacion_fisica;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $capacidad;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $dimensiones;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=10, nullable=true)
     */
    protected $peso_total;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $caudal;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=10, nullable=true)
     */
    protected $temperatura;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=10, nullable=true)
     */
    protected $voltaje;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=10, nullable=true)
     */
    protected $presion;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $funcion;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $especificaciones_fab;

    /**
     * @ORM\Column(type="string", length=160, nullable=true)
     */
    protected $observaciones;

    /**
     * @Gedmo\Timestampable(on="create", field="creado")
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created_at;

    /**
     * @ORM\OneToMany(targetEntity="Certificaciones", mappedBy="hojaEspecificacion")
     * @ORM\JoinColumn(name="idhe", referencedColumnName="hoja_especificacion_idhe", nullable=false)
     */
    protected $certificaciones;

    public function __construct()
    {
        $this->certificaciones = new ArrayCollection();
    }

    /**
     * Set the value of idhe.
     *
     * @param integer $idhe
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function setIdhe($idhe)
    {
        $this->idhe = $idhe;

        return $this;
    }

    /**
     * Get the value of idhe.
     *
     * @return integer
     */
    public function getIdhe()
    {
        return $this->idhe;
    }

    /**
     * Set the value of equipo.
     *
     * @param string $equipo
     * @return \CoreBundle\Entity\HojaEspecificacion
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
     * @return \CoreBundle\Entity\HojaEspecificacion
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
     * @return \CoreBundle\Entity\HojaEspecificacion
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
     * @return \CoreBundle\Entity\HojaEspecificacion
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
     * @return \CoreBundle\Entity\HojaEspecificacion
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
     * Set the value of no_id.
     *
     * @param integer $no_id
     * @return \CoreBundle\Entity\HojaEspecificacion
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
     * @return \CoreBundle\Entity\HojaEspecificacion
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
     * Set the value of fecha.
     *
     * @param \DateTime $fecha
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of fecha.
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of ano_fabricacion.
     *
     * @param integer $ano_fabricacion
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function setAnoFabricacion($ano_fabricacion)
    {
        $this->ano_fabricacion = $ano_fabricacion;

        return $this;
    }

    /**
     * Get the value of ano_fabricacion.
     *
     * @return integer
     */
    public function getAnoFabricacion()
    {
        return $this->ano_fabricacion;
    }

    /**
     * Set the value of ubicacion_fisica.
     *
     * @param string $ubicacion_fisica
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function setUbicacionFisica($ubicacion_fisica)
    {
        $this->ubicacion_fisica = $ubicacion_fisica;

        return $this;
    }

    /**
     * Get the value of ubicacion_fisica.
     *
     * @return string
     */
    public function getUbicacionFisica()
    {
        return $this->ubicacion_fisica;
    }

    /**
     * Set the value of capacidad.
     *
     * @param string $capacidad
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    /**
     * Get the value of capacidad.
     *
     * @return string
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * Set the value of dimensiones.
     *
     * @param integer $dimensiones
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function setDimensiones($dimensiones)
    {
        $this->dimensiones = $dimensiones;

        return $this;
    }

    /**
     * Get the value of dimensiones.
     *
     * @return integer
     */
    public function getDimensiones()
    {
        return $this->dimensiones;
    }

    /**
     * Set the value of peso_total.
     *
     * @param float $peso_total
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function setPesoTotal($peso_total)
    {
        $this->peso_total = $peso_total;

        return $this;
    }

    /**
     * Get the value of peso_total.
     *
     * @return float
     */
    public function getPesoTotal()
    {
        return $this->peso_total;
    }

    /**
     * Set the value of caudal.
     *
     * @param string $caudal
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function setCaudal($caudal)
    {
        $this->caudal = $caudal;

        return $this;
    }

    /**
     * Get the value of caudal.
     *
     * @return string
     */
    public function getCaudal()
    {
        return $this->caudal;
    }

    /**
     * Set the value of temperatura.
     *
     * @param float $temperatura
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function setTemperatura($temperatura)
    {
        $this->temperatura = $temperatura;

        return $this;
    }

    /**
     * Get the value of temperatura.
     *
     * @return float
     */
    public function getTemperatura()
    {
        return $this->temperatura;
    }

    /**
     * Set the value of voltaje.
     *
     * @param float $voltaje
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function setVoltaje($voltaje)
    {
        $this->voltaje = $voltaje;

        return $this;
    }

    /**
     * Get the value of voltaje.
     *
     * @return float
     */
    public function getVoltaje()
    {
        return $this->voltaje;
    }

    /**
     * Set the value of presion.
     *
     * @param float $presion
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function setPresion($presion)
    {
        $this->presion = $presion;

        return $this;
    }

    /**
     * Get the value of presion.
     *
     * @return float
     */
    public function getPresion()
    {
        return $this->presion;
    }

    /**
     * Set the value of funcion.
     *
     * @param string $funcion
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function setFuncion($funcion)
    {
        $this->funcion = $funcion;

        return $this;
    }

    /**
     * Get the value of funcion.
     *
     * @return string
     */
    public function getFuncion()
    {
        return $this->funcion;
    }

    /**
     * Set the value of especificaciones_fab.
     *
     * @param string $especificaciones_fab
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function setEspecificacionesFab($especificaciones_fab)
    {
        $this->especificaciones_fab = $especificaciones_fab;

        return $this;
    }

    /**
     * Get the value of especificaciones_fab.
     *
     * @return string
     */
    public function getEspecificacionesFab()
    {
        return $this->especificaciones_fab;
    }

    /**
     * Set the value of observaciones.
     *
     * @param string $observaciones
     * @return \CoreBundle\Entity\HojaEspecificacion
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
     * @return \CoreBundle\Entity\HojaEspecificacion
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
     * Add Certificaciones entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Certificaciones $certificaciones
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function addCertificaciones(Certificaciones $certificaciones)
    {
        $this->certificaciones[] = $certificaciones;

        return $this;
    }

    /**
     * Remove Certificaciones entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Certificaciones $certificaciones
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function removeCertificaciones(Certificaciones $certificaciones)
    {
        $this->certificaciones->removeElement($certificaciones);

        return $this;
    }

    /**
     * Get Certificaciones entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCertificaciones()
    {
        return $this->certificaciones;
    }

    public function __sleep()
    {
        return array('idhe', 'equipo', 'serial', 'marca', 'fabricante', 'critico', 'no_id', 'modelo', 'fecha', 'ano_fabricacion', 'ubicacion_fisica', 'capacidad', 'dimensiones', 'peso_total', 'caudal', 'temperatura', 'voltaje', 'presion', 'funcion', 'especificaciones_fab', 'observaciones', 'created_at');
    }
}