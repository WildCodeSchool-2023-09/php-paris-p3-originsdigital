<?php

namespace App\Repository;

use App\Entity\Video;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Video>
 *
 * @method Video|null find($id, $lockMode = null, $lockVersion = null)
 * @method Video|null findOneBy(array $criteria, array $orderBy = null)
 * @method Video[]    findAll()
 * @method Video[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Video::class);
    }

    public function recommandedVideos(int $id, string $category): array
    {
        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('c', 'v')
            ->from('App\Entity\Video', 'v')
            ->join('v.category', 'c')
            ->where("c.label = '$category'")
            ->andWhere("v.id > '$id'")
            ->setMaxResults(4)
            ->getQuery();

        return $query->getResult();
    }
}
