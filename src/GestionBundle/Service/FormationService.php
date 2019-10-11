<?php

namespace GestionBundle\Service;

use AppBundle\Entity\EtudiantsFormation;
use AppBundle\Entity\EvaluationDocument;
use AppBundle\Entity\Formateur;
use AppBundle\Entity\Formation;
use AppBundle\Entity\Evaluations;
use AppBundle\Entity\listeNote;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

class FormationService
{

    private $entityManager;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    public function getAll($search = "")
    {

        if (strlen($search) > 0) {
            $repo = $this->entityManager->getRepository(Formation::class);
            $query = $repo->createQueryBuilder('a')
                ->where('a.nom LIKE :title')
                ->setParameter('title', '%' . $search . '%')
                ->getQuery();

            return $query->getResult();
        }

        return $this->entityManager->getRepository(Formation::class)->findAll();
    }

    public function add($params)
    {

        $formation = new Formation();
        $formation->setNom($params['nom']);
        $formation->setDateDebut(\DateTime::createFromFormat('Y-m-j', $params['dateDebut']));
        $formation->setDateFin(\DateTime::createFromFormat('Y-m-j', $params['dateFin']));
        $formation->setSalle($params['salle']);

        //add formateur to table formation_formateur
        foreach ($params['formateur'] as $formateur) {
            $formation->addFormateur($formateur);
        }
        // add matiere to formation
        foreach ($params['matiere'] as $matiere) {
            $formation->addMatiere($matiere);
        }

        $evaluation = new Evaluations();
        $evaluation->setDateEvaluation(\DateTime::createFromFormat('Y-m-j', $params['dateEvaluation']));
        $evaluation->setFormation($formation);




        // add etudiants to formation 
        $this->addEtudiants($formation, $params['etudiant']);


        $this->entityManager->persist($formation);
        $this->entityManager->persist($evaluation);
        $this->addDocs($params, $formation, $evaluation);

        $this->entityManager->flush();
    }

    private function addEtudiants($formation, $etudiants)
    {
        foreach ($etudiants as $etudiant) {
            $EtudiantFormation = new EtudiantsFormation();
            $EtudiantFormation->setFormation($formation);
            $EtudiantFormation->setEtudiant($etudiant);
            $EtudiantFormation->setPaye('Non payé');
            $EtudiantFormation->setMontant('0');
            $EtudiantFormation->setDate(new \DateTime('now'));

            $this->entityManager->persist($EtudiantFormation);
            $this->entityManager->flush();
        }
    }

    public function getEtudiantFormation($id)
    {
        $EtudiantFormation = $this->entityManager->getRepository(EtudiantsFormation::class)->findBy(['formation' => $id]);
        $etudfor = [];
        $etudfor['etudiants'] = [];
        foreach ($EtudiantFormation as $formation)
            array_push($etudfor['etudiants'], $formation->getEtudiant());
        //array_push($etudfor['infos'], $formation->getPaye(), $formation->getMontant());
        return $etudfor;
    }

    public function getEtudiantInfos($id)
    {
        $EtudiantFormation = $this->entityManager->getRepository(EtudiantsFormation::class)->findBy(['formation' => $id]);
        $etudfor = [];
        $etudfor['etudiants'] = [];
        $etudfor['montant'] = [];
        $etudfor['paye'] = [];
        foreach ($EtudiantFormation as $formation) {
            array_push($etudfor['montant'], $formation->getMontant());
            array_push($etudfor['paye'], $formation->getPaye());
        }
        return $etudfor;
    }

    public function getMatiereFormation($id)
    {
        $formation = $this->entityManager->getRepository(Formation::class)->find($id);
        $matieres = $formation->getMatiere();
        return $matieres;
    }

    public function getEvaluation($id)
    {
        return $this->entityManager->getRepository(Evaluations::class)->findOneBy(['formation' => $id]);
    }

    public function update($id, $params)
    {
        $formation = $this->getById($id);
        $formation->setNom($params['nom']);
        $formation->setDateDebut(\DateTime::createFromFormat('Y-m-j', $params['dateDebut']));
        $formation->setDateFin(\DateTime::createFromFormat('Y-m-j', $params['dateFin']));
        $formation->setSalle($params['salle']);

        foreach ($params['formateur'] as $formateur) {
            $formation->addFormateur($formateur);
        }

        foreach ($params['matiere'] as $matiere) {
            $formation->addMatiere($matiere);
        }

        $evaluation = $this->getEvaluation($formation);
        $evaluation->setDateEvaluation(\DateTime::createFromFormat('Y-m-j', $params['dateEvaluation']));
        $evaluation->setFormation($formation);


        $this->addEtudiants($formation, $params['etudiant']);
        $this->entityManager->persist($formation);
        $this->entityManager->persist($evaluation);
        $this->addDocs($params, $formation, $evaluation);
        $this->entityManager->flush();
    }

    public function getById($id)
    {
        return $this->entityManager->getRepository(Formation::class)->find($id);
    }


    public function remove($id)
    {
        $this->entityManager->remove($this->getById($id));
        $this->entityManager->flush();
    }

    public function addNote($params, $chemin, $document)
    {
        $noteEtudiant = new listeNote();
        $noteEtudiant->setEtudiant($params["etudiant"]);
        $noteEtudiant->setFormation($params['formation']);
        $noteEtudiant->setMatiere($params['matiere']);
        $noteEtudiant->setNote($params['note']);
        $noteEtudiant->setChemin($chemin);
        $noteEtudiant->setDocument($document);

        $this->entityManager->persist($noteEtudiant);
        $this->entityManager->flush();
    }

    private function addDocs($params, $formation, $evaluation)
    {
        foreach ($params['document'] as $doc) {
            $document = new EvaluationDocument();
            $document->setNom($doc['originale']);
            $document->setChemin($doc['path']);
            $document->setEvaluation($evaluation);
            $document->setFormation($formation);

            $this->entityManager->persist($document);
            $this->entityManager->flush();
        }
    }


    public function paiment($formation, $etudiant, $montant, $paye)
    {
        $formationEtudiant = $this->entityManager->getRepository(EtudiantsFormation::class)->findOneBy(
            ['formation' => $formation->getId(), 'etudiant' => $etudiant->getId()]
        );
        $formationEtudiant->setFormation($formation);
        $formationEtudiant->setEtudiant($etudiant);
        $formationEtudiant->setMontant($montant);
        $formationEtudiant->setDate(new \DateTime('now'));
        $formationEtudiant->setPaye($paye);

        $this->entityManager->persist($formationEtudiant);
        $this->entityManager->flush();
    }

    public function getDocuments($formation)
    {
        return $this->entityManager->getRepository(EvaluationDocument::class)->findBy(['formation' => $formation]);
    }

    public function getEtudiantFor($id, $idf)
    {
        return $this->entityManager->getRepository(EtudiantsFormation::class)->findOneBy(['etudiant' => $id, 'formation' => $idf]);
    }

    public function formationEnCours()
    {

        $repo = $this->entityManager->getRepository(Formation::class);
        $query = $repo->createQueryBuilder('e')
            ->where('(e.dateDebut) <= :date')
            ->andWhere('(e.dateFin) >= :date')
            ->setParameter('date', new \DateTime('now'))
            ->getQuery();

        return $query->getResult();
    }

    public function MontantMonth()
    {
        $repo = $this->entityManager->getRepository(EtudiantsFormation::class);
        $query = $repo->createQueryBuilder('u')
            ->select('DATE_FORMAT(u.date, \'%m-%Y\') as month, sum(u.montant) total')
            ->groupBy('month')
            ->getQuery();

        return $query->getResult();
    }
}
