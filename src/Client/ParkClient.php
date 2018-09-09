<?php

namespace App\Client;

use App\Entity\AttractionTime;
use App\Repository\AttractionRepository;
use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Client;
use Symfony\Component\Cache\Simple\FilesystemCache;

class ParkClient
{
    private $appAuthorizationUrl;
    private $appAuthorizationBody;
    private $appDisney1Url;
    private $appDisney2Url;
    private $client;
    private $cache;
    private $entityManager;
    private $attractionRepository;

    public function __construct(
        string $appAuthorizationUrl,
        string $appAuthorizationBody,
        string $appDisney1Url,
        string $appDisney2Url,
        EntityManagerInterface $entityManager,
        AttractionRepository $attractionRepository
    )
    {
        $this->appAuthorizationUrl = $appAuthorizationUrl;
        $this->appAuthorizationBody = $appAuthorizationBody;
        $this->appDisney1Url = $appDisney1Url;
        $this->appDisney2Url = $appDisney2Url;
        $this->client = new Client();
        $this->cache = new FilesystemCache();
        $this->entityManager = $entityManager;
        $this->attractionRepository = $attractionRepository;
    }

    public function refreshAndSave(): void
    {
        $entries = [];
        foreach ([$this->appDisney1Url, $this->appDisney2Url] as $disneyParcUrl){
            $response = $this->client->get($disneyParcUrl, [
                'headers' => ['Authorization' => 'Bearer ' . $this->getToken()]
            ]);

            $data = (json_decode($response->getBody()->getContents()))->entries;

            foreach ($data as $row){
                if (isset($row->name)){
                    $row->id = explode(';', $row->id)[0];
                    $entries[] = $row;
                }
            }
        }

        $createdAt = new \DateTime();
        $attractionTimes = array();
        foreach ($entries as $entry){
            $attraction = $this->attractionRepository->findOneBy(['ref' => $entry->id]);
            $waitTime = $entry->waitTime;
            $attractionTime = new AttractionTime();
            $attractionTime->setAttraction($attraction);
            $attractionTime->setHasFastpass($waitTime->fastPass->available);
            $attractionTime->setStatus($waitTime->status);
            $attractionTime->setIsSinglerider($waitTime->singleRider);
            $attractionTime->setWaitTime($waitTime->postedWaitMinutes);
            $attractionTime->setCreatedAt($createdAt);
            $this->entityManager->persist($attractionTime);
            $attractionTimes[] = $attractionTime;
        }
        $this->entityManager->flush();
        $this->cache->set('app.data', $attractionTimes, 60);
    }

    private function getToken(): string
    {
        if (!$this->cache->has('app.token')) {
            $authResponse = $this->client->post($this->appAuthorizationUrl, [
                'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
                'body' => $this->appAuthorizationBody
            ]);
            $json = json_decode($authResponse->getBody()->getContents());

            $this->cache->set('app.token', $json->access_token, (int) $json->expires_in);
        }

        return $this->cache->get('app.token');
    }
}
