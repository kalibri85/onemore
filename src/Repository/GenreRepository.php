<?php

namespace App\Repository;

use App\Entity\Genre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Genre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Genre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Genre[]    findAll()
 * @method Genre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GenreRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Genre::class);
    }

    /*
    public function findOneBySomeField($value): ?Genre
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @return Genre|null
     */
    public function findAllGenre()
    {
        return $this->createQueryBuilder('g')
            ->getQuery()
            ->getResult()
            ;
    }


    public function findOneByGenre($value)
    {
        $genreId = $this->createQueryBuilder("g")
            ->Where('g.genre LIKE :genre')
            ->setParameter('genre', '%'.$value.'%');

        return $genreId->getQuery()->getOneOrNullResult();
    }
}
