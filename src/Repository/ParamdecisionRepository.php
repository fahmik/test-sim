<?php

namespace App\Repository;

use App\Entity\Paramdecision;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Paramdecision|null find($id, $lockMode = null, $lockVersion = null)
 * @method Paramdecision|null findOneBy(array $criteria, array $orderBy = null)
 * @method Paramdecision[]    findAll()
 * @method Paramdecision[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParamdecisionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Paramdecision::class);
    }

    // /**
    //  * @return Paramdecision[] Returns an array of Paramdecision objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Paramdecision
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
