<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * CoreBundle\Entity\Documentos
 *
 * @ORM\Entity()
 * @ORM\Table(name="documentos")
 */
class Documentos
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $no_estacion;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    protected $razon_social;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    protected $direccion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $alfanum;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $fecha_publicacion;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $fecha_inicio;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    protected $nombre_reviso;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $puesto_reviso;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $quien_aprobo;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $puesto_aprobo;

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
     * Set the value of idc.
     *
     * @param integer $idc
     * @return \CoreBundle\Entity\Documentos
     */
    public function setIdc($idc)
    {
        $this->idc = $idc;

        return $this;
    }

    /**
     * Get the value of idc.
     *
     * @return integer
     */
    public function getIdc()
    {
        return $this->idc;
    }

    /**
     * Set the value of no_estacion.
     *
     * @param integer $no_estacion
     * @return \CoreBundle\Entity\Documentos
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
     * Set the value of razon_social.
     *
     * @param string $razon_social
     * @return \CoreBundle\Entity\Documentos
     */
    public function setRazonSocial($razon_social)
    {
        $this->razon_social = $razon_social;

        return $this;
    }

    /**
     * Get the value of razon_social.
     *
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razon_social;
    }

    /**
     * Set the value of direccion.
     *
     * @param string $direccion
     * @return \CoreBundle\Entity\Documentos
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
     * Set the value of alfanum.
     *
     * @param integer $alfanum
     * @return \CoreBundle\Entity\Documentos
     */
    public function setAlfanum($alfanum)
    {
        $this->alfanum = $alfanum;

        return $this;
    }

    /**
     * Get the value of alfanum.
     *
     * @return integer
     */
    public function getAlfanum()
    {
        return $this->alfanum;
    }

    /**
     * Set the value of fecha_publicacion.
     *
     * @param \DateTime $fecha_publicacion
     * @return \CoreBundle\Entity\Documentos
     */
    public function setFechaPublicacion($fecha_publicacion)
    {
        $this->fecha_publicacion = $fecha_publicacion;

        return $this;
    }

    /**
     * Get the value of fecha_publicacion.
     *
     * @return \DateTime
     */
    public function getFechaPublicacion()
    {
        return $this->fecha_publicacion;
    }

    /**
     * Set the value of fecha_inicio.
     *
     * @param \DateTime $fecha_inicio
     * @return \CoreBundle\Entity\Documentos
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    /**
     * Get the value of fecha_inicio.
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Set the value of nombre_reviso.
     *
     * @param string $nombre_reviso
     * @return \CoreBundle\Entity\Documentos
     */
    public function setNombreReviso($nombre_reviso)
    {
        $this->nombre_reviso = $nombre_reviso;

        return $this;
    }

    /**
     * Get the value of nombre_reviso.
     *
     * @return string
     */
    public function getNombreReviso()
    {
        return $this->nombre_reviso;
    }

    /**
     * Set the value of puesto_reviso.
     *
     * @param string $puesto_reviso
     * @return \CoreBundle\Entity\Documentos
     */
    public function setPuestoReviso($puesto_reviso)
    {
        $this->puesto_reviso = $puesto_reviso;

        return $this;
    }

    /**
     * Get the value of puesto_reviso.
     *
     * @return string
     */
    public function getPuestoReviso()
    {
        return $this->puesto_reviso;
    }

    /**
     * Set the value of quien_aprobo.
     *
     * @param string $quien_aprobo
     * @return \CoreBundle\Entity\Documentos
     */
    public function setQuienAprobo($quien_aprobo)
    {
        $this->quien_aprobo = $quien_aprobo;

        return $this;
    }

    /**
     * Get the value of quien_aprobo.
     *
     * @return string
     */
    public function getQuienAprobo()
    {
        return $this->quien_aprobo;
    }

    /**
     * Set the value of puesto_aprobo.
     *
     * @param string $puesto_aprobo
     * @return \CoreBundle\Entity\Documentos
     */
    public function setPuestoAprobo($puesto_aprobo)
    {
        $this->puesto_aprobo = $puesto_aprobo;

        return $this;
    }

    /**
     * Get the value of puesto_aprobo.
     *
     * @return string
     */
    public function getPuestoAprobo()
    {
        return $this->puesto_aprobo;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\Documentos
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
        return array('idc', 'no_estacion', 'razon_social', 'direccion', 'alfanum', 'fecha_publicacion', 'fecha_inicio', 'nombre_reviso', 'puesto_reviso', 'quien_aprobo', 'puesto_aprobo', 'created_at');
    }
}