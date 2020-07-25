<?php

namespace App\Repository;

use App\Entity\AbilityBonuses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AbilityBonuses|null find($id, $lockMode = null, $lockVersion = null)
 * @method AbilityBonuses|null findOneBy(array $criteria, array $orderBy = null)
 * @method AbilityBonuses[]    findAll()
 * @method AbilityBonuses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AbilityBonusesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AbilityBonuses::class);
    }

    // /**
    //  * @return AbilityBonuses[] Returns an array of AbilityBonuses objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AbilityBonuses
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
