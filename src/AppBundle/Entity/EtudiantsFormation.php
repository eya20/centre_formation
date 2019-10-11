<?php

namespace AppBundle\Entity;

/**
 * EtudiantsFormation
 */
class EtudiantsFormation
{
    /**
     * @var integer
     */
    private $etudiantFormationId;

    /**
     * @var string
     */
    private $paye = 'NULL';

    /**
     * @var float
     */
    private $montant;

    /**
     * @var date
     */
    private $date;

    /**
     * @var \AppBundle\Entity\Etudiant
     */
    private $etudiant;

    /**
     * @var \AppBundle\Entity\Formation
     */
    private $formation;


    /**
     * Get etudiantFormationId
     *
     * @return integer
     */
    public function getEtudiantFormationId()
    {
        return $this->etudiantFormationId;
    }

    /**
     * Set paye
     *
     * @param string $paye
     *
     * @return EtudiantsFormation
     */
    public function setPaye($paye)
    {
        $this->paye = $paye;

        return $this;
    }

    /**
     * Get paye
     *
     * @return string
     */
    public function getPaye()
    {
        return $this->paye;
    }

    /**
     * Set montant
     *
     * @param string $montant
     *
     * @return EtudiantsFormation
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

    /**
     * Set etudiant
     *
     * @param \AppBundle\Entity\Etudiant $etudiant
     *
     * @return EtudiantsFormation
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
     * @return EtudiantsFormation
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return EtudiantsFormation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
