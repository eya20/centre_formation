<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\noteRepository")
 */
class note
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="note", type="float")
     */
    private $note;

     /**
     * @ORM\ManyToOne(targetEntity="Etudiant", inversedBy="note")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiant;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set note
     *
     * @param float $note
     *
     * @return note
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return float
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set etudiant
     *
     * @param \GestionBundle\Entity\Etudiant $etudiant
     *
     * @return note
     */
    public function setEtudiant(\GestionBundle\Entity\Etudiant $etudiant)
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    /**
     * Get etudiant
     *
     * @return \GestionBundle\Entity\Etudiant
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }
}
