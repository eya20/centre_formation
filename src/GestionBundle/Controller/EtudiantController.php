<?php

namespace GestionBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Etudiant;




class EtudiantController extends Controller
{


    /**
     * @Route("/etudiant/liste", name="listeEtudiants")
     */
    public function listeEtudiantsAction(Request $request)
    {

        $etudiants = $this->get('etudiant.service')->getAll($request->get('search'));
        return $this->render('@Gestion/Etudiant/listeEtudiants.html.twig', array(
            'etudiants' => $etudiants
        ));
    }

    /**
     * @Route("/etudiant/print/{id}", name="printEtudiant")
     */
    public function imprimerEtudiantAction($id, Request $request)
    {
        $etudiant = $this->get('etudiant.service')->getById($id);
        if ($etudiant->getImage()) {
            $imgContent = file_get_contents($request->server->get('DOCUMENT_ROOT') . "/Photos_des_profils/" . $etudiant->getImage());
            $imgContent = base64_encode($imgContent);
        }

        $html = $this->render('@Gestion/Etudiant/print.html.twig', ['etud' => $etudiant])->getContent();

        $ch = curl_init();

        $header = "";
        $footer = "";
        curl_setopt($ch, CURLOPT_URL, "http://tqsan.com/dompdf/createPDF-iss.php");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($etudiant->getImage()) {

            curl_setopt($ch, CURLOPT_POSTFIELDS,     http_build_query(['image' => $imgContent, 'header' => $header, 'content' =>  $html, 'footer' => $footer]));
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS,     http_build_query(['header' => $header, 'content' =>  $html, 'footer' => $footer]));
        }
        curl_setopt($ch, CURLOPT_POST,           1);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');

        $result = curl_exec($ch);

        header("Content-type:application/pdf");
        echo $result;
        exit;

        return new Response($result);
    }



    /**
     * @Route("/etudiant/delete/{id}", name="deleteEtudiant")
     */
    public function SupprimeAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $etudiant = $entityManager->getRepository(Etudiant::class)->find($id);

        $entityManager->remove($etudiant);
        $entityManager->flush();

        $this->addFlash('success', 'Etudiant supprimé avec succès');

        return $this->redirectToRoute("listeEtudiants");
    }

    /**
     * @Route("/etudiant/addEdit/{id}", name="addEditEtudiant")
     */
    public function addEditAction($id,  Request $request)
    {
        if ($request->isMethod('POST')) {

            $params = [];
            $params['uniq_id']  = $request->get('uniq_id');
            $params['prenom']   = $request->get('prenom');
            $params['nom']      = $request->get('nom');
            $params['email']    = $request->get('email');
            $params['date_naissance']    = $request->get('date_naissance');
            $params['lieu_naissance']    = $request->get('lieu_naissance');
            $params['adresse']    = $request->get('adresse');
            $params['telephone'] = $request->get('telephone');
            $params['niveau'] = $request->get('niveau');
            $params['note'] = $request->get('note');

            $image = $request->files->get('image');

            if ($image) {
                $fileName = md5(uniqid()) . '.' . $image->guessExtension();
                $image->move($this->getParameter('images_directory'), $fileName);

                $params['image'] = $fileName;
            } else {
                $params['image'] = $image;
            }

            try {
                if ($id == 0) {

                    $this->get('etudiant.service')->add($params);

                    $this->addFlash('success', 'Etudiant ajouté avec succès');
                } else {
                    $this->get('etudiant.service')->update($id, $params);

                    $this->addFlash('success', 'Etudiant mis à jour avec succès');
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
                $this->addFlash('error', $e->getMessage());
            }

            return $this->redirectToRoute("listeEtudiants");
        }

        $etudiant = new etudiant();

        if ($id > 0) {
            $etudiant = $this->get('etudiant.service')->getById($id);
        }

        return $this->render('@Gestion/Etudiant/addEditForm.html.twig', ['etudiant' => $etudiant]);
    }
}
