<?php

namespace App\Repository;

use App\Entity\Forms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Forms|null find($id, $lockMode = null, $lockVersion = null)
 * @method Forms|null findOneBy(array $criteria, array $orderBy = null)
 * @method Forms[]    findAll()
 * @method Forms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Forms::class);
    }

    // /**
    //  * @return Forms[] Returns an array of Forms objects
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
    public function findOneBySomeField($value): ?Forms
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findActivByTeam($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.team = :val')
            ->andWhere('a.activ = 1')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }

    public function findPublicByTeam($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.team = :val')
            ->andWhere('a.activ = 1')
            ->andWhere('a.status != 4')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }
}
