<?php

namespace AppBundle\Entity;

/**
 * Formateur
 */
class Formateur
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
     * @var string
     */
    private $prenom;

    /**
     * @var integer
     */
    private $uniqId;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $telephone;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $formation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $matiere;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->formation = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Formateur
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Formateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set uniqId
     *
     * @param integer $uniqId
     *
     * @return Formateur
     */
    public function setUniqId($uniqId)
    {
        $this->uniqId = $uniqId;
    
        return $this;
    }

    /**
     * Get uniqId
     *
     * @return integer
     */
    public function getUniqId()
    {
        return $this->uniqId;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Formateur
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Formateur
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    
        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Add formation
     *
     * @param \AppBundle\Entity\Formation $formation
     *
     * @return Formateur
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

    /**
     * Add matiere
     *
     * @param \AppBundle\Entity\Matiere $matiere
     *
     * @return Formateur
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
     * Get matiere
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMatiere()
    {
        return $this->matiere;
    }
}
