<?php

namespace GestionBundle\Service;

use AppBundle\Entity\listeNote;
use AppBundle\Entity\Evaluations;
use AppBundle\Entity\EtudiantFormation;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;

class listeNoteService
{

    private $entityManager;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    public function add($params)
    {
        $listenote = new listeNote();
        $listenote->setNote($params['note']);
        $listenote->setEtudiant($params['etudiant']);
        $listenote->setEvaluation($params['evaluation']);

        $this->entityManager->persist($listenote);
        $this->entityManager->flush();
    }
    public function getEtudiants($id)
    {
        $evaluation = $this->entityManager->getRepository(Evaluations::class)->find($id);
        $id = $evaluation->getFormation()->getId();
        $etudiants = $this->getEtudiantFormation($id);
        return $etudiants;
    }

    public function getlisteNote($id)
    {
        return $this->entityManager->getRepository(listeNote::class)->findOneBy(['evaluation' => $id]);
    }
    public function getEvaluation($id)
    {
        return $this->entityManager->getRepository(Evaluations::class)->find($id);
    }

    public function getEtudiantFormation($id)
    {
        $EtudiantFormation = $this->entityManager->getRepository(EtudiantFormation::class)->findBy(['formation' => $id]);
        $etudfor = [];
        foreach ($EtudiantFormation as $formation)
            array_push($etudfor, $formation->getEtudiant());
        return $etudfor;
    }

    public function addListeNotes($evaluation, $note, $etudiant)
    {
        $ListeNotes = new listeNote();
        $ListeNotes->setNote($note);
        $ListeNotes->setEtudiant($etudiant);
        $ListeNotes->setEvaluation($evaluation);

        $this->entityManager->persist($ListeNotes);
        $this->entityManager->flush();
    }
}
