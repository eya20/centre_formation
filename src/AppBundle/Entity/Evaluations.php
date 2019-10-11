<?php

namespace AppBundle\Entity;

/**
 * Evaluations
 */
class Evaluations
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dateEvaluation;

    /**
     * @var string
     */
    private $nomEvaluation;

    /**
     * @var \AppBundle\Entity\Formation
     */
    private $formation;

    /**
     * @var \AppBundle\Entity\listeNote
     */
    private $listenote;
 

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
     * Set dateEvaluation
     *
     * @param \DateTime $dateEvaluation
     *
     * @return Evaluations
     */
    public function setDateEvaluation($dateEvaluation)
    {
        $this->dateEvaluation = $dateEvaluation;

        return $this;
    }

    /**
     * Get dateEvaluation
     *
     * @return \DateTime
     */
    public function getDateEvaluation()
    {
        return $this->dateEvaluation;
    }

    /**
     * Set nomEvaluation
     *
     * @param string $nomEvaluation
     *
     * @return Evaluations
     */
    public function setNomEvaluation($nomEvaluation)
    {
        $this->nomEvaluation = $nomEvaluation;

        return $this;
    }

    /**
     * Get nomEvaluation
     *
     * @return string
     */
    public function getNomEvaluation()
    {
        return $this->nomEvaluation;
    }
    /**
     * Set formation
     *
     * @param \AppBundle\Entity\Formation $formation
     *
     * @return Evaluations
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
}
