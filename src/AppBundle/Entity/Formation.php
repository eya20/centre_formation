<?php

namespace AppBundle\Entity;

/**
 * Formation
 */
class Formation
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
     * @var \Date
     */
    private $dateDebut;

    /**
     * @var \Date
     */
    private $dateFin;

    /**
     * @var \Date
     */
    private $dateSuppression;

    /**
     * @var string
     */
    private $salle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $formateur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $etudiant;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $matiere;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $EtudiantFormation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->formateur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->etudiant = new  \Doctrine\Common\Collections\ArrayCollection();
        $this->matiere = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Formation
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
     * Set dateDebut
     *
     * @param \Date $dateDebut
     *
     * @return Formation
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \Date
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \Date $dateFin
     *
     * @return Formation
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \Date
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set salle
     *
     * @param string $salle
     *
     * @return Formation
     */
    public function setSalle($salle)
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * Get salle
     *
     * @return string
     */
    public function getSalle()
    {
        return $this->salle;
    }

    /**
     * Add formateur
     *
     * @param \AppBundle\Entity\Formateur $formateur
     *
     * @return Formation
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
     * Add etudiant
     *
     * @param \AppBundle\Entity\Etudiant $etudiant
     *
     * @return Formation
     */
    public function addEtudiant(\AppBundle\Entity\Etudiant $etudiant)
    {
        $this->etudiant[] = $etudiant;

        return $this;
    }

    /**
     * Remove etudiant
     *
     * @param \AppBundle\Entity\Etudiant $etudiant
     */
    public function removeEtudiant(\AppBundle\Entity\Etudiant $etudiant)
    {
        $this->etudiant->removeElement($etudiant);
    }

    /**
     * Get Etudiant
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }

    /**
     * Add matiere
     *
     * @param \AppBundle\Entity\Matiere $matiere
     *
     * @return Formation
     */
    public function addMatiere(\AppBundle\Entity\Matiere $matiere)
    {
        $this->matiere[] = $matiere;

        return $this;
    }

    /**
     * Remove matiere
     *
     * @param \AppBundle\Entity\Matiere $matiere
     */
    public function removeMatiere(\AppBundle\Entity\Matiere $matiere)
    {
        $this->matiere->removeElement($matiere);
    }

    /**
     * Get Matiere
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Add etudiantFormation
     *
     * @param \AppBundle\Entity\EtudiantFormation $etudiantFormation
     *
     * @return Formation
     */
    public function addEtudiantFormation(\AppBundle\Entity\EtudiantFormation $etudiantFormation)
    {
        $this->EtudiantFormation[] = $etudiantFormation;

        return $this;
    }

    /**
     * Remove etudiantFormation
     *
     * @param \AppBundle\Entity\EtudiantFormation $etudiantFormation
     */
    public function removeEtudiantFormation(\AppBundle\Entity\EtudiantFormation $etudiantFormation)
    {
        $this->EtudiantFormation->removeElement($etudiantFormation);
    }

    /**
     * Get etudiantFormation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtudiantFormation()
    {
        return $this->EtudiantFormation;
    }

    /**
     * Set dateSuppression
     *
     * @param \DateTime $dateSuppression
     *
     * @return Formation
     */
    public function setDateSuppression($dateSuppression)
    {
        $this->dateSuppression = $dateSuppression;

        return $this;
    }

    /**
     * Get dateSuppression
     *
     * @return \DateTime
     */
    public function getDateSuppression()
    {
        return $this->dateSuppression;
    }
}
