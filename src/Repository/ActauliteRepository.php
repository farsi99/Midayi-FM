<?php

namespace App\Repository;

use App\Entity\Actaulite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Actaulite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actaulite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actaulite[]    findAll()
 * @method Actaulite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActauliteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Actaulite::class);
    }

    // /**
    //  * @return Actaulite[] Returns an array of Actaulite objects
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
    public function findOneBySomeField($value): ?Actaulite
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
