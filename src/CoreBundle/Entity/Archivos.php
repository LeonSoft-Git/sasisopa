<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CoreBundle\Entity\Archivos
 *
 * @ORM\Entity()
 * @ORM\Table(name="archivos")
 */
class Archivos
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idarchivos;

    /**
     * @ORM\Column(type="string", length=75, nullable=true)
     */
    protected $carta_poder;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $nombre;

    /**
     *@Gedmo\Timestampable(on="create", field="creado")
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created_at;

    public function __construct()
    {
    }

    /**
     * Set the value of idarchivos.
     *
     * @param integer $idarchivos
     * @return \CoreBundle\Entity\Archivos
     */
    public function setIdarchivos($idarchivos)
    {
        $this->idarchivos = $idarchivos;

        return $this;
    }

    /**
     * Get the value of idarchivos.
     *
     * @return integer
     */
    public function getIdarchivos()
    {
        return $this->idarchivos;
    }

    /**
     * Set the value of carta_poder.
     *
     * @param string $carta_poder
     * @return \CoreBundle\Entity\Archivos
     */
    public function setCartaPoder($carta_poder)
    {
        $this->carta_poder = $carta_poder;

        return $this;
    }

    /**
     * Get the value of carta_poder.
     *
     * @return string
     */
    public function getCartaPoder()
    {
        return $this->carta_poder;
    }

    /**
     * Set the value of nombre.
     *
     * @param string $nombre
     * @return \CoreBundle\Entity\Archivos
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
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\Archivos
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
        return array('idarchivos', 'carta_poder', 'nombre', 'created_at');
    }
}

