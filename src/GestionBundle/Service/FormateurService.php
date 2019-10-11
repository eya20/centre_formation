<?php

namespace GestionBundle\Service;

use AppBundle\Entity\Formateur;
use Doctrine\ORM\EntityManager;

class FormateurService
{

    private $entityManager;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    public function getAll($search = "")
    {

        if (strlen($search) > 0) {
            $repo = $this->entityManager->getRepository( Formateur::class );
            $query = $repo->createQueryBuilder('a')
                ->where('a.nom LIKE :title OR a.prenom LIKE :title')
                ->setParameter('title', '%' . $search . '%')
                ->getQuery();

            return $query->getResult();
        }

        return $this->entityManager->getRepository(Formateur::class)->findAll();
    }

    public function add($params)
    {
        $formateur = new Formateur();
        $formateur->setEmail($params['email']);
        $formateur->setNom($params['nom']);
        $formateur->setPrenom($params['prenom']);
        $formateur->setTelephone($params['telephone']);
        $formateur->setUniqId($params['uniq_id']);

        $this->entityManager->persist($formateur);
        $this->entityManager->flush();
    }

    public function update($id, $params)
    {
        $formateur = $this->getById($id);
        $formateur->setEmail($params['email']);
        $formateur->setNom($params['nom']);
        $formateur->setPrenom($params['prenom']);
        $formateur->setTelephone($params['telephone']);
        $formateur->setUniqId($params['uniq_id']);

        $this->entityManager->persist($formateur);
        $this->entityManager->flush();
    }


    public function getById($id)
    {
        return $this->entityManager->getRepository(Formateur::class)->find($id);
    }

    public function remove($id)
    {
        $this->entityManager->remove($this->getById($id));
        $this->entityManager->flush();
    }
}
