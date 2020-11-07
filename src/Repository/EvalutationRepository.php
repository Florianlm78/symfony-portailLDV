<?php

namespace App\Repository;

use App\Entity\Evalutation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Evalutation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evalutation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evalutation[]    findAll()
 * @method Evalutation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvalutationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evalutation::class);
    }

    // /**
    //  * @return Evalutation[] Returns an array of Evalutation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Evalutation
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
