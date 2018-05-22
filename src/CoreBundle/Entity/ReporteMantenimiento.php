<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * CoreBundle\Entity\ReporteMantenimiento
 *
 * @ORM\Entity()
 * @ORM\Table(name="reporte_mantenimiento")
 */
class ReporteMantenimiento
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idrm;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $direccion;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $no_estacion;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $fecha_realizacion;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    protected $horario_inicio;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    protected $horario_termino;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $mantenimiento_int;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $mantenimiento_ext;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $tipo_prev;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $tipo_correctivo;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $area;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $nombre_equipo;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $trabajo_solicitado;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $objetivo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $alcance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $trabajo_realizado;


    /**
     * @Gedmo\Timestampable(on="create", field="creado")
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created_at;

    /**
     * @ORM\OneToMany(targetEntity="Involucrados", mappedBy="reporteMantenimiento")
     * @ORM\JoinColumn(name="idrm", referencedColumnName="reporte_mantenimiento_idrm", nullable=false)
     */
    protected $involucrados;

    /**
     * @ORM\OneToMany(targetEntity="RecursosNecesarios", mappedBy="reporteMantenimiento")
     * @ORM\JoinColumn(name="idrm", referencedColumnName="reporte_mantenimiento_idrm", nullable=false)
     */
    protected $recursosNecesarios;

    public function __construct()
    {
        $this->involucrados = new ArrayCollection();
        $this->recursosNecesarios = new ArrayCollection();
    }

    /**
     * Set the value of idrm.
     *
     * @param integer $idrm
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setIdrm($idrm)
    {
        $this->idrm = $idrm;

        return $this;
    }

    /**
     * Get the value of idrm.
     *
     * @return integer
     */
    public function getIdrm()
    {
        return $this->idrm;
    }

    /**
     * Set the value of nombre.
     *
     * @param string $nombre
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of direccion.
     *
     * @param string $direccion
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of direccion.
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of no_estacion.
     *
     * @param string $no_estacion
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setNoEstacion($no_estacion)
    {
        $this->no_estacion = $no_estacion;

        return $this;
    }

    /**
     * Get the value of no_estacion.
     *
     * @return string
     */
    public function getNoEstacion()
    {
        return $this->no_estacion;
    }

    /**
     * Set the value of fecha_realizacion.
     *
     * @param \DateTime $fecha_realizacion
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setFechaRealizacion($fecha_realizacion)
    {
        $this->fecha_realizacion = $fecha_realizacion;

        return $this;
    }

    /**
     * Get the value of fecha_realizacion.
     *
     * @return \DateTime
     */
    public function getFechaRealizacion()
    {
        return $this->fecha_realizacion;
    }

    /**
     * Set the value of horario_inicio.
     *
     * @param \DateTime $horario_inicio
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setHorarioInicio($horario_inicio)
    {
        $this->horario_inicio = $horario_inicio;

        return $this;
    }

    /**
     * Get the value of horario_inicio.
     *
     * @return \DateTime
     */
    public function getHorarioInicio()
    {
        return $this->horario_inicio;
    }

    /**
     * Set the value of horario_termino.
     *
     * @param \DateTime $horario_termino
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setHorarioTermino($horario_termino)
    {
        $this->horario_termino = $horario_termino;

        return $this;
    }

    /**
     * Get the value of horario_termino.
     *
     * @return \DateTime
     */
    public function getHorarioTermino()
    {
        return $this->horario_termino;
    }

    /**
     * Set the value of mantenimiento_int.
     *
     * @param boolean $mantenimiento_int
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setMantenimientoInt($mantenimiento_int)
    {
        $this->mantenimiento_int = $mantenimiento_int;

        return $this;
    }

    /**
     * Get the value of mantenimiento_int.
     *
     * @return boolean
     */
    public function getMantenimientoInt()
    {
        return $this->mantenimiento_int;
    }

    /**
     * Set the value of mantenimiento_ext.
     *
     * @param boolean $mantenimiento_ext
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setMantenimientoExt($mantenimiento_ext)
    {
        $this->mantenimiento_ext = $mantenimiento_ext;

        return $this;
    }

    /**
     * Get the value of mantenimiento_ext.
     *
     * @return boolean
     */
    public function getMantenimientoExt()
    {
        return $this->mantenimiento_ext;
    }

    /**
     * Set the value of tipo_prev.
     *
     * @param boolean $tipo_prev
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setTipoPrev($tipo_prev)
    {
        $this->tipo_prev = $tipo_prev;

        return $this;
    }

    /**
     * Get the value of tipo_prev.
     *
     * @return boolean
     */
    public function getTipoPrev()
    {
        return $this->tipo_prev;
    }

    /**
     * Set the value of tipo_correctivo.
     *
     * @param boolean $tipo_correctivo
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setTipoCorrectivo($tipo_correctivo)
    {
        $this->tipo_correctivo = $tipo_correctivo;

        return $this;
    }

    /**
     * Get the value of tipo_correctivo.
     *
     * @return boolean
     */
    public function getTipoCorrectivo()
    {
        return $this->tipo_correctivo;
    }

    /**
     * Set the value of area.
     *
     * @param string $area
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get the value of area.
     *
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set the value of nombre_equipo.
     *
     * @param string $nombre_equipo
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setNombreEquipo($nombre_equipo)
    {
        $this->nombre_equipo = $nombre_equipo;

        return $this;
    }

    /**
     * Get the value of nombre_equipo.
     *
     * @return string
     */
    public function getNombreEquipo()
    {
        return $this->nombre_equipo;
    }

    /**
     * Set the value of trabajo_solicitado.
     *
     * @param string $trabajo_solicitado
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setTrabajoSolicitado($trabajo_solicitado)
    {
        $this->trabajo_solicitado = $trabajo_solicitado;

        return $this;
    }

    /**
     * Get the value of trabajo_solicitado.
     *
     * @return string
     */
    public function getTrabajoSolicitado()
    {
        return $this->trabajo_solicitado;
    }

    /**
     * Set the value of objetivo.
     *
     * @param string $objetivo
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;

        return $this;
    }

    /**
     * Get the value of objetivo.
     *
     * @return string
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * Set the value of alcance.
     *
     * @param string $alcance
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setAlcance($alcance)
    {
        $this->alcance = $alcance;

        return $this;
    }

    /**
     * Get the value of alcance.
     *
     * @return string
     */
    public function getAlcance()
    {
        return $this->alcance;
    }

    /**
     * Set the value of trabajo_realizado.
     *
     * @param string $trabajo_realizado
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function setTrabajoRealizado($trabajo_realizado)
    {
        $this->trabajo_realizado = $trabajo_realizado;

        return $this;
    }

    /**
     * Get the value of trabajo_realizado.
     *
     * @return string
     */
    public function getTrabajoRealizado()
    {
        return $this->trabajo_realizado;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\ReporteMantenimiento
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
     * Add Involucrados entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Involucrados $involucrados
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function addInvolucrados(Involucrados $involucrados)
    {
        $this->involucrados[] = $involucrados;

        return $this;
    }

    /**
     * Remove Involucrados entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Involucrados $involucrados
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function removeInvolucrados(Involucrados $involucrados)
    {
        $this->involucrados->removeElement($involucrados);

        return $this;
    }

    /**
     * Get Involucrados entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvolucrados()
    {
        return $this->involucrados;
    }

    /**
     * Add RecursosNecesarios entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\RecursosNecesarios $recursosNecesarios
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function addRecursosNecesarios(RecursosNecesarios $recursosNecesarios)
    {
        $this->recursosNecesarios[] = $recursosNecesarios;

        return $this;
    }

    /**
     * Remove RecursosNecesarios entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\RecursosNecesarios $recursosNecesarios
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function removeRecursosNecesarios(RecursosNecesarios $recursosNecesarios)
    {
        $this->recursosNecesarios->removeElement($recursosNecesarios);
        return $this;
    }

    /**
     * Get RecursosNecesarios entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRecursosNecesarios()
    {
        return $this->recursosNecesarios;
    }

    public function __sleep()
    {
        return array('idrm', 'nombre', 'direccion', 'no_estacion', 'fecha_realizacion', 'horario_inicio', 'horario_termino', 'mantenimiento_int', 'mantenimiento_ext', 'tipo_prev', 'tipo_correctivo', 'area', 'nombre_equipo', 'trabajo_solicitado', 'objetivo', 'alcance', 'trabajo_realizado', 'created_at');
    }
}