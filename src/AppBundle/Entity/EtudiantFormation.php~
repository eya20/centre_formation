<?php

namespace AppBundle\Entity;

/**
 * EtudiantFormation
 */
class EtudiantFormation
{
    /**
     * @var integer
     */
    private $formationEtudiantid;

    /**
     * @var boolean
     */
    private $paye;

    /**
     * @var string
     */
    private $montant;

    /**
     * @var \AppBundle\Entity\Formation
     */
    private $formation;

    /**
     * @var \AppBundle\Entity\Etudiant
     */
    private $etudiant;

    /**
     * Get formationEtudiantid
     *
     * @return integer
     */
    public function getFormationEtudiantid()
    {
        return $this->formationEtudiantid;
    }

    /**
     * Set paye
     *
     * @param boolean $paye
     *
     * @return EtudiantFormation
     */
    public function setPaye($paye)
    {
        $this->paye = $paye;

        return $this;
    }

    /**
     * Get paye
     *
     * @return boolean
     */
    public function getPaye()
    {
        return $this->paye;
    }

    /**
     * Set formation
     *
     * @param \AppBundle\Entity\Formation $formation
     *
     * @return EtudiantFormation
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
     * Set etudiant
     *
     * @param \AppBundle\Entity\Etudiant $etudiant
     *
     * @return EtudiantFormation
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
     * Set montant
     *
     * @param string $montant
     *
     * @return EtudiantFormation
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string
     */
    public function getMontant()
    {
        return $this->montant;
    }
}
