<?php

namespace App\Repository;

use App\Entity\Attraction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Attraction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Attraction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Attraction[]    findAll()
 * @method Attraction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttractionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Attraction::class);
    }
}
