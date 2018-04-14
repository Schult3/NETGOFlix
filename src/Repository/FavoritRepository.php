<?php

namespace App\Repository;

use App\Entity\Favorit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Favorit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Favorit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Favorit[]    findAll()
 * @method Favorit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FavoritRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Favorit::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('f')
            ->where('f.something = :value')->setParameter('value', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
