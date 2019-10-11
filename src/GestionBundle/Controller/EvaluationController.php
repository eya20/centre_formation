<?php

namespace GestionBundle\Controller;

use AppBundle\Entity\EvaluationDocument;
use AppBundle\Entity\Evaluations;
use GestionBundle\Form\EvaluationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class EvaluationController extends Controller
{
    /**
     * @Route("/evaluations/liste", name="listeEvaluations")
     */
    public function listeEvaluationsAction(Request $request)
    {
        $evaluations = $this->get('evaluation.service')->getAll($request->get('search'));
        return $this->render('@Gestion/Evaluations/listeEvaluations.html.twig', array(
            'evaluations' => $evaluations
        ));
    }

    /** 
     * @Route("/evaluation/document/delete/{id}", name="deleteDocumentevaluation")
     */
    public function SupprimeDocumentAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $document = $entityManager->getRepository(EvaluationDocument::class)->find($id);

        $entityManager->remove($document);
        $entityManager->flush();

        return new Response(""); // $this->redirectToRoute("listeMatiere");
    }

    /**
     * @Route("/evaluation/addEdit/{id}", name="addEditEvaluation")
     */
    public function addEditAction($id, Request $request)
    {

        $form = $this->createForm(EvaluationType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $params = [];
            $params['nomEvaluation'] = $form->get('nomEvaluation')->getData();
            $params['dateEvaluation'] = $form->get('dateEvaluation')->getData();
            $params['formations'] = $form->get('formations')->getData();

            $docs = $request->files->get('docs');
            $params['document'] = [];
            foreach ($docs as $doc) {
                if ($doc) {
                    $fileName = md5(uniqid()) . '.' . $doc->guessExtension();
                    $doc->move($this->getParameter('evaluations_documents'), $fileName);

                    $params['document'][] = ['path' => $fileName, 'originale' => $doc->getClientOriginalName()];
                }
            }



            try {

                if ($id == 0) {
                    $this->get('evaluation.service')->add($params);
                    $this->addFlash('success', 'Evaluation ajouté avec succès');
                } else {
                    $this->get('evaluation.service')->update($id, $params);
                    $this->addFlash('success', 'Evaluation mis à jour avec succès');
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
                $this->addFlash('error', $e->getMessage());
            }

            return $this->redirectToRoute('listeEvaluations');
        }

        $evaluation = new Evaluations();
        if ($id > 0) {
            $evaluation = $this->get('evaluation.service')->getById($id);
            $documents = $this->get('evaluation.service')->getDocuments($id);

            return $this->render('@Gestion/Evaluations/addEditEvaluation.html.twig', array(
                'evaluation' => $evaluation, 'form' => $form->createView(), 'docs' => $documents
            ));
        }

        return $this->render('@Gestion/Evaluations/addEditEvaluation.html.twig', array(
            'evaluation' => $evaluation, 'form' => $form->createView()
        ));
    }
}
