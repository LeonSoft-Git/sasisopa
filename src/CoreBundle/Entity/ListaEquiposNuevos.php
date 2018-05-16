<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
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
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $planos_construidos;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $manuales_especificacion;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $requerimientos;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $planos;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $datos_tecnicos;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $informes;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $datos_necesarios;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $informes_ensayos;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $resultados;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $observacion;

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
     * Set the value of planos_construidos.
     *
     * @param string $planos_construidos
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setPlanosConstruidos($planos_construidos)
    {
        $this->planos_construidos = $planos_construidos;

        return $this;
    }

    /**
     * Get the value of planos_construidos.
     *
     * @return string
     */
    public function getPlanosConstruidos()
    {
        return $this->planos_construidos;
    }

    /**
     * Set the value of manuales_especificacion.
     *
     * @param string $manuales_especificacion
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setManualesEspecificacion($manuales_especificacion)
    {
        $this->manuales_especificacion = $manuales_especificacion;

        return $this;
    }

    /**
     * Get the value of manuales_especificacion.
     *
     * @return string
     */
    public function getManualesEspecificacion()
    {
        return $this->manuales_especificacion;
    }

    /**
     * Set the value of requerimientos.
     *
     * @param string $requerimientos
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setRequerimientos($requerimientos)
    {
        $this->requerimientos = $requerimientos;

        return $this;
    }

    /**
     * Get the value of requerimientos.
     *
     * @return string
     */
    public function getRequerimientos()
    {
        return $this->requerimientos;
    }

    /**
     * Set the value of planos.
     *
     * @param string $planos
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setPlanos($planos)
    {
        $this->planos = $planos;

        return $this;
    }

    /**
     * Get the value of planos.
     *
     * @return string
     */
    public function getPlanos()
    {
        return $this->planos;
    }

    /**
     * Set the value of datos_tecnicos.
     *
     * @param string $datos_tecnicos
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setDatosTecnicos($datos_tecnicos)
    {
        $this->datos_tecnicos = $datos_tecnicos;

        return $this;
    }

    /**
     * Get the value of datos_tecnicos.
     *
     * @return string
     */
    public function getDatosTecnicos()
    {
        return $this->datos_tecnicos;
    }

    /**
     * Set the value of informes.
     *
     * @param string $informes
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setInformes($informes)
    {
        $this->informes = $informes;

        return $this;
    }

    /**
     * Get the value of informes.
     *
     * @return string
     */
    public function getInformes()
    {
        return $this->informes;
    }

    /**
     * Set the value of datos_necesarios.
     *
     * @param string $datos_necesarios
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setDatosNecesarios($datos_necesarios)
    {
        $this->datos_necesarios = $datos_necesarios;

        return $this;
    }

    /**
     * Get the value of datos_necesarios.
     *
     * @return string
     */
    public function getDatosNecesarios()
    {
        return $this->datos_necesarios;
    }

    /**
     * Set the value of informes_ensayos.
     *
     * @param string $informes_ensayos
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setInformesEnsayos($informes_ensayos)
    {
        $this->informes_ensayos = $informes_ensayos;

        return $this;
    }

    /**
     * Get the value of informes_ensayos.
     *
     * @return string
     */
    public function getInformesEnsayos()
    {
        return $this->informes_ensayos;
    }

    /**
     * Set the value of resultados.
     *
     * @param string $resultados
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setResultados($resultados)
    {
        $this->resultados = $resultados;

        return $this;
    }

    /**
     * Get the value of resultados.
     *
     * @return string
     */
    public function getResultados()
    {
        return $this->resultados;
    }
    /**
     * Set the value of observacion.
     *
     * @param string $observacion
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get the value of observacion.
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
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

    public function __sleep()
    {
        return array('idlen', 'nombre_estacion', 'equipo', 'serial', 'marca', 'fabricante', 'critico', 'no_estacion', 'fecha_llenado', 'no_id', 'modelo', 'fecha_compra', 'ano_fabricacion', 'ubicacion_final', 'planos_construidos', 'manuales_especificacion', 'requerimientos', 'planos', 'datos_tecnicos', 'informes', 'datos_necesarios', 'informes_ensayos', 'resultados', 'observacion' , 'created_at');
    }
}