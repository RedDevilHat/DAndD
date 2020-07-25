<?php

namespace App\Repository;

use App\Entity\CharacterSubclass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CharacterSubclass|null find($id, $lockMode = null, $lockVersion = null)
 * @method CharacterSubclass|null findOneBy(array $criteria, array $orderBy = null)
 * @method CharacterSubclass[]    findAll()
 * @method CharacterSubclass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharacterSubclassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterSubclass::class);
    }

    // /**
    //  * @return CharacterSubclass[] Returns an array of CharacterSubclass objects
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
    public function findOneBySomeField($value): ?CharacterSubclass
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
