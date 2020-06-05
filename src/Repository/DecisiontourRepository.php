<?php

namespace App\Repository;

use App\Entity\Decisiontour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Decisiontour|null find($id, $lockMode = null, $lockVersion = null)
 * @method Decisiontour|null findOneBy(array $criteria, array $orderBy = null)
 * @method Decisiontour[]    findAll()
 * @method Decisiontour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DecisiontourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Decisiontour::class);
    }

    // /**
    //  * @return Decisiontour[] Returns an array of Decisiontour objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Decisiontour
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
