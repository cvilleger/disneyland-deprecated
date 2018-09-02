<?php

namespace App\Repository;

use App\Entity\AttractionTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AttractionTime|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttractionTime|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttractionTime[]    findAll()
 * @method AttractionTime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttractionTimeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AttractionTime::class);
    }

    public function findLast()
    {
        $lastAttractionTime = $this->findOneBy([], ['created_at' => 'DESC']);
        if (null === $lastAttractionTime){
            return array();
        }

        return $this->findBy(['created_at' => $lastAttractionTime->getCreatedAt()]);
    }

//    /**
//     * @return AttractionTime[] Returns an array of AttractionTime objects
//     */
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
    public function findOneBySomeField($value): ?AttractionTime
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
