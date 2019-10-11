<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * listeNote
 *
 */
class listeNote
{
    /**
     * @var int
     *
     */
    private $id;

    /**
     * @var float
     */
    private $note;

    /**
     * @var string
     */
    private $document;

    /**
     * @var string
     */
    private $chemin;

    /**
     * @var \AppBundle\Entity\Etudiant
     */
    private $etudiant;

    /**
     * @var \AppBundle\Entity\Formation
     */
    private $formation;

    /**
     * @var \AppBundle\Entity\Matiere
     */
    private $matiere;


    /**
     * Get id
     *
     * @return integer
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
     * @return listeNote
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
     * @param \AppBundle\Entity\Etudiant $etudiant
     *
     * @return listeNote
     */
    public function setEtudiant(\AppBundle\Entity\Etudiant $etudiant = null)
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    /**
     * Get etudiant
     *
     * @return \AppBundle\Entity\Etudiant
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }

    /**
     * Set formation
     *
     * @param \AppBundle\Entity\Formation $formation
     *
     * @return listeNote
     */
    public function setFormation(\AppBundle\Entity\Formation $formation = null)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return \AppBundle\Entity\Formation
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Set matiere
     *
     * @param \AppBundle\Entity\Matiere $matiere
     *
     * @return listeNote
     */
    public function setMatiere(\AppBundle\Entity\Matiere $matiere = null)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return \AppBundle\Entity\Matiere
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set document
     *
     * @param string $document
     *
     * @return listeNote
     */
    public function setDocument($document)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set chemin
     *
     * @param string $chemin
     *
     * @return listeNote
     */
    public function setChemin($chemin)
    {
        $this->chemin = $chemin;

        return $this;
    }

    /**
     * Get chemin
     *
     * @return string
     */
    public function getChemin()
    {
        return $this->chemin;
    }
}
