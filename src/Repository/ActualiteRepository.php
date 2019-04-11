<?php

namespace App\Repository;

use App\Entity\Actualite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use App\Entity\Categorie;
use App\Entity\TypeActualite;

/**
 * @method Actualite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actualite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actualite[]    findAll()
 * @method Actualite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActualiteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Actualite::class);
    }

    /**
     * cette méthode traite et retourne les 6 dernieres actualités publiées
     * @return Actualite[]
     */
    public function ForLastActualite(string $etat, Categorie $cat, int $limit = 0)
    {
        return  $this->findActualite($etat, $limit, $cat)
            ->getQuery()
            ->getResult();
    }

    /**
     * cette méthode taite les actualités d'un type dont la variable est passé en parametre
     * @param mixed $etat , $type, $categorie, $limit
     * @return Actualite[]
     */
    public function getForLastTypeActu(string $etat, Categorie $categorie, int $limit = 0, TypeActualite $type)
    {
        return  $this->findActualite($etat, $limit, $categorie)
            ->andWhere('t.station = :station')
            ->setParameter('station', $type->getStation())
            ->getQuery()
            ->getResult();
    }

    /**
     * cette fonction privé va filtré toutes les actaulités publiées, avec une limite
     * avec une jointure entre actualite, categorie, typeactaulite
     * @param mixed $etat, $limit, $cat
     */
    private function findActualite($etat, $limit, $cat)
    {
        return $this->createQueryBuilder('a')
            ->addSelect('c', 't')
            ->leftJoin('a.categorie', 'c')
            ->leftJoin('a.typeActualite', 't')
            ->andWhere('c.libelle= :actualite')
            ->setParameter('actualite', $cat->getLibelle())
            ->andwhere('a.etatPub = :etat')
            ->setParameter('etat', $etat)
            ->setMaxResults($limit)
            ->orderBy('a.createdAt', 'DESC');
    }

    /**
     * cette méthode retourne les actualité de type donnée
     *
     * @param [type] $value
     * @return void
     */
    public function getActualtes(Actualite $actu, int $limit = 0)
    {
        $query = $this->createNamedQuery('a')
            ->where('a.typeActualite = typeactualite')
            ->setParameter('typeactualite', $actu->getTypeActualite())
            ->setMaxResult($limit)
            ->getQuery()
            ->getResult();
        return $query;
    }

    // /**
    //  * @return Actualite[] Returns an array of Actualite objects
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
    public function findOneBySomeField($value): ?Actualite
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
