<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\LegalRequirements
 *
 * @ORM\Entity()
 * @ORM\Table(name="legal_requirements")
 */
class LegalRequirements
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idlr;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $dependencia;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $clasificacion;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $codificacion;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $titulo;

    /**
     * @ORM\Column(type="string", length=4, nullable=true)
     */
    protected $ano_emision;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $patron;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $trabajadores;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $generales;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $disposiciones_especificas;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $articulos_aplicables;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $descripcion_requisito;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $link;

    public function __construct()
    {
    }

    /**
     * Set the value of idlr.
     *
     * @param integer $idlr
     * @return \CoreBundle\Entity\LegalRequirements
     */
    public function setIdlr($idlr)
    {
        $this->idlr = $idlr;

        return $this;
    }

    /**
     * Get the value of idlr.
     *
     * @return integer
     */
    public function getIdlr()
    {
        return $this->idlr;
    }

    /**
     * Set the value of dependencia.
     *
     * @param string $dependencia
     * @return \CoreBundle\Entity\LegalRequirements
     */
    public function setDependencia($dependencia)
    {
        $this->dependencia = $dependencia;

        return $this;
    }

    /**
     * Get the value of dependencia.
     *
     * @return string
     */
    public function getDependencia()
    {
        return $this->dependencia;
    }

    /**
     * Set the value of clasificacion.
     *
     * @param string $clasificacion
     * @return \CoreBundle\Entity\LegalRequirements
     */
    public function setClasificacion($clasificacion)
    {
        $this->clasificacion = $clasificacion;

        return $this;
    }

    /**
     * Get the value of clasificacion.
     *
     * @return string
     */
    public function getClasificacion()
    {
        return $this->clasificacion;
    }

    /**
     * Set the value of codificacion.
     *
     * @param string $codificacion
     * @return \CoreBundle\Entity\LegalRequirements
     */
    public function setCodificacion($codificacion)
    {
        $this->codificacion = $codificacion;

        return $this;
    }

    /**
     * Get the value of codificacion.
     *
     * @return string
     */
    public function getCodificacion()
    {
        return $this->codificacion;
    }

    /**
     * Set the value of titulo.
     *
     * @param string $titulo
     * @return \CoreBundle\Entity\LegalRequirements
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
     * Set the value of ano_emision.
     *
     * @param string $ano_emision
     * @return \CoreBundle\Entity\LegalRequirements
     */
    public function setAnoEmision($ano_emision)
    {
        $this->ano_emision = $ano_emision;

        return $this;
    }

    /**
     * Get the value of ano_emision.
     *
     * @return string
     */
    public function getAnoEmision()
    {
        return $this->ano_emision;
    }

    /**
     * Set the value of patron.
     *
     * @param string $patron
     * @return \CoreBundle\Entity\LegalRequirements
     */
    public function setPatron($patron)
    {
        $this->patron = $patron;

        return $this;
    }

    /**
     * Get the value of patron.
     *
     * @return string
     */
    public function getPatron()
    {
        return $this->patron;
    }

    /**
     * Set the value of trabajadores.
     *
     * @param string $trabajadores
     * @return \CoreBundle\Entity\LegalRequirements
     */
    public function setTrabajadores($trabajadores)
    {
        $this->trabajadores = $trabajadores;

        return $this;
    }

    /**
     * Get the value of trabajadores.
     *
     * @return string
     */
    public function getTrabajadores()
    {
        return $this->trabajadores;
    }

    /**
     * Set the value of generales.
     *
     * @param string $generales
     * @return \CoreBundle\Entity\LegalRequirements
     */
    public function setGenerales($generales)
    {
        $this->generales = $generales;

        return $this;
    }

    /**
     * Get the value of generales.
     *
     * @return string
     */
    public function getGenerales()
    {
        return $this->generales;
    }

    /**
     * Set the value of disposiciones_especificas.
     *
     * @param string $disposiciones_especificas
     * @return \CoreBundle\Entity\LegalRequirements
     */
    public function setDisposicionesEspecificas($disposiciones_especificas)
    {
        $this->disposiciones_especificas = $disposiciones_especificas;

        return $this;
    }

    /**
     * Get the value of disposiciones_especificas.
     *
     * @return string
     */
    public function getDisposicionesEspecificas()
    {
        return $this->disposiciones_especificas;
    }

    /**
     * Set the value of articulos_aplicables.
     *
     * @param string $articulos_aplicables
     * @return \CoreBundle\Entity\LegalRequirements
     */
    public function setArticulosAplicables($articulos_aplicables)
    {
        $this->articulos_aplicables = $articulos_aplicables;

        return $this;
    }

    /**
     * Get the value of articulos_aplicables.
     *
     * @return string
     */
    public function getArticulosAplicables()
    {
        return $this->articulos_aplicables;
    }

    /**
     * Set the value of descripcion_requisito.
     *
     * @param string $descripcion_requisito
     * @return \CoreBundle\Entity\LegalRequirements
     */
    public function setDescripcionRequisito($descripcion_requisito)
    {
        $this->descripcion_requisito = $descripcion_requisito;

        return $this;
    }

    /**
     * Get the value of descripcion_requisito.
     *
     * @return string
     */
    public function getDescripcionRequisito()
    {
        return $this->descripcion_requisito;
    }

    /**
     * Set the value of link.
     *
     * @param string $link
     * @return \CoreBundle\Entity\LegalRequirements
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get the value of link.
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }


    public function __sleep()
    {
        return array('idlr', 'dependencia', 'clasificicacion', 'codificacion',  'titulo', 'ano_emision', 'patron', 'trabajadores', 'generales', 'disposiciones_especificas', 'articulos_aplicables', 'descripcion_requisito', 'link');
    }
}