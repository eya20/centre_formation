<?php

namespace AppBundle\Entity;

/**
 * MatiereDocument
 */
class MatiereDocument
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
     * @var \AppBundle\Entity\Matiere
     */
    private $matiere;


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
     * @return MatiereDocument
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
     * @return MatiereDocument
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
     * Set matiere
     *
     * @param \AppBundle\Entity\Matiere $matiere
     *
     * @return MatiereDocument
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

    /**
     * Set documentId
     *
     * @param integer $documentId
     *
     * @return MatiereDocument
     */
    public function setDocumentId($documentId)
    {
        $this->documentId = $documentId;

        return $this;
    }
}
