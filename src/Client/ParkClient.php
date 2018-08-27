<?php

namespace App\Client;

use GuzzleHttp\Client;

class ParkClient
{
    private $appAuthorizationUrl;
    private $appAuthorizationBody;
    private $appDisney1Url;
    private $appDisney2Url;

    public function __construct(string $appAuthorizationUrl, string $appAuthorizationBody, string $appDisney1Url, string $appDisney2Url)
    {
        $this->appAuthorizationUrl = $appAuthorizationUrl;
        $this->appAuthorizationBody = $appAuthorizationBody;
        $this->appDisney1Url = $appDisney1Url;
        $this->appDisney2Url = $appDisney2Url;
    }

    public function getData(): array
    {
        $client = new Client();

        $authResponse = $client->post($this->appAuthorizationUrl, [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'body' => $this->appAuthorizationBody
        ]);

        $json = json_decode($authResponse->getBody()->getContents());
        $accessToken = $json->access_token;

        $entries = [];
        foreach ([$this->appDisney1Url, $this->appDisney2Url] as $disneyParcUrl){
            $response = $client->get($disneyParcUrl, [
                'headers' => [
                    'Authorization' => "Bearer $accessToken"
                ]
            ]);

            $data = (json_decode($response->getBody()->getContents()))->entries;

            foreach ($data as $row){
                if(isset($row->name)){
                    $row->id = explode(';', $row->id)[0];
                    $entries[] = $row;
                }
            }
        }

        usort($entries, function ($a, $b){
            return $b->waitTime->postedWaitMinutes <=> $a->waitTime->postedWaitMinutes;
        });

        return $entries;
    }

}