<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\Organigrama
 *
 * @ORM\Entity()
 * @ORM\Table(name="organigrama")
 */
class Organigrama
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $idorganigrama;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $altadireccion;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $representantetecnico;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $jefemantenimiento;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $auxiliaradmin;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $jefedeturno;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $prestadores;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $despachadores;

    public function __construct()
    {
    }

    /**
     * Set the value of idorganigrama.
     *
     * @param integer $idorganigrama
     * @return \CoreBundle\Entity\Organigrama
     */
    public function setIdorganigrama($idorganigrama)
    {
        $this->idorganigrama = $idorganigrama;

        return $this;
    }

    /**
     * Get the value of idorganigrama.
     *
     * @return integer
     */
    public function getIdorganigrama()
    {
        return $this->idorganigrama;
    }

    /**
     * Set the value of altadireccion.
     *
     * @param string $altadireccion
     * @return \CoreBundle\Entity\Organigrama
     */
    public function setAltadireccion($altadireccion)
    {
        $this->altadireccion = $altadireccion;

        return $this;
    }

    /**
     * Get the value of altadireccion.
     *
     * @return string
     */
    public function getAltadireccion()
    {
        return $this->altadireccion;
    }

    /**
     * Set the value of representantetecnico.
     *
     * @param string $representantetecnico
     * @return \CoreBundle\Entity\Organigrama
     */
    public function setRepresentantetecnico($representantetecnico)
    {
        $this->representantetecnico = $representantetecnico;

        return $this;
    }

    /**
     * Get the value of representantetecnico.
     *
     * @return string
     */
    public function getRepresentantetecnico()
    {
        return $this->representantetecnico;
    }

    /**
     * Set the value of jefemantenimiento.
     *
     * @param string $jefemantenimiento
     * @return \CoreBundle\Entity\Organigrama
     */
    public function setJefemantenimiento($jefemantenimiento)
    {
        $this->jefemantenimiento = $jefemantenimiento;

        return $this;
    }

    /**
     * Get the value of jefemantenimiento.
     *
     * @return string
     */
    public function getJefemantenimiento()
    {
        return $this->jefemantenimiento;
    }

    /**
     * Set the value of auxiliaradmin.
     *
     * @param string $auxiliaradmin
     * @return \CoreBundle\Entity\Organigrama
     */
    public function setAuxiliaradmin($auxiliaradmin)
    {
        $this->auxiliaradmin = $auxiliaradmin;

        return $this;
    }

    /**
     * Get the value of auxiliaradmin.
     *
     * @return string
     */
    public function getAuxiliaradmin()
    {
        return $this->auxiliaradmin;
    }

    /**
     * Set the value of jefedeturno.
     *
     * @param string $jefedeturno
     * @return \CoreBundle\Entity\Organigrama
     */
    public function setJefedeturno($jefedeturno)
    {
        $this->jefedeturno = $jefedeturno;

        return $this;
    }

    /**
     * Get the value of jefedeturno.
     *
     * @return string
     */
    public function getJefedeturno()
    {
        return $this->jefedeturno;
    }

    /**
     * Set the value of prestadores.
     *
     * @param string $prestadores
     * @return \CoreBundle\Entity\Organigrama
     */
    public function setPrestadores($prestadores)
    {
        $this->prestadores = $prestadores;

        return $this;
    }

    /**
     * Get the value of prestadores.
     *
     * @return string
     */
    public function getPrestadores()
    {
        return $this->prestadores;
    }

    /**
     * Set the value of despachadores.
     *
     * @param string $despachadores
     * @return \CoreBundle\Entity\Organigrama
     */
    public function setDespachadores($despachadores)
    {
        $this->despachadores = $despachadores;

        return $this;
    }

    /**
     * Get the value of despachadores.
     *
     * @return string
     */
    public function getDespachadores()
    {
        return $this->despachadores;
    }

    public function __sleep()
    {
        return array('idorganigrama', 'altadireccion', 'representantetecnico', 'jefemantenimiento', 'auxiliaradmin', 'jefedeturno', 'prestadores', 'despachadores');
    }
}