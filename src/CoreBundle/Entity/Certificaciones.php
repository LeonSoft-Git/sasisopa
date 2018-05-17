<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\Certificaciones
 *
 * @ORM\Entity()
 * @ORM\Table(name="certificaciones", indexes={@ORM\Index(name="fk_certificaciones_hoja_especificacion_idx", columns={"hoja_especificacion_idhe"})})
 */
class Certificaciones
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idcertificaciones;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $certificaciones_materiales;



    /**
     * @ORM\ManyToOne(targetEntity="HojaEspecificacion", inversedBy="certificaciones")
     * @ORM\JoinColumn(name="hoja_especificacion_idhe", referencedColumnName="idhe", nullable=false)
     */
    protected $hojaEspecificacion;

    public function __construct()
    {
    }

    /**
     * Set the value of idcertificaciones.
     *
     * @param integer $idcertificaciones
     * @return \CoreBundle\Entity\Certificaciones
     */
    public function setIdcertificaciones($idcertificaciones)
    {
        $this->idcertificaciones = $idcertificaciones;

        return $this;
    }

    /**
     * Get the value of idcertificaciones.
     *
     * @return integer
     */
    public function getIdcertificaciones()
    {
        return $this->idcertificaciones;
    }

    /**
     * Set the value of certificaciones_materiales.
     *
     * @param string $certificaciones_materiales
     * @return \CoreBundle\Entity\Certificaciones
     */
    public function setCertificacionesMateriales($certificaciones_materiales)
    {
        $this->certificaciones_materiales = $certificaciones_materiales;

        return $this;
    }

    /**
     * Get the value of certificaciones_materiales.
     *
     * @return string
     */
    public function getCertificacionesMateriales()
    {
        return $this->certificaciones_materiales;
    }

    /**
     * Set the value of hoja_especificacion_idhe.
     *
     * @param integer $hoja_especificacion_idhe
     * @return \CoreBundle\Entity\Certificaciones
     */
    public function setHojaEspecificacionIdhe($hoja_especificacion_idhe)
    {
        $this->hoja_especificacion_idhe = $hoja_especificacion_idhe;

        return $this;
    }

    /**
     * Get the value of hoja_especificacion_idhe.
     *
     * @return integer
     */
    public function getHojaEspecificacionIdhe()
    {
        return $this->hoja_especificacion_idhe;
    }

    /**
     * Set HojaEspecificacion entity (many to one).
     *
     * @param \CoreBundle\Entity\HojaEspecificacion $hojaEspecificacion
     * @return \CoreBundle\Entity\Certificaciones
     */
    public function setHojaEspecificacion(HojaEspecificacion $hojaEspecificacion = null)
    {
        $this->hojaEspecificacion = $hojaEspecificacion;

        return $this;
    }

    /**
     * Get HojaEspecificacion entity (many to one).
     *
     * @return \CoreBundle\Entity\HojaEspecificacion
     */
    public function getHojaEspecificacion()
    {
        return $this->hojaEspecificacion;
    }

    public function __sleep()
    {
        return array('idcertificaciones', 'certificaciones_materiales', 'hoja_especificacion_idhe');
    }
}