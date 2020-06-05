<?php

namespace App\Repository;

use App\Entity\Configjeux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Configjeux|null find($id, $lockMode = null, $lockVersion = null)
 * @method Configjeux|null findOneBy(array $criteria, array $orderBy = null)
 * @method Configjeux[]    findAll()
 * @method Configjeux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConfigjeuxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Configjeux::class);
    }

    // /**
    //  * @return Configjeux[] Returns an array of Configjeux objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Configjeux
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
