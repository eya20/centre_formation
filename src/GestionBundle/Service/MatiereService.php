<?php

namespace GestionBundle\Service;


use AppBundle\Entity\Matiere;
use AppBundle\Entity\MatiereDocument;
use Doctrine\ORM\EntityManager;

class MatiereService
{

    private $entityManager;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    public function getAll($search = "")
    {

        if (strlen($search) > 0) {
            $repo = $this->entityManager->getRepository(Matiere::class);
            $query = $repo->createQueryBuilder('a')
                ->where('a.nom LIKE :title')
                ->setParameter('title', '%' . $search . '%')
                ->getQuery();

            return $query->getResult();
        }

        return $this->entityManager->getRepository(Matiere::class)->findAll();
    }

    public function add($params)
    {
        $matiere = new Matiere();
        $matiere->setNom($params['nom']);
        $matiere->setDuree($params['duree']);

        $this->entityManager->persist($matiere);
        $this->entityManager->flush();
        $this->addDocs($params, $matiere);
    }

    public function update($id, $params)
    {
        $matiere = $this->getById($id);
        $matiere->setNom($params['nom']);
        $matiere->setDuree($params['duree']);
        $this->entityManager->persist($matiere);
        $this->entityManager->flush();

        $this->addDocs($params, $matiere);
    }

    private function addDocs($params, $matiere)
    {
        foreach ($params['docs'] as $doc) {
            $document = new MatiereDocument();
            $document->setNom($doc['original']);
            $document->setChemin($doc['path']);
            $document->setMatiere($matiere);

            $this->entityManager->persist($document);
            $this->entityManager->flush();
        }
    }

    public function getDocuments($matiere)
    {
        return $this->entityManager->getRepository(MatiereDocument::class)->findBy(['matiere' => $matiere]);
    }

    public function getById($id)
    {
        return $this->entityManager->getRepository(Matiere::class)->find($id);
    }

    public function remove($id)
    {
        $this->entityManager->remove($this->getById($id));
        $this->entityManager->flush();
    }
}
