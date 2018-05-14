<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\RevisionesExternas
 *
 * @ORM\Entity()
 * @ORM\Table(name="revisiones_externas", indexes={@ORM\Index(name="fk_revisiones_externas_documentos_externos_idx", columns={"documentos_externos_idde"})})
 */
class RevisionesExternas
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idre;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $fecha;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $documentos_externos_idde;

    /**
     * @ORM\ManyToOne(targetEntity="DocumentosExternos", inversedBy="revisionesExternas")
     * @ORM\JoinColumn(name="documentos_externos_idde", referencedColumnName="idde", nullable=false)
     */
    protected $documentosExternos;

    public function __construct()
    {
    }

    /**
     * Set the value of idre.
     *
     * @param integer $idre
     * @return \CoreBundle\Entity\RevisionesExternas
     */
    public function setIdre($idre)
    {
        $this->idre = $idre;

        return $this;
    }

    /**
     * Get the value of idre.
     *
     * @return integer
     */
    public function getIdre()
    {
        return $this->idre;
    }

    /**
     * Set the value of fecha.
     *
     * @param \DateTime $fecha
     * @return \CoreBundle\Entity\RevisionesExternas
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
     * Set the value of documentos_externos_idde.
     *
     * @param integer $documentos_externos_idde
     * @return \CoreBundle\Entity\RevisionesExternas
     */
    public function setDocumentosExternosIdde($documentos_externos_idde)
    {
        $this->documentos_externos_idde = $documentos_externos_idde;

        return $this;
    }

    /**
     * Get the value of documentos_externos_idde.
     *
     * @return integer
     */
    public function getDocumentosExternosIdde()
    {
        return $this->documentos_externos_idde;
    }

    /**
     * Set DocumentosExternos entity (many to one).
     *
     * @param \CoreBundle\Entity\DocumentosExternos $documentosExternos
     * @return \CoreBundle\Entity\RevisionesExternas
     */
    public function setDocumentosExternos(DocumentosExternos $documentosExternos = null)
    {
        $this->documentosExternos = $documentosExternos;

        return $this;
    }

    /**
     * Get DocumentosExternos entity (many to one).
     *
     * @return \CoreBundle\Entity\DocumentosExternos
     */
    public function getDocumentosExternos()
    {
        return $this->documentosExternos;
    }

    public function __sleep()
    {
        return array('idre', 'fecha', 'documentos_externos_idde');
    }
}