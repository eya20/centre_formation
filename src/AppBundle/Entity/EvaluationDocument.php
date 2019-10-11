<?php

namespace AppBundle\Entity;

/**
 * EvaluationDocument
 */
class EvaluationDocument
{
    /**
     * @var integer
     */
    private $documentId;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $chemin;

    /**
     * @var \AppBundle\Entity\Evaluations
     */
    private $evaluation;

    /**
     * @var \AppBundle\Entity\Formation
     */
    private $formation;

    /**
     * Get documentId
     *
     * @return integer
     */
    public function getDocumentId()
    {
        return $this->documentId;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return EvaluationDocument
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
     * Set chemin
     *
     * @param string $chemin
     *
     * @return EvaluationDocument
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

    /**
     * Set evaluation
     *
     * @param \AppBundle\Entity\Evaluations $evaluation
     *
     * @return EvaluationDocument
     */
    public function setEvaluation(\AppBundle\Entity\Evaluations $evaluation = null)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    /**
     * Get evaluation
     *
     * @return \AppBundle\Entity\Evaluations
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Set formation
     *
     * @param \AppBundle\Entity\Formation $formation
     *
     * @return EvaluationDocument
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
     * @var integer
     */
    private $id;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
