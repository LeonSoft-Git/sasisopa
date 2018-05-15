<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\EspecificacionesTecnicasEquipnuev
 *
 * @ORM\Entity()
 * @ORM\Table(name="especificaciones_tecnicas_equipnuev", indexes={@ORM\Index(name="fk_especificaciones_tecnicas_equipnuev_lista_equipos_nuevos_idx", columns={"lista_equipos_nuevos_idlen"})})
 */
class EspecificacionesTecnicasEquipnuev
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idpc;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $planos_construidos;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $manuales_especificacion;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $requerimientos;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $planos;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $datos_tecnicos;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $informes;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $datos_necesarios;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $informes_ensayos;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    protected $resultados;



    /**
     * @ORM\OneToOne(targetEntity="ListaEquiposNuevos", inversedBy="especificacionesTecnicasEquipnuev")
     * @ORM\JoinColumn(name="lista_equipos_nuevos_idlen", referencedColumnName="idlen", nullable=false)
     */
    protected $listaEquiposNuevos;

    public function __construct()
    {
    }

    /**
     * Set the value of idpc.
     *
     * @param integer $idpc
     * @return \CoreBundle\Entity\EspecificacionesTecnicasEquipnuev
     */
    public function setIdpc($idpc)
    {
        $this->idpc = $idpc;

        return $this;
    }

    /**
     * Get the value of idpc.
     *
     * @return integer
     */
    public function getIdpc()
    {
        return $this->idpc;
    }

    /**
     * Set the value of planos_construidos.
     *
     * @param string $planos_construidos
     * @return \CoreBundle\Entity\EspecificacionesTecnicasEquipnuev
     */
    public function setPlanosConstruidos($planos_construidos)
    {
        $this->planos_construidos = $planos_construidos;

        return $this;
    }

    /**
     * Get the value of planos_construidos.
     *
     * @return string
     */
    public function getPlanosConstruidos()
    {
        return $this->planos_construidos;
    }

    /**
     * Set the value of manuales_especificacion.
     *
     * @param string $manuales_especificacion
     * @return \CoreBundle\Entity\EspecificacionesTecnicasEquipnuev
     */
    public function setManualesEspecificacion($manuales_especificacion)
    {
        $this->manuales_especificacion = $manuales_especificacion;

        return $this;
    }

    /**
     * Get the value of manuales_especificacion.
     *
     * @return string
     */
    public function getManualesEspecificacion()
    {
        return $this->manuales_especificacion;
    }

    /**
     * Set the value of requerimientos.
     *
     * @param string $requerimientos
     * @return \CoreBundle\Entity\EspecificacionesTecnicasEquipnuev
     */
    public function setRequerimientos($requerimientos)
    {
        $this->requerimientos = $requerimientos;

        return $this;
    }

    /**
     * Get the value of requerimientos.
     *
     * @return string
     */
    public function getRequerimientos()
    {
        return $this->requerimientos;
    }

    /**
     * Set the value of planos.
     *
     * @param string $planos
     * @return \CoreBundle\Entity\EspecificacionesTecnicasEquipnuev
     */
    public function setPlanos($planos)
    {
        $this->planos = $planos;

        return $this;
    }

    /**
     * Get the value of planos.
     *
     * @return string
     */
    public function getPlanos()
    {
        return $this->planos;
    }

    /**
     * Set the value of datos_tecnicos.
     *
     * @param string $datos_tecnicos
     * @return \CoreBundle\Entity\EspecificacionesTecnicasEquipnuev
     */
    public function setDatosTecnicos($datos_tecnicos)
    {
        $this->datos_tecnicos = $datos_tecnicos;

        return $this;
    }

    /**
     * Get the value of datos_tecnicos.
     *
     * @return string
     */
    public function getDatosTecnicos()
    {
        return $this->datos_tecnicos;
    }

    /**
     * Set the value of informes.
     *
     * @param string $informes
     * @return \CoreBundle\Entity\EspecificacionesTecnicasEquipnuev
     */
    public function setInformes($informes)
    {
        $this->informes = $informes;

        return $this;
    }

    /**
     * Get the value of informes.
     *
     * @return string
     */
    public function getInformes()
    {
        return $this->informes;
    }

    /**
     * Set the value of datos_necesarios.
     *
     * @param string $datos_necesarios
     * @return \CoreBundle\Entity\EspecificacionesTecnicasEquipnuev
     */
    public function setDatosNecesarios($datos_necesarios)
    {
        $this->datos_necesarios = $datos_necesarios;

        return $this;
    }

    /**
     * Get the value of datos_necesarios.
     *
     * @return string
     */
    public function getDatosNecesarios()
    {
        return $this->datos_necesarios;
    }

    /**
     * Set the value of informes_ensayos.
     *
     * @param string $informes_ensayos
     * @return \CoreBundle\Entity\EspecificacionesTecnicasEquipnuev
     */
    public function setInformesEnsayos($informes_ensayos)
    {
        $this->informes_ensayos = $informes_ensayos;

        return $this;
    }

    /**
     * Get the value of informes_ensayos.
     *
     * @return string
     */
    public function getInformesEnsayos()
    {
        return $this->informes_ensayos;
    }

    /**
     * Set the value of resultados.
     *
     * @param string $resultados
     * @return \CoreBundle\Entity\EspecificacionesTecnicasEquipnuev
     */
    public function setResultados($resultados)
    {
        $this->resultados = $resultados;

        return $this;
    }

    /**
     * Get the value of resultados.
     *
     * @return string
     */
    public function getResultados()
    {
        return $this->resultados;
    }

    /**
     * Set the value of lista_equipos_nuevos_idlen.
     *
     * @param integer $lista_equipos_nuevos_idlen
     * @return \CoreBundle\Entity\EspecificacionesTecnicasEquipnuev
     */
    public function setListaEquiposNuevosIdlen($lista_equipos_nuevos_idlen)
    {
        $this->lista_equipos_nuevos_idlen = $lista_equipos_nuevos_idlen;

        return $this;
    }

    /**
     * Get the value of lista_equipos_nuevos_idlen.
     *
     * @return integer
     */
    public function getListaEquiposNuevosIdlen()
    {
        return $this->lista_equipos_nuevos_idlen;
    }

    /**
     * Set ListaEquiposNuevos entity (one to one).
     *
     * @param \CoreBundle\Entity\ListaEquiposNuevos $listaEquiposNuevos
     * @return \CoreBundle\Entity\EspecificacionesTecnicasEquipnuev
     */
    public function setListaEquiposNuevos(ListaEquiposNuevos $listaEquiposNuevos)
    {
        $this->listaEquiposNuevos = $listaEquiposNuevos;

        return $this;
    }

    /**
     * Get ListaEquiposNuevos entity (one to one).
     *
     * @return \CoreBundle\Entity\ListaEquiposNuevos
     */
    public function getListaEquiposNuevos()
    {
        return $this->listaEquiposNuevos;
    }

    public function __sleep()
    {
        return array('idpc', 'planos_construidos', 'manuales_especificacion', 'requerimientos', 'planos', 'datos_tecnicos', 'informes', 'datos_necesarios', 'informes_ensayos', 'resultados', 'lista_equipos_nuevos_idlen');
    }
}