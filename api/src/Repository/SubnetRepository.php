<?php

namespace App\Repository;

use App\Entity\Subnet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Subnet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subnet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subnet[]    findAll()
 * @method Subnet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubnetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Subnet::class);
    }

    // /**
    //  * @return Subnet[] Returns an array of Subnet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Subnet
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
