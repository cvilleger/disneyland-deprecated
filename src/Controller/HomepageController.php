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

        if (!$cache->has('app.data')){
            $cache->set('app.data', $repository->findLast());
        }

        return $this->render('homepage/index.html.twig', [
            'attractionTimes' => $cache->get('app.data')
        ]);
    }
}
