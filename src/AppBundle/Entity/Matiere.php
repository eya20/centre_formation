<?php

namespace AppBundle\Entity;

/**
 * Matiere
 */
class Matiere
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var integer
     */
    private $duree;

    /**
     * @var \AppBundle\Entity\listeNote
     */
    private $listenote;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $formateur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $formation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->formateur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->formation = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Matiere
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     *
     * @return Matiere
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Add formateur
     *
     * @param \AppBundle\Entity\Formateur $formateur
     *
     * @return Matiere
     */
    public function addFormateur(\AppBundle\Entity\Formateur $formateur)
    {
        $this->formateur[] = $formateur;

        return $this;
    }

    /**
     * Remove formateur
     *
     * @param \AppBundle\Entity\Formateur $formateur
     */
    public function removeFormateur(\AppBundle\Entity\Formateur $formateur)
    {
        $this->formateur->removeElement($formateur);
    }

    /**
     * Get formateur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormateur()
    {
        return $this->formateur;
    }

    /**
     * Add formation
     *
     * @param \AppBundle\Entity\Formation $formation
     *
     * @return Matiere
     */
    public function addFormation(\AppBundle\Entity\Formation $formation)
    {
        $this->formation[] = $formation;

        return $this;
    }

    /**
     * Remove formation
     *
     * @param \AppBundle\Entity\Formation $formation
     */
    public function removeFormation(\AppBundle\Entity\Formation $formation)
    {
        $this->formation->removeElement($formation);
    }

    /**
     * Get formation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormation()
    {
        return $this->formation;
    }
}
