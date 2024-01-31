<?php

namespace App\Repository;

use App\Entity\Video;
use App\Entity\Playlist;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Playlist>
 *
 * @method Playlist|null find($id, $lockMode = null, $lockVersion = null)
 * @method Playlist|null findOneBy(array $criteria, array $orderBy = null)
 * @method Playlist[]    findAll()
 * @method Playlist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlaylistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Playlist::class);
    }

    public function playlistsIncVideo(int $videoId, int $userId): array
    {
        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('p')
            ->from('App\Entity\Playlist', 'p')
            ->join('p.videos', 'v')
            ->join('p.createdBy', 'u')
            ->where('u.id = :userId')
            ->andWhere('v.id = :videoId')
            ->setParameter('userId', $userId)
            ->setParameter('videoId', $videoId)
            ->getQuery();

        return $query->getResult();
    }

    public function playlistsExcVideo(int $videoId, int $userId): array
    {
        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('p')
            ->from('App\Entity\Playlist', 'p')
            ->join('p.createdBy', 'u')
            ->leftJoin('p.videos', 'v', 'WITH', 'v.id = :videoId')
            ->where('u.id = :userId')
            ->andWhere('v.id IS NULL')
            ->setParameter('userId', $userId)
            ->setParameter('videoId', $videoId)
            ->getQuery();

        return $query->getResult();
    }
}
