<?php

namespace App\Repository;

use App\Entity\Yideo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Yideo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Yideo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Yideo[]    findAll()
 * @method Yideo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YideoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Yideo::class);
    }

    // /**
    //  * @return Yideo[] Returns an array of Yideo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('y.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Yideo
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
