<?php

namespace GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Formateur;
use Symfony\Component\HttpFoundation\Response;

class FormateurController extends Controller
{
    /**
     * @Route("/formateur/liste", name="listeFormateurs")
     */
    public function listeFormateursAction( Request $request )
    {
        $data = $this->get('formateur.service')->getAll( $request->get( 'search' ) ); 

        return $this->render('@Gestion/Formateurs/listeFormateurs.html.twig', ['data' => $data]);
    }

    /**
     * @Route("/formateur/addEdit/{id}", name="addEditFormateur")
     */
    public function addEditAction($id,  Request $request)
    {
        if ($request->isMethod('POST')) {
            $params = [];
            $params['uniq_id']  = $request->get('uniq_id');
            $params['prenom']   = $request->get('prenom');
            $params['nom']      = $request->get('nom');
            $params['email']    = $request->get('email');
            $params['telephone'] = $request->get('telephone');

            try {
                if ($id == 0) {
                    $this->get('formateur.service')->add($params);

                    $this->addFlash('success', 'Formateur ajouté avec succès');
                }else{
                    $this->get('formateur.service')->update($id , $params);

                    $this->addFlash('success', 'Formateur mis à jour avec succès');
                }
            } catch (\Exception $e) { }
            return $this->redirectToRoute("listeFormateurs");
        }

        $formateur = new Formateur();


        if ($id > 0) {
            $formateur = $this->get('formateur.service')->getById($id);
        }

        return $this->render('@Gestion/Formateurs/addEditForm.html.twig', ['formateur' => $formateur]);
    }

    /**
     * @Route("/formateur/delete/{id}", name="deleteFormateur")
    */
    public function deleteAction($id)
    {
        $this->get('formateur.service')->remove($id);
        $this->addFlash('success', 'Formateur supprimé avec succès');
        return new Response("");
    }
}
