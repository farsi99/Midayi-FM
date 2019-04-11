<?php

namespace App\Repository;

use App\Entity\TypeActualite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeActualite|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeActualite|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeActualite[]    findAll()
 * @method TypeActualite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeActualiteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeActualite::class);
    }

    // /**
    //  * @return TypeActualite[] Returns an array of TypeActualite objects
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
    public function findOneBySomeField($value): ?TypeActualite
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
