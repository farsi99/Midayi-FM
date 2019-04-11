<?php

namespace App\Repository;

use App\Entity\TypeAcutalite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeAcutalite|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAcutalite|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAcutalite[]    findAll()
 * @method TypeAcutalite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAcutaliteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeAcutalite::class);
    }

    // /**
    //  * @return TypeAcutalite[] Returns an array of TypeAcutalite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeAcutalite
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
