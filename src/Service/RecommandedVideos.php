<?php

namespace App\Service;

use App\Entity\Video;
use App\Repository\VideoRepository;

class RecommandedVideos
{
    public function recommandedVideos(VideoRepository $videoRepository, Video $video): array
    {
        $categoryVideos = $videoRepository->findByCategory($video->getCategory());
        $recommandedVideos = [];

        foreach ($categoryVideos as $key => $categoryVideo) {
            if ($categoryVideo->getId() === $video->getId()) {
                for ($i = 1; $i <= 4; $i++) {
                    if (isset($categoryVideos[$key + $i])) {
                        $recommandedVideos[] = $categoryVideos[$key + $i];
                    }
                }
            }
        }
        return $recommandedVideos;
    }
}
