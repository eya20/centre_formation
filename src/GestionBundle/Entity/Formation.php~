<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\FormationRepository")
 */
class Formation
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date")
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="salle", type="string", length=255)
     */
    private $salle;
    
    /**
     * @ORM\OneToMany(targetEntity="Evaluations",mappedBy="formations")
     */
    private $evaluation;

     /**
     * @ORM\ManyToMany(targetEntity="Etudiant", inversedBy="formations")
     */
    private $etudiants;

    /**
     * @ORM\ManyToMany(targetEntity="Formateur", inversedBy="formations")
     */
    private $formateurs;

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
     * @param \DateTime $dateDebut
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
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
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
     * @return \DateTime
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
     * Constructor
     */
    public function __construct()
    {
        $this->evaluation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add evaluation
     *
     * @param \GestionBundle\Entity\Evaluations $evaluation
     *
     * @return Formation
     */
    public function addEvaluation(\GestionBundle\Entity\Evaluations $evaluation)
    {
        $this->evaluation[] = $evaluation;

        return $this;
    }

    /**
     * Remove evaluation
     *
     * @param \GestionBundle\Entity\Evaluations $evaluation
     */
    public function removeEvaluation(\GestionBundle\Entity\Evaluations $evaluation)
    {
        $this->evaluation->removeElement($evaluation);
    }

    /**
     * Get evaluation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Add etudiant
     *
     * @param \GestionBundle\Entity\Etudiant $etudiant
     *
     * @return Formation
     */
    public function addEtudiant(\GestionBundle\Entity\Etudiant $etudiant)
    {
        $this->etudiants[] = $etudiant;

        return $this;
    }

    /**
     * Remove etudiant
     *
     * @param \GestionBundle\Entity\Etudiant $etudiant
     */
    public function removeEtudiant(\GestionBundle\Entity\Etudiant $etudiant)
    {
        $this->etudiants->removeElement($etudiant);
    }

    /**
     * Get etudiants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtudiants()
    {
        return $this->etudiants;
    }

    /**
     * Add formateur
     *
     * @param \GestionBundle\Entity\Formateur $formateur
     *
     * @return Formation
     */
    public function addFormateur(\GestionBundle\Entity\Formateur $formateur)
    {
        $this->formateurs[] = $formateur;

        return $this;
    }

    /**
     * Remove formateur
     *
     * @param \GestionBundle\Entity\Formateur $formateur
     */
    public function removeFormateur(\GestionBundle\Entity\Formateur $formateur)
    {
        $this->formateurs->removeElement($formateur);
    }

    /**
     * Get formateurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormateurs()
    {
        return $this->formateurs;
    }
}
