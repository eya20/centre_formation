<?php

namespace GestionBundle\Service;

use AppBundle\Entity\EvaluationDocument;
use AppBundle\Entity\Evaluations;
use AppBundle\Entity\Formation;
use Doctrine\ORM\EntityManager;

class EvaluationService
{

    private $entityManager;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    public function getAll($search = "")
    {

        if (strlen($search) > 0) {
            $repo = $this->entityManager->getRepository(Evaluations::class);
            $query = $repo->createQueryBuilder('a')
                ->where('a.nomEvaluation LIKE :title OR a.dateEvaluation LIKE :title')
                ->setParameter('title', '%' . $search . '%')
                ->getQuery();

            return $query->getResult();
        }

        return $this->entityManager->getRepository(Evaluations::class)->findAll();
    }

    public function add($params)
    {

        $evaluation = new Evaluations();
        $evaluation->setNomEvaluation($params['nomEvaluation']);
        $evaluation->setDateEvaluation(\DateTime::createFromFormat('Y-m-j H:i:s', $params['dateEvaluation']));
        //$formation = $this->entityManager->getRepository(Evaluations::class)->findOneBy(['nom' => $params['formations']]);

        $evaluation->setFormations($params['formations']);

        $this->entityManager->persist($evaluation);
        $this->entityManager->flush();
        $this->addDocs($params, $evaluation);
    }

    public function update($id, $params)
    {
        $evaluation = $this->getById($id);
        $evaluation->setNomEvaluation($params['nomEvaluation']);
        $evaluation->setDateEvaluation(\DateTime::createFromFormat('Y-m-d H:i:s', $params['dateEvaluation']));

        $this->entityManager->persist($evaluation);
        $this->entityManager->flush();
        $this->addDocs($params, $evaluation);
    }
    private function addDocs($params, $evaluation)
    {
        foreach ($params['document'] as $doc) {
            $document = new EvaluationDocument();
            $document->setNom($doc['originale']);
            $document->setChemin($doc['path']);
            $document->setEvaluation($evaluation);

            $this->entityManager->persist($document);
            $this->entityManager->flush();
        }
    }

    public function getDocuments($evaluation)
    {
        return $this->entityManager->getRepository(EvaluationDocument::class)->findBy(['evaluation' => $evaluation]);
    }
    public function getById($id)
    {
        return $this->entityManager->getRepository(Evaluations::class)->find($id);
    }


    public function remove($id)
    {
        $this->entityManager->remove($this->getById($id));
        $this->entityManager->flush();
    }
}
