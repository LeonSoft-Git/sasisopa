<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\Involucrados
 *
 * @ORM\Entity()
 * @ORM\Table(name="involucrados", indexes={@ORM\Index(name="fk_involucrados_reporte_mantenimiento1_idx", columns={"reporte_mantenimiento_idrm"})})
 */
class Involucrados
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idinv;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    protected $firma;



    /**
     * @ORM\ManyToOne(targetEntity="ReporteMantenimiento", inversedBy="involucrados")
     * @ORM\JoinColumn(name="reporte_mantenimiento_idrm", referencedColumnName="idrm", nullable=false)
     */
    protected $reporteMantenimiento;

    public function __construct()
    {
    }

    /**
     * Set the value of idinv.
     *
     * @param integer $idinv
     * @return \CoreBundle\Entity\Involucrados
     */
    public function setIdinv($idinv)
    {
        $this->idinv = $idinv;

        return $this;
    }

    /**
     * Get the value of idinv.
     *
     * @return integer
     */
    public function getIdinv()
    {
        return $this->idinv;
    }

    /**
     * Set the value of nombre.
     *
     * @param string $nombre
     * @return \CoreBundle\Entity\Involucrados
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
     * Set the value of firma.
     *
     * @param string $firma
     * @return \CoreBundle\Entity\Involucrados
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
     * Set the value of reporte_mantenimiento_idrm.
     *
     * @param integer $reporte_mantenimiento_idrm
     * @return \CoreBundle\Entity\Involucrados
     */
    public function setReporteMantenimientoIdrm($reporte_mantenimiento_idrm)
    {
        $this->reporte_mantenimiento_idrm = $reporte_mantenimiento_idrm;

        return $this;
    }

    /**
     * Get the value of reporte_mantenimiento_idrm.
     *
     * @return integer
     */
    public function getReporteMantenimientoIdrm()
    {
        return $this->reporte_mantenimiento_idrm;
    }

    /**
     * Set ReporteMantenimiento entity (many to one).
     *
     * @param \CoreBundle\Entity\ReporteMantenimiento $reporteMantenimiento
     * @return \CoreBundle\Entity\Involucrados
     */
    public function setReporteMantenimiento(ReporteMantenimiento $reporteMantenimiento = null)
    {
        $this->reporteMantenimiento = $reporteMantenimiento;

        return $this;
    }

    /**
     * Get ReporteMantenimiento entity (many to one).
     *
     * @return \CoreBundle\Entity\ReporteMantenimiento
     */
    public function getReporteMantenimiento()
    {
        return $this->reporteMantenimiento;
    }

    public function __sleep()
    {
        return array('idinv', 'nombre', 'firma', 'reporte_mantenimiento_idrm');
    }
}