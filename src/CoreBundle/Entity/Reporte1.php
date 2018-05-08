<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\Reporte1
 *
 * @ORM\Entity()
 * @ORM\Table(name="reporte1")
 */
class Reporte1
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $idreporte1;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $titulo;
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $fecha;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    protected $hora;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $turno;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $observacion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $colaborador;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $contratista;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $visitante;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $planeada;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $espontanea;

    public function __construct()
    {
    }

    /**
     * Set the value of idreporte1.
     *
     * @param integer $idreporte1
     * @return \CoreBundle\Entity\Reporte1
     */
    public function setIdreporte1($idreporte1)
    {
        $this->idreporte1 = $idreporte1;

        return $this;
    }

    /**
     * Get the value of idreporte1.
     *
     * @return integer
     */
    public function getIdreporte1()
    {
        return $this->idreporte1;
    }

    /**
     * Set the value of nombre.
     *
     * @param string $nombre
     * @return \CoreBundle\Entity\Reporte1
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
     * Set the value of titulo.
     *
     * @param string $titulo
     * @return \CoreBundle\Entity\Reporte1
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of titulo.
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of fecha.
     *
     * @param \DateTime $fecha
     * @return \CoreBundle\Entity\Reporte1
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
     * Set the value of hora.
     *
     * @param \DateTime $hora
     * @return \CoreBundle\Entity\Reporte1
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get the value of hora.
     *
     * @return \DateTime
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of turno.
     *
     * @param string $turno
     * @return \CoreBundle\Entity\Reporte1
     */
    public function setTurno($turno)
    {
        $this->turno = $turno;

        return $this;
    }

    /**
     * Get the value of turno.
     *
     * @return string
     */
    public function getTurno()
    {
        return $this->turno;
    }

    /**
     * Set the value of observacion.
     *
     * @param string $observacion
     * @return \CoreBundle\Entity\Reporte1
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
     * Set the value of colaborador.
     *
     * @param integer $colaborador
     * @return \CoreBundle\Entity\Reporte1
     */
    public function setColaborador($colaborador)
    {
        $this->colaborador = $colaborador;

        return $this;
    }

    /**
     * Get the value of colaborador.
     *
     * @return integer
     */
    public function getColaborador()
    {
        return $this->colaborador;
    }

    /**
     * Set the value of contratista.
     *
     * @param integer $contratista
     * @return \CoreBundle\Entity\Reporte1
     */
    public function setContratista($contratista)
    {
        $this->contratista = $contratista;

        return $this;
    }

    /**
     * Get the value of contratista.
     *
     * @return integer
     */
    public function getContratista()
    {
        return $this->contratista;
    }

    /**
     * Set the value of visitante.
     *
     * @param integer $visitante
     * @return \CoreBundle\Entity\Reporte1
     */
    public function setVisitante($visitante)
    {
        $this->visitante = $visitante;

        return $this;
    }

    /**
     * Get the value of visitante.
     *
     * @return integer
     */
    public function getVisitante()
    {
        return $this->visitante;
    }

    /**
     * Set the value of planeada.
     *
     * @param integer $planeada
     * @return \CoreBundle\Entity\Reporte1
     */
    public function setPlaneada($planeada)
    {
        $this->planeada = $planeada;

        return $this;
    }

    /**
     * Get the value of planeada.
     *
     * @return integer
     */
    public function getPlaneada()
    {
        return $this->planeada;
    }

    /**
     * Set the value of espontanea.
     *
     * @param integer $espontanea
     * @return \CoreBundle\Entity\Reporte1
     */
    public function setEspontanea($espontanea)
    {
        $this->espontanea = $espontanea;

        return $this;
    }

    /**
     * Get the value of espontanea.
     *
     * @return integer
     */
    public function getEspontanea()
    {
        return $this->espontanea;
    }

    public function __sleep()
    {
        return array('idreporte1', 'nombre', 'titulo', 'fecha', 'hora', 'turno', 'observacion', 'colaborador', 'contratista', 'visitante', 'planeada', 'espontanea');
    }
}