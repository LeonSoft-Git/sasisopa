<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\ListaDistribucion
 *
 * @ORM\Entity()
 * @ORM\Table(name="lista_distribucion")
 */
class ListaDistribucion
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idld;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $clave;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $nombre_documento;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $no_revision;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $no_copia;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $fecha_ultima;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $procesos_areas;

    public function __construct()
    {
    }

    /**
     * Set the value of idld.
     *
     * @param integer $idld
     * @return \CoreBundle\Entity\ListaDistribucion
     */
    public function setIdld($idld)
    {
        $this->idld = $idld;

        return $this;
    }

    /**
     * Get the value of idld.
     *
     * @return integer
     */
    public function getIdld()
    {
        return $this->idld;
    }

    /**
     * Set the value of clave.
     *
     * @param integer $clave
     * @return \CoreBundle\Entity\ListaDistribucion
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get the value of clave.
     *
     * @return integer
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set the value of nombre_documento.
     *
     * @param string $nombre_documento
     * @return \CoreBundle\Entity\ListaDistribucion
     */
    public function setNombreDocumento($nombre_documento)
    {
        $this->nombre_documento = $nombre_documento;

        return $this;
    }

    /**
     * Get the value of nombre_documento.
     *
     * @return string
     */
    public function getNombreDocumento()
    {
        return $this->nombre_documento;
    }

    /**
     * Set the value of no_revision.
     *
     * @param integer $no_revision
     * @return \CoreBundle\Entity\ListaDistribucion
     */
    public function setNoRevision($no_revision)
    {
        $this->no_revision = $no_revision;

        return $this;
    }

    /**
     * Get the value of no_revision.
     *
     * @return integer
     */
    public function getNoRevision()
    {
        return $this->no_revision;
    }

    /**
     * Set the value of no_copia.
     *
     * @param integer $no_copia
     * @return \CoreBundle\Entity\ListaDistribucion
     */
    public function setNoCopia($no_copia)
    {
        $this->no_copia = $no_copia;

        return $this;
    }

    /**
     * Get the value of no_copia.
     *
     * @return integer
     */
    public function getNoCopia()
    {
        return $this->no_copia;
    }

    /**
     * Set the value of fecha_ultima.
     *
     * @param \DateTime $fecha_ultima
     * @return \CoreBundle\Entity\ListaDistribucion
     */
    public function setFechaUltima($fecha_ultima)
    {
        $this->fecha_ultima = $fecha_ultima;

        return $this;
    }

    /**
     * Get the value of fecha_ultima.
     *
     * @return \DateTime
     */
    public function getFechaUltima()
    {
        return $this->fecha_ultima;
    }

    /**
     * Set the value of procesos_areas.
     *
     * @param string $procesos_areas
     * @return \CoreBundle\Entity\ListaDistribucion
     */
    public function setProcesosAreas($procesos_areas)
    {
        $this->procesos_areas = $procesos_areas;

        return $this;
    }

    /**
     * Get the value of procesos_areas.
     *
     * @return string
     */
    public function getProcesosAreas()
    {
        return $this->procesos_areas;
    }

    public function __sleep()
    {
        return array('idld', 'clave', 'nombre_documento', 'no_revision', 'no_copia', 'fecha_ultima', 'procesos_areas');
    }
}