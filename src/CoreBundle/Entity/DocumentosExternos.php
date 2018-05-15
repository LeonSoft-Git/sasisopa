<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\DocumentosExternos
 *
 * @ORM\Entity()
 * @ORM\Table(name="documentos_externos")
 */
class DocumentosExternos
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idde;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $nombre_documento;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $fecha_ultima;

    /**
     * @Gedmo\Timestampable(on="create", field="creado")
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created_at;

    /**
     * @ORM\OneToMany(targetEntity="RevisionesExternas", mappedBy="documentosExternos")
     * @ORM\JoinColumn(name="idde", referencedColumnName="documentos_externos_idde", nullable=false)
     */
    protected $revisionesExternas;

    public function __construct()
    {
        $this->revisionesExternas = new ArrayCollection();
    }

    /**
     * Set the value of idde.
     *
     * @param integer $idde
     * @return \CoreBundle\Entity\DocumentosExternos
     */
    public function setIdde($idde)
    {
        $this->idde = $idde;

        return $this;
    }

    /**
     * Get the value of idde.
     *
     * @return integer
     */
    public function getIdde()
    {
        return $this->idde;
    }

    /**
     * Set the value of nombre_documento.
     *
     * @param string $nombre_documento
     * @return \CoreBundle\Entity\DocumentosExternos
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
     * Set the value of fecha_ultima.
     *
     * @param \DateTime $fecha_ultima
     * @return \CoreBundle\Entity\DocumentosExternos
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
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\DocumentosExternos
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

    /**
     * Add RevisionesExternas entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\RevisionesExternas $revisionesExternas
     * @return \CoreBundle\Entity\DocumentosExternos
     */
    public function addRevisionesExternas(RevisionesExternas $revisionesExternas)
    {
        $this->revisionesExternas[] = $revisionesExternas;

        return $this;
    }

    /**
     * Remove RevisionesExternas entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\RevisionesExternas $revisionesExternas
     * @return \CoreBundle\Entity\DocumentosExternos
     */
    public function removeRevisionesExternas(RevisionesExternas $revisionesExternas)
    {
        $this->revisionesExternas->removeElement($revisionesExternas);

        return $this;
    }

    /**
     * Get RevisionesExternas entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRevisionesExternas()
    {
        return $this->revisionesExternas;
    }

    public function __sleep()
    {
        return array('idde', 'nombre_documento', 'fecha_ultima', 'created_at');
    }
}