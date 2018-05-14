<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * CoreBundle\Entity\Usuarios
 *
 * @ORM\Entity(repositoryClass="CoreBundle\Entity\UsuariosRepository")
 * @ORM\Table(name="usuarios", indexes={@ORM\Index(name="fk_usuarios_level1_idx", columns={"idl"})})
 */
class Usuarios implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idu;

    /**
     * @ORM\Column(name="`user`", type="string", length=50, nullable=true)
     */
    protected $user;

    /**
     * @ORM\Column(name="`password`" ,type="string", length=50, nullable=true)
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $mail;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $code;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $salt;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    protected $active;

    /**
     * @Gedmo\Timestampable(on="create", field="creado")
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $created_at;

    /**
     * @ORM\OneToMany(targetEntity="AddedResponsabilities", mappedBy="usuarios")
     * @ORM\JoinColumn(name="idu", referencedColumnName="idu", nullable=false)
     */
    protected $addedResponsabilities;

    /**
     * @ORM\ManyToOne(targetEntity="Level", inversedBy="usuarios")
     * @ORM\JoinColumn(name="idl", referencedColumnName="idl", nullable=false)
     */
    protected $level;

    public function __construct()
    {
        $this->addedResponsabilities = new ArrayCollection();
    }

    /**
     * Set the value of idu.
     *
     * @param integer $idu
     * @return \CoreBundle\Entity\Usuarios
     */
    public function setIdu($idu)
    {
        $this->idu = $idu;

        return $this;
    }

    /**
     * Get the value of idu.
     *
     * @return integer
     */
    public function getIdu()
    {
        return $this->idu;
    }

    /**
     * Set the value of user.
     *
     * @param string $user
     * @return \CoreBundle\Entity\Usuarios
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of user.
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of pass.
     *
     * @param string $password
     * @return \CoreBundle\Entity\Usuarios
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of mail.
     *
     * @param string $mail
     * @return \CoreBundle\Entity\Usuarios
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of mail.
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of idl.
     *
     * @param integer $idl
     * @return \CoreBundle\Entity\Usuarios
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
     * Set the value of salt.
     *
     * @param string $salt
     * @return \CoreBundle\Entity\Usuarios
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
        return $this;
    }

    /**
     * Get the value of salt.
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set the value of code.
     *
     * @param string $code
     * @return \CoreBundle\Entity\Usuarios
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of active.
     *
     * @param string $active
     * @return \CoreBundle\Entity\Usuarios
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of active.
     *
     * @return string
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\Usuarios
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
     * Add AddedResponsabilities entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\AddedResponsabilities $addedResponsabilities
     * @return \CoreBundle\Entity\Usuarios
     */
    public function addAddedResponsabilities(AddedResponsabilities $addedResponsabilities)
    {
        $this->addedResponsabilities[] = $addedResponsabilities;

        return $this;
    }

    /**
     * Remove AddedResponsabilities entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\AddedResponsabilities $addedResponsabilities
     * @return \CoreBundle\Entity\Usuarios
     */
    public function removeAddedResponsabilities(AddedResponsabilities $addedResponsabilities)
    {
        $this->addedResponsabilities->removeElement($addedResponsabilities);

        return $this;
    }

    /**
     * Get AddedResponsabilities entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddedResponsabilities()
    {
        return $this->addedResponsabilities;
    }

    /**
     * Set Level entity (many to one).
     *
     * @param \CoreBundle\Entity\Level $level
     * @return \CoreBundle\Entity\Usuarios
     */
    public function setLevel(Level $level = null)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get Level entity (many to one).
     *
     * @return \CoreBundle\Entity\Level
     */
    public function getLevel()
    {
        return $this->level;
    }

    public function getRoles()
    {
        return array('ROLE_ADMIN');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->idu,
            $this->user,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->idu,
            $this->user,
            $this->password,
            $this->
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->user;

    }

    public function __sleep()
    {
        return array('idu', 'user', 'password', 'mail', 'idl', 'salt', 'code', 'active', 'created_at');
    }
}



