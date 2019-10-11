<?php

namespace GestionBundle\Controller;

use AppBundle\Entity\Formation;
use AppBundle\Entity\Matiere;
use GestionBundle\Form\FormationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\EvaluationDocument;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class FormationController extends Controller
{

    /**
     * @Route("/liste/formation", name="listeFormations")
     */
    public function listeFormationsAction(Request $request)
    {
        $formations = $this->get('formation.service')->getAll($request->get('search'));

        return $this->render('@Gestion/Formations/listeFormations.html.twig', ['formations' => $formations]);
    }

    /**
     * @Route("/formation/formateur/delete/{id}/{idf}", name="delete formateur")
     */
    public function deleteFormateurAction($id, $idf)
    {
        $em = $this->getDoctrine()->getManager();
        $formateur = $this->get('formateur.service')->getById($id);
        $formation = $this->get('formation.service')->getById($idf);
        $formation->removeFormateur($formateur);

        $em->persist($formation);
        $em->flush();

        return new Response('');
    }

    /**
     * @Route("/formation/matiere/delete/{id}/{idf}", name="delete matiere")
     */
    public function deleteMatiereAction($id, $idf)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $matiere = $entityManager->getRepository(Matiere::class)->find($id);
        $formation = $this->get('formation.service')->getById($idf);
        $formation->removeMatiere($matiere);

        $entityManager->persist($formation);
        $entityManager->flush();

        return new Response('');
    }

    /**
     * @Route("/formation/delete/{id}", name="deleteFormation")
     */
    public function SupprimeAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $formation = $entityManager->getRepository(Formation::class)->find($id);
        $formation->setDateSuppression(new \DateTime('now'));

        $entityManager->persist($formation);
        $entityManager->flush();

        $this->addFlash('success', 'Formation supprimé avec succès');

        return $this->redirectToRoute("listeFormations");
    }

    /**
     * @Route("/formation/show/{id}", name="showFormation")
     */
    public function ShowAction($id)
    {

        $formation = $this->get('formation.service')->getById($id);
        $formateurs = $formation->getFormateur();
        $matieres = $formation->getMatiere();
        $evaluation = $this->get('formation.service')->getEvaluation($id);
        $document = $this->get('formation.service')->getDocuments($formation);
        $etudiants = $this->get('formation.service')->getEtudiantFormation($id);
        $paiment = $this->get('formation.service')->getEtudiantInfos($id);

        return $this->render(
            '@Gestion/Formations/formation.html.twig',
            ['formation' => $formation, 'formateurs' => $formateurs, 'matieres' => $matieres, 'evaluation' => $evaluation, 'docs' => $document, 'etudiants' => $etudiants, "paiment" => $paiment]
        );
    }

    /**
     * @Route("/formation/print/{id}", name="printFormation")
     */
    public function FormationPrintAction($id)
    {

        $formation = $this->get('formation.service')->getById($id);
        $formateurs = $formation->getFormateur();
        $matieres = $formation->getMatiere();
        $evaluation = $this->get('formation.service')->getEvaluation($id);
        $document = $this->get('formation.service')->getDocuments($formation);
        $etudiants = $this->get('formation.service')->getEtudiantFormation($id);

        $html =  $this->render(
            '@Gestion/Formations/printFormation.html.twig',
            ['formation' => $formation, 'formateurs' => $formateurs, 'matieres' => $matieres, 'evaluation' => $evaluation, 'docs' => $document, 'etudiants' => $etudiants['etudiants']]
        )->getContent();

        $ch = curl_init();

        $header = "";
        $footer = "";
        curl_setopt($ch, CURLOPT_URL, "http://tqsan.com/dompdf/createPDF-iss.php");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     http_build_query(['header' => $header, 'content' =>  $html, 'footer' => $footer]));
        curl_setopt($ch, CURLOPT_POST,           1);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');

        $result = curl_exec($ch);

        header("Content-type:application/pdf");
        echo $result;
        exit;

        return $this->render(
            '@Gestion/Formations/printFormation.html.twig',
            ['formation' => $formation, 'formateurs' => $formateurs, 'matieres' => $matieres, 'evaluation' => $evaluation, 'docs' => $document, 'etudiants' => $etudiants['etudiants']]
        );
    }

    /**
     * @Route("/liste/formation/print", name="printListeFormation")
     */
    public function ListeFormationPrintAction(Request $request)
    {

        $formations = $this->get('formation.service')->getAll($request->get('search'));

        $html =  $this->render(
            '@Gestion/Formations/printListeFormation.html.twig',
            ['formations' => $formations]
        )->getContent();

        $ch = curl_init();

        $header = "";
        $footer = "";
        curl_setopt($ch, CURLOPT_URL, "http://tqsan.com/dompdf/createPDF-iss.php");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     http_build_query(['header' => $header, 'content' =>  $html, 'footer' => $footer]));
        curl_setopt($ch, CURLOPT_POST,           1);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');

        $result = curl_exec($ch);

        header("Content-type:application/pdf");
        echo $result;
        exit;

        return $result;
    }



    /**
     * @Route("/formation/etudiant/paiment/{idf}/{id}", name="Etudiantpaiment")
     */
    public function PaimentEtudiantAction(Request $request, $idf, $id)
    {
        $etudiantformation = $this->get('formation.service')->getEtudiantFor($id, $idf);
        $etudiant = $this->get('etudiant.service')->getById($id);
        $formation = $this->get('formation.service')->getById($idf);

        if ($request->isMethod('POST')) {

            $montant = $request->get('montant');
            $check = $request->get('paye');
            if ($check) {
                $paye = "payé";
            } else {
                $paye = "non payé";
            }

            $this->get('formation.service')->paiment($formation, $etudiant, $montant, $paye);

            $this->addFlash('success', 'Paiment ajouté avec succès');
            return $this->redirectToRoute("listeFormations");
        }
        return $this->render('@Gestion/Formations/listeEtudiants.html.twig', array('etudiantformation' => $etudiantformation, 'formation' => $formation, 'etudiant' => $etudiant));
    }

    /**
     * @Route("/listeEtudiant/print/{id}", name="printListeEtudiant")
     */
    public function imprimerEtudiantAction($id)
    {
        $etudiants = $this->get('formation.service')->getEtudiantFormation($id);
        $html = $this->render('@Gestion/Formations/print.html.twig', ['etudiants' => $etudiants['etudiants']])->getContent();

        $ch = curl_init();

        $header = "";
        $footer = "";
        curl_setopt($ch, CURLOPT_URL, "http://tqsan.com/dompdf/createPDF-iss.php");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,     http_build_query(['header' => $header, 'content' =>  $html, 'footer' => $footer]));
        curl_setopt($ch, CURLOPT_POST,           1);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');

        $result = curl_exec($ch);

        header("Content-type:application/pdf");
        echo $result;
        exit;

        return new Response($result);
    }


    /**
     * @Route("/formation/document/delete/{id}", name="deleteDocument")
     */
    public function deleteDocumentAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $document = $entityManager->getRepository(EvaluationDocument::class)->find($id);

        $entityManager->remove($document);
        $entityManager->flush();

        return new Response(""); // $this->redirectToRoute("listeMatiere");

    }

    /**
     * @Route("/formation/addEdit/{id}", name="addEditFormation")
     */
    public function addEditFormationAction($id, Request $request)
    {
        $form = $this->createForm(FormationType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $params = [];
            $params['nom']        = $form->get('nom')->getData();
            $params['dateDebut']  =  $form->get('dateDebut')->getData();
            $params['dateFin']    =  $form->get('dateFin')->getData();
            $params['salle']      =  $form->get('salle')->getData();
            $params['formateur']  =  $form->get('formateur')->getData();
            $params['etudiant']   = $form->get('etudiant')->getData();
            $params['matiere']    = $form->get('matiere')->getData();
            $params['dateEvaluation'] = $request->get('dateEvaluation');

            $docs = $request->files->get('docs');
            $params['document'] = [];
            foreach ($docs as $doc) {
                if ($doc) {
                    $fileName = md5(uniqid()) . '.' . $doc->guessExtension();
                    $doc->move($this->getParameter('evaluations_documents'), $fileName);

                    $params['document'][] = ['path' => $fileName, 'originale' => $doc->getClientOriginalName()];
                }
            }


            //$params['evaluation'] = $form->get('evaluation')->getData();
            try {
                if ($id == 0) {
                    $this->get('formation.service')->add($params);

                    $this->addFlash('success', 'Formation ajouté avec succès');
                } else {
                    $this->get('formation.service')->update($id, $params);

                    $this->addFlash('success', 'Formation mis à jour avec succès');
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
                $this->addFlash('error', $e->getMessage());
            }

            return $this->redirectToRoute("listeFormations");
        }

        $formation = new Formation();

        if ($id > 0) {
            $formation = $this->get('formation.service')->getById($id);
            $formateurs = $formation->getFormateur();
            $matieres = $formation->getMatiere();
            $evaluation = $this->get('formation.service')->getEvaluation($id);
            $documents = $this->get('formation.service')->getDocuments($formation);

            return $this->render('@Gestion/Formations/addEditFormation.html.twig', ['formation' => $formation, 'form' => $form->createView(), 'formateurs' => $formateurs, 'matieres' => $matieres, 'docs' => $documents, 'evaluation' => $evaluation]);
        }

        return $this->render('@Gestion/Formations/addEditFormation.html.twig', ['formation' => $formation, 'form' => $form->createView()]);
    }

    /**
     * @Route("/formation/addNote/{id}", name="addNote")
     */
    public function AddNoteAction(Request $request, $id)
    {

        $formation = $this->get('formation.service')->getById($id);
        $matieres = $this->get('formation.service')->getMatiereFormation($id);
        $etudiants = $this->get('formation.service')->getEtudiantFormation($id);

        if ($request->isMethod('POST')) {

            $params = [];
            $chemin = null;
            $document = null;
            foreach ($matieres as $matiere) {
                $idE = $request->get('state');
                $params['etudiant'] = $this->get('etudiant.service')->getById($idE);
                $params['formation'] = $formation;
                $params['matiere'] = $matiere;
                $params['note'] = $request->get($matiere->getId());
                $evaluation = $request->files->get($matiere->getId());

                if ($evaluation) {

                    $fileName = md5(uniqid()) . '.' . $evaluation->guessExtension();
                    $evaluation->move($this->getParameter('evaluations_documents'), $fileName);

                    $chemin = $fileName;
                    $document =  $evaluation->getClientOriginalName();
                }

                $this->get('formation.service')->addNote($params, $chemin, $document);
            }

            $this->addFlash('succcess', 'note ajouté avec succès');
            return $this->redirectToRoute('listeFormations');
        }



        return $this->render('@Gestion/Formations/AddNote.html.twig', array('matieres' => $matieres, 'etudiants' => $etudiants['etudiants'], 'formation' => $formation));
    }
}
