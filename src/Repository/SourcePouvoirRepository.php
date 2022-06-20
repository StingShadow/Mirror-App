<?php

namespace App\Repository;

use App\Entity\SourcePouvoir;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SourcePouvoir|null find($id, $lockMode = null, $lockVersion = null)
 * @method SourcePouvoir|null findOneBy(array $criteria, array $orderBy = null)
 * @method SourcePouvoir[]    findAll()
 * @method SourcePouvoir[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SourcePouvoirRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SourcePouvoir::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(SourcePouvoir $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(SourcePouvoir $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return SourcePouvoir[] Returns an array of SourcePouvoir objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SourcePouvoir
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
