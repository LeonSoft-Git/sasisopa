<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\RecursosNecesarios
 *
 * @ORM\Entity()
 * @ORM\Table(name="recursos_necesarios", indexes={@ORM\Index(name="fk_recursos_necesarios_reporte_mantenimiento_idx", columns={"reporte_mantenimiento_idrm"})})
 */
class RecursosNecesarios
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idrene;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $cantidad;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $descripcion;



    /**
     * @ORM\ManyToOne(targetEntity="ReporteMantenimiento", inversedBy="recursosNecesarios")
     * @ORM\JoinColumn(name="reporte_mantenimiento_idrm", referencedColumnName="idrm", nullable=false)
     */
    protected $reporteMantenimiento;

    public function __construct()
    {
    }

    /**
     * Set the value of idrene.
     *
     * @param integer $idrene
     * @return \CoreBundle\Entity\RecursosNecesarios
     */
    public function setIdrene($idrene)
    {
        $this->idrene = $idrene;

        return $this;
    }

    /**
     * Get the value of idrene.
     *
     * @return integer
     */
    public function getIdrene()
    {
        return $this->idrene;
    }

    /**
     * Set the value of cantidad.
     *
     * @param integer $cantidad
     * @return \CoreBundle\Entity\RecursosNecesarios
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get the value of cantidad.
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of descripcion.
     *
     * @param string $descripcion
     * @return \CoreBundle\Entity\RecursosNecesarios
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of descripcion.
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of reporte_mantenimiento_idrm.
     *
     * @param integer $reporte_mantenimiento_idrm
     * @return \CoreBundle\Entity\RecursosNecesarios
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
     * @return \CoreBundle\Entity\RecursosNecesarios
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
        return array('idrene', 'cantidad', 'descripcion', 'reporte_mantenimiento_idrm');
    }
}