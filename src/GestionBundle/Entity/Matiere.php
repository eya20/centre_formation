<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matiere
 *
 * @ORM\Table(name="matiere")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\MatiereRepository")
 */
class Matiere
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
     * @ORM\ManyToMany(targetEntity="Formateur", inversedBy="matieres")
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
     * Constructor
     */
    public function __construct()
    {
        $this->formateurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add formateur
     *
     * @param \GestionBundle\Entity\Formateur $formateur
     *
     * @return Matiere
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
