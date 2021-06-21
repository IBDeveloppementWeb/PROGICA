<?php

namespace App\Repository;

use App\Entity\Gite;
use App\Entity\GiteSearch;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Gite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gite[]    findAll()
 * @method Gite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gite::class);
    }

    /**
     * @return Gite [] Retourne un tableau d'objects Gite
     */

    public function findLatestGite()
    {
        return $this->createQueryBuilder('g')
            ->orderBy('g.addAt', 'DESC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }



    public function findBySomeField(GiteSearch $search)
    {
        $query = $this->createQueryBuilder('g');

        if ($search->getMinSurface()) {
            $query = $query
                ->andWhere('g.surface >= :minSurface')
                ->setParameter('minSurface', $search->getMinSurface());
        }
        if ($search->getMinChambre()) {
            $query = $query
                ->andWhere('g.chambre >= :minChambre')
                ->setParameter('minChambre', $search->getMinChambre());
        }
        if ($search->getMinCouchage()) {
            $query = $query
                ->andWhere('g.couchage >= :minCouchage')
                ->setParameter('minCouchage', $search->getMinCouchage());
        }
        if ($search->getMaxTarif()) {
            $query = $query
                ->andWhere('g.tarifBasseSaison <= :maxTarif')
                ->setParameter('maxTarif', $search->getMaxTarif());
        }

        if ($search->getEquipements()->count() > 0) {
            $k = 0;
            foreach ($search->getEquipements() as $equipement) {
                $k++;
                $query = $query
                    ->andWhere(":equipement$k MEMBER OF g.equipements")
                    ->setParameter("equipement$k", $equipement);
            }
        }

        return $query->getQuery()->getResult();
    }
}
