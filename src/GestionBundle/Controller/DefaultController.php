<?php

namespace GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/dashboard", name="dashbaord")
     */
    public function indexAction()
    {
        return $this->render('@Gestion/index.html.twig');
    }

    /**
     * @Route("/ajouter_formation", name="ajouterFormation")
     */
    public function ajouterFormationAction()
    {
        return $this->render('@Gestion/Formations/ajouter.html.twig');
    }

    /**
     * @Route("/liste_formations", name="listeFormations")
     */
    public function listeFormationsAction()
    {
        return $this->render('@Gestion/Formations/listeFormations.html.twig');
    }

    /**
     * @Route("/ajouter_formateur", name="ajouterFormateur")
     */
    public function ajouterFormateurAction()
    {
        return $this->render('@Gestion/Formateurs/ajouter.html.twig');
    }

    /**
     * @Route("/liste_formateurs", name="listeFormateurs")
     */
    public function listeFormateursAction()
    {
        return $this->render('@Gestion/Formateurs/listeFormateurs.html.twig');
    }

    /**
     * @Route("/ajouter_etudiant", name="ajouterEtudiant")
     */
    public function ajouterEtudiantAction()
    {
        return $this->render('@Gestion/Etudiant/ajouter.html.twig');
    }

    /**
     * @Route("/liste_etudiants", name="listeEtudiants")
     */
    public function listeEtudiantsAction()
    {
        return $this->render('@Gestion/Etudiant/listeEtudiants.html.twig');
    }

    /**
     * @Route("/ajouter_matiere", name="ajouterMatiere")
     */
    public function ajouterMatiereAction()
    {
        return $this->render('@Gestion/Matiere/ajouter.html.twig');
    }

    /**
     * @Route("/liste_matieres", name="listeMatiere")
     */
    public function listeMatiereAction()
    {
        return $this->render('@Gestion/Matiere/listeMatieres.html.twig');
    }

    /**
     * @Route("/ajouter_evaluation", name="ajouterEvaluation")
     */
    public function ajouterEvaluationAction()
    {
        return $this->render('@Gestion/Evaluations/ajouter.html.twig');
    }

    /**
     * @Route("/liste_evaluations", name="listeEvaluations")
     */
    public function listeEvaluationsAction()
    {
        return $this->render('@Gestion/Evaluations/listeEvaluations.html.twig');
    }

    /**
     * @Route("/notes", name="notes")
     */
    public function notessAction()
    {
        return $this->render('@Gestion/note/notes.html.twig');
    }



}
