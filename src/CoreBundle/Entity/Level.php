<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\Level
 *
 * @ORM\Entity()
 * @ORM\Table(name="`level`")
 */
class Level
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idl;

    /**
     * @ORM\Column(name="`level`", type="string", length=25, nullable=true)
     */
    protected $level;

    /**
     * @ORM\OneToMany(targetEntity="Usuarios", mappedBy="level")
     * @ORM\JoinColumn(name="idl", referencedColumnName="idl", nullable=false)
     */
    protected $usuarios;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
    }

    /**
     * Set the value of idl.
     *
     * @param integer $idl
     * @return \CoreBundle\Entity\Level
     */
    public function setIdl($idl)
    {
        $this->idl = $idl;

        return $this;
    }

    /**
     * Get the value of idl.
     *
     * @return integer
     */
    public function getIdl()
    {
        return $this->idl;
    }

    /**
     * Set the value of level.
     *
     * @param string $level
     * @return \CoreBundle\Entity\Level
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get the value of level.
     *
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Add Usuarios entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Usuarios $usuarios
     * @return \CoreBundle\Entity\Level
     */
    public function addUsuarios(Usuarios $usuarios)
    {
        $this->usuarios[] = $usuarios;

        return $this;
    }

    /**
     * Remove Usuarios entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Usuarios $usuarios
     * @return \CoreBundle\Entity\Level
     */
    public function removeUsuarios(Usuarios $usuarios)
    {
        $this->usuarios->removeElement($usuarios);

        return $this;
    }

    /**
     * Get Usuarios entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    public function __toString() {
        return $this->level;
    }

    public function __sleep()
    {
        return array('idl', 'level');
    }
}