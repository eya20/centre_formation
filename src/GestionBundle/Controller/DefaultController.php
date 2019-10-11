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
        $formations = $this->get('formation.service')->formationEnCours();
        $montants =  $this->get('formation.service')->MontantMonth();
        $month = [];
        $total = [];
        foreach ($montants as $montant) {
            array_push($month, $montant['month']);
            array_push($total, $montant['total']);
        }

        return $this->render('@Gestion/index.html.twig', array('formations' => $formations, 'months' => $month, 'totals' => $total));
    }
}
