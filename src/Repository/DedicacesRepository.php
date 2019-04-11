<?php

namespace App\Repository;

use App\Entity\Dedicaces;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Dedicaces|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dedicaces|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dedicaces[]    findAll()
 * @method Dedicaces[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DedicacesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Dedicaces::class);
    }

    // /**
    //  * @return Dedicaces[] Returns an array of Dedicaces objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dedicaces
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
