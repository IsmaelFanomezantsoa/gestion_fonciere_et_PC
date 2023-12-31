<?php

namespace App\Repository;

use App\Entity\Parcelle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Parcelle>
 *
 * @method Parcelle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Parcelle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Parcelle[]    findAll()
 * @method Parcelle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParcelleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Parcelle::class);
    }

    public function save(Parcelle $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Parcelle $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   /**
    * @return Parcelle[] Returns an array of Parcelle objects
    */
   public function findParcelleCadastre($idCadastre , $nParcelle): array
   {
       return $this->createQueryBuilder('p')
           ->andWhere('p.TerrainCadastre = :idCadastre')
           ->andWhere('p.n_parcelle = :nParcelle')
           ->setParameter('idCadastre', $idCadastre)
           ->setParameter('nParcelle', $nParcelle)  
           ->getQuery()
           ->getResult()
       ;
   }

//    public function findOneBySomeField($value): ?Parcelle
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
