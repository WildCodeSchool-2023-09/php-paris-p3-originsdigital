<?php

namespace App\Repository;

use App\Entity\Course;
use App\Entity\User;
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
    public const PLAYLIST_JS_BEGINNER = 'JS Beginner';
    public const PLAYLIST_PHP_EXPERT = 'PHP Expert';
    public const PLAYLIST_DEFAULT = 'HTML & CSS';

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

    public function assignPlaylist(User $user, Course $course, int $score): void
    {
        if ($score <= 60 && $course->getId() == 4) {
            $playlistLabel = self::PLAYLIST_JS_BEGINNER;
        } elseif ($score >= 40 && $course->getId() == 3) {
            $playlistLabel = self::PLAYLIST_PHP_EXPERT;
        } else {
            $playlistLabel = self::PLAYLIST_DEFAULT;
        }

        $playlist = $this->findOneBy(['label' => $playlistLabel, 'createdBy' => null]);

        $user->addProgram($playlist);

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }
}
