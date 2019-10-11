<?php

namespace GestionBundle\Controller;

use AppBundle\Entity\Matiere;
use AppBundle\Entity\MatiereDocument;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use GestionBundle\Form\MatiereType;

class MatiereController extends Controller
{

    /**
     * @Route("/matieres/liste", name="listeMatiere")
     */
    public function listeMatiereAction(Request $request)
    {
        $matieres = $this->get('matiere.service')->getAll($request->get('search'));
        return $this->render('@Gestion/Matiere/listeMatieres.html.twig', array(
            'matieres' => $matieres
        ));
    }

    /**
     * @Route("/matiere/delete/{id}", name="deleteMatiere")
     */
    public function SupprimeAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $matiere = $entityManager->getRepository(Matiere::class)->find($id);

        $entityManager->remove($matiere);
        $entityManager->flush();

        $this->addFlash('success', 'Matière supprimée avec succès');

        return new Response(""); // $this->redirectToRoute("listeMatiere");
    }

    /**
     * @Route("/matiere/document/delete/{id}", name="deleteDocumentMatiere")
     */
    public function SupprimeDocumentAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $matiere = $entityManager->getRepository(MatiereDocument::class)->find($id);

        $entityManager->remove($matiere);
        $entityManager->flush();

        //$this->addFlash('success', 'Document supprimé avec succès');

        return new Response(""); // $this->redirectToRoute("listeMatiere");
    }




    /**
     * @Route("/matieres/addEdit/{id}", name="addEditMatiere")
     */
    public function addEditMatiereAction($id, Request $request)
    {
        $form = $this->createForm(MatiereType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $params = [];
            $params['nom']   = $form->get('nom')->getData();
            $params['duree'] = $form->get('duree')->getData();

            $docs = $request->files->get('docs');

            $params['docs'] = [];
            foreach ($docs as $doc) {
                if ($doc) {
                    $fileName = md5(uniqid()) . '.' . $doc->guessExtension();
                    $doc->move($this->getParameter('docs_directory'), $fileName);

                    $params['docs'][] = ['path' => $fileName, 'original' => $doc->getClientOriginalName()];
                }
            }

            try {

                if ($id == 0) {
                    $this->get('matiere.service')->add($params);
                    $this->addFlash('success', 'Matière ajouté avec succès');
                } else {
                    $this->get('matiere.service')->update($id, $params);
                    $this->addFlash('success', 'Matière mis à jour avec succès');
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
                $this->addFlash('error', $e->getMessage());
            }

            return $this->redirectToRoute('listeMatiere');
        }

        $matiere = new Matiere();

        if ($id > 0) {
            $matiere = $this->get('matiere.service')->getById($id);
            $documents = $this->get('matiere.service')->getDocuments($id);
            return $this->render('@Gestion/Matiere/addEditMatiere.html.twig', array(
                'matiere' => $matiere, 'form' => $form->createView(), 'docs' => $documents
            ));
        }

        return $this->render('@Gestion/Matiere/addEditMatiere.html.twig', array(
            'matiere' => $matiere, 'form' => $form->createView()
        ));
    }
}
