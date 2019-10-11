<?php

namespace GestionBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Evaluations;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;

class noteEtudiantsController extends Controller
{
    /**
     * @Route("/liste/evaluations/notes", name="notes")
     */
    public function notessAction(Request $request)
    {
        $evaluations = $this->get('evaluation.service')->getAll($request->get('search'));
        return $this->render('@Gestion/note/notes.html.twig', ['evaluations' => $evaluations]);
    }

    /**
     * @Route("/evaluation/listeNote/etudiant/{id}",name="listeNotes")
     */
    public function listeNoteAction($id)
    {

        $evaluation = $this->get('listenote.service')->getEvaluation($id);
        if ($evaluation) { }
    }

    /**
     * @Route("/listeNote/Add/{id}",name="addListe")
     */
    public function AddAction(Request $request, $id)
    {
        $evaluation = $this->get('listenote.service')->getEvaluation($id);
        $etudiants = $this->get('listenote.service')->getEtudiants($id);

        if ($request->isMethod('POST')) {

            foreach ($etudiants as $etudiant) {
                $note = $request->get($etudiant->getId());
                $this->get('listenote.service')->addListeNotes($evaluation, $note, $etudiant);
            }

            $this->addFlash('success', 'liste Notes ajouté avec succès');
            return $this->redirectToRoute('notes');
        }

        return $this->render('@Gestion/note/addEdit.html.twig', array('etudiants' => $etudiants, 'evaluation' => $evaluation));
    }
}
