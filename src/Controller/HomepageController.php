<?php

namespace App\Controller;

use App\Repository\AttractionTimeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Simple\FilesystemCache;

class HomepageController extends AbstractController
{
    public function index(AttractionTimeRepository $repository)
    {
        $cache = new FilesystemCache();
        return $this->render('homepage/index.html.twig', [
            'attractionTimes' => $cache->has('app.data') ? $cache->get('app.data') : $repository->findLast()
        ]);
    }
}
