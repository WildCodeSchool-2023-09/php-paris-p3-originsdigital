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

    public function recommandedVideos(int $id, string $category, string $language): array
    {
        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('v')
            ->from('App\Entity\Video', 'v')
            ->join('v.language', 'l')
            ->where("v.category = :category")
            ->andWhere("v.id > :id")
            ->andWhere("l.label = :language")
            ->setMaxResults(4)
            ->setParameter('category', $category)
            ->setParameter('id', $id)
            ->setParameter('language', $language)
            ->getQuery();

        return $query->getResult();
    }
}
