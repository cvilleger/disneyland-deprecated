<?php

namespace App\Controller;

use App\Client\ParkClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController
{
    public function index(ParkClient $parkClient)
    {
        return $this->render('homepage/index.html.twig');
    }
}
