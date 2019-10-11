<?php

namespace GestionBundle\Service;

use AppBundle\Entity\Etudiant;
use Doctrine\ORM\EntityManager;


class EtudiantService
{

    private $entityManager;

    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }

    public function getAll($search = "")
    {

        if (strlen($search) > 0) {
            $repo = $this->entityManager->getRepository(Etudiant::class);
            $query = $repo->createQueryBuilder('a')
                ->where('a.nom LIKE :title OR a.prenom LIKE :title')
                ->setParameter('title', '%' . $search . '%')
                ->getQuery();

            return $query->getResult();
        }

        return $this->entityManager->getRepository(Etudiant::class)->findAll();
    }

    public function add($params)
    {

        $etudiant = new Etudiant();
        $etudiant->setEmail($params['email']);
        $etudiant->setNom($params['nom']);
        $etudiant->setPrenom($params['prenom']);
        $etudiant->setTelephone($params['telephone']);
        $etudiant->setUniqId($params['uniq_id']);
        $etudiant->setDateNaissance(\DateTime::createFromFormat('Y-m-j', $params['date_naissance']));
        $etudiant->setLieuNaissance($params['lieu_naissance']);
        $etudiant->setAdresse($params['adresse']);
        $etudiant->setNiveau($params['niveau']);
        $etudiant->setNote($params['note']);
        $etudiant->setImage($params['image']);


        $this->entityManager->persist($etudiant);
        $this->entityManager->flush();
    }

    public function update($id, $params)
    {
        $etudiant = $this->getById($id);
        $etudiant->setEmail($params['email']);
        $etudiant->setNom($params['nom']);
        $etudiant->setPrenom($params['prenom']);
        $etudiant->setTelephone($params['telephone']);
        $etudiant->setUniqId($params['uniq_id']);
        $etudiant->setDateNaissance(\DateTime::createFromFormat('Y-m-j', $params['date_naissance']));
        $etudiant->setLieuNaissance($params['lieu_naissance']);
        $etudiant->setAdresse($params['adresse']);
        $etudiant->setNiveau($params['niveau']);
        $etudiant->setNote($params['note']);
        $etudiant->setImage($params['image']);


        $this->entityManager->persist($etudiant);
        $this->entityManager->flush();
    }

    public function getById($id)
    {
        return $this->entityManager->getRepository(Etudiant::class)->find($id);
    }

    public function remove($id)
    {
        $this->entityManager->remove($this->getById($id));
        $this->entityManager->flush();
    }
}
