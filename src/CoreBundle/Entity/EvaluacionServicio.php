<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CoreBundle\Entity\EvaluacionServicio
 *
 * @ORM\Entity()
 * @ORM\Table(name="evaluacion_servicio")
 */
class EvaluacionServicio
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $ides;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $departamento;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $fecha;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $servicio_evaluado;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $proveedor;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $entrega_servicio;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $entregas_tiempo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $precio_servicio;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $precio_comparado;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $satisfaccion_servicio;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $satisfaccion_comparado;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $satisfaccion_proveedor;

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
     * Set the value of ides.
     *
     * @param integer $ides
     * @return \CoreBundle\Entity\EvaluacionServicio
     */
    public function setIdes($ides)
    {
        $this->ides = $ides;

        return $this;
    }

    /**
     * Get the value of ides.
     *
     * @return integer
     */
    public function getIdes()
    {
        return $this->ides;
    }

    /**
     * Set the value of nombre.
     *
     * @param string $nombre
     * @return \CoreBundle\Entity\EvaluacionServicio
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
     * Set the value of departamento.
     *
     * @param string $departamento
     * @return \CoreBundle\Entity\EvaluacionServicio
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get the value of departamento.
     *
     * @return string
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set the value of fecha.
     *
     * @param \DateTime $fecha
     * @return \CoreBundle\Entity\EvaluacionServicio
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
     * Set the value of servicio_evaluado.
     *
     * @param string $servicio_evaluado
     * @return \CoreBundle\Entity\EvaluacionServicio
     */
    public function setServicioEvaluado($servicio_evaluado)
    {
        $this->servicio_evaluado = $servicio_evaluado;

        return $this;
    }

    /**
     * Get the value of servicio_evaluado.
     *
     * @return string
     */
    public function getServicioEvaluado()
    {
        return $this->servicio_evaluado;
    }

    /**
     * Set the value of proveedor.
     *
     * @param string $proveedor
     * @return \CoreBundle\Entity\EvaluacionServicio
     */
    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get the value of proveedor.
     *
     * @return string
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * Set the value of entrega_servicio.
     *
     * @param integer $entrega_servicio
     * @return \CoreBundle\Entity\EvaluacionServicio
     */
    public function setEntregaServicio($entrega_servicio)
    {
        $this->entrega_servicio = $entrega_servicio;

        return $this;
    }

    /**
     * Get the value of entrega_servicio.
     *
     * @return integer
     */
    public function getEntregaServicio()
    {
        return $this->entrega_servicio;
    }

    /**
     * Set the value of entregas_tiempo.
     *
     * @param integer $entregas_tiempo
     * @return \CoreBundle\Entity\EvaluacionServicio
     */
    public function setEntregasTiempo($entregas_tiempo)
    {
        $this->entregas_tiempo = $entregas_tiempo;

        return $this;
    }

    /**
     * Get the value of entregas_tiempo.
     *
     * @return integer
     */
    public function getEntregasTiempo()
    {
        return $this->entregas_tiempo;
    }

    /**
     * Set the value of precio_servicio.
     *
     * @param integer $precio_servicio
     * @return \CoreBundle\Entity\EvaluacionServicio
     */
    public function setPrecioServicio($precio_servicio)
    {
        $this->precio_servicio = $precio_servicio;

        return $this;
    }

    /**
     * Get the value of precio_servicio.
     *
     * @return integer
     */
    public function getPrecioServicio()
    {
        return $this->precio_servicio;
    }

    /**
     * Set the value of precio_comparado.
     *
     * @param integer $precio_comparado
     * @return \CoreBundle\Entity\EvaluacionServicio
     */
    public function setPrecioComparado($precio_comparado)
    {
        $this->precio_comparado = $precio_comparado;

        return $this;
    }

    /**
     * Get the value of precio_comparado.
     *
     * @return integer
     */
    public function getPrecioComparado()
    {
        return $this->precio_comparado;
    }

    /**
     * Set the value of satisfaccion_servicio.
     *
     * @param integer $satisfaccion_servicio
     * @return \CoreBundle\Entity\EvaluacionServicio
     */
    public function setSatisfaccionServicio($satisfaccion_servicio)
    {
        $this->satisfaccion_servicio = $satisfaccion_servicio;

        return $this;
    }

    /**
     * Get the value of satisfaccion_servicio.
     *
     * @return integer
     */
    public function getSatisfaccionServicio()
    {
        return $this->satisfaccion_servicio;
    }

    /**
     * Set the value of satisfaccion_comparado.
     *
     * @param integer $satisfaccion_comparado
     * @return \CoreBundle\Entity\EvaluacionServicio
     */
    public function setSatisfaccionComparado($satisfaccion_comparado)
    {
        $this->satisfaccion_comparado = $satisfaccion_comparado;

        return $this;
    }

    /**
     * Get the value of satisfaccion_comparado.
     *
     * @return integer
     */
    public function getSatisfaccionComparado()
    {
        return $this->satisfaccion_comparado;
    }

    /**
     * Set the value of satisfaccion_proveedor.
     *
     * @param integer $satisfaccion_proveedor
     * @return \CoreBundle\Entity\EvaluacionServicio
     */
    public function setSatisfaccionProveedor($satisfaccion_proveedor)
    {
        $this->satisfaccion_proveedor = $satisfaccion_proveedor;

        return $this;
    }

    /**
     * Get the value of satisfaccion_proveedor.
     *
     * @return integer
     */
    public function getSatisfaccionProveedor()
    {
        return $this->satisfaccion_proveedor;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\EvaluacionServicio
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
        return array('ides', 'nombre', 'departamento', 'fecha', 'servicio_evaluado', 'proveedor', 'entrega_servicio', 'entregas_tiempo', 'precio_servicio', 'precio_comparado', 'satisfaccion_servicio', 'satisfaccion_comparado', 'satisfaccion_proveedor', 'created_at');
    }
}