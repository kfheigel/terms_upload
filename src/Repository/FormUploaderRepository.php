<?php

namespace App\Repository;

use App\Entity\FormUploader;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FormUploader|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormUploader|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormUploader[]    findAll()
 * @method FormUploader[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormUploaderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormUploader::class);
    }

    // /**
    //  * @return FormUploader[] Returns an array of FormUploader objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FormUploader
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
